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
                <h1 class="page-title mr-sm-auto"> Danh sách chương học </h1><!-- .btn-toolbar -->
                <div class="btn-toolbar">
                    {{-- @if (Auth::user()->hasPermission('Customer_create')) --}}
                    <a href="{{ route('step.create') }}" class="btn btn-primary mr-2">
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
                                    <input type="text" class="form-control" name="key" value=""
                                        placeholder="Tìm nhanh theo cú pháp (ma:Mã kết quả hoặc ten:Tên kết quả)">
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch"
                                        type="submit">Tìm kiếm</button>
                                </div>
                            </div>
                            <!-- modalFilterColumns  -->
                            @include('Admin.step.modals.modalFilterColumns')
                        </form>
                        <!-- .input-group -->
                        <!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <table class="table table-hover">
                        <!-- thead -->
                        <thead class="thead-">
                            <tr>
                                <th width="50px"> # </th>
                                <th width="100px"> Tiêu đề </th>
                                <th width="100px"> Nội dung </th>
                                <th width="100px"> Mô tả </th>
                                <th width="100px"> Thời gian </th>
                                <th width="100px"> Loại video </th>
                                <th width="100px"> Tên chính </th>
                                <th width="100px"> Hình ảnh </th>
                                <th width="100px"> video </th>
                                <th width="100px"> Liên kết ảnh </th>
                                <th width="100px"> Liên kết video </th>
                                <th width="50px"> Chức năng </th>
                            </tr>
                        </thead><!-- /thead -->
                        <!-- tbody -->
                        <tbody>
                            <tr>
                                @foreach ($steps as $step)
                            <tr>
                                <th scope="row">{{ $step->id }}</th>
                                <td>{{ $step->title }}</td>
                                <td>{{ $step->content }}</td>
                                <td>{{ $step->description }}</td>
                                <td>{{ $step->duration }}</td>
                                <td>{{ $step->video_type }}</td>
                                <td>{{ $step->original_name }}</td>
                                <td>{{ $step->video }}</td>
                                <td>{{ $step->image_url }}</td>
                                <td>{{ $step->video_url }}</td>
                                <td>
                                    @if ($step->image)
                                        <img src="{{ asset('public/AdminTheme/uploads/steps/' . $step->image) }}"
                                            alt="" style="width: 80px; height: 80px">
                                    @else
                                        {{ 'Chưa có ảnh' }}
                                    @endif
                                </td>
                                <td>
                                    <img style="with:100px; height:100px" src="{{ asset($step->image) }}">
                                </td>
                                <td>
                                    <a href="{{ route('step.edit', $step->id) }}"
                                        class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i></a>
                                    <form action="{{ route('step.destroy', $step->id) }}" style="display:inline"
                                        method="post">
                                        <button onclick="return confirm('Xóa {{ $step->name }} ?')"
                                            class="btn btn-sm btn-icon btn-secondary"><i
                                                class="far fa-trash-alt"></i></button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody><!-- /tbody -->
                    </table>
                </div><!-- /.card-body -->
            </div><!-- /.card -->
            {!! $steps->links() !!}
        @endsection
