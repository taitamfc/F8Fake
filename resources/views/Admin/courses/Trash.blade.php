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

            <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button>
            <!-- /floating action -->
            <!-- title and toolbar -->
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto"> Danh sách các Khóa học đã xóa </h1><!-- .btn-toolbar -->
                <div class="btn-toolbar">
                    {{-- @if (Auth::user()->hasPermission('Customer_create')) --}}
                    <a href="{{ route('courses.create') }}" class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-plus"></i>
                        <span class="ml-1">Thêm Mới</span>
                    </a>
                    <a href="" class="btn btn-primary">
                        <i class="fas fa-file"></i>
                        <span class="ml-1">Xuất file excel</span>
                    </a>

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
                            <a class="nav-link " href="{{ route('courses.index') }}">Tất Cả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="">Thùng Rác</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <!-- .card-body -->
                <div class="card-body">
                    <!-- .form-group -->
                    <div class="row mb-2">
                        <div class="col">
                            <!-- .input-group -->
                            <!-- /.input-group -->
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
                                            <span class="input-group-text"><span
                                                    class="oi oi-magnifying-glass"></span></span>
                                        </div><input type="text" class="form-control" name='key'
                                            placeholder="Tìm nhanh theo cú pháp (ma:Mã kết quả hoặc ten:Tên kết quả)"value="{{ $f_key }}">
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch"
                                            type="submit">Tìm kiếm</button>
                                    </div><!-- /.input-group -->
                                    @include('Admin.courses.modals.modalCouseColumns')
                                </div>
                                @if (!count($courses))
                                    <p class="text-success">
                                    <div class="alert alert-success"> <i class="fa fa-check" aria-hidden="true"></i>
                                        không tìm thấy.
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
                                    <div class="alert alert-danger"> <i class="fa fa-check" aria-hidden="true"></i>
                                        {{ Session::get('error') }}</div>
                                    </p>
                                @endif
                            </form>
                        </div>
                    </div><!-- /.form-group -->
                    <table class="table table-hover">
                        <!-- thead -->
                        <thead class="thead-">
                            <tr>
                                <th style="min-width:50px"> #</th>
                                <th> Tiêu đề</th>
                                <th> tên chứng chỉ</th>
                                <th> Ngày xuất bản</th>
                                <th> Tùy chọn</th>
                            </tr>
                        </thead><!-- /thead -->
                        <tbody>
                            @foreach ($courses as $key => $course)
                                <tr>
                                    <th scope="row">{{ $course->id }}</th>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->certificate_name }}</td>
                                    <td>{{ $course->published_at }}</td>
                                    <td>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-2">
                                                    <form action="{{ route('courses.destroy', $course->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('delete', App\Models\Course::class)
                                                            <button type="submit" class="btn btn-sm btn-icon btn-secondary"
                                                                onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i
                                                                    class="far fa-trash-alt"></i></button>
                                                        @endcan
                                                    </form>
                                                </div>
                                                <div class="col-2">
                                                    <form action="{{ route('courses.RestoreDelete', $course->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        @can('restore', App\Models\Course::class)
                                                            <button type="submit" class="btn btn-sm btn-icon btn-secondary"><i
                                                                    class="bi bi-arrow-counterclockwise"></i></button>
                                                        @endcan

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody><!-- /tbody -->
                    </table>
                    <div style="float:left">
                        {{ $courses->links() }}
                    </div>
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        @endsection
