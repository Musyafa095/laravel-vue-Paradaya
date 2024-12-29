<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;


class movies extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'movies';
    protected $fillable = ['title', 'summary', 'poster' , 'genre_id', 'year'];

   public function genre()
    {
        return $this->belongsTo(genres::class, 'genre_id');
    }
    public function reviews()
    {
        return $this->hasMany(reviews::class, 'movie_id');
    }
    public function castMovies()
    {
        return $this->hasMany(castMovies::class, 'movie_id');
    }
   
}