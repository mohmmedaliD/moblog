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
                    <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($tag))
                        @Method("PUT")
                        @endif
                        <div class="form-group">
                            <label for="name">Tag name</label>
                            <input type="text" value="{{ isset($tag) ? $tag->name : '' }}" name="name"
                                class="@error('name') is-invalid @enderror form-control" placeholder="Add tag name" />
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