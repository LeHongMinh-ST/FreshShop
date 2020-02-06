@extends('backend.layout.master')
@section('tilte')
    User
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách nhân viên</h1>
                    @if(session()->has('success'))
                        <span style="color: green">{{session()->get('success')}}</span>
                    @endif

                    @if(session()->has('error'))
                        <span style="color: red">{{session()->get('error')}}</span>
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
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fas fa-times"></i></button>
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
                                                            <p class="text-muted text-sm"><b>Chức vụ: </b>Nhân viên quản
                                                                lý bán hàng</p>
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
                                                        @if($user->avatar)
                                                            <img class="img-circle img-fluid" alt=""
                                                                 src="{{asset('backend/dist/img/user/avatar/' . $user->avatar)}}">
                                                        @else
                                                            <img class="img-circle img-fluid" alt=""
                                                                 src="{{asset('backend/dist/img/user/avatar/default-avatar.png')}}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-right" style="display: flex">
                                                    <a class="btn btn-sm btn-primary" href="{{route('User.show',$user->id)}}"
                                                       style="margin-right: 5px">
                                                        <i class="fas fa-user"></i> Xem thông tin
                                                    </a>
                                                    @if(Auth::user()->role == 1)
                                                        <form action="{{route('User.destroy',$user->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fa fa-btn fa-trash"></i> Xoá
                                                            </button>
                                                        </form>
                                                    @endif

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

