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
                        <div style="display:none;" class="success">{{session()->pull('success')}}</div>
                    @endif

                    @if(session()->has('error'))
                        <div style="display:none;" class="error">{{session()->pull('error')}}</div>
                    @endif

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
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
                <h3 class="card-title"></h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <form action="{{route('Oder.search')}}" method="get" style="display: flex">
                            @csrf
                            <input type="text" name="key" class="form-control float-right"
                                   placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped" id="example1 ">
                    <thead>
                    <tr>
                        <th>
                            @sortablelink('id')
                        </th>
                        <th>
                            @sortablelink('name','Tên sản phẩm')
                        </th>
                        <th>
                            Ảnh
                        </th>
                        <th>
                            @sortablelink('category_id','Loại sản pẩm')
                        </th>
                        <th>
                            @sortablelink('price_import','Giá nhập')
                        </th>
                        <th>
                            @sortablelink('price_sell','Giá bán')
                        </th>
                        <th>
                           @sortablelink('unit','Đơn vị')
                        </th>
                        <th>
                            @sortablelink('status','Trạng thái')
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
                                <a href="{{route('Product.show',$value->id)}}">
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
                                <a href="{{route('Category.show',$value->category_id)}}">
                                    {{$value->category}}
                                </a>
                            </td>
                            <td>
                                {{number_format($value->price_import)}} vnđ
                            </td>
                            <td>
                                @if(isset($value->price_sale)) {{number_format($value->price_sale)}} vnđ <span
                                    class="badge badge-danger">
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
                                    <form class="delete-form" action="{{route('Product.destroy',$value->id)}}"
                                          method="POST"
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
