@extends('backend.layout.master')

@section('title')
    Trashed Customer
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách tài khoản khách hàng tạm khóa</h1>
                    @if(session()->has('success'))
                        <span style="color: green">{{session()->pull('success')}}</span>
                    @endif

                    @if(session()->has('error'))
                        <span style="color: red">{{session()->pull('error')}}</span>
                    @endif

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách khách hàng tạm khóa</li>
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
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{$customer->id}}</td>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->phone}}</td>
                                        <td><span class="tag tag-success">{{$customer->address}}</span></td>
                                        <td class="project-actions text-right" style="display: flex; float: right">
                                            <a class="btn btn-primary btn-sm" href="{{route('Customer.show',$customer->id)}}"
                                               style="margin-right: 5px">
                                                <i class="fas fa-folder">
                                                </i>
                                                Chi tiết
                                            </a>
                                            <form action="{{route('Customer.restore',$customer->id)}}" method="POST"
                                                  style="margin-right: 5px">
                                                @csrf
                                                @method('put')
                                                <button type="submit" class="btn btn-info btn-sm">
                                                    <i class="fa fa-btn fa-trash-restore"></i> Khôi phục
                                                </button>
                                            </form>
                                            <form action="{{route('Customer.hardDelete',$customer->id)}}" method="POST"
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
                                    {!! $customers->links() !!}
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


