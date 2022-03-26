@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Starter Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
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
                  <h3 class="card-title">Post List</h3>
                  <a href="{{ route('post.create') }}" class="btn btn-primary">Create Post</a>
                </div>
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($post_data as $post)
                        <tr>
                          <td>
                            <div style="max-width: 70px; max-height:70px; overflow: hidden;">
                              <img src="{{ asset($post->image) }}" alt="">
                            </div>
                          </td>
                          <td>{{ $post->title }}</td>
                          <td>{{ $post->category_id }}</td>
                          <td>{{ $post->author }}</td>
                          <td class="d-flex">
                            <a href="{{ route('category.edit',[$post->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('category.destroy',[$post->id]) }}" class="mr-1" method="POST">
                              @csrf
                              @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash"></i></button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                     
                    </tbody>
                  </table>
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
