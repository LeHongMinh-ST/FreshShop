@extends('backend.layout.master')

@section('title')
    Invoice
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết đơn đặt hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('Oder.index')}}">Danh sách đơn hàng bán ra</a></li>
                        <li class="breadcrumb-item active">Chi tiết đơn hàngbán ra</li>
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
                                    <small class="float-right">{{date_format($oder->created_at,'d-m-Y')}}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Địa chỉ gửi
                                <address>
                                    <strong>FreshShop</strong><br>
                                    29, Trâu quỳ,Gia Lâm, Hà Nội<br>
                                    Số điện Thoại: (+84) 0974798960<br>
                                    Email: minhhl290@gmail.com
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Địa chỉ nhận
                                <address>
                                    <strong>{{$oder->name}}</strong><br>
                                    {{$oder->address}}<br>
                                    Số điện thoại: (+84) {{$oder->phone}}<br>
                                    Email: {{$oder->email}}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Trạng thái:
                                    @if($oder->deleted_at ==null)
                                        @if($oder->status == 1 )
                                            <span class="badge badge-success">
                                                    Hoàn tất
                                                 </span>
                                        @elseif($oder->status == 0)
                                            <span class="badge badge-warning">
                                                    Chưa giao hàng
                                                 </span>
                                        @elseif($oder->status == 2)
                                            <span class="badge badge-primary">
                                                    Đang giao hàng
                                                 </span>
                                        @endif
                                    @else
                                        <span class="badge badge-danger">
                                                    Đã hủy
                                                 </span>
                                    @endif
                                    <br>
                                    <b>Mã đơn hàng:</b> {{$oder->id}}<br>
                                    <b>Ngày giao dự kiến:</b> {{date("d-m-Y",strtotime($oder->date_oder))}}<br>
                            </div>
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
                                    @foreach($product_oder as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{number_format($product->pivot->unit_price)}} vnđ</td>
                                            <td>{{$product->pivot->quantity}}</td>
                                            <td>{{number_format($product->pivot->unit_price*$product->pivot->quantity)}} vnđ</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Ngày tạo đơn:  {{date_format($oder->created_at,'d-m-Y')}}</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Tạm tính:</th>
                                            <td>{{number_format($oder->subtotal)}} vnđ</td>
                                        </tr>
                                        <tr>
                                            <th>Thuế (0%)</th>
                                            <td>{{number_format($oder->subtotal*0/100)}} vnđ</td>
                                        </tr>
                                        <tr>
                                            <th>Thành tiền:</th>
                                            <td>{{number_format($oder->payment)}}vnđ</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                @if($oder->deleted_at ==null)
                                    @if($oder->status == 0)
                                        <form action="{{route('Oder.ship',$oder->id)}}" method="POST"
                                              style="margin-right: 5px">
                                            @csrf
                                            <button type="submit" class="btn btn-info btn float-right" style="margin-right: 5px">
                                                <i class="fa fa-btn fa-shipping-fast"></i> Giao hàng
                                            </button>
                                        </form>
                                    @elseif($oder->status == 2)
                                        <form action="{{route('Oder.success',$oder->id)}}" method="POST"
                                              style="margin-right: 5px">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn float-right" style="margin-right: 5px">
                                                <i class="fa fa-btn fa-check-circle"></i> Hoàn Thành
                                            </button>
                                        </form>
                                    @endif
                                @endif
                                @if($oder->status !=1 && $oder->deleted_at ==null)
                                    <form action="{{route('Oder.destroy',$oder->id)}}" method="POST"
                                          style="margin-right: 5px">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn float-right" style="margin-right: 5px">
                                            <i class="fa fa-btn fa-ban"></i> Hủy đơn hàng
                                        </button>
                                    </form>
                                @else
                                    <form action="{{route('Oder.hardDelete',$oder->id)}}" method="POST"
                                          style="margin-right: 5px">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn float-right" style="margin-right: 5px">
                                            <i class="fa fa-btn fa-ban"></i> Xóa đơn hàng
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
