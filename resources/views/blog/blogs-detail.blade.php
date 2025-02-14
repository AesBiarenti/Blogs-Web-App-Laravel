@extends('index')
@section('content')
<h1>Blog Detay Sayfası</h1>
<p><strong>ID:</strong> {{ $blog->id }}</p>
<p><strong>Başlık:</strong> {{ $blog->title }}</p>
<p><strong>İçerik:</strong> {{ $blog->content }}</p>
@endsection