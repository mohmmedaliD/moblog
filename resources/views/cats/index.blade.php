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
                    categories
                    <span class="float-right">
                      <a href="{{ route('cats.create') }}" class="btn btn-primary">create</a>
                    </span>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                      @foreach ($cats as $cat)
                        <li class="list-group-item">
                            <a href="{{ route('cats.show', $cat->id) }}">{{ $cat->name }}</a>
                            <span class="float-right">
                                <a href="{{ route('cats.edit', $cat->id) }}" class="pr-sm" style="color: #4343e6"><i class="fas fa-pen" ></i></a>
                                <span class="inlineAll">
                                    <form action="{{ route('cats.destroy', $cat->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-small pr-sm" style="color: red;padding: 0"><i class="fas fa-trash-alt" ></i></button>
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
