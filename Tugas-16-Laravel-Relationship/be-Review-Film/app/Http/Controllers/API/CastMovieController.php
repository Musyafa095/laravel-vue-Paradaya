<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\castMovies;

class CastMovieController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'admin'])->except(['index', 'show']);
    }

    public function index()
        {
            $castMovies = castMovies::all();

            return response()->json([
                'message' => 'Berhasil menampilkan data Cast',
                'data' => $castMovies
            ]);
        }
    
        public function store(Request $request)
        {
        
          $request->validate([
               'name' => 'required|string|min:2',
               'cast_id' => 'required|exists:casts,id',
                'movie_id' => 'required|exists:movies,id'
           ], [
                'required' => 'inputan :attribute wajib diisi',
                'string' => 'inputan :attribute harus berupa string',
                'min' => 'inputan :attribute harus diisi minimal :min karakter',
                'exists' => 'inputan :attribute tidak ditemukan'
           ]);
           $castMovie = new castMovies;
           $castMovie->name = $request->input('name');
           $castMovie->cast_id = $request->input('cast_id');
           $castMovie->movie_id = $request->input('movie_id');
           $castMovie->save();
            return response()->json([
            'message' => 'menambahkan Cast berhasil',
            ], 201);
        }
    public function show ($id){
        $castMovie = castMovies::with('movies', 'casts')->find($id);
        if (!$castMovie){
            return response()->json([
                'message' => 'castMovie tidak di temukan'
            ]);
        }
        return response()->json([
            'message' => 'Berhasil menampilkan data CastMovie',
            'data' => $castMovie
        ]);
    }
    public function update (Request $request, $id){
       $request->validate([
        'name' => 'required|string|min:2',
        'cast_id' => 'required|exists:casts,id',
        'movie_id' => 'required|exists:movies,id'
       ]);
       $castMovie = castMovies::find($id);
       if (!$castMovie){
        return response()->json([
            'message' => 'CastMovie tidak ditemukan',   
        ], 404);
       }
       $castMovie->name = $request->input('name');
       $castMovie->cast_id = $request->input('cast_id');
       $castMovie->movie_id = $request->input('movie_id');
       $castMovie->save();
       return response()->json([
        'message' => 'Berhasil update data castMovie',
       ], 200);

    }
    public function destroy($id){
        $castMovie = castMovies::find($id);
        $castMovie->delete();
        return response()->json([
            'message' => 'Berhasil menghapus data CastMovie'
        ]);

    }
}
