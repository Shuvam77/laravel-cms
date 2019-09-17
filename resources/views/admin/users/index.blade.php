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

    <div class="row mb-2 ml-3">
        <a href=" {{ route('admin-users.create') }}"><button type="button" class="btn btn-default">Create User</button></a>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Users Table</h3>

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
                                    <th>User Image</th>
                                    <th>Role</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th>Active/Inactive</th>
                                    <th>Edit</th>

                                </tr>
                                </thead>
                                <tbody>
                                @if($users)
                                    @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><img height="50" src="{{ $user->photo ? $user->photo->file : "https://via.placeholder.com/150" }}"></td>
                                    <td>{{$user->role->name}}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    <td>
                                        @if($user->is_active == 0)
                                            <span class="fa fa-cross">Inactive</span>
                                            @else
                                            <span class="fa fa-fire">Active</span>
                                        @endif

{{--                                        {{$user->is_active =0? 'inactive' : 'active'}}--}}
                                    </td>
                                    <td><a href="{{ Route('admin-users.edit',$user->id) }}">Edit</a></td>
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
