@extends('layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Posts</h1>
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

    <div class="row mb-2 ml-3">
        <a href=" {{ route('admin-posts.create') }}"><button type="button" class="btn btn-default">Create Post</button></a>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Post Table</h3>

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
                                    <th>Post Image</th>
                                    <th>Post Category</th>
                                    <th>Post Author</th>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
{{--                                    <th>Approved/Unapproved</th>--}}
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>
                                <tbody>
                                @if($posts)
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td><img height="50" src="{{ $post->photo ? $post->photo->file : "https://via.placeholder.com/150" }}"></td>
                                            <td>{{$post->category->name}}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->body }}</td>
                                            <td>{{ $post->created_at->diffForHumans() }}</td>
                                            <td>{{ $post->updated_at->diffForHumans() }}</td>
{{--                                            <td>--}}
{{--                                                @if($user->is_approved == 0)--}}
{{--                                                    <span class="fa fa-cross">Unapproved</span>--}}
{{--                                                @else--}}
{{--                                                    <span class="fa fa-fire">Approved</span>--}}
{{--                                                @endif--}}
{{--                                            </td>--}}
                                            <td><a href="{{ Route('admin-posts.edit',$post->id) }}">Edit</a></td>
                                            <td>
                                                <form method="post" action="{{ route ('admin-posts.destroy', $post->id) }}" enctype="multipart/form-data">
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


@endsection