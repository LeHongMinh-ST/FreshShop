@extends('backend.layout.master')

@section('title')
    Create Supplier
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật nhà cung cấp</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Cập nhật nhà cung cấp</li>
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
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Cập nhật nhà cung cấp</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('Supplier.update',$supplier->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên nhà cung cấp</label>
                                    <input type="text" class="form-control" name="name"  placeholder="Nhập vào tên nhà cung cấp" value="{{$supplier->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Nhập vào email"  value="{{$supplier->email}}">
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone"  placeholder="Nhập vào số điện thoại"  value="{{$supplier->phone}}">
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="address"  placeholder="Nhập vào địa chỉ"  value="{{$supplier->address}}">
                                </div>
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <textarea name="note" class="textarea" placeholder="Place some text here"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; ">{{$supplier->note}}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
@endsection

