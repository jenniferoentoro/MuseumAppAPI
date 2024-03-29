<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Museum extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function comments() {
        return $this->hasMany(Comment::class, 'museumId', 'id');
    }

    public function favorites() {
        return $this->hasMany(Favorite::class, 'museumId', 'id');
    }
}