<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subforum extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['name', 'description', 'min_role'];
    
    public function rol() {
        return $this->belongsTo(Role::class, 'min_role', 'id');
    }
    
    public function hilos() {
        return $this->hasMany(Thread::class, 'subforum', 'id');
    }
    
    public function bannedUsers() {
        return $this->hasMany(SubforumBan::class, 'subforum', 'id');
    }
}
