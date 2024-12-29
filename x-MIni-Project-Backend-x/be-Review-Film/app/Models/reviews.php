<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;

class reviews extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'reviews';
    protected $fillable = ['critic', 'rating', 'user_id', 'movie_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function movie()
    {
        return $this->belongsTo(movies::class, 'movie_id');
    }
}

    