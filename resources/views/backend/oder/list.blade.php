@extends('backend.layout.master')

@section('title')
    List Oder
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách đơn hàng</h1>
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
                        <li class="breadcrumb-item active">oder</li>
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
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>@sortablelink('name','Tên khách hàng')</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>@sortablelink('id','Mã đơn hàng')</th>
                                    <th>@sortablelink('payment','Tổng tiền đơn hàng')</th>
                                    <th>Địa chỉ nhận hàng</th>
                                    <th>@sortablelink('date_oder','Ngày giao(dự kiến)')</th>
                                    <th>@sortablelink('status','Trạng thái')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oders as $oder)
                                    <tr>
                                        <td>{{$oder->name}}</td>
                                        <td>{{$oder->email}}</td>
                                        <td>{{$oder->phone}}</td>
                                        <td>{{$oder->id}}</td>
                                        <td>{{number_format($oder->payment)}} vnđ</td>
                                        <td>{{$oder->address}}</td>
                                        <td>{{date("d-m-Y",strtotime($oder->date_oder))}}</td>
                                        <td>
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
                                        </td>

                                        <td class="project-actions text-right" style="display: flex; float: right">
                                            @if($oder->deleted_at ==null)
                                                @if($oder->status == 0)
                                                    <form action="{{route('Oder.ship',$oder->id)}}" method="POST"
                                                          style="margin-right: 5px">
                                                        @csrf
                                                        <button type="submit" class="btn btn-info btn-sm">
                                                            <i class="fa fa-btn fa-shipping-fast"></i> Giao hàng
                                                        </button>
                                                    </form>
                                                @elseif($oder->status == 2)
                                                    <form action="{{route('Oder.success',$oder->id)}}" method="POST"
                                                          style="margin-right: 5px">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm">
                                                            <i class="fa fa-btn fa-check-circle"></i> Hoàn Thành
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
                                            <a class="btn btn-primary btn-sm" href="{{route('Oder.show',$oder->id)}}"
                                               style="margin-right: 5px">
                                                <i class="fas fa-folder">
                                                </i>
                                                Chi tiết
                                            </a>

                                            @if($oder->status !=1 && $oder->deleted_at ==null)
                                                    <form action="{{route('Oder.destroy',$oder->id)}}" method="POST"
                                                          style="margin-right: 5px">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-btn fa-ban"></i> Hủy đơn hàng
                                                        </button>
                                                    </form>
                                            @else
                                                @can('forceDelete',$oder)
                                                    <form action="{{route('Oder.hardDelete',$oder->id)}}" method="POST"
                                                          style="margin-right: 5px">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-btn fa-ban"></i> Xóa đơn hàng
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer">
                            <nav aria-label="Contacts Page Navigation">
                                <ul class="pagination justify-content-center m-0">
                                    {!! $oders->links() !!}
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


