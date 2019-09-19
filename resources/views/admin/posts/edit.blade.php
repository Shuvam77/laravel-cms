@extends('layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Post</h1>
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
                <div class="col-md-10 align-content-center">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="row">
                            <div class="col-md-3 pt-5 pl-3">
                                <img height="200" class="img-rounded img-thumbnail" src="{{$post->photo->file}}" alt="postImage">
                            </div>
                            <div class="col-md-8">
                                <form role="form" method="post" enctype="multipart/form-data" action="{{ route('admin-posts.update', $post->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{$post->title}}" name="title" id="title" placeholder="Enter Title" required autofocus>
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="body">Post Content</label>
                                            <textarea class="textarea form-control @error('body') is-invalid @enderror" name="body" id="body" placeholder="Post Content" required
                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $post->body }}</textarea>
                                            @error('body')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-xl-4">
                                            <label for="photo_id">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="photo_id" id="photo_id">
                                                    <label class="custom-file-label" for="photo_id">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-xl-4">
                                            <label>Select Category</label>
                                            <select class="form-control" id="category_id" name="category_id" required>
                                                <option id="category_id" value="{{$post->category_id}}" selected disabled> {{ $post->category->name }}</option>
                                                @foreach($categories as $category)
                                                    <option id="category_id" value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{--                                <div class="form-group col-xl-4">--}}
                                        {{--                                    <label>Active/Inactive</label>--}}
                                        {{--                                    <select class="form-control" id="is_active" name="is_active" required>--}}
                                        {{--                                        <option id="is_active" value="1">Active</option>--}}
                                        {{--                                        <option id="is_active" value="0">Inactive</option>--}}
                                        {{--                                    </select>--}}
                                        {{--                                </div>--}}
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @include('includes.form_error')
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection