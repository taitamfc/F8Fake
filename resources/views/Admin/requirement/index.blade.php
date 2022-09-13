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
                <h1 class="page-title mr-sm-auto"> Danh sách khóa học </h1><!-- .btn-toolbar -->
                <div class="btn-toolbar">
                    {{-- @if (Auth::user()->hasPermission('Customer_create')) --}}
                    <a href="{{ route('step.index') }}" class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-plus"></i>
                        <span class="ml-1">Thêm mới</span>
                    </a>
                    <a href="" class="btn btn-primary">
                        <i class="fas fa-file"></i>
                        <span class="ml-1">Xuất file excel</span>
                    </a>
                    {{-- @endif --}}
                </div><!-- /.btn-toolbar -->
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
                            <a class="nav-link active " href="{{ route('requirement.index') }}">Tất Cả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Thùng Rác</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <!-- .card-body -->
                <div class="card-body">
                    <!-- .form-group -->
                    <div class="form-group">
                        <form action="" method="GET" id="form-search">
                            <!-- .nav-tabs -->
                            <div class="input-group input-group-alt">
                                <!-- .input-group-prepend -->
                                <div class="input-group-prepend">
                                    <button class="btn btn-secondary" type="button" data-toggle="modal"
                                        data-target="#modalFilterColumns">Tìm nâng cao</button>
                                </div><!-- /.input-group-prepend -->
                                <!-- .input-group -->
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                                    </div><input type="text" class="form-control" placeholder="Search record">
                                </div><!-- /.input-group -->
                            </div>
                            @include('admin.step.modals.modalFilterColumns')
                        </form>
                        <!-- .input-group -->
                        <!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <table class="table table-hover">
                        <!-- thead -->
                        <thead class="thead-">
                            <tr>
                                <th style="min-width:50px"> # </th>
                                <th> Nội dung </th>
                                <th> Khóa học </th>
                                <th> Chức năng</th>
                            </tr>
                        </thead><!-- /thead -->
                        <!-- tbody -->
                        <tbody>
                            <!-- tr -->
                            {{-- @foreach ($steps as $step)
                                <tr>
                                    <th scope="row">{{ $student->id }}</th>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->password }}</td> --}}
                                    {{-- <td>
                                        @if ($student->image)
                                            <img src="{{ asset('AdminTheme/public/uploads/student/' . $student->image) }}" alt=""
                                                style="width: 80px; height: 80px">
                                        @else
                                            {{ 'Chưa có ảnh' }}
                                        @endif
                                    </td> --}}
                                    <td>
                                        {{-- <img style="with:100px; height:100px" src="{{ asset($student->image) }}"> --}}
                                    </td>
                                    {{-- <td>
                                        <a href="{{ route('students.edit', $student->id) }}"
                                            class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i></a>
                                        <a href="{{ route('students.destroy', $student->id) }}"
                                            class="btn btn-sm btn-icon btn-secondary"
                                            onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td> --}}
                                </tr>
                            {{-- @endforeach --}}
                        </tbody><!-- /tbody -->
                    </table>
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        @endsection
