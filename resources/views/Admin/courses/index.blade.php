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
                <h1 class="page-title mr-sm-auto"> Danh sách các cấp độ </h1><!-- .btn-toolbar -->
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
                            <a class="nav-link active " href="{{ route('courses.index') }}">Tất Cả</a>
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
                                        <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                                    </div><input type="text" class="form-control" placeholder="Search record">
                                </div><!-- /.input-group -->
                            </div>
                            @include('Admin.courses.modals.modalCouseColumns')
                        </form>
                    </div><!-- /.form-group -->
                    <table class="table table-hover">
                        <!-- thead -->
                        <thead class="thead-">
                            <tr>
                                <th style="min-width:50px"> #</th>
                                <th> cấp độ</th>
                                <th> Tiêu đề</th>
                                <th> tên chứng chỉ</th>
                                <th> Đường dẫn </th>
                                <th> Mô tả </th>
                                <th> Nội dung tổng hợp </th>
                                <th> Ảnh </th>
                                <th> Icon </th>
                                <th> Nội dung </th>
                                <th> loai video </th>
                                <th> video </th>
                                <th> tỷ lệ % đạt </th>
                                <th> Quyền ưu tiên </th>
                                <th> Số sinh viên </th>
                                <th> giá củ </th>
                                <th> giá </th>
                                <th> giá đặt hàng </th>
                                <th> có liên quan </th>
                                <th> chuẩn bị ra mắt</th>
                                <th> chuyên nghiệ<pre></pre> </th>
                                <th> hoàn thành </th>
                                <th> ngày xuất bản </th>
                                <th> Tùy chọn</th>
                            </tr>
                        </thead><!-- /thead -->
                        <tbody>
                            @foreach ($courses as $key => $course)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $course->level_id }}</td>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->certificate_name }}</td>
                                    <td>{{ $course->slug }}</td>
                                    <td>{{ $course->description }}</td>
                                    <td>{{ $course->compeleted_content }}</td>
                                    <td>{{ $course->image }}</td>
                                    <td>{{ $course->icon }}</td>
                                    <td>{{ $course->content }}</td>
                                    <td>{{ $course->video_type }}</td>
                                    <td>{{ $course->video }}</td>
                                    <td>{{ $course->pass_percent }}</td>
                                    <td>{{ $course->priority }}</td>
                                    <td>{{ $course->student_count }}</td>
                                    <td>{{ $course->old_prive }}</td>
                                    <td>{{ $course->price }}</td>
                                    <td>{{ $course->pre_order_price }}</td>
                                    <td>{{ $course->is_relatable }}</td>
                                    <td>{{ $course->is_coming_soon }}</td>
                                    <td>{{ $course->is_pro }}</td>
                                    <td>{{ $course->is_completable }}</td>
                                    <td>{{ $course->published_at }}</td>
                                    <td>
                                        <form action="{{ route('courses.destroy', $course->id) }}" method="post">
                                            <a href="{{ route('courses.edit', $course->id) }}"
                                                class="btn btn-sm btn-icon btn-secondary"><i
                                                    class="fa fa-pencil-alt"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-icon btn-secondary"
                                                onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody><!-- /tbody -->
                    </table>
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        @endsection
