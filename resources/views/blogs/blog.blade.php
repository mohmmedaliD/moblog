@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{ $blog->title }}
        {{ $blog->content }}
        <br/>
        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
         @csrf
         @Method("DELETE")
        <button class="btn btn-danger" type="submit">delete</button>
        </form>
        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary" style="margin: 0 5px">edit</a>
    </div>
</div>
@endsection
