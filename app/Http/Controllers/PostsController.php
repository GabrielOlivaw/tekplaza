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

class PostsController extends Controller
{
    /**
     * GET /subforums/{subforum}/threads/{thread}
     * 
     * Devuelve la vista con la lista de posts del hilo proporcionado.
     * 
     * @param Subforum $subforum
     * @param Thread $thread
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function view(Subforum $subforum, Thread $thread) {
        
        if (!$this->isCorrectPost($subforum, $thread)) {
            return Redirect::back()->with('error', __('website.error-incorrect-resource'));
        }
        if ((auth()->user() && auth()->user()->id_role > $subforum->min_role)
            || (!auth()->user() && $subforum->min_role < 3)) {
            return Redirect::back()->with('error', __('website.error-insufficient-role'));
        }
        
        $posts = Post::select('posts.id', 'posts.title', 'posts.content',
            DB::raw('posts.created_at AS creation_date'),
            DB::raw('posts.creator AS user_id'),
            DB::raw('users.name AS user_name'),
            DB::raw('(SELECT COUNT(p.id) FROM posts p '
                .'WHERE p.creator = users.id) AS user_posts'))
            ->join('users', 'users.id', 'posts.creator')
            ->join('threads', 'threads.id', 'posts.thread')
            ->join('subforums', 'subforums.id', 'threads.subforum')
            ->where('posts.thread', $thread->id)
            ->where('subforums.id', $subforum->id)
            ->whereRaw('posts.deleted_at IS NULL')
            ->groupBy('posts.id')
            ->paginate(5);
                
        if ($posts->isEmpty()) {
            return redirect()->route('subforum', ['subforum' => $subforum->id]);
        }
        else {
            return view('thread', [
                'subforum' => $subforum,
                'thread' => $thread,
                'posts' => $posts,
                'isBanned' => auth()->user() && User::isBanned(auth()->user(), $subforum)
            ]);
        }
    }
    
    /**
     * GET /subforums/{subforum}/threads/{thread}/create
     * 
     * Devuelve la vista de crear respuesta al hilo proporcionado.
     * 
     * @param Subforum $subforum
     * @param Thread $thread
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function createView(Subforum $subforum, Thread $thread) {
        
        if (!$this->isCorrectPost($subforum, $thread)) {
            return Redirect::back()->with('error', __('website.error-incorrect-resource'));
        }
        if (!auth()->user()) {
            return Redirect::back()->with('error', __('website.error-auth'));
        }
        if (auth()->user()->id_role > $subforum->min_role) {
            return Redirect::back()->with('error', __('website.error-insufficient-role'));
        }
        if (User::isBanned(auth()->user(), $subforum)) {
            return Redirect::back()->with('error', __('website.error-not-allowed'));
        }
        
        return view('create-post', ['subforum' => $subforum, 'thread' => $thread]);
    }
    
    /**
     * POST /subforums/{subforum}/threads/{thread}/create
     * 
     * Recibe los datos de una respuesta a crear y la añade al hilo.
     * 
     * @param Request $request
     * @param Subforum $subforum
     * @param Thread $thread
     * @return \Illuminate\Http\RedirectResponse|\Throwable
     */
    public function create(Request $request, Subforum $subforum, Thread $thread) {
        
        if (!$this->isCorrectPost($subforum, $thread)) {
            return Redirect::back()->with('error', __('website.error-incorrect-resource'));
        }
        if (!auth()->user()) {
            return Redirect::back()->with('error', __('website.error-auth'));
        }
        if (auth()->user()->id_role > $subforum->min_role) {
            return Redirect::back()->with('error', __('website.error-insufficient-role'));
        }
        if (User::isBanned(auth()->user(), $subforum)) {
            return Redirect::back()->with('error', __('website.error-banned'));
        }
        if ($thread->locked && auth()->user()->id_role === 3) {
            return Redirect::back()->with('error', __('website.error-thread-locked'));
        }
        if (empty($request->title)) {
            return Redirect::back()->with('error', __('website.error-empty-title'));
        }
        if (empty($request->content)) {
            return Redirect::back()->with('error', __('website.error-empty-content'));
        }
        
        try {
            DB::beginTransaction();
            
            $post = new Post();
            $post->creator = auth()->user()->id;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->thread = $request->thread->id;
            $post->save();
            
            DB::commit();
            
            return redirect()->route('thread', ['subforum' => $subforum, 'thread' => $thread]);
        }
        catch (\Throwable $e) {
            DB::rollBack();
            Log::error($e);
            return $e;
        }
        
    }
    
