@extends('index')

@section('content')
<style>
    .blogs {
        padding: 10px 50px;
        display: flex;
        flex-wrap: wrap;
    }

    .blog {
        margin: 10px;
        width: 30vw;
        height: 400px;
        border: 2px solid #131313;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        padding: 10px;
    }

    .blog h1 {
        padding-top: 30px;
        text-align: center;
    }

    .blog h3 {
        padding: 30px 0px;
        min-height: 65%;
    }

    .blog a {
        text-decoration: none;
        border: 2px solid #131313;
        text-align: center;
        width: 200px;
        align-self: center;
        color: #131313;
        transition: 200ms;
        margin-top: 10px;
        padding: 10px
    }

    .bottom {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
    }
</style>

<h1>ID : {{ $user->id }}</h1>
<h1>NAME : {{ $user->name }}</h1>
<h2 style="margin: 20px 0">MY BLOGS</h2>
<a href="{{route('logOut')}}"
style="padding: 10px;background-color: crimson; border-radius: 10px; text-decoration: none; color: white;">Çıkış yap</a>
<div class="blogs">
    @foreach($user->posts as $post)
        <div class="blog">
            <h1>{{ $post->title }}</h1>
            <h3>{{ Str::limit($post->content, 150) }}</h3> <!-- İçeriğin sadece ilk 150 karakterini göster -->
            <a href="">Detayları Gör</a>
        </div>
    @endforeach
</div>

@endsection
