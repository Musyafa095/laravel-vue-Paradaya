@extends('layouts.master')
@section('title')
Halaman Tampil Buku
@endsection
@section('content')
<a href="/book/create" class="btn btn-primary btn-sm">Tambah Judul Buku</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($books as $item)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$item->title}}</td>
      <td>{{$item->author}}</td>
      <td>
        <form action="/book/{{$item->id}}" method="POST">
          @csrf
           @method("DELETE")
        <a href="/book/{{$item->id}}" class="btn btn-info btn-sm">List</a>
        <a href="/book/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
        <button type="submit" class="btn btn-danger btn-sm">Delete</button">
        </form>
      </td>
    </tr>
    @empty
        <p>No users</p>
    @endforelse
    
  </tbody>
</table>

@endsection