    /**
     * GET /{subforum}/threads/{thread}/{post}/edit
     * 
     * Devuelve la vista de editar el post proporcionado.
     * 
     * @param Subforum $subforum
     * @param Thread $thread
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function editView(Subforum $subforum, Thread $thread, Post $post) {
        
        if (!$this->isCorrectPost($subforum, $thread)) {
            return Redirect::back()->with('error', __('website.error-incorrect-resource'));
        }
        if (!auth()->user()) {
            return Redirect::back()->with('error', __('website.error-auth'));
        }
        if (User::isBanned(auth()->user(), $subforum)) {
            return Redirect::back()->with('error', __('website.error-banned'));
        }
        if (auth()->user()->id !== $post->creator) {
            return Redirect::back()->with('error', __('website.error-post-edit-user'));
        }
        if ($thread->locked && auth()->user()->id_role === 3) {
            return Redirect::back()->with('error', __('website.error-thread-locked'));
        }
        
        return view('edit-post', ['subforum' => $subforum, 'thread' => $thread, 'post' => $post]);
    }
    
    /**
     * PUT /{subforum}/threads/{thread}/{post}/edit
     * 
     * Procesa la petición de edición del post proporcionado.
     * 
     * @param Request $request
     * @param Subforum $subforum
     * @param Thread $thread
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request, Subforum $subforum, Thread $thread, Post $post) {
        
        if (!$this->isCorrectPost($subforum, $thread)) {
            return Redirect::back()->with('error', __('website.error-incorrect-resource'));
        }
        if (!auth()->user()) {
            return Redirect::back()->with('error', __('website.error-auth'));
        }
        if (User::isBanned(auth()->user(), $subforum)) {
            return Redirect::back()->with('error', __('website.error-banned'));
        }
        if (auth()->user()->id !== $post->creator) {
            return Redirect::back()->with('error', __('website.error-post-edit-user'));
        }
        if ($thread->locked && auth()->user()->id_role === 3) {
            return Redirect::back()->with('error', __('website.error-thread-locked'));
        }
        if (empty($request->title)) {
            return Redirect::back()->with('error', __('website.error-empty-title'));
        }
        if (empty($request->content)) {
            return Redirect::back()->with('error', __('website.error-empty-content'));
        }
        
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        
        return redirect()->route('thread', ['subforum' => $subforum, 'thread' => $thread]);
    }
    
    /**
     * DELETE /{subforum}/threads/{thread}/delete/{post}
     * 
     * Procesa la petición de eliminación del post proporcionado.
     * 
     * @param Subforum $subforum
     * @param Thread $thread
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Subforum $subforum, Thread $thread, Post $post) {
        if ($post->creator === auth()->user()->id ||
            auth()->user()->id_role == 1) {
            $post->delete();
            
            if (Post::where('thread', $thread->id)->get()->isEmpty())
                return redirect()->route('subforum', ['subforum' => $subforum]);
        }
        
        return back();
    }
    
    /**
     * Comprueba si la URL introducida corresponde a un hilo 
     * existente de un subforo.
     * 
     * @param Subforum $subforum
     * @param Thread $thread
     */
    private function isCorrectPost(Subforum $subforum, Thread $thread) {
        $post = Post::select('posts.id')
            ->join('threads', 'threads.id', 'posts.thread')
            ->join('subforums', 'subforums.id', 'threads.subforum')
            ->where('posts.thread', $thread->id)
            ->where('subforums.id', $subforum->id)
            ->get();
        
        return !$post->isEmpty();
    }
}
