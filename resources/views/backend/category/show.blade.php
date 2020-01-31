@extends('backend.layout.master')

@section('title')
    Detail
@endsection
@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết danh mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Chi tiết danh mục</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        {{--                        <h3 class="d-inline-block d-sm-none">{{asset('backend/dist/img/product/avatar/'. $category->image)}}</h3>--}}
                        <div class="col-12">
                            @if($category->image)
                                <img src="{{asset('backend/dist/img/category/'. $category->image)}}"
                                     class="product-image" alt="Product Image">
                            @else
                                <img src="{{asset('backend/dist/img/category/demo.png')}}"
                                     class="product-image" alt="Product Image">
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{$category->name}}</h3>
                        <p>{{$category->slug}}</p>

                        <hr>

                        <h4>Độ sâu: {{$category->depth}}</h4>

                        <div>Danh mục cha:</div>
                        <div>
                            @if($category->parent)
                                <h4>{{$category->parent->name}}</h4>
                            @else
                                <h4>Không có</h4>
                            @endif
                        </div>
                        <div>
                            Danh mục con:
                        </div>
                        <div>
                            @if($category->child)
                                <h4>
                                    {{$category->child->name}}
                                </h4>
                            @else
                                <h4 class="mt-3">
                                    Không có
                                </h4>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                               href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Mô
                                tả</a>
                            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                               href="#product-comments" role="tab" aria-controls="product-comments"
                               aria-selected="false">Các sản phẩm</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                             aria-labelledby="product-desc-tab"> {{$category->content}}
                        </div>
                        <div class="tab-pane fade" id="product-comments" role="tabpanel"
                             aria-labelledby="product-comments-tab">
                            <div class="col-12 product-image-thumbs">
                                @foreach($products as $product)
                                    <div class="product-image-thumb active" style="display: inline-block">
                                        <a href="{{route('Product.show',$product->id)}}">
                                            @if($product->avatar)
                                                <img
                                                    src="{{asset('backend/dist/img/product/avatar/'. $product->avatar)}}"
                                                    alt="Product Image">
                                            @else
                                                <img
                                                    src="{{asset('backend/dist/img/product/avatar/demo.png')}}"
                                                    alt="Product Image">
                                            @endif
                                        </a>
                                        <div>
                                            {{$product->name}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
