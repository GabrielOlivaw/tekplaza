<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Subforum;
use App\Models\User;
use App\Models\SubforumBan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * GET /users
     * 
     * Devuelve la vista de la lista de usuarios.
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function viewList() {
        
        if (!auth()->user())
            return Redirect::back()->with('error', __('website.error-auth'));
        
        $users = User::select('users.id', 'users.name', 
            'users.id_role', DB::raw('roles.name AS role'))
            ->join('roles', 'roles.id', 'users.id_role')
            ->paginate(5);
        
        $subforums = Subforum::select('subforums.id', 'subforums.name')
            ->get();
        
        $roles = Role::select('roles.id', 'roles.name')
            ->get();
        
        return view('user-list', [
            'users' => $users,
            'subforums' => $subforums,
            'roles' => $roles
        ]);
    }
    
    /**
     * POST /messages/send
     * 
     * Procesa la petición de enviar mensaje a usuario.
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function banUser(Request $request) {
        if ($request->days < 1)
            return Redirect::back()->with('error', __('website.error-ban-days'));
        if (is_null(User::find($request->user)))
            return Redirect::back()->with('error', __('website.error-ban-no-user'));
        if (!auth()->user() || (User::find($request->user)->id_role < auth()->user()->id_role))
            return Redirect::back()->with('error', __('website.error-ban-permssion'));
        
        $ban = new SubforumBan();
        $ban->banned_user = $request->user;
        $ban->moderator = auth()->user()->id;
        $ban->subforum = $request->subforum;
        $ban->days = $request->days;
        $ban->motive = (is_null($request->motive)) ? '' : $request->motive;
        $ban->save();
        
        return response()->json([
            'message' => 'User banned'
        ]);
    }
    
    
    public function changeRole(Request $request) {
        
        if (auth()->user()->id_role != 1)
            return Redirect::back()->with('error', __('website.error-change-role-admin'));      
        if (is_null(User::find($request->user)))    
            return Redirect::back()->with('error', __('website.error-change-role-no-user'));
        if (auth()->user()->id != 1 && User::find($request->user)->id_role == 1) 
            return Redirect::back()->with('error', __('website.error-change-role-admin-permission'));
        if (auth()->user()->id == $request->user)
            return Redirect::back()->with('error', __('website.error-change-role-own')); 
        
        $changedUser = User::find($request->user);
        $changedUser->id_role = $request->newRole;
        $changedUser->save();
        
        return response()->json([
            'message' => 'User role changed',
            'newRole' => Role::select('name')->where('id', $changedUser->id_role)->get()[0]->name
        ]);
    }
}
