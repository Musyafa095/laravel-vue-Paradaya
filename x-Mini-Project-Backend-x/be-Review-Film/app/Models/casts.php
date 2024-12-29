<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;

class casts extends Model
{
    use HasFactory, HasUuids;
    protected $table =  'casts';
    protected $fillable =  ['name', 'bio', 'age'];
   


    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
          $model->id = (string) Str::uuid();
        });
    }
public function listCastMovie()
{
    return $this->belongsToMany(movies::class, 'cast_movies', 'cast_id', 'movie_id');
}
    
    
}
