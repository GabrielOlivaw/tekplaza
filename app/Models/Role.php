<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    
    public function users() {
        return $this->hasMany(User::class, 'id_role', 'id');
    }
    
    public function subforums() {
        return $this->hasMany(Subforum::class, 'min_role', 'id');
    }
}
