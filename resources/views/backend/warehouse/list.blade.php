@extends('backend.layout.master')
@section('title')
    Product
@endsection
@section('script')
    <script>
        $(function () {
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
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
                <h3 class="card-title">Product</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <a class="btn btn-success btn-sm" href="{{route('Import.create')}}">
                            <i class="fas fa-cart-arrow-down">
                            </i>
                            Tạo đơn nhập
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <table class="table table-striped" id="example1 ">
                    <thead>
                    <tr>
                        <th>
                            id
                        </th>
                        <th>
                            Tên sản phẩm
                        </th>
                        <th>
                            Ảnh
                        </th>
                        <th>
                            Loại sản pẩm
                        </th>
                        <th>
                            Tổng nhập
                        </th>
                        <th>
                            Tổng bán
                        </th>
                        <th>
                            Số lượng còn lại
                        </th>
                        <th>
                            Tình trạng nhập hàng
                        </th>
                        <th>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $value)
                        <tr id="row_{{$value->id}}">
                            <td>
                                {{$value->id}}
                            </td>
                            <td>
                                <a>
                                    {{$value->name}}
                                </a>
                            </td>
                            <td>
                                <ul class="list-inline">
                                    @if($value->avatar)
                                        <li class="list-inline-item">
                                            <img class="table-avatar" alt="Avatar"
                                                 src="{{asset('storage/images/product/avatar/' . $value->avatar)}}"
                                                 style="max-inline-size: 100px">
                                        </li>
                                    @else
                                        <li class="list-inline-item">
                                            <img class="table-avatar" alt="Avatar"
                                                 src="{{asset('storage/images/avatar/demo.png')}}"
                                                 style="max-inline-size: 100px">
                                        </li>
                                    @endif
                                </ul>
                            </td>
                            <td>
                                {{$value->category}}
                            </td>
                            <td>
                                {{$value->import}} {{$value->unit}}
                            </td>
                            <td>
                                {{$value->sell}} {{$value->unit}}
                            </td>
                            <td class="project-state">
                                {{ $value->remain }} {{$value->unit}}
                            </td>
                            <td>
                                @if($value->status_import == 1)
                                    <span class="badge badge-success">
                                    Đang nhập
                                </span>
                                @elseif($value->status_import == 0)
                                    <span class="badge badge-warning">
                                    không có
                                </span>
                                @else
                                    <span class="badge badge-info">
                                    Đã thêm vào đơn nhập
                                </span>
                                @endif
                            </td>
                            <td class="text-right" style="display: flex">
                                <a class="btn btn-warning btn-sm" href="{{route('Sale.create',$value->id)}}"
                                   style="margin-right: 5px">
                                    <i class="fas fa-piggy-bank">
                                    </i>
                                    Tạo sale
                                </a>
                                @if($value->status_import == 0)
                                    <a class="btn btn-success btn-sm import" href="#" data-product="{{$value->id}}">
                                        <i class="fas fa-plus">
                                        </i>
                                        Nhập
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        {!! $products->links() !!}
    </section>
@endsection

@section('modal')
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm sản phẩm vào đơn nhập hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Số lượng hàng cần nhập: </label>
                                <input style=" text-align: center" type="number" class="qty" name="qty" value="10"
                                       min="10">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary import_success">Thêm vào đơn nhập</button>
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>
@endsection

