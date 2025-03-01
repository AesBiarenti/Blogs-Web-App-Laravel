@extends('index')

@section('content')
    <style>
        .main {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .header {
            flex: 1;
        }

        .comment {
            flex: 2;
            background-color: darkseagreen;
        }

        form {
            display: flex;
            flex-direction: row;
        }

        textarea {
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
        @session('success')
            <p>{{session('success')}}</p>
        @endsession
        <div class="header">
            <h1>Blog Detay Sayfası</h1>
            <p><strong>ID:</strong> {{ $blogDetail->id }}</p>
            <p><strong>Başlık:</strong> {{ $blogDetail->title }}</p>
            <p><strong>İçerik:</strong> {{ $blogDetail->content }}</p>
            <form action="{{ route('getLike') }}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $blogDetail->id }}">

                <button type="submit" class="like-count">
                    @if($userLiked)
                        💔 Beğeniyi Geri Çek
                    @else
                        ❤️ Beğen
                    @endif
                    {{ $blogDetail->likes->count() }} Beğeni
                </button>
            </form>
        </div>

        <div class="comment">
            <form action="{{route('addcomment')}}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $blogDetail->id }}">
                <textarea name="content" placeholder="Fikrini Yaz"></textarea>
                <button type="submit">Yorum Ekle</button>
            </form>
            <h2>Yorumlar</h2>

            <div class="commentContent">
                @foreach ($blogDetail->comments as $blogsComment)
                    <div class="comment-box">
                        <p class="comment-user">{{ $blogsComment->user->name }}:</p>
                        <p>{{ $blogsComment->content }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection