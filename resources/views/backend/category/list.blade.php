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
                        <div style="display:none;" class="success">{{session()->pull('success')}}</div>
                    @endif

                    @if(session()->has('error'))
                        <div style="display:none;" class="error">{{session()->pull('error')}}</div>
                    @endif
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Danh mục</li>
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
                @if(isset($key))
                    <h3 class="card-title">từ khóa:{{$key}}</h3>
                @endif
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <form action="{{route('Category.search')}}" method="get" style="display: flex">
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
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            id
                        </th>
                        <th>
                            Tên danh mục
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
                                                 src="{{asset('storage/images/category/'.$value->image)}}">
                                        </li>
                                    @else
                                        <li>
                                            <img style="max-width: 100px" alt="Avatar"
                                                 src="{{asset('storage/images/category/demo.png')}}">
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
                                    <a class="btn btn-info btn-sm" href="{{route('Category.edit',$value->id)}}"
                                       style="margin-right: 5px">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Sửa
                                    </a>
                                @endcan
                                @can('delete',$value)
                                    <form action="{{route('Category.destroy',$value->id)}}" method="POST"
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

            <!-- /.card-body -->
        </div>
    {!! $categories->links() !!}

    <!-- /.card -->
    </section>
@endsection

