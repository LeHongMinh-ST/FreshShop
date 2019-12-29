@extends('backend.layout.master')
@section('tilte')
    Product
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
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            id
                        </th>
                        <th style="width: 20%">
                            Tên sản phẩm
                        </th>
                        <th style="width: 10%">
                            Ảnh
                        </th>
                        <th style="width: 20%">
                            Loại sản pẩm
                        </th>
                        <th>
                            Đơn vị
                        </th>
                        <th class="text-center" style="width: 8%">
                            Trạng thái
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $value)
                        <tr>
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
                                    <li class="list-inline-item">
                                        <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar.png">
                                    </li>
                                </ul>
                            </td>
                            <td>
                                {{$value->category}}
                            </td>
                            <td>
                                {{$value->unit}}
                            </td>
                            <td class="project-state">
                                @if($value->status == 1)
                                    <span class="badge badge-success">
                                    Còn hàng
                                </span>
                                @else
                                    <span class="badge badge-danger">
                                    Hết hàng
                                </span>
                                @endif
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-folder">
                                    </i>
                                    Chi tiết
                                </a>
                                <a class="btn btn-info btn-sm" href="#">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Sửa
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Xóa
                                </a>
                                <a class="btn btn-success btn-sm" href="#">
                                    <i class="fas fa-plus">
                                    </i>
                                    Nhập
                                </a>
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
