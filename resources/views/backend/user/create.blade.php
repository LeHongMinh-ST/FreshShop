@extends('backend.layout.master')

@section('title')
    Create User
@endsection
@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tạo mới nhân viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tạo mới nhân viên</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
    <!-- Main row -->
    <section class="content">
        <div class="row">
            <div class="col-md">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>
                    </div>
                    <form action="{{route('User.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" id="inputName" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Email</label>
                                <input type="email" id="inputName" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Password</label>
                                <input type="Password" id="inputName" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Password</label>
                                <input type="Password" id="inputName" class="form-control" name="password_confirmation">
                            </div>

                            <div class="form-group">
                                <label for="inputName">phone</label>
                                <input type="text" id="inputName" class="form-control" name="Phone">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Chức vụ</label>
                                <select class="form-control custom-select" name="role">
                                    <option selected disabled>Select one</option>
                                    <option value="1">Quản trị viên</option>
                                    <option value="2">Nhân viên bán hàng</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-sucess">Tạo mới</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
@endsection

