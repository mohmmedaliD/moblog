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
        <div class="card-header">
          tags
          <span class="float-right">
            <a href="{{ route('tags.create') }}" class="btn btn-primary">create</a>
          </span>
        </div>

        <div class="card-body">
          <ul class="list-group">
            @foreach ($tags as $tag)
            <li class="list-group-item">
              <a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a>
              <span class="ml-2 badge badge-primary">
                {{ $tag->blogs->count() }}
              </span>
              <span class="float-right">
                <a href="{{ route('tags.edit', $tag->id) }}" class="pr-sm" style="color: #4343e6"><i
                    class="fas fa-pen"></i></a>
                <span class="inlineAll">
                  <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-small pr-sm" style="color: red;padding: 0"><i
                        class="fas fa-trash-alt"></i></button>
                  </form>
                </span>
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