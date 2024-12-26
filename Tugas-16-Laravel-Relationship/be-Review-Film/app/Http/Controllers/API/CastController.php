<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\casts;
class CastController extends Controller
{
      
    public function index()
        {
            $casts = casts::all();

            return response()->json([
                'message' => 'Berhasil menampilkan data Cast',
                'data' => $casts
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
    

        public function show($id)
        {
            $cast = casts::find($id);
            return response()->json([
                'message' => 'Detail untuk data Cast',
                'data' => $cast
            ]);
        }
    
        public function update(Request $request, $id)
        {
            $cast = casts::find($id);
            $request->validate([
                'name' => 'required|string',
                'bio' => 'required|string',
                'age'=> 'required|integer'
            ]);
    
    
            $cast->update($request->all());
    
            return response()->json([
                'message' => 'Update data cast berhasil',
                'data' => $cast
            ]);
        }
    
        public function destroy($id)
        {
            $cast = casts::find($id);
    
            $cast->delete();
    
            return response()->json([
                'message' => 'berhasil Menghapus data Cast'
            ]);
        }
    
}
