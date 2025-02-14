@extends('add-post.main')
<style>
    .form {
        display: flex;
        flex-direction: column;
        width: 500px;
        padding: 40px;
    }

    input {
        padding: 10px;
    }

    button {
        padding: 10px;
    }
</style>
@section('admincontent')
    <form action="{{route('admin-login')}}" method="post" class="form">
        @csrf
        <input type="email" name="email" placeholder="User Name">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>

        <a href="{{route('register')}}">Not register yer? Register</a>
    </form>
@endsection