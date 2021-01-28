@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                    <form action="{{ isset($blog) ? route('blogs.update', $blog->id) : route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($blog))
                            @Method("PUT")
                        @endif
                        
                        <!-- title -->
                        <div class="form-group">
                          <input type="text" value="{{ isset($blog) ? $blog->title : '' }}" name="title" class="@error('title') is-invalid @enderror form-control" placeholder="title" />
                          @error('title')
                            <div style="margin-top: 5px" class="alert alert-danger">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>

                        <!-- desc -->
                        <div class="form-group">
                          <textarea type="text" name="desc" class="@error('desc') is-invalid @enderror form-control" placeholder="description">{{ isset($blog) ? $blog->desc : '' }}</textarea>
                          @error('desc')
                            <div style="margin-top: 5px" class="alert alert-danger">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        
                        <!-- content -->
                        <div class="form-group">
                          <!-- <textarea type="text" name="content" class="@error('content') is-invalid @enderror form-control" placeholder="blog">{{ isset($blog) ? $blog->content : '' }}</textarea> -->
                          <div style="width: 100%">
                            <input id="x" type="hidden" value="{{ isset($blog) ? $blog->content : '' }}" name="content">
                            <trix-editor input="x"></trix-editor>
                          </div>
                          @error('content')
                            <div style="margin-top: 5px" class="alert alert-danger">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>

                        <!-- category -->
                        <div class="form-group">
                          <label for="category_id">Select a category</label>
                          <select class="custom-select" name="category_id">
                            @foreach ($cats as $cat)
                              <option value="{{ $cat->id }}" @if (isset($blog))  @if ($blog->category_id == $cat->id)  selected   @endif @endif  >{{ $cat->name }}</option>
                            @endforeach
                          </select>
                            @error('category_id')
                              <div style="margin-top: 5px" class="alert alert-danger">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>


                        <!-- image -->
                        <div class="form-group">
                         
                          <input type="file" name="img" class="" />
                          @error('img')
                            <div style="margin-top: 5px" class="alert alert-danger">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>

                        @if (isset($blog) ? $blog->img : false)
                        <div style="padding: 10px 0">
                            <img src="{{ isset($blog) ? asset('storage/' . $blog->img) : '' }}" style="width:100%" alt="img">
                            <button class="btn btn-link float-right" style="color: red">
                              <i class="fas fa-times"></i>
                            </button>
                            <div class="clearfix"></div>
                        </div>
                        @endif

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
