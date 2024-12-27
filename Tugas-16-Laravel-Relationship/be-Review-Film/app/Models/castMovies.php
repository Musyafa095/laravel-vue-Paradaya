<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;

class castMovies extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'cast_movies';
    protected $fillable = ['name', 'cast_id', 'movie_id'];
}
