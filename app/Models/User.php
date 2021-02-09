<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function role() {
        return $this->belongsTo(Role::class, 'id_role', 'id');
    }
    
    public function threads() {
        return $this->hasMany(Thread::class, 'creator', 'id');
    }
    
    public function posts() {
        return $this->hasMany(Post::class, 'creator', 'id');
    }
    
    public function messagesFrom() {
        return $this->hasMany(Message::class, 'from', 'id');
    }
    
    public function messagesTo() {
        return $this->hasMany(Message::class, 'to', 'id');
    }
    
    public function bans() {
        return $this->hasMany(SubforumBan::class, 'banned_user', 'id');
    }
    
    public function bannedUsers() {
        return $this->hasMany(SubforumBan::class, 'moderator', 'id');
    }
    
    public static function isBanned(User $user, Subforum $subforum) {
        $bans = SubforumBan::where('banned_user', $user->id)
            ->where('subforum', $subforum->id)
            ->whereRaw('DATE_ADD(subforum_bans.created_at, '
                        .'INTERVAL subforum_bans.days DAY) >= "'.Carbon::now().'"')
            ->get();
        
        return !$bans->isEmpty();
    }
}
