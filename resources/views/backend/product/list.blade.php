@extends('backend.layout.master')
@section('tilte')
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
                            Đơn vị
                        </th>
                        <th>
                            Trạng thái
                        </th>
                        <th>
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
                                    @if($value->avatar)
                                        <li class="list-inline-item">
                                            <img class="table-avatar" alt="Avatar"
                                                 src="{{asset('backend/dist/img/product/avatar/' . $value->avatar)}}"
                                                 style="max-inline-size: 100px">
                                        </li>
                                    @else
                                        <li class="list-inline-item">
                                            <img class="table-avatar" alt="Avatar"
                                                 src="{{asset('backend/dist/img/product/avatar/demo.png')}}"
                                                 style="max-inline-size: 100px">
                                        </li>
                                    @endif
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
                                @elseif($value->status == 0)
                                    <span class="badge badge-danger">
                                    Hết hàng
                                </span>
                                @else
                                    <span class="badge badge-warning">
                                    Đang nhập
                                </span>
                                @endif
                            </td>
                            <td class="text-right" style="display: flex">
                                <form action="{{route('Product.show',$value->id)}}" method="GET"
                                      style="margin-right: 5px">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fas fa-folder">
                                        </i>
                                        Chi tiết
                                    </button>
                                </form>
                                @can('update',$value)
                                    <form action="{{route('Product.edit',$value->id)}}" method="GET"
                                          style="margin-right: 5px">
                                        <button type="submit" class="btn btn-info btn-sm">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Sửa
                                        </button>
                                    </form>
                                @endcan
                                @can('delete',$value)
                                    <form action="{{route('Product.destroy',$value->id)}}" method="POST"
                                          style="margin-right: 5px">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-btn fa-trash"></i> Xoá
                                        </button>
                                    </form>
                                @endcan
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
