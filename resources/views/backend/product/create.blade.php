@extends('backend.layout.master')

@section('title')
    Create Product
@endsection
@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Project Add</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>

                        <div class="card-tools">
                            <button title="Collapse" class="btn btn-tool" type="button" data-toggle="tooltip" data-card-widget="collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="form-group">
                            <label for="inputName">Tên sản phẩm</label>
                            <input class="form-control" id="inputName" type="text">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Mô tả sản phẩm</label>
                            <textarea id="editor1" class="form-control" id="inputDescription" rows="4"></textarea>
                            <script>
                                CKEDITOR.replace( 'editor1' );
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Status</label>
                            <select class="form-control custom-select">
                                <option disabled="" selected="">Select one</option>
                                <option>On Hold</option>
                                <option>Canceled</option>
                                <option>Success</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputClientCompany">Client Company</label>
                            <input class="form-control" id="inputClientCompany" type="text">
                        </div>
                        <div class="form-group">
                            <label for="inputProjectLeader">Project Leader</label>
                            <input class="form-control" id="inputProjectLeader" type="text">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Budget</h3>

                        <div class="card-tools">
                            <button title="Collapse" class="btn btn-tool" type="button" data-toggle="tooltip" data-card-widget="collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="form-group">
                            <label for="inputEstimatedBudget">Estimated budget</label>
                            <input class="form-control" id="inputEstimatedBudget" type="number">
                        </div>
                        <div class="form-group">
                            <label for="inputSpentBudget">Total amount spent</label>
                            <input class="form-control" id="inputSpentBudget" type="number">
                        </div>
                        <div class="form-group">
                            <label for="inputEstimatedDuration">Estimated project duration</label>
                            <input class="form-control" id="inputEstimatedDuration" type="number">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a class="btn btn-secondary" href="#">Cancel</a>
                <input class="btn btn-success float-right" type="submit" value="Create new Porject">
            </div>
        </div>
    </section>
@endsection
