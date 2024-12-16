<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookController extends Controller
{
   public function create()
   {
    return view('book.tambah');
   }
    public function store (Request $request )
    {
         $request-> validate([
        'title' => 'required|min:5',
        'summary' => 'required',
        'author' => 'required'
        ]);
         $year = Carbon::now()->year;
         $now = Carbon::now();

     DB::table('books')->insert([
        'title'=> $request->input('title'),
        'summary'=> $request->input('summary'),
        'author'=> $request->input('author'),
        'releas_year'=> $year,
        'created_at' => $now,
        'updated_at' => $now
     ]);
        return redirect('/book');
                    
    }
    public function index ()
    {
        $books = DB::table('books')->get();
       return view('book.tampil', ['books' => $books]);
    }
    public function show($id)
    {
        $book =DB::table('books')->find($id);
        return view ('book.detail', ['book'=>$book]);
    }
    public function edit($id)
    {
        $book = DB::table('books')->find($id);
        return view ('book.edit', ['book'=>$book]);
    }
    public function update($id, Request $request)
    {
       
            $request-> validate([
           'title' => 'required|min:5',
           'summary' => 'required',
           'author' => 'required'
           ]);
           $year = Carbon::now()->year;
           $now = Carbon::now();

           DB::table('books')
           ->where('id', $id)
           ->update(
            [
                'title'=> $request->input('title'),
                'summary'=> $request->input('summary'),
                'author'=> $request->input('author'),
                'releas_year'=> $year,
                'updated_at' => $now
            ]
            );
            return redirect('/book');

    }
    public function destroy($id)
    {
    DB::table('books')->where('id', $id)->delete();

    return redirect('/book');
    }
}
?>