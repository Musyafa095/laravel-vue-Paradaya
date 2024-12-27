<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\castMovies;

class CastMovieController extends Controller
{
    public function __cosntruct()
    {
        $this->middleware(['auth:api', 'admin'])->except(['index', 'show']);
    }

    public function index()
        {
            $cast_movies = castMovies::all();

            return response()->json([
                'message' => 'Berhasil menampilkan data Cast',
                'data' => $cast_movies
            ]);
        }
    
        public function store(Request $request)
        {
        
          $request->validate([
               'name' => 'required|string|min:2',
               'bio' => 'required|string|min:2',
               'age' => 'required|integer|min:1',
           ]);
           
            casts::create([
                'name' => $request->input ('name'),
               'bio' => $request->input ('bio'),
               'age' => $request->input ('age'),
            ]);
            return response()->json([
                'message' => 'menambahkan Cast berhasil',
            ], 201);
        }
    
}
