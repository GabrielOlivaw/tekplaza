<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubforumBan extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['banned_user', 'moderator', 'subforum', 
        'days', 'motive'];
    
    public function user() {
        return $this->belongsTo(User::class, 'banned_user', 'id');
    }
    
    public function moderator() {
        return $this->belongsTo(User::class, 'moderator', 'id');
    }
    
    public function subforum() {
        return $this->belongsTo(Subforum::class, 'subforum', 'id');
    }
}
