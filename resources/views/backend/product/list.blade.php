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
                    @if(session()->has('success'))
                        <span style="color: green">{{session()->get('success')}}</span>
                    @endif

                    @if(session()->has('error'))
                        <span style="color: red">{{session()->get('error')}}</span>
                    @endif

                    @if(session()->has('success-update'))
                        <span style="color: green">{{session()->get('success-update')}}</span>
                    @endif

                    @if(session()->has('error-update'))
                        <span style="color: red">{{session()->get('error-update')}}</span>
                    @endif

                    @if(session()->has('success-delete'))
                        <span style="color: green">{{session()->get('success-delete')}}</span>
                    @endif

                    @if(session()->has('error-delete'))
                        <span style="color: red">{{session()->get('error-delete')}}</span>
                    @endif

                    @if(session()->has('success-restore'))
                        <span style="color: green">{{session()->get('success-restore')}}</span>
                    @endif

                    @if(session()->has('error-restore'))
                        <span style="color: red">{{session()->get('error-restore')}}</span>
                    @endif
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
                            Giá bán
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
                                                 src="{{asset('storage/images/product/avatar/' . $value->avatar)}}"
                                                 style="max-inline-size: 100px; ">
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
                                @if(isset($value->price_sale)) {{number_format($value->price_sale)}} vnđ <span class="badge badge-danger">
                                    sale
                                </span>
                                @else{{number_format($value->price_sell)}} vnđ
                                @endif
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
                                            <i class="fa fa-btn fa-lock"></i> Gỡ
                                        </button>
                                    </form>
                                @endcan
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
