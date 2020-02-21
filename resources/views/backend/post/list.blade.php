@extends('backend.layout.master')
@section('tilte')
    Post List
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
                    <h1>Danh sách bài viết</h1>
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
                        <li class="breadcrumb-item active">Bài viết</li>
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
                        <input type="text" name="table_search" class="form-control float-right"
                               placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped" id="example1 ">
                    <thead>
                    <tr>
                        <th>
                            id
                        </th>
                        <th>
                            Tiêu đề
                        </th>
                        <th>
                            Ảnh
                        </th>
                        <th>
                            Mô tả
                        </th>
                        <th>
                            Người đăng
                        </th>
                        <th>
                            View
                        </th>
                        <th>
                            Ngày đăng bài
                        </th>
                        <th>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $value)
                        <tr>
                            <td>
                                {{$value->id}}
                            </td>
                            <td>
                                <a>
                                    {{$value->title}}
                                </a>
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img class="table-avatar" alt="Avatar"
                                             src="{{asset('storage/images/post/' . $value->thumbnail)}}"
                                             style="max-inline-size: 100px; ">
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <p>
                                    {{substr($value->description,0,100).'...'}}
                                </p>

                            </td>
                            <td>
                                {{$value->user}}
                            </td>
                            <td>
                                {{$value->view}}
                            </td>
                            <td>
                                {{$value->created_at}}
                            </td>
                            <td class="text-right" style="display: flex">
                                <form action="{{route('frontend.post',$value->id)}}" method="GET"
                                      style="margin-right: 5px">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fas fa-folder">
                                        </i>
                                        Chi tiết
                                    </button>
                                </form>
                                {{--                                @can('update',$value)--}}
                                <form action="{{route('Post.edit',$value->id)}}" method="GET"
                                      style="margin-right: 5px">
                                    <button type="submit" class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Sửa
                                    </button>
                                </form>
                                {{--                                @endcan--}}
                                {{--                                @can('delete',$value)--}}
                                <form action="{{route('Post.destroy',$value->id)}}" method="POST"
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
        {!! $posts->links() !!}
    </section>
@endsection
