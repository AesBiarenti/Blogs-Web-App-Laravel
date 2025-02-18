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

        .comment-box {
            margin-top: 20px;
            padding: 15px;
            background: white;
            border-radius: 8px;
        }

        .comment-user {
            font-weight: bold;
        }

        .like-count {
            color: red;
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
            <input type="text" name="content" placeholder="Yorum ekle">
            <h2>Yorumlar</h2>

            <div class="commentContent">
                @foreach ($blogDetail->comments as $comment)
                    <div class="comment-box">
                        <p class="comment-user">{{ $comment->user->name }}:</p>
                        <p>{{ $comment->content }}</p>
                        <p class="like-count">❤️ {{ $comment->likes->count() }} Beğeni</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
