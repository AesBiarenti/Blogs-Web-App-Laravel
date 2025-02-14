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
        }

        html,
        body {
            height: 100%;
        }
    </style>
</head>

<body>
    <header style="height: 50px; padding: 10px 60px; display:flex;align-items: center;justify-content: space-between">
        <a href="{{route('login')}}"
            style="padding: 10px; background-color: dodgerblue; border-radius: 10px; text-decoration: none; color: white;">Blog
            Yaz</a>
            <a href="{{route('profile.main')}}"
            style="padding: 10px; background-color: lightgreen; border-radius: 10px; text-decoration: none; color: #131313;">Profile Git</a>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>