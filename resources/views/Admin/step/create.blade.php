@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <!-- .page-title-bar -->
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản lý step</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Thêm chương học </h1>
        </header><!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">
                    <!-- .card-body -->
                    <div class="card-body">
                        <h4 class="card-title"> Thông tin cơ bản </h4>

                        <!-- form -->
                        <form action="">
                            @csrf

                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tiêu đề</label> <input id="flatpickr01"
                                    type="text" name="title" class="form-control" data-toggle="flatpickr">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Nội dung</label> <input id="flatpickr01"
                                    type="text" name="content" class="form-control" data-toggle="flatpickr">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Mô tả</label> <input id="flatpickr01"
                                    type="text" name="description" class="form-control" data-toggle="flatpickr">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Thời gian</label> <input id="flatpickr01"
                                    type="text" name="duration" class="form-control" data-toggle="flatpickr">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Loại video</label> <input id="flatpickr01"
                                    type="text" name="video_type" class="form-control" data-toggle="flatpickr">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tên chính</label> <input id="flatpickr01"
                                    type="text" name="original_name" class="form-control" data-toggle="flatpickr">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Hình ảnh</label> <input id="flatpickr01"
                                    type="text" name="image" class="form-control" data-toggle="flatpickr">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Video</label> <input id="flatpickr01"
                                    type="text" name="video" class="form-control" data-toggle="flatpickr">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Liên kết ảnh</label> <input id="flatpickr01"
                                    type="text" name="image_url" class="form-control" data-toggle="flatpickr">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Liên kết video</label> <input id="flatpickr01"
                                    type="text" name="video_url" class="form-control" data-toggle="flatpickr">
                            </div>
                            <div class="form-group">
                                {{-- <label class="control-label" for="flatpickr11">Month Select</label> --}}
                                <input type="submid" value="Hủy" class="btn btn-info">
                                <input type="submid" value="Lưu" class="btn btn-info">
                            </div>
                        </form><!-- /form -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-deck-xl -->
        @endsection
