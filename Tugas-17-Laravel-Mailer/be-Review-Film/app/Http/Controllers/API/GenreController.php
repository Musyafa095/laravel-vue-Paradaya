<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\genres;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'admin'])->except(['index', 'show']);
    }
   public function index()
    {
        $genres = genres::all();
        return response()->json([
            'message' => 'menampilkan data berhasil ',
            'data' => $genres
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
             'name' => 'required|min:2',
        ],[
            'name.required' => 'kolom name harus diisi',
            'name.min' => 'kolom name minimal 2 karakter'
        ]);
      genres::create([
             'name' => $request->input('name'),
        ]);
        return response()->json(['message' => 'menambahkan Genre berhasil'], 200);

    }

    public function show($id)

    {
       
        $genre = genres::with('movies')->find($id);
        
        return response()->json([
            'message' => 'Detail untuk data Genre',
            'data' => $genre
        ]);
    }

    public function update(Request $request, $id)
    {
        $genre = genres::find($id);
        $request->validate([
            'name' => 'required|string',
        ]);
            if(!$genre) {
                return response ()-> json([
                      'message' => 'data cast tidak di temukan',
                ], 404);

            }
        
        $genre->update($request->all());
        return response()->json([
            'message' => 'Update data genre telah berhasil',
            'data' => $genre
        ]);
    }

    public function destroy($id)
    {
        $genre = genres::find($id);
        $genre -> delete();
       return response()->json([
        'message ' => 'berhasil Menghapus data Genre'
       ]);
       
    }
}
