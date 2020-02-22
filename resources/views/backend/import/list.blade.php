@extends('backend.layout.master')

@section('title')
    List Import
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách đơn nhập</h1>
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
                        <li class="breadcrumb-item active">Danh sách đơn nhập hàng</li>
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
                                    <input type="text" name="table_search" class="form-control float-right"
                                           placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Tên nhà cung cấp</th>
                                    <th>email</th>
                                    <th>Số điện thoại</th>
                                    <th>@sortablelink('id','Mã đơn hàng')</th>
                                    <th>Địa chỉ nhà cung cấp</th>
                                    <th>@sortablelink('payment','Tổng tiền')</th>
                                    <th>@sortablelink('date_import','Ngày nhận hàng')</th>
                                    <th>@sortablelink('status','Trạng thái')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($imports as $import)
                                    <tr>
                                        <td>{{$import->Supplier->name}}</td>
                                        <td>{{$import->Supplier->email}}</td>
                                        <td>{{$import->Supplier->phone}}</td>
                                        <td>{{$import->id}}</td>
                                        <td>{{$import->Supplier->address}}</td>
                                        <td>{{number_format($import->payment)}} vnđ</td>
                                        @if($import->date_import)
                                            <td>{{date("d-m-Y",strtotime($import->date_import))}}</td>
                                        @else
                                            <td>Chưa nhận hàng</td>
                                        @endif
                                        <td>
                                            @if($import->deleted_at ==null)
                                                @if($import->status == 1 )
                                                    <span class="badge badge-success">
                                                    Đã nhận hàng
                                                 </span>
                                                @elseif($import->status == 0)
                                                    <span class="badge badge-warning">
                                                    Đã gửi yêu cầu
                                                 </span>
                                                @endif
                                            @else
                                                <span class="badge badge-danger">
                                                    Đã hủy
                                                 </span>
                                            @endif
                                        </td>

                                        <td class="project-actions text-right" style="display: flex; float: right">
                                            <a class="btn btn-primary btn-sm"
                                               href="{{route('Import.show',$import->id)}}"
                                               style="margin-right: 5px">
                                                <i class="fas fa-folder">
                                                </i>
                                                Chi tiết
                                            </a>
                                            @if($import->deleted_at ==null)
                                                @if($import->status == 0)
                                                    <form action="{{route('Import.success',$import->id)}}" method="POST"
                                                          style="margin-right: 5px">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm">
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
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-btn fa-ban"></i> Hủy đơn nhập
                                                    </button>
                                                </form>
                                            @else
                                                @can('forceDelete',$import)
                                                    <form action="{{route('Import.hardDelete',$import->id)}}"
                                                          method="POST"
                                                          style="margin-right: 5px">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-btn fa-trash"></i> Xóa đơn nhập
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
                                    {!! $imports->links() !!}
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



