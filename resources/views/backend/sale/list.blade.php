@extends('backend.layout.master')
@section('tilte')
    Sales
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
                    <h1>Danh sách sản phẩm khuyến mãi</h1>

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
                            Giá khuyến mãi
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
                    @foreach($sales as $sale)
                        <tr>
                            <td>
                                {{$sale->id}}
                            </td>
                            <td>
                                <a>
                                    {{$sale->name}}
                                </a>
                            </td>
                            <td>
                                <ul class="list-inline">
                                    @if($sale->avatar)
                                        <li class="list-inline-item">
                                            <img class="table-avatar" alt="Avatar"
                                                 src="{{asset('storage/images/product/avatar/' . $sale->avatar)}}"
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
                                {{$sale->category}}
                            </td>
                            <td>
                                {{$sale->price_sale}} đ
                            </td>
                            <td>
                                {{$sale->unit}}
                            </td>
                            <td class="project-state">
                                @if($sale->status == 1)
                                    <span class="badge badge-success">
                                    Còn khuyến mãi
                                </span>
                                @else
                                    <span class="badge badge-danger">
                                    Hết khuyến mãi
                                </span>
                                @endif
                            </td>
                            <td class="text-right" style="display: flex">
                                <form action="{{route('Sale.show',$sale->id)}}" method="GET"
                                      style="margin-right: 5px">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fas fa-folder">
                                        </i>
                                        Chi tiết
                                    </button>
                                </form>
{{--                                @can('update',$value)--}}
                                    <form action="{{route('Sale.edit',$sale->id)}}" method="GET"
                                          style="margin-right: 5px">
                                        <button type="submit" class="btn btn-info btn-sm">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Sửa
                                        </button>
                                    </form>
{{--                                @endcan--}}
{{--                                @can('delete',$value)--}}
                                    <form action="{{route('Sale.destroy',$sale->id)}}" method="POST"
                                          style="margin-right: 5px">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-btn fa-lock"></i> Gỡ
                                        </button>
                                    </form>
{{--                                @endcan--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        {!! $sales->links() !!}
    </section>
@endsection

