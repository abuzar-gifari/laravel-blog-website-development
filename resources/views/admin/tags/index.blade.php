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
                  <h3 class="card-title">Tag List</h3>
                  <a href="{{ route('tag.create') }}" class="btn btn-primary">Create Tag</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if ($tags_data->count())
                        @foreach ($tags_data as $tag)
                        <tr>
                          <td>{{ $tag->name }}</td>
                          <td>{{ $tag->slug }}</td>
                          <td class="d-flex">
                            <a href="{{ route('tag.edit',[$tag->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('tag.destroy',[$tag->id]) }}" class="mr-1" method="POST">
                              @csrf
                              @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash"></i></button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      @else
                        <td colspan="5">No Tags Found</td>
                      @endif
                      
                     
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
        
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
