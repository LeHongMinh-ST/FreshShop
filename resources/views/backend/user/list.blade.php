@extends('backend.layout.master')
@section('title')
    User List
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách nhân viên đang hoạt động</h1>
                    @if(session()->has('success'))
                        <div style="display:none;" class="success">{{session()->pull('success')}}</div>
                    @endif

                    @if(session()->has('error'))
                        <div style="display:none;" class="error">{{session()->pull('error')}}</div>
                    @endif
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Nhân viên</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
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
            <div class="card-body">
                <section class="content">

                    <!-- Default box -->
                    <div class="card card-solid">
                        <div class="card-body pb-0">
                            <div class="row d-flex align-items-stretch">
                                @foreach($users as $user)
                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                        <div class="card bg-light">
                                            <div class="card-header text-muted border-bottom-0">
                                                Digital Strategist
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="lead"><b>{{$user->name}}</b></h2>
                                                        @if($user->role == 1)
                                                            <p class="text-muted text-sm"><b>Chức vụ: </b>Quản trị viên
                                                            </p>
                                                        @else
                                                            <p class="text-muted text-sm"><b>Chức vụ: </b>Nhân viên</p>
                                                        @endif
                                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                                            <li class="small"><span class="fa-li"><i
                                                                        class="fas fa-lg fa-building"></i></span>
                                                                Email: {{$user->email}}
                                                            </li>
                                                            <li class="small"><span class="fa-li"><i
                                                                        class="fas fa-lg fa-phone"></i></span> Phone #:
                                                                {{$user->phone}}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-5 text-center">
                                                        <img class="img-circle img-fluid" alt=""
                                                             src="{{asset('storage/images/user/avatar/' . $user->avatar)}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-right" style="display: flex">
                                                    <a class="btn btn-sm btn-primary"
                                                       href="{{route('User.show',$user->id)}}"
                                                       style="margin-right: 5px">
                                                        <i class="fas fa-user"></i> Xem thông tin
                                                    </a>
                                                    @can('delete',$user)
                                                        <form action="{{route('User.destroy',$user->id)}}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fa fa-btn fa-lock"></i> Khóa tài khoản
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <nav aria-label="Contacts Page Navigation">
                                <ul class="pagination justify-content-center m-0">
                                    {!! $users->links() !!}
                                </ul>
                            </nav>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->

                </section>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection

