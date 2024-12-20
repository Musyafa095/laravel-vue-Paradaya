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

}