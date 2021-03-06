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
                    @if(session()->has('success'))
                        <span style="color: green">{{session()->get('success')}}</span>
                    @endif

                    @if(session()->has('error'))
                        <span style="color: red">{{session()->get('error')}}</span>
                    @endif
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Danh mục tạm gỡ</li>
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
                        <th>
                            Tên sản phẩm
                        </th>
                        <th>
                            Ảnh
                        </th>
                        <th>
                            Độ sâu
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $value)
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
                                    @if($value->image)
                                        <li>
                                            <img style="max-width: 100px" alt="Avatar"
                                                 src="{{asset('backend/dist/img/category/'.$value->image)}}">
                                        </li>
                                    @else
                                        <li>
                                            <img style="max-width: 100px" alt="Avatar"
                                                 src="{{asset('backend/dist/img/category/demo.png')}}">
                                        </li>
                                    @endif
                                </ul>
                            </td>
                            <td>
                                {{$value->depth}}
                            </td>
                            <td class="project-actions text-right" style="display: flex; float: right">
                                <a class="btn btn-primary btn-sm" href="{{route('Category.show',$value->id)}}"
                                   style="margin-right: 5px">
                                    <i class="fas fa-folder">
                                    </i>
                                    Chi tiết
                                </a>
                                @can('update',$value)
                                    <form action="{{route('Category.restore',$value->id)}}" method="POST"
                                          style="margin-right: 5px">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-info btn-sm">
                                            <i class="fas fa-trash-restore">
                                            </i>
                                            Khôi phục
                                        </button>
                                    </form>
                                @endcan
                                @can('delete',$value)
                                    <form action="{{route('Category.hardDelete',$value->id)}}" method="POST"
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
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
@endsection


