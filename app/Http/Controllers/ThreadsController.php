<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subforum;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ThreadsController extends Controller
{    
    
    /**
     * GET /subforums/{subforum}/threads/
     * 
     * Devuelve la vista de la lista de hilos del subforo proporcionado.
     * 
     * @param Subforum $subforum
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function view(Request $request, Subforum $subforum) {
        
        if ((auth()->user() && auth()->user()->id_role > $subforum->min_role)
            || (!auth()->user() && $subforum->min_role < 3)) {
            return Redirect::back()->with('error', __('website.error-insufficient-role'));
        }
        
        $threads = Thread::where('subforum', $subforum->id)
            ->select('threads.id', 'threads.title', 
                'threads.locked', 'threads.pinned',
                DB::raw('users.name AS user_name'),
                DB::raw('COUNT(posts.id) AS post_number'),
                DB::raw('(SELECT p.created_at FROM posts p '.
                        'WHERE p.thread = threads.id '.
                        'ORDER BY p.created_at DESC LIMIT 1) AS last_post'))
            ->join('users', 'users.id', 'threads.creator')
            ->join('posts', 'posts.thread', 'threads.id')
            ->whereRaw('posts.deleted_at IS NULL');
        
        if (!empty($request->filter)) {
            $threads = $threads->whereRaw('threads.title LIKE ?', ["%{$request->filter}%"]);
        }
        
        $threads = $threads->groupBy('threads.id')
            ->orderBy('threads.pinned', 'DESC')
            ->orderBy('last_post', 'DESC')
            ->orderBy('threads.id', 'DESC')
            ->paginate(5);
        
        if (!empty($request->filter)) {
            $threads = $threads->appends(['filter' => $request->filter]);
        }
            
        return view('subforum', [
            'subforum' => $subforum,
            'threads' => $threads,
            'isBanned' => auth()->user() && User::isBanned(auth()->user(), $subforum)
        ]);
    }
    
    /**
     * GET /{subforum}/threads/filter
     * 
     * Filtra la lista de hilos del subforo proporcionado, pasando el filtro 
     * como parámetro GET. 
     * 
     * @param Request $request
     * @param Subforum $subforum
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function filter(Request $request, Subforum $subforum) {
        
        if ((auth()->user() && auth()->user()->id_role > $subforum->min_role)
            || (!auth()->user() && $subforum->min_role < 3)) {
            return Redirect::back()->with('error', __('website.error-insufficient-role'));
        }
            
        $threads = Thread::where('subforum', $subforum->id)
            ->select('threads.id', 'threads.title',
                'threads.locked', 'threads.pinned',
                DB::raw('users.name AS user_name'),
                DB::raw('COUNT(posts.id) AS post_number'),
                DB::raw('(SELECT p.created_at FROM posts p '.
                        'WHERE p.thread = threads.id '.
                        'ORDER BY p.created_at DESC LIMIT 1) AS last_post'))
            ->join('users', 'users.id', 'threads.creator')
            ->join('posts', 'posts.thread', 'threads.id')
            ->whereRaw('posts.deleted_at IS NULL')
            ->whereRaw('threads.title LIKE ?', ["%{$request->filter}%"])
            ->groupBy('threads.id')
            ->orderBy('threads.pinned', 'DESC')
            ->orderBy('last_post', 'DESC')
            ->orderBy('threads.id', 'DESC')
            ->paginate(5)
            ->withPath(route('subforum', ['subforum' => $subforum]))
            ->appends(['filter' => $request->filter]);
                
        return response()->json([
            'subforum' => $subforum,
            'threads' => $threads,
            'pagination' => "{$threads->links()}"
        ]);
    }
    
    /**
     * GET /subforums/{subforum}/threads/create
     * 
     * Devuelve la vista de crear hilo en el subforo proporcionado.
     * 
     * @param Subforum $subforum
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function createView(Subforum $subforum) {
        
        if (!auth()->user()) {
            return Redirect::back()->with('error', __('website.error-auth'));
        }
        if (auth()->user()->id_role > $subforum->min_role) {
            return Redirect::back()->with('error', __('website.error-insufficient-role'));
        }
        if (User::isBanned(auth()->user(), $subforum)) {
            return Redirect::back()->with('error', __('website.error-not-allowed'));
        }
        
        return view('create-thread', ['subforum' => $subforum]);
    }
    
    /**
     * POST /subforums/{subforum}/threads/create
     * 
     * Recibe los datos de un hilo a crear y lo añade al subforo.
     * 
     * @param Request $request
     * @param Subforum $subforum
     * @return \Illuminate\Http\RedirectResponse|\Throwable
     */
    public function create(Request $request, Subforum $subforum) {
        
        if (!auth()->user()) {
            return Redirect::back()->with('error', __('website.error-auth'));
        }
        if (auth()->user()->id_role > $subforum->min_role) {
            return Redirect::back()->with('error', __('website.error-insufficient-role'));
        }
        if (User::isBanned(auth()->user(), $subforum)) {
            return Redirect::back()->with('error', __('website.error-banned'));
        }
        if (empty($request->title)) {
            return Redirect::back()->with('error', __('website.error-empty-title'));
        }
        if (empty($request->content)) {
            return Redirect::back()->with('error', __('website.error-empty-content'));
        }
        
        try {
            DB::beginTransaction();
            
            $user_id = auth()->user()->id;
            $thread = new Thread();
            $thread->creator = $user_id;
            $thread->title = $request->title;
            $thread->locked = false;
            $thread->pinned = false;
            $thread->subforum = $subforum->id;
            $thread->save();
            
            $post = new Post();
            $post->creator = $user_id;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->thread = $thread->id;
            $post->save();
            
            DB::commit();
            
            return redirect()->route('subforum', ['subforum' => $subforum]);
        }
        catch (\Throwable $e) {
            DB::rollBack();
            Log::error($e);
            return $e;
        }
    }
    
    /**
     * POST /{subforum}/threads/{thread}/lock
     * 
     * Bloquea o desbloquea el hilo proporcionado.
     * 
     * @param Subforum $subforum
     * @param Thread $thread
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switchLocked(Subforum $subforum, Thread $thread) {
        if (auth()->user()->id_role == 1) {
            $thread->locked = !$thread->locked;
            $thread->save();
        }
        
        return back();
    }
    
    /**
     * POST /{subforum}/threads/{thread}/pin
     * 
     * Fija o desfija el hilo proporcionado
     * 
     * @param Subforum $subforum
     * @param Thread $thread
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switchPinned(Subforum $subforum, Thread $thread) {
        if (auth()->user()->id_role == 1) {
            $thread->pinned = !$thread->pinned;
            $thread->save();
        }
        
        return back();
    }
    
    /**
     * DELETE /{subforum}/threads/{thread}/
     * 
     * Procesa la petición de eliminación del hilo proporcionado.
     * 
     * @param Subforum $subforum
     * @param Thread $thread
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Subforum $subforum, Thread $thread) {
        if ($thread->creator === auth()->user()->id ||
        auth()->user()->id_role == 1) {
            $thread->delete();
        }
        
        return redirect()->route('subforum', ['subforum' => $subforum]);
    }
}
