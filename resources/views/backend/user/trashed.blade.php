@extends('backend.layout.master')

@section('title')
    Trashed User
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách nhân viên tạm khóa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">trashed user</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách nhân viên tạm khóa</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                           placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i>
                                        </button>
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
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Chức vụ</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        @if($user->role == 1 )
                                            <td><span class="tag tag-success">Quản trị viên</span></td>
                                        @else
                                            <td><span class="tag tag-success">Nhân viên</span></td>
                                        @endif
                                        <td class="project-actions text-right" style="display: flex; float: right">
                                            <a class="btn btn-primary btn-sm"
                                               href="{{route('User.show',$user->id)}}"
                                               style="margin-right: 5px">
                                                <i class="fas fa-folder">
                                                </i>
                                                Chi tiết
                                            </a>
                                            <form action="{{route('User.restore',$user->id)}}" method="POST"
                                                  style="margin-right: 5px">
                                                @csrf
                                                @method('put')
                                                <button type="submit" class="btn btn-info btn-sm">
                                                    <i class="fa fa-btn fa-trash-restore"></i> Khôi phục
                                                </button>
                                            </form>
                                            <form action="{{route('User.hardDelete',$user->id)}}" method="POST"
                                                  style="margin-right: 5px">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-btn fa-trash"></i> Xoá
                                                </button>
                                            </form>
                                            {{--                                            @endcan--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer">
                            <nav aria-label="Contacts Page Navigation">
                                <ul class="pagination justify-content-center m-0">
                                    {!! $users->links() !!}
                                </ul>
                            </nav>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </section>
@endsection

