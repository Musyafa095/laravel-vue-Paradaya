<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\roles;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:api', 'admin'])->except(['index', 'show']);
    }

public function index (){
    $roles = roles::all();
    return response()->json([
        'message' => 'data role berhasil di tampilkan',
        'data' => $roles
    ], 200);
}
public function store(Request $request){
    $request->validate(['name' => 'required|string']);
    roles::create($request->only('name'));
    
    return response()->json([
        'message' => 'tambah role berhasil'
    ], 201);
    

}
public function show ($id){
    $role = roles::find($id);
    return response()->json([
        'message' => 'detail data role', 'data' => $role
    ], 200);
} 
public function update (Request $request, $id){
    $request->validate(['name' => 'required|string']);
    $role = roles::find($id);
    $role->update($request->only('name'));
    return response()->json(['message' => 'Update Role berhasil'], 200);
}
public function destroy($id){
    $role = roles::find($id);
    $role->delete();
    return response()->json([
        'message' => 'berhasil menghapus role'
    ], 200);
}

}