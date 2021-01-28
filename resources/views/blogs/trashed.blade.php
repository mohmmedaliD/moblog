@extends('layouts.app')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session()->has('success'))
              <div class="alert alert-success">
                {{ session()->get('success') }}
              </div>
            @endif
        </div>
        <div class="col-12 row" style="padding-bottom: 10px">
          <div class="col-12 col-md-4">
            <div style="margin-top: 10px;" class="h4 text-danger">Delted</div>
          </div>
          <div class="col-12 col-md-8" style="padding: 0">
            <a href="{{ route('blogs.create') }}" class="btn btn-success float-right" >Add blog</a>
          </div>
        </div>
        @foreach ($blogs as $blog)
        <div class="col-12"  style="margin-top: 10px;">
            <div class="card" style="position: relative;">
                <div class="card-body">
                    <img class="imgResponsive" style="max-height: 100px" src="@if (str_starts_with($blog->img, 'images')) {{ asset('storage/' . $blog->img) }} @else {{ $blog->img }} @endif" alt="Card image cap">
                    <h5 class="card-title"><a href="{{ route('blogs.show', $blog->id ) }}">{{ $blog->title }}</a></h5>
                    <p class="card-text" style="margin-bottom: 15px;">
                    {{ $blog->desc }}
                    <br/>
                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                    @csrf
                    @Method("DELETE")
                    <button class="btn btn-danger" type="submit">delete</button>
                    </form>
                    <form action="/admin/blogs/trashed/{{ $blog->id }}" method="POST">
                    @csrf
                    @Method("POST")
                    <button class="btn btn-primary" type="submit">restore</button>
                    </form>
                    </p>
                    <p style="position: absolute;bottom: 0px"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
