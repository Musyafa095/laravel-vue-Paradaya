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
    protected $keyType =  'string';
    public $incrementing =  false;

   


    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
