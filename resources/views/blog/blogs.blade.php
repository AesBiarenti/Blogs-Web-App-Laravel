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

            h1 {
                padding-top: 30px;
                text-align: center;
            }

            h3 {
                padding: 30px 0px;
                min-height: 65%;
            }

            a {
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

            .profile {
                border-radius: 100px;
                width: 52px;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .bottom {
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                align-items: center;
            }
        }
    </style>
      @if(Auth::check())
      <p>Giriş yapılmış. Kullanıcı ID: {{ Auth::id() }}</p>
  @else
      <p>Giriş yapılmamış.</p>
  @endif
      <header style="height: 50px; padding: 10px 60px; display:flex;align-items: center;justify-content: space-between">
          <a href="{{route('goAddPost')}}"
              style="padding: 10px; background-color: dodgerblue; border-radius: 10px; text-decoration: none; color: white;">Blog
              Yaz</a>
          <a href="{{Auth::check() ? route('goProfilePage',Auth::id()) : route('goLogin')}}"
              style="padding: 10px; background-color: lightgreen; border-radius: 10px; text-decoration: none; color: #131313;">
              Profile Git
          </a>
      </header>
    <div class="blogs">
        @foreach (App\Models\Post::all() as $blog)
            <div class="blog">
                <h1>{{$blog->title}}</h1>

                <h3>{{$blog->content}} </h3>

                <div class="bottom">
                    <a href="{{route('goProfileDetailPage',$blog->user->id)}}" class="profile">{{$blog->user->name[0] ?? '?'}}</a>
                    <a href="{{route('goBlogDetail',$blog->id)}}">Read More</a>
                    <div class="likecomment">
                        <p>22 Comments</p>
                        <p>18 Likes</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection