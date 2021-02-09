<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'creator',
        'title',
        'content',
        'thread'
    ];
    
    public function user() {
        return $this->belongsTo(User::class, 'creator', 'id');
    }
    
    public function thread() {
        return $this->belongsTo(Thread::class, 'thread', 'id');
    }
}
