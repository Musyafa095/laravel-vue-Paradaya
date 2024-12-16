@extends('layouts.master')
@section('title')
Halaman  Detail Buku
@endsection
@section('content')
<h1>{{$book->title}}</h1>
<span class="badge badge-success">{{$book->author}}</span>
<p>{{$book->summary}}</p>
<a href="/book" class="btn btn-secondary btn-bg">kembali</a>


@endsection