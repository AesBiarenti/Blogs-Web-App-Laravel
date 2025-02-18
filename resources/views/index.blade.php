<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
        }

        html,
        body {
            height: 100%;
        }
    </style>
</head>

<body>
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
    <main>
        @yield('content')
    </main>
</body>

</html>