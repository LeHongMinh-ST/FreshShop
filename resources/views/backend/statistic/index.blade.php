@extends('backend.layout.master')

@section('title')
    Thống kê
@endsection

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thông kê số liệu:</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Thống kê</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div style="text-align: center"><h2>Doanh thu năm {{date('Y')}}</h2></div>
                    <canvas id="revenue" width="400" height="400">
                    </canvas>
                </div>
                <div class="col-6">
                    <div style="text-align: center"><h2>Thống kê đơn hàng năm {{date('Y')}}</h2></div>
                    <canvas id="oder" width="400" height="400">
                    </canvas>
                </div>
            </div>

            <div class="row" style="margin-top: 50px">
                <div class="col-6">
                    <div style="text-align: center"><h2>Sản phẩm bán chạy nhất</h2></div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th class="text-right">Số lượng đã bán</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($productsDecs as $productDecs)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$productDecs->name}}</td>
                                    <td class="text-right">{{$productDecs->count}}</td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="col-6">
                    <div style="text-align: center"><h2>Sản phẩm bán ít nhất</h2></div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th class="text-right">Số lượng đã bán</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($productsAsc as $productAsc)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$productAsc->name}}</td>
                                    <td class="text-right">{{$productAsc->count}}</td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
            <div style="margin-top: 50px">
                <div class="col-6">
                    <div style="text-align: center"><h2>Khách hàng tiềm năng</h2></div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên khách hàng</th>
                                <th class="text-right">Số lượng đơn hàng đã đặt</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($customers_oder as $customer_oder)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$customer_oder->Customer->name}}</td>
                                    <td class="text-right">{{$customer_oder->count}}</td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            var ctx = $('#oder');
            var revenue = $('#revenue');
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
