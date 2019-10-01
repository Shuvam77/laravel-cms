@extends('layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Media</h1>
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

            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Media Table</h3>

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
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Created Date</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>
                                <tbody>
                                @if($photos)
                                    @foreach($photos as $photo)
                                        <tr>
                                            <td>{{ $photo->id }}</td>
                                            <td><img height="50" src="{{ $photo ? $photo->file : "https://via.placeholder.com/150" }}"></td>
                                            <td>{{ $photo->file }}</td>
                                            <td>{{ $photo->created_at->diffForHumans() }}</td>
                                            <td>
                                                <form method="post" action="{{ route ('admin-media.destroy', $photo->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger ">Delete</button>
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

@endsection
