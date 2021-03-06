@extends('backend.layout.master')

@section('title')
    Update Sale
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật khuyến mãi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Cập nhật khuyến mãi</li>
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
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('Sale.update',$sale->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="name"
                                           value="{{$product->name}}" disabled>

                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="product_id"
                                           value="{{$product->id}}" hidden>

                                </div>
                                <div class="form-group">
                                    <label>Giá khuyến mãi</label>
                                    <input type="text" class="form-control" name="price_sale" value="{{$sale->price_sale}}" placeholder="Nhập vào giá khuyến mãi">
                                </div>
                                <div class="form-group">
                                    <label>Ngày bắt đầu</label>
                                    <input type="date" class="form-control" name="start"
                                           placeholder="Nhập vào số điện thoại" value="{{date("Y-m-d",strtotime($sale->start))}}">
                                </div>
                                <div class="form-group">
                                    <label>Ngày kết thúc</label>
                                    <input type="date" class="form-control" name="end"
                                           placeholder="Nhập vào địa chỉ" value="{{date("Y-m-d",strtotime($sale->end))}}">
                                </div>
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <textarea name="note" class="textarea" placeholder="Place some text here"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; ">{{$sale->note}}</textarea>
                                    @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tạo</button>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
@endsection


