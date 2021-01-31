@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <span style="font-size: 23px;color: 333">{{ $user->name }}</span>
                    {{-- <span class="float-right">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">edit</a>
                    </span> --}}
                </div>
            </div>
        </div>
        @foreach ($user->blogs as $blog)
        <div class="col-12" style="margin-top: 10px;">
            <div class="card" style="position: relative;">
                <div class="card-body">
                    <img class="imgResponsive" style="max-height: 100px" src="@if (str_starts_with($blog->img, 'images')) {{ asset('storage/' . $blog->img) }} @else
        {{ $blog->img }} @endif" alt="Card image cap">
                    <h5 class="card-title"><a href="{{ route('blogs.show', $blog->id ) }}">{{ $blog->title }}</a></h5>
                    <p class="card-text" style="margin-bottom: 15px;">
                        {{ $blog->desc }}
                    </p>
                    <p style="position: absolute;bottom: 0px"><small class="text-muted">Last updated 3 mins ago</small>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection