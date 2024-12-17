<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\genres;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function index()
    {
        $genres = genres::all();
        return response()->json([
            'message' => 'tampil data berhasil',
            'data' => $genres
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
        ]);
      genres::create([
            'name' => $request->input('name'),
        ]);
        return response()->json(['message' => 'Tambah Genre berhasil'], 201);

    }

    public function show($id)

    {
        $genre = genres::findOrFail($id);
        
        return response()->json([
            'message' => 'Detail Data Genre',
            'data' => $genre
        ]);
    }

    public function update(Request $request, $id)
    {
        $genre = genres::find($id);
        $request->validate([
            'name' => 'required|string',
        ]);
        $genre->update($request->all());
        return response()->json(['message' => 'Update Genre telah berhasil']);
    }

    public function destroy($id)
    {
        $genre = genres::find($id);
        $genre->delete();
        return response()->json(['message' => 'berhasil Menghapus Genre']);
    }
}
