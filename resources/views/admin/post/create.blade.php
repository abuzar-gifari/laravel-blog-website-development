@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Create Post</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('website') }}">Website</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('post.index') }}">Post List</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="card card-primary">
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @include('includes.errors')
                      <div class="card-body">
                        <div class="form-group">
                          <label for="title">Post title</label>
                          <input type="text" class="form-control" id="title" name="title" placeholder="Enter Post title">
                        </div>
                        <div class="form-group">
                          <label for="title">Select Category</label>
                          <select name="category" id="category">
                            <option value="" style="display: none;" selected>Select Category</option>
                            @foreach ($categories as $cat)
                              <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach  
                          </select>  
                        </div>
                        <label for="description">Post Description</label>
                        <div class="form-group">
                          <textarea name="description" id="description" cols="60" rows="5" placeholder="Enter Post description"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="image">Post Image</label>
                          <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="form-group">
                          <label for="title">Related Tags</label>
                          @foreach ($tag as $tag)
                            <div class="form-check">
                              <input class="form-check-input" name="tags[]" type="checkbox" id="tag{{ $tag->id }}" value="{{ $tag->id }}">
                              <label for="tag{{ $tag->id }}" class="form-check-label">{{ $tag->name }}</label>
                            </div>
                          @endforeach
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
        
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
