@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Create Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('website') }}">Website</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('category.index') }}">Category List</a></li>
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
                  <h3 class="card-title">Update Category - {{ $category->name }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="card card-primary">
                    <form action="{{ route('category.update',[$category->id]) }}" method="POST">
                      @csrf
                      @method('PUT')
                      @include('includes.errors')
                      <div class="card-body">
                        <div class="form-group">
                          <label for="name">Category Name</label>
                          <input type="text" value="{{ $category->name }}" class="form-control" name="name" placeholder="Enter Category Name">
                        </div>
                        <div class="form-group">
                          <label for="description">Category Description</label>
                          <textarea placeholder="Enter Category Description" name="description" cols="50" rows="10">{{ $category->description }}</textarea>
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
