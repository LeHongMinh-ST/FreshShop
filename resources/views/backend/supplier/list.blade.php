@extends('backend.layout.master')

@section('title')
    List Supplier
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nhà cung cấp</h1>
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
                        <li class="breadcrumb-item active">Danh sách nhà cung cấp</li>
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
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <td>{{$supplier->id}}</td>
                                        <td>{{$supplier->name}}</td>
                                        <td>{{$supplier->email}}</td>
                                        <td>{{$supplier->phone}}</td>
                                        <td><span class="tag tag-success">{{$supplier->address}}</span></td>
                                        <td class="project-actions text-right" style="display: flex; float: right">
                                            <a class="btn btn-primary btn-sm" href="{{route('Supplier.show',$supplier->id)}}"
                                               style="margin-right: 5px; display: none">
                                                <i class="fas fa-folder">
                                                </i>
                                                Chi tiết
                                            </a>
                                            @can('update',$supplier)
                                                <a class="btn btn-info btn-sm" href="{{route('Supplier.edit',$supplier->id)}}"
                                                   style="margin-right: 5px">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Sửa
                                                </a>
                                            @endcan
                                            @can('delete',$supplier)
                                                <form action="{{route('Supplier.destroy',$supplier->id)}}" method="POST"
                                                      style="margin-right: 5px">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-btn fa-trash"></i> Gỡ
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
                                    {!! $suppliers->links() !!}
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

