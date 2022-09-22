@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <!-- .page-title-bar -->
        <header class="page-title-bar">
            <!-- .breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang chủ</a>
                    </li>
                </ol>
            </nav><!-- /.breadcrumb -->
            <!-- floating action -->
            <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button>
            <!-- /floating action -->
            <!-- title and toolbar -->
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto"> Danh Sách Người Dùng </h1><!-- .btn-toolbar -->
                <div class="btn-toolbar">
                    {{-- @if (Auth::user()->hasPermission('Customer_create')) --}}
                    <a href="{{ route('tracksteps.create') }}" class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-plus"></i>
                        <span class="ml-1">Thêm Mới</span>
                    </a>
                    <a href="" class="btn btn-primary">
                        <i class="fas fa-file"></i>
                        <span class="ml-1">Xuất file excel</span>
                    </a>
                    {{-- @endif --}}
                </div>
                <!-- /.btn-toolbar -->
            </div><!-- /title and toolbar -->

        </header><!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">
                <!-- .card-header -->
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('tracksteps.index') }}">Tất Cả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"
                                href="
                            {{ route('tracksteps.trash') }}
                            ">Thùng
                                Rác</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <!-- .card-body -->
                <div class="card-body">
                    <!-- .form-group -->
                    <div class="form-group">
                        <!-- .input-group -->
                        <!-- /.input-group -->
                        <form action="" method="GET" id="form-search">
                            @csrf
                            <div class="input-group input-group-alt">
                                <div class="input-group-prepend">
                                    <button class="btn btn-secondary" type="button" data-toggle="modal"
                                        data-target="#modalFilterColumns">Tìm nâng cao</button>

                                </div>
                                <div class="input-group has-clearable">
                                    <button type="button" class="close trigger-submit trigger-submit-delay"
                                        aria-label="Close">
                                        <span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
                                    </button>
                                    <div class="input-group-prepend trigger-submit">
                                        <span class="input-group-text"><span class="fas fa-search"></span></span>
                                    </div>
                                    <input type="text" class="form-control" name="key" value="{{ $f_key }}"
                                        placeholder="Tìm nhanh theo cú pháp (ma:Mã kết quả hoặc ten:Tên kết quả)">
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch"
                                        type="submit">Tìm kiếm</button>
                                </div>
                            </div>
                            <!-- modalFilterColumns  -->
                            @include('Admin.tracksteps.modals.modalFilterColumns')
                            @if (!count($tracksteps))
                                <p class="text-success">
                                <div class="alert alert-danger"> <i class="bi bi-x-circle"aria-hidden="true"></i>
                                    không tìm thấy kết quả.
                                </div>
                                </p>
                            @endif
                            @if (Session::has('success'))
                                <p class="text-success">
                                <div class="alert alert-success"> <i class="fa fa-check" aria-hidden="true"></i>
                                    {{ Session::get('success') }}</div>
                                </p>
                            @endif
                            @if (Session::has('error'))
                                <p class="text-danger">
                                <div class="alert alert-danger"> <i class="bi bi-x-circle"aria-hidden="true"></i>
                                    {{ Session::get('error') }}</div>
                                </p>
                            @endif
                        </form>
                    </div><!-- /.form-group -->

                    <table class="table table-hover">
                        <!-- thead -->
                        <thead class="thead-">
                            <tr>
                                <th style="min-width:50px"> #</th>
                                <th> Thể Loại </th>
                                <th> Chức Vụ </th>
                                <th> Hành Động </th>
                            </tr>
                        </thead><!-- /thead -->
                        <tbody>
                            @foreach ($tracksteps as $key => $trackstep)
                                <tr>
                                    <th scope="row">{{ $trackstep->id }}</th>
                                    <td>{{ $trackstep->step_type }}</td>
                                    <td>{{ $trackstep->position }}</td>
                                    <td>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-2">
                                                    <form action="{{ route('tracksteps.RestoreDelete', $trackstep->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-sm btn-icon btn-secondary"><i
                                                                class="bi bi-arrow-counterclockwise"></i></button>
                                                    </form>
                                                </div>
                                                <div class="col-2">
                                                    <form action="{{ route('tracksteps.destroy', $trackstep->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-icon btn-secondary"
                                                            onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i
                                                                class="far fa-trash-alt"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody><!-- /tbody -->
                    </table>
                    {{ $tracksteps->onEachSide(5)->links() }}
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /.card -->
    </div><!-- /.card -->
@endsection