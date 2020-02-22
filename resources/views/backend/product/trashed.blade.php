@extends('backend.layout.master')

@section('title')
    Trashed User
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách nhân viên tạm khóa</h1>
                    @if(session()->has('success'))
                        <div style="display:none;" class="success">{{session()->pull('success')}}</div>
                    @endif

                    @if(session()->has('error'))
                        <span style="color: red">{{session()->pull('error')}}</span>
                    @endif
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách tạm gỡ</li>
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
                            <h3 class="card-title">Danh sách sản phẩm tạm gỡ</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 400px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                           placeholder="Search">

                                    <div class="input-group-append" style="margin-right: 10px">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i>
                                        </button>
                                    </div>

                                    <div style="display: flex">
                                        <form class="restoreAll" action="{{route('Product.restoreAll')}}" method="post" style="margin-right: 5px">
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-info btn-sm">Khôi phục toàn bộ</button>
                                        </form>
                                        <form class="deleteAll-form" action="{{route('Product.hardDeleteAll')}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">Xóa toàn bộ</button>
                                        </form>
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
                                    <th>Tên sản phẩm</th>
                                    <th>Loại sản phẩm</th>
                                    <th>Đơn vị</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category}}</td>
                                        <td>{{$product->unit}}</td>
                                        <td>
                                            @if($product->status == 1)
                                                <span class="badge badge-success">
                                    Còn hàng
                                </span>
                                            @elseif($product->status == 0)
                                                <span class="badge badge-danger">
                                    Hết hàng
                                </span>
                                            @else
                                                <span class="badge badge-warning">
                                    Đang nhập
                                </span>
                                            @endif
                                        </td>

                                        <td class="project-actions text-right" style="display: flex; float: right">
                                            <a class="btn btn-primary btn-sm"
                                               href="{{route('Product.show',$product->id)}}"
                                               style="margin-right: 5px">
                                                <i class="fas fa-folder">
                                                </i>
                                                Chi tiết
                                            </a>
                                            @can('restore',$product)
                                                <form class="restore" action="{{route('Product.restore',$product->id)}}" method="POST"
                                                      style="margin-right: 5px">
                                                    @csrf
                                                    @method('put')
                                                    <button type="submit" class="btn btn-info btn-sm">
                                                        <i class="fa fa-btn fa-trash-restore"></i> Khôi phục
                                                    </button>
                                                </form>
                                            @endcan
                                            @can('forceDelete',$product)
                                                <form class="focus-delete" action="{{route('Product.hardDelete',$product->id)}}"
                                                      method="POST"
                                                      style="margin-right: 5px">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-btn fa-trash"></i> Xoá
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer">
                            <nav aria-label="Contacts Page Navigation">
                                <ul class="pagination justify-content-center m-0">
                                    {!! $products->links() !!}
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


