<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\reviews;
use App\Models\movies;

class ReviewController extends Controller
{
    public function storeupdate (Request $request) {
        
        $request->validate([
            'critic' => 'required',
            'rating' => 'required|integer'
        ], [
            'required' => 'inputan :attribute wajib diisi',
            'integer' => 'inputan :attribute harus berupa angka'
        ]);
        $user = auth()->user();
        $movie = movies::find($request->input('movie_id'));
        if (!$movie) {
            return response()->json([
                'message' => 'movie not found'
            ], 404);
        }
        $review = reviews::updateOrCreate(
            ['user_id' => $user->id, 'movie_id' => $movie -> id]
            ,[
                'critic' => $request->input('critic'),
                'rating' => $request->input('rating')
            ]);
            return response()->json([
                'message' => 'review berhasil dibuat/diupdate',
                'data' => $review,
            ], 201);
            
}


}