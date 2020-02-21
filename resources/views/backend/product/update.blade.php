@extends('backend.layout.master')

@section('title')
    Upade Product
@endsection
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Cập nhật sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('content')
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cập nhật sản phẩm</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('Product.update',$product->id)}}" method="POST"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="" placeholder="Điền tên sản phẩm" name="name"
                                   value="{{$product->name}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select class="form-control select2" style="width: 100%;" name="category_id">
                                <option>--Chọn danh mục---</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                            @if($category->id == $product->category_id)  selected @endif > {{$category->name}} </option>
                                @endforeach
                            </select>
                            @error('price_sell')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Giá nhập</label>
                                    <input type="text" name="price_import" class="form-control"
                                           placeholder="Điền giá khuyến mại" value="{{$product->price_import}}">
                                    @error('price_import')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Giá bán</label>
                                    <input type="text" name="price_sell" class="form-control"
                                           placeholder="Điền giá gốc" value="{{$product->price_sell}}">
                                    @error('price_sell')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 50px">
                            <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                            <textarea name="content" class="textarea" placeholder="Place some text here"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; ">{{$product->content}}</textarea>
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group" style="margin-bottom: 100px">
                            <label for="exampleInputFile">Hình ảnh đại diện sản phẩm</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="avatar" class="" id="imgInp"
                                           value="">
                                    <img id="blah" src="{{asset('storage/images/product/avatar/'.$product->avatar)}}"
                                         alt="hình ảnh sản phẩm" style="width: 150px;"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 100px">
                            <label for="exampleInputFile">Hình ảnh mô tả sản phẩm</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="images[]" class="" id="gallery-photo-add"
                                           multiple>
                                    <div class="gallery" style="display: inline-block">
                                        @foreach($product->Images as $image)
                                            <img class="desc_image" src="{{asset($image->path .'/'. $image->name)}}"
                                                 alt="">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Đơn vị</label>
                            <input type="text" class="form-control" id="" placeholder="Điền đơn vị" name="unit"
                                   value="{{$product->unit}}">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-default" href="{{route('Product.index')}}">Huỷ bỏ</button>
                        <button type="submit" class="btn btn-sucess">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection

@section('script')
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });

        $(function () {
            // Multiple images preview in browser
            var imagesPreview = function (input, placeToInsertImagePreview) {

                if (input.files) {
                    $(".desc_image").remove();
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function (event) {
                            $($.parseHTML('<img class="desc_image">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#gallery-photo-add').on('change', function () {
                imagesPreview(this, 'div.gallery');
            });
        });

    </script>
@endsection

