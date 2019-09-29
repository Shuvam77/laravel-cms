@extends('layouts.app2')
@section('content')

    @include('admin/categories/edit')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active">Main Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('admin-categories.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-md-8">

                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">

                            <!-- /.row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Categories Table</h3>

                                            <div class="card-tools">
                                                <div class="input-group input-group-sm" style="width: 150px;">
                                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Category Name</th>
                                                    <th>Created Date</th>
                                                    <th>Updated Date</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if($categories)
                                                    @foreach($categories as $category)
                                                        <tr>
                                                            <td>{{ $category->id }}</td>
                                                            <td>{{ $category->name }}</td>
                                                            <td>{{ $category->created_at->diffForHumans() }}</td>
                                                            <td>{{ $category->updated_at->diffForHumans() }}</td>
                                                            <td><a href="{{ Route('admin-categories.edit',$category->id) }}" data-id="{{$category->id}}" data-name="{{$category->name}}" data-toggle="modal" data-target="#category-edit">Edit</a></td>
                                                            <td>
                                                                <form method="post" action="{{ route ('admin-categories.destroy', $category->id) }}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button type="submit" class="btn btn-danger fa-pull-right">Delete</button>
                                                                </form>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                            <!-- /.row -->

                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->

                </div>
            </div>
        </div>
    </section>

@endsection