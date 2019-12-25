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
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
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
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <section class="content">

                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product</h3>

                            <div class="card-tools">
                                <button title="Collapse" class="btn btn-tool" type="button" data-toggle="tooltip"
                                        data-card-widget="collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button title="Remove" class="btn btn-tool" type="button" data-toggle="tooltip"
                                        data-card-widget="remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th style="width: 20%">
                                        Product Name
                                    </th>
                                    <th style="width: 30%">
                                        Team Members
                                    </th>
                                    <th>
                                        Project Progress
                                    </th>
                                    <th class="text-center" style="width: 8%">
                                        Status
                                    </th>
                                    <th style="width: 20%">
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        <a>
                                            AdminLTE v3
                                        </a>
                                        <br>
                                        <small>
                                            Created 01.01.2019
                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar2.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar3.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar"
                                                     src="../../dist/img/avatar04.png">
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="project_progress">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-green" role="progressbar" style="width: 57%"
                                                 aria-volumemax="100" aria-volumemin="0" aria-volumenow="57">
                                            </div>
                                        </div>
                                        <small>
                                            57% Complete
                                        </small>
                                    </td>
                                    <td class="project-state">
                                        <span class="badge badge-success">Success</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        <a>
                                            AdminLTE v3
                                        </a>
                                        <br>
                                        <small>
                                            Created 01.01.2019
                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar2.png">
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="project_progress">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-green" role="progressbar" style="width: 47%"
                                                 aria-volumemax="100" aria-volumemin="0" aria-volumenow="47">
                                            </div>
                                        </div>
                                        <small>
                                            47% Complete
                                        </small>
                                    </td>
                                    <td class="project-state">
                                        <span class="badge badge-success">Success</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        <a>
                                            AdminLTE v3
                                        </a>
                                        <br>
                                        <small>
                                            Created 01.01.2019
                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar2.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar3.png">
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="project_progress">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-green" role="progressbar" style="width: 77%"
                                                 aria-volumemax="100" aria-volumemin="0" aria-volumenow="77">
                                            </div>
                                        </div>
                                        <small>
                                            77% Complete
                                        </small>
                                    </td>
                                    <td class="project-state">
                                        <span class="badge badge-success">Success</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        <a>
                                            AdminLTE v3
                                        </a>
                                        <br>
                                        <small>
                                            Created 01.01.2019
                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar2.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar3.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar"
                                                     src="../../dist/img/avatar04.png">
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="project_progress">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-green" role="progressbar" style="width: 60%"
                                                 aria-volumemax="100" aria-volumemin="0" aria-volumenow="60">
                                            </div>
                                        </div>
                                        <small>
                                            60% Complete
                                        </small>
                                    </td>
                                    <td class="project-state">
                                        <span class="badge badge-success">Success</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        <a>
                                            AdminLTE v3
                                        </a>
                                        <br>
                                        <small>
                                            Created 01.01.2019
                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar"
                                                     src="../../dist/img/avatar04.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar5.png">
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="project_progress">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-green" role="progressbar" style="width: 12%"
                                                 aria-volumemax="100" aria-volumemin="0" aria-volumenow="12">
                                            </div>
                                        </div>
                                        <small>
                                            12% Complete
                                        </small>
                                    </td>
                                    <td class="project-state">
                                        <span class="badge badge-success">Success</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        <a>
                                            AdminLTE v3
                                        </a>
                                        <br>
                                        <small>
                                            Created 01.01.2019
                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar2.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar3.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar"
                                                     src="../../dist/img/avatar04.png">
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="project_progress">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-green" role="progressbar" style="width: 35%"
                                                 aria-volumemax="100" aria-volumemin="0" aria-volumenow="35">
                                            </div>
                                        </div>
                                        <small>
                                            35% Complete
                                        </small>
                                    </td>
                                    <td class="project-state">
                                        <span class="badge badge-success">Success</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        <a>
                                            AdminLTE v3
                                        </a>
                                        <br>
                                        <small>
                                            Created 01.01.2019
                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar"
                                                     src="../../dist/img/avatar04.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar5.png">
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="project_progress">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-green" role="progressbar" style="width: 87%"
                                                 aria-volumemax="100" aria-volumemin="0" aria-volumenow="87">
                                            </div>
                                        </div>
                                        <small>
                                            87% Complete
                                        </small>
                                    </td>
                                    <td class="project-state">
                                        <span class="badge badge-success">Success</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        <a>
                                            AdminLTE v3
                                        </a>
                                        <br>
                                        <small>
                                            Created 01.01.2019
                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar3.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar"
                                                     src="../../dist/img/avatar04.png">
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="project_progress">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-green" role="progressbar" style="width: 77%"
                                                 aria-volumemax="100" aria-volumemin="0" aria-volumenow="77">
                                            </div>
                                        </div>
                                        <small>
                                            77% Complete
                                        </small>
                                    </td>
                                    <td class="project-state">
                                        <span class="badge badge-success">Success</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        <a>
                                            AdminLTE v3
                                        </a>
                                        <br>
                                        <small>
                                            Created 01.01.2019
                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar3.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar"
                                                     src="../../dist/img/avatar04.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img class="table-avatar" alt="Avatar" src="../../dist/img/avatar5.png">
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="project_progress">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-green" role="progressbar" style="width: 77%"
                                                 aria-volumemax="100" aria-volumemin="0" aria-volumenow="77">
                                            </div>
                                        </div>
                                        <small>
                                            77% Complete
                                        </small>
                                    </td>
                                    <td class="project-state">
                                        <span class="badge badge-success">Success</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </section>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection
