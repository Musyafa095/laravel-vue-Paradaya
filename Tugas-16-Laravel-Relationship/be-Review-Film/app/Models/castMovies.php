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

   public function movies()
   {
         return $this->belongsTo(movies::class, 'movie_id');
   }
   public function casts()
   {
         return $this->belongsTo(casts::class, 'cast_id');
   }
 
}
