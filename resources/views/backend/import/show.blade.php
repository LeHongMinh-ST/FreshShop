@extends('backend.layout.master')

@section('title')
    Invoice Import
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết đơn nhập hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('Import.index')}}">Danh sách đơn nhập hàng</a></li>
                        <li class="breadcrumb-item active">Chi tiết đơn nhập vào</li>
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
                                    <small class="float-right">{{date_format($import->created_at,'d-m-Y')}}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Cửa hàng
                                <address>
                                    <strong>FreshShop</strong><br>
                                    29, Trâu quỳ,Gia Lâm, Hà Nội<br>
                                    Số điện Thoại: (+84) 0974798960<br>
                                    Email: minhhl290@gmail.com
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Nhà cung cấp
                                <address>
                                    <strong>{{$import->Supplier->name}}</strong><br>
                                    {{$import->Supplier->address}}<br>
                                    Số điện thoại: (+84) {{$import->Supplier->phone}}<br>
                                    Email: {{$import->Supplier->email}}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Trạng thái:
                                    @if($import->deleted_at ==null)
                                        @if($import->status == 1 )
                                            <span class="badge badge-success">
                                                    Hoàn tất
                                                 </span>
                                        @elseif($import->status == 0)
                                            <span class="badge badge-warning">
                                                    Đã gửi đơn
                                                 </span>
                                        @endif
                                    @else
                                        <span class="badge badge-danger">
                                                    Đã hủy
                                                 </span>
                                    @endif
                                    <br>
                                    <b>Mã đơn hàng:</b> {{$import->id}}<br>
                                    @if($import->date_import)
                                        <b>Ngày nhân:</b> {{date("d-m-Y",strtotime($import->date_import ))}}
                                    @else
                                        <b>Ngày nhận:</b> Chưa nhận hàng
                                    @endif
                                    <br>
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
                                    @foreach($product_import as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{number_format($product->pivot->price)}} vnđ</td>
                                            <td>{{$product->pivot->quantity}}</td>
                                            <td>{{number_format($product->pivot->price*$product->pivot->quantity)}} vnđ</td>
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
                                <p class="lead">Ghi chú:</p>
                                {{$import->note}}
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Ngày tạo đơn: {{date_format($import->created_at,'d-m-Y')}}</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Tạm tính:</th>
                                            <td>{{number_format($import->subtotal)}} vnđ</td>
                                        </tr>
                                        <tr>
                                            <th>Thuế (0%)</th>
                                            <td>{{number_format($import->subtotal*0/100)}} vnđ</td>
                                        </tr>
                                        <tr>
                                            <th>Thành tiền:</th>
                                            <td>{{number_format($import->payment)}}vnđ</td>
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
                                @if($import->deleted_at ==null)
                                    @if($import->status == 0)
                                        <form action="{{route('Import.success',$import->id)}}" method="POST"
                                              style="margin-right: 5px">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn float-right"
                                                    style="margin-right: 5px">
                                                <i class="fa fa-btn fa-check-circle"></i> Hoàn Thành
                                            </button>
                                        </form>
                                    @endif
                                @endif
                                @if($import->status !=1 && $import->deleted_at ==null)
                                    <form action="{{route('Import.destroy',$import->id)}}" method="POST"
                                          style="margin-right: 5px">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn float-right"
                                                style="margin-right: 5px">
                                            <i class="fa fa-btn fa-ban"></i> Hủy đơn hàng
                                        </button>
                                    </form>
                                @else
                                    <form action="{{route('Import.hardDelete',$import->id)}}" method="POST"
                                          style="margin-right: 5px">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn float-right"
                                                style="margin-right: 5px">
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

