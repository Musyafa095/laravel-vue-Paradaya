@extends('layouts.master')
@section('title')
Halaman Untuk Tambah Buku
@endsection
@section('content')
    <form action="/book" method="POST">
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
        <input type="text" value="{{old('title')}}" class="form-control" id="title" name="title">
      </div>
      <div class="form-group">
        <label for="summary">Isi buku tersebut</label>
        <textarea name="summary" id="content" class="form-control" cols="30" rows="10">{{old('summary')}}</textarea>
      </div>
      <div class="form-group">
        <label for="author">Penulis buku</label>
        <input type="text" name="author" value="{{old('author')}}" id="created_by" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection