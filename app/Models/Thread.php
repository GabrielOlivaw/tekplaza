<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'creator', 
        'title', 
        'locked', 
        'pinned', 
        'subforum'
    ];
    
    public function user() {
        $this->belongsTo(User::class, 'creator', 'id');
    }
    
    public function subforo() {
        $this->belongsTo(Subforum::class, 'subforum', 'id');
    }
    
    public function posts() {
        $this->hasMany(Post::class, 'thread', 'id');
    }
}
