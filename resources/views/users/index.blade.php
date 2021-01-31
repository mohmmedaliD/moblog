@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      @if (session()->has('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
      @endif
      <div class="card">
        <div class="card-body">
          <ul class="list-group">
            @foreach ($users as $user)
            <li class="list-group-item">
              <a href="{{ route('user', $user->id) }}">{{  $user->name }}</a>
              <span class="ml-2 badge badge-primary">
                {{ $user->blogs->count() }}
              </span>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection