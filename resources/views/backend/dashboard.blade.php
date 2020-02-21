@extends('backend.layout.master')
@section('title')
    Dashboard
@endsection
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Bảng điều khiển</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Bảng điều khiển</li>
                    </ol>
                </div><!-- /.col -->
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$oders->count()}}</h3>

                            <p>Đơn hàng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('Oder.index')}}" class="small-box-footer">Xem thêm <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$products->count()}}</h3>

                            <p>Sản phẩm</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-cart"></i>
                        </div>
                        <a href="{{route('Product.index')}}" class="small-box-footer">Xem thêm <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$customer->count()}}</h3>

                            <p>Khách hàng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('Customer.index')}}" class="small-box-footer">Xem thêm <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$post->count()}}</h3>

                            <p>Bài viết</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-list"></i>
                        </div>
                        <a href="{{route('Post.index')}}" class="small-box-footer">Xem thêm <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <div class="row">

                <div class="col-6">
                    <div style="text-align: center"><h2>Doanh thu năm {{date('Y')}}</h2></div>
                    <canvas id="Chart-revenue" width="400" height="400">
                    </canvas>
                </div>
                <div class="col-6">
                    <div style="text-align: center"><h2>Thống kê đơn hàng năm {{date('Y')}} </h2></div>
                    <canvas id="Chart-oder" width="400" height="400">
                    </canvas>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            var ctx = $('#Chart-oder');
            var revenue = $('#Chart-revenue');
            $.ajax({
                url: "Ajax/statistical/oder",
                type: "get",
                success: function (result) {
                    result = JSON.parse(result);
                    console.log(result);
                    var success = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                    var destroy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                    for (let i = 0; i < result.success.length; i++) {
                        success.splice(result.success[i].thang - 1, 1, result.success[i].count);
                    }
                    for (let j = 0; j < result.destroy.length; j++) {
                        destroy.splice(result.destroy[j].thang - 1, 1, result.destroy[j].count);
                    }

                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                            datasets: [{
                                label: 'Đơn hàng hoàn thành',
                                data: success,
                                borderWidth: 1,
                                backgroundColor: "rgba(56, 204, 26,0.4)",
                                borderColor: "rgba(56, 204, 26,1)",
                            },
                                {
                                    label: 'Đơn hàng đã hủy',
                                    data: destroy,
                                    borderWidth: 1,
                                    backgroundColor: "rgba(255, 158, 179,0.4)",
                                    borderColor: "rgba(255, 158, 179,1)",
                                }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                }
            });
            $.ajax({
                url: "Ajax/statistical/revenue",
                type: "get",
                success: function (result) {
                    result = JSON.parse(result);
                    // console.log(result);
                    var data_sell = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                    var data_import = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                    // console.log(data_sell);
                    for (let i = 0; i < result.sell.length; i++) {
                        data_sell.splice(result.sell[i].thang - 1, 1, result.sell[i].total_sell);
                    }
                    for (let j = 0; j < result.import.length; j++) {
                        data_import.splice(result.import[j].thang - 1, 1, result.import[j].total_import);
                    }
                    // console.log(data_import);
                    var myChart = new Chart(revenue, {
                        type: 'line',
                        data: {
                            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                            datasets: [{
                                label: 'Doanh thu bán ra',
                                data: data_sell,
                                fill: true,
                                backgroundColor: "rgba(75,192,192,0.4)",
                                borderColor: "rgba(75,192,192,1)",
                                borderWidth: 1,
                            },
                                {
                                    label: 'Mua vào',
                                    data: data_import,
                                    fill: true,
                                    backgroundColor: "rgba(75,75,192,0.4)",
                                    borderColor: "rgba(75,75    ,192,1)",
                                    borderWidth: 1,

                                }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                }
            });


        })
    </script>
@endsection


