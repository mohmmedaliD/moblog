@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 row" style="padding-bottom: 10px">
          <div class="col-12 col-md-4">
            <div style="margin-top: 10px;" class="h4">my blogs</div>
          </div>
          <div class="col-12 col-md-8" style="padding: 0">
            <a href="{{ route('blogs.create') }}" class="btn btn-success float-right" >Add blog</a>
          </div>
        </div>
        <?php $blogs = [1, 2, 3] ?>
        @foreach ($blogs as $blog)
        <div class="col-12"  style="margin-top: 10px;">
            <div class="card" style="position: relative;">
                <div class="card-body">
                    <img class="imgResponsive" style="max-height: 200px" src="http://commondatastorage.googleapis.com/codeskulptor-assets/lathrop/nebula_blue.s2014.png" alt="Card image cap">
                    <h5 class="card-title"><a href="#">Card title  {{ $blog }}</a></h5>
                    <p class="card-text" style="margin-bottom: 15px;">
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                    </p>
                    <p style="position: absolute;bottom: 0px"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
