@extends('layouts.app2')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
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
                            <h3 class="card-title">Add User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" enctype="multipart/form-data" action="{{ route('admin-users.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="name" placeholder="Enter Name" required autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" placeholder="Email Address" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('email') }}" id="email" placeholder="Password" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-xl-4">
                                    <label for="photo_id">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="photo_id">
                                            <label class="custom-file-label" for="photo_id">Choose file</label>
                                        </div>
{{--                                        <div class="input-group-append">--}}
{{--                                            <span class="input-group-text" id="">Upload</span>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>

                                <div class="form-group col-xl-4">
                                    <label>Select Role</label>
                                        <select class="form-control" id="role_id" name="role_id" required>
                                            @foreach($roles as $role)
                                                <option id="role_id" value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group col-xl-4">
                                    <label>Active/Inactive</label>
                                    <select class="form-control" id="is_active" name="is_active" required>
                                        <option id="is_active" value="1">Active</option>
                                        <option id="is_active" value="0">Inactive</option>
                                    </select>
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
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection