@extends('add-blog.main')
@section('admincontent')
    <style>
        .form {
            margin: 20px;
            display: flex;
            flex-direction: column;
            width: 25vw;
        }

        textarea {
            margin: 20px 0;
            padding: 10px;
            height: 300px;
        }

        input {
            padding: 10px;
        }

        button {
            padding: 10px;
            margin: 10px 0;
        }
        select{
            padding: 10px;
        }
    </style>
    <form action="{{route('addblog',Auth::id())}}" method="POST" class="form">
        @csrf
        <input type="text" name="title" placeholder="Blog Title">
        <textarea name="content" id="" placeholder="Blog Content"></textarea>
        <select name="category_id" required>
            @foreach (App\Models\Category::all() as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <button type="submit">Kaydet</button>
    </form>
@endsection