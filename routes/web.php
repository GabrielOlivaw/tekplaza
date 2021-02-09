<?php


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('/', function () {
    return Redirect::route('subforums');
});

Route::get('/set-locale/{locale}', function($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
        App::setlocale($locale);
    }
    return Redirect::back();
})->name('set-locale');

Route::get('register', 'App\Http\Controllers\Auth\RegisterController@view')->name('register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');

Route::get('login', 'App\Http\Controllers\Auth\LoginController@view')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');

Route::post('logout', 'App\Http\Controllers\Auth\LogoutController@logout')->name('logout');

Route::get('users', 'App\Http\Controllers\UserController@viewList')->name('user-list');
Route::post('users/ban', 'App\Http\Controllers\UserController@banUser')->name('ban-user');
Route::put('users/change-role', 'App\Http\Controllers\UserController@changeRole')->name('change-role');

Route::get('messages', 'App\Http\Controllers\MessagesController@view')->name('message-list');
Route::post('messages/send', 'App\Http\Controllers\MessagesController@send')->name('send-message');
Route::delete('messages/{message}', 'App\Http\Controllers\MessagesController@delete')->name('delete-message');

Route::prefix('subforums')->group(function() {
    Route::get('/', 'App\Http\Controllers\SubforumsController@view')->name('subforums');
    Route::redirect('/{subforum}', '/subforums/{subforum}/threads');
    Route::get('/{subforum}/threads', 'App\Http\Controllers\ThreadsController@view')->name('subforum');
    Route::get('/{subforum}/threads/filter', 'App\Http\Controllers\ThreadsController@filter')->name('subforum-filter');
    
    Route::get('/{subforum}/threads/create', 'App\Http\Controllers\ThreadsController@createView')->name('create-thread');
    Route::post('/{subforum}/threads/create', 'App\Http\Controllers\ThreadsController@create');

    Route::get('/{subforum}/threads/{thread}', 'App\Http\Controllers\PostsController@view')->name('thread');
    
    Route::get('/{subforum}/threads/{thread}/create', 'App\Http\Controllers\PostsController@createView')->name('create-post');
    Route::post('/{subforum}/threads/{thread}/create', 'App\Http\Controllers\PostsController@create');
    Route::get('/{subforum}/threads/{thread}/{post}/edit', 'App\Http\Controllers\PostsController@editView')->name('edit-post');
    Route::put('/{subforum}/threads/{thread}/{post}/edit', 'App\Http\Controllers\PostsController@edit');
    
    Route::post('/{subforum}/threads/{thread}/lock', 'App\Http\Controllers\ThreadsController@switchLocked')->name('switch-locked');
    Route::post('/{subforum}/threads/{thread}/pin', 'App\Http\Controllers\ThreadsController@switchPinned')->name('switch-pinned');
    Route::delete('/{subforum}/threads/{thread}', 'App\Http\Controllers\ThreadsController@delete')->name('delete-thread');
    
    Route::delete('/{subforum}/threads/{thread}/delete/{post}', 'App\Http\Controllers\PostsController@delete')->name('delete-post');
});

