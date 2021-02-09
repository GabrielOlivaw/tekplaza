<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MessagesController extends Controller
{
    
    /**
     * GET /messages
     * 
     * Devuelve la vista de la lista de mensajes.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function view() {
        
        if (!auth()->user())
            return Redirect::back()->with('error', __('website.error-auth'));
        
        $messages = Message::select('messages.id', DB::raw('users.name AS from_name'), 
            'messages.content', 'messages.created_at')
            ->join('users', 'users.id', 'from')
            ->where('to', auth()->user()->id)
            ->orderBy('messages.created_at', 'desc')
            ->paginate(5);
        
        $users = User::select('id', 'name')
            ->where('id', '!=', auth()->user()->id)
            ->get();
        
        return view('messages', [
            'messages' => $messages,
            'users' => $users
        ]);
    }
    
    /**
     * POST /messages/send
     * 
     * Procesa la petición de enviar mensaje.
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function send(Request $request) {
        
        if (!auth()->user())
            return Redirect::back()->with('error', __('website.error-auth'));
        
        if (empty($request->to))
            $errorUser = __('website.actions-message-error-user') + " ";
        
        if (empty($request->content))
            $errorContent = __('website.actions-message-error-content');
    
        if (!isset($errorUser) && !isset($errorContent)) {
            $message = new Message();
            $message->from = auth()->user()->id;
            $message->to = $request->to;
            $message->content = $request->content;
            $message->save();
        }
        
        return response()->json([
            'message' => 'Message sent',
            'errorUser' => (isset($errorUser)) ? $errorUser : "",
            'errorContent' => (isset($errorContent)) ? $errorContent : ""
        ]);
    }
    
    /**
     * DELETE /messages/{message}
     * 
     * Procesa la petición de eliminación de mensaje.
     * 
     * @param Message $message
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Message $message) {
        
        if ($message->to !== auth()->user()->id)
            return Redirect::back()->with('error', __('website.error-incorrect-resource'));
        
        $message->delete();
        
        return back();
    }
}
