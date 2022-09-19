@extends('admin.master')
@section('content')
    <div class="page-inner">
        <!-- .page-title-bar -->
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Danh sách khóa học</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Sửa khóa học </h1>
        </header><!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">
                    <!-- .card-body -->`
                    <div class="card-body">
                        <h4 class="card-title"> Thông tin cơ bản </h4>

                        <!-- form -->
                        <form action="{{ route('steps.update', $steps->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tiêu đề</label> <input id="flatpickr01"
                                    type="text" name="title" value="{{ $steps->title }}" class="form-control "
                                    data-toggle="flatpickr">

                            </div>
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Nội dung</label> <input id="flatpickr01"
                                    type="text" name="content" value="{{ $steps->content }}" class="form-control "
                                    data-toggle="flatpickr">

                                <!-- .form-group -->
                                <div class="form-group">
                                    <label class="control-label" for="flatpickr01">Mô tả</label> <input id="flatpickr01"
                                        type="text" name="description" value="{{ $steps->description }}"
                                        class="form-control " data-toggle="flatpickr">

                                    <!-- .form-group -->
                                    <div class="form-group">
                                        <label class="control-label" for="flatpickr01">Thời gian</label> <input
                                            id="flatpickr01" type="datetime" name="duration" value="{{ $steps->duration }}"
                                            class="form-control " data-toggle="flatpickr">

                                        <!-- .form-group -->
                                        <div class="form-group">
                                            <label class="control-label" for="flatpickr01">Loại video</label> <input
                                                id="flatpickr01" type="text" name="video_type"
                                                value="{{ $steps->video_type }}" class="form-control "
                                                data-toggle="flatpickr">

                                            <!-- .form-group -->
                                            <div class="form-group">
                                                <label class="control-label" for="flatpickr01">Tên chính</label> <input
                                                    id="flatpickr01" type="text" name="original_name"
                                                    value="{{ $steps->original_name }}" class="form-control "
                                                    data-toggle="flatpickr">

                                                <!-- .form-group -->
                                                <div class="form-group">
                                                    <label class="control-label" for="flatpickr01">Hình ảnh</label>
                                                    <input accept="image/*" type='file' id="imgInp" name="image"
                                                        class="form-control " />
                                                    <img type="hidden" width="150px" height="100px" id="blah1"
                                                        src="{{ asset($steps->image) ?? $request->inputFile }}"
                                                        alt="" data-toggle="flatpickr" />
                                                    <!-- .form-group -->
                                                    <div class="form-group">
                                                        <label class="control-label" for="flatpickr01">Video</label> <input
                                                            id="flatpickr01" type="text" name="video"
                                                            value="{{ $steps->video }}" class="form-control  "
                                                            data-toggle="flatpickr">

                                                        <!-- .form-group -->
                                                        <div class="form-group">
                                                            <label class="control-label" for="flatpickr01">Liên kết
                                                                ảnh</label> <input id="flatpickr01" type="text"
                                                                name="image_url" value="{{ $steps->image_url }}"
                                                                class="form-control " data-toggle="flatpickr">
                                                        </div>
                                                        <!-- .form-group -->
                                                        <div class="form-group">
                                                            <label class="control-label" for="flatpickr01">Liên kết
                                                                video</label> <input id="flatpickr01" type="text"
                                                                name="video_url" value="{{ $steps->video_url }}"
                                                                class="form-control " data-toggle="flatpickr">
                                                        </div>
                                                        <!-- .form-group -->
                                                        <div class="form-group">
                                                            <a class="btn btn-secondary float-left"
                                                                href="{{ route('steps.index') }}">Hủy</a>
                                                            <button class="btn btn-info float-right"
                                                                type="submit">Lưu</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form><!-- /form -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-deck-xl -->
        </div>
    </div>
@endsection
