@extends('add-post.main')
@section('admincontent')
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
    <form action="{{route('admin-register')}}" method="post" class="form">
    @csrf
        <input type="text" name="name" placeholder="User Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Register</button>
    </form>
@endsection