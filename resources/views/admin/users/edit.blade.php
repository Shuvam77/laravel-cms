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
                            <h3 class="card-title">Edit User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form role="form"  method="post" enctype="multipart/form-data" action="{{Route ('admin-users.update',$user->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" name="name" id="name" placeholder="Enter Name" required autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" id="email" placeholder="Email Address" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" id="email" placeholder="Password" >
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label for="photo_id">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="photo_id" id="photo_id">
                                                    <label class="custom-file-label" for="photo_id">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Select Role</label>
                                            <select class="form-control" id="role_id" name="role_id" >
                                                <option id="role_id" value="{{$user->role_id}}" disabled selected> {{$user->role->name}}</option>
                                                @foreach($roles as $role)
                                                    <option id="role_id" value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Active/Inactive</label>
                                            <select class="form-control" id="is_active" name="is_active" >
                                                <option id="is_active" value="{{$user->is_active}}" selected disabled> {{$user->is_active == 0? 'Inactive' : 'Active'}}</option>
                                                <option id="is_active" value="1">Active</option>
                                                <option id="is_active" value="0">Inactive</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="mt-xl-5 ml-xl-5" for="userImage">User Image</label>
                                        <img class="img-responsive img-rounded ml-xl-5" height="150" width="150" src="{{ $user->photo ? $user->photo->file : "https://via.placeholder.com/150" }}">
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary fa-pull-right">Update</button>
                            </div>
                        </form>
                        <form method="post" action="{{ route ('admin-users.destroy', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')

                            <div class="card-footer">
                                <button type="submit" class="btn btn-danger fa-pull-right">Delete</button>
                            </div>
                        </form>
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