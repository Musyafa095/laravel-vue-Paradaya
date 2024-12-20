<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\movies;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class MovieController extends Controller
{
   public function index ()
{
    $movies = movies::all();
    return response()->json([
        'message' => 'menampilkan data film berhasil',
        'data' => $movies
    ]);
}

public function store(Request $request)
{
    $request->validate([    
        'poster' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        'title' => 'required',
        'summary' => 'required',
        'year' => 'required',
        'genre_id' => 'required|exists:genres,id',
    ]);
   
    $uploadedFileUrl = cloudinary()->upload($request->file('poster')->getRealPath(), [
        'folder' => 'poster',
    ])->getSecurePath();
         $movie = new movies;
        $movie->title = $request->input('title');
        $movie -> summary = $request->input('summary');
        $movie -> year = $request->input('year');
        $movie -> genre_id = $request->input('genre_id');
        $movie -> poster = $uploadedFileUrl;

        $movie->save();
        return response()->json([
            'message' => 'menambahkan film berhasil',
        ], 200);
       
}

public function show($id)

{
   
    $movie = movies::find($id);
    if (!$movie) {
        return response()->json([
            'message' => 'Data film tidak ditemukan',
        ], 404);
    }
    return response()->json([
        'message' => 'Detail untuk data Film ditampilkan',
        'data' => $movie
    ], 200);
}
public function update(Request $request, $id)
{
    $request->validate([
       'poster' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        'title' => 'required',
        'summary' => 'required',
        'year' => 'required',
        'genre_id' => 'required|exists:genres,id',
    ], [
        'poster.required' => 'Poster wajib diisi',
        'title.required' => 'Judul wajib diisi',
        'summary.required' => 'Ringkasan wajib diisi',
        'year.required' => 'Tahun wajib diisi',
        'genre_id.required' => 'Genre wajib diisi',
        'genre_id.exists' => 'Genre tidak ditemukan',
    ]);
    
    $movie = movies::find($id);
    if ($request->hasFile('poster')) {
        $uploadedFileUrl = cloudinary()->upload($request->file('poster')->getRealPath(), [
            'folder' => 'poster',
        ])->getSecurePath();
        $movie -> poster = $uploadedFileUrl;
    }
   
       
        
    if (!$movie) {
        return response()->json([
            'message' => 'Film tidak ditemukan',
        ], 404);
    }
        $movie->title = $request->input('title');
        $movie -> summary = $request->input('summary');
        $movie -> year = $request->input('year');
        $movie -> genre_id = $request->input('genre_id');
  
        $movie->save();
        return response()->json([
            'message' => 'mengubah data film berhasil',
        ], 200);
}
public function destroy($id)
{
    movies::destroy($id);
    $movie= movies::findOrFail($id);
    $movie ->delete();
    return response()->json(['message' => 'berhasil Menghapus data film']);

}



}