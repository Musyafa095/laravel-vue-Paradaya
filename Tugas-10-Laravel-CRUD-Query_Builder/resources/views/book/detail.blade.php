@extends ('layouts.master')
@section('title')
Halaman Untuk Detail Buku
@endsection
@section('content')
<h1>{{$boook->title}}</h1>
<span class ="badge badge-success">{{$book->author}}</span>
<p>{{$book->summary}}</p>
<a href="/book" class="btn btn-secondary btn-sm">Kembali</a>

@endsection