@extends('layouts.master')
@section('title')
Halaman Edit Buku
@endsection
@section('content')
    <form action="/book/{{$book->id}}" method="POST">
      @method("PUT")
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $item)
          <li> {{ $errors }} </li>
          @endforeach
        </ul>
      </div>
      @endif
      @csrf
      <div class="form-group">
        <label for="title">Judul Buku</label>
        <input type="text" value="{{old('title', $book->title)}}" class="form-control" id="title" name="title">
      </div>
      <div class="form-group">
        <label for="summary">summary Buku </label>
        <textarea name="summary" id="content" class="form-control" cols="30" rows="10">{{old('summary', $book->summary)}}</textarea>
      </div>
      <div class="form-group">
        <label for="author">Penulis</label>
        <input type="text" name="author" value="{{old('author', $book->author)}}" id="created_by" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection