@extends('backend.layout.master')

@section('title')
    Create Import
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tạo đơn nhập</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
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
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> FreshShop
                                    <small class="float-right">{{date('d-m-Y')}}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">

                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền sản phẩm</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($items))
                                        @foreach($items as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->price}} vnđ</td>
                                                <td>{{$item->qty}}</td>
                                                <td>{{$item->price*$item->price}} vnđ</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Tạm tính:</th>
                                            <td>{{Cart::subtotal()}} vnđ</td>
                                        </tr>
                                        <tr>
                                            <th>Thuế (0%)</th>
                                            <td>{{Cart::tax()}} vnđ</td>
                                        </tr>
                                        <tr>
                                            <th>Thành tiền:</th>
                                            <td>{{Cart::total()}}vnđ</td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <form action="{{route('Import.send')}}" method="POST"
                                      style="margin-right: 5px">
                                    @csrf
                                    <p class="lead">Ngày tạo đơn: {{date('d-m-Y')}}</p>

                                    <div class="table-responsive">
                                        <label for="">Chọn nhà cung cấp:</label>
                                        <select id="supplier" name="supplier" class="form-control selectpicker"
                                                data-live-search='true'>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="">Ghi chú</label>
                                        <textarea class="form-control" style="resize: vertical" name="note" id=""
                                                  cols="30" rows="3">
                                                </textarea>
                                    </div>
                                    <button type="submit" class="btn btn-info btn float-right"
                                            style="margin-right: 5px">
                                        <i class="fa fa-btn fa-shipping-fast"></i> Gửi đơn hàng
                                    </button>
                                </form>
                                <form action="{{route('Import.delete_cart')}}" method="POST"
                                      style="margin-right: 5px">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn float-right"
                                            style="margin-right: 5px">
                                        <i class="fa fa-btn fa-ban"></i> Xóa đơn hàng
                                    </button>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->

                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
