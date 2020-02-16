@extends('backend.layout.master')

@section('title')
    Profile
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{asset('storage/images/user/avatar/'.$user->avatar)}}"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$user->name}}</h3>

                            @if($user->role ==1)
                                <p class="text-muted text-center">Quản trị viên</p>
                            @else
                                <p class="text-muted text-center">Nhân viên bán hàng</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Email</strong>

                            <p class="text-muted">
                                {{$user->email}}
                            </p>

                            <hr>

                            <strong><i class="fas fa-phone mr-1"></i> Số điện thoại</strong>

                            @if($user->phone)
                                <p class="text-muted">{{$user->phone}}</p>
                            @else
                                <p class="text-muted">Chưa có</p>
                            @endif
                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i>Ghi chú</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                fermentum enim neque.</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item "><a class="nav-link active" href="#timeline" data-toggle="tab">Sản
                                        phẩm đã đăng</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Cập nhật</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- /.tab-pane -->
                                <div class="active tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        @if(isset($dates))
                                            @for($i = 0;$i<sizeof($dates);$i++)
                                                <div class="time-label">
                                                    <span class="bg-success">
                                                      {{$dates[$i]}}
                                                    </span>
                                                </div>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->
                                                @for($j=0;$j<sizeof($products);$j++)
                                                    @if($date = date_format($products[$j]->created_at,"j M \.\ Y") == $dates[$i])
                                                        <div>
                                                            <i class="fas fa-cart-plus bg-primary"></i>

                                                            <div class="timeline-item">
                                                                <span class="time"><i class="far fa-clock"></i>{{date_format($products[$j]->created_at,"H:i")}}</span>

                                                                <h3 class="timeline-header"> Thêm mới sản phẩm <a
                                                                        href="{{route('Product.show',$products[$j]->id)}}">{{$products[$j]->name}}</a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endfor
                                            @endfor
                                        @else
                                            <div>
                                                <i class="fas fa-times bg-danger"></i>

                                                <div class="timeline-item">
                                                    <h3 class="timeline-header"> Chưa đăng sản phẩm nào !
                                                    </h3>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                @can('update',$user)
                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal" action="{{route('User.update',$user->id)}}"
                                           method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Tên người
                                                    dùng</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName"
                                                           placeholder="Name" name="name" value="{{$user->name}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputEmail"
                                                           placeholder="Email" name="email" value="{{$user->email}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Số điện
                                                    thoại</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputSkills"
                                                           placeholder="Số điện thoại" name="phone"
                                                           value="{{$user->phone}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputExperience"
                                                       class="col-sm-2 col-form-label">Ảnh đại diện</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="avatar" class="form-control"
                                                           id="exampleInputFile">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Cập nhật</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endcan

                                @can('updateRole',$user)
                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal" action="{{route('User.update-role',$user->id)}}"
                                              method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Chức vụ</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control custom-select" name="role">
                                                        <option selected disabled>Select one</option>
                                                        <option value="1" @if($user->role == 1) selected @endif>Quản trị
                                                            viên
                                                        </option>
                                                        <option value="2" @if($user->role == 2) selected @endif>Nhân
                                                            viên
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Cập nhật</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                            @endcan
                            <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
