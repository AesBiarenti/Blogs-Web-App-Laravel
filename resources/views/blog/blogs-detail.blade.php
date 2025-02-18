@extends('index')
@section('content')
    <style>
        .main {
            display: flex;
            flex-direction: column;
        }

        .comment {
            flex: 2;
            margin: 50px 0;
            padding: 50px;
            background-color: darkseagreen;
            height: 100%;
        }

        input {
            padding: 10px;
            width: 500px;
        }
    </style>
    <div class="main">
        <div class="header">
            <h1>Blog Detay Sayfası</h1>
            <p><strong>ID:</strong> {{ $blogDetail->id }}</p>
            <p><strong>Başlık:</strong> {{ $blogDetail->title }}</p>
            <p><strong>İçerik:</strong> {{ $blogDetail->content }}</p>
        </div>
        <div class="comment">
            <input type="text" name="content" placeholder="yorum ekle">
            <h2>Comments</h2>
            <div class="commentContent">
           
            </div>
        </div>
    </div>
@endsection