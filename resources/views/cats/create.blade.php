@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span>
                        <a href="{{ url()->previous() }}">
                            <i class="fas fa-arrow-left"></i>
                            back
                        </a>
                    </span>
                    <span style="font-size:18px;color: #333;font-weight:bold">{{ $pName }}</span>
                </div>

                <div class="card-body">
                    <form action="{{ isset($cat) ? route('cats.update', $cat->id) : route('cats.store') }}" method="POST">
                        @csrf
                        @if (isset($cat))
                            @Method("PUT")
                        @endif
                        <div class="form-group">
                          <label for="name">Category name</label>
                          <input type="text" value="{{ isset($cat) ? $cat->name : '' }}" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="Add category name" />
                          @error('name')
                            <div class="alert alert-danger">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right">
                                <!-- <i class="fas fa-arrow-left"></i> -->
                                save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
