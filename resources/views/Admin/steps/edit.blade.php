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
                    <!-- .card-body -->
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
                            </div>
                            <!-- .form-group -->
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Video</label>
                                        <select class="form-select" name="video" aria-label="Default select example">
                                            <option value="Youtube" {{ $steps->video == 'Youtube' ? 'selected' : '' }}>
                                                Youtube
                                            </option>
                                            <option value="Facebook" {{ $steps->video == 'Facebook' ? 'selected' : '' }}>
                                                Facebook</option>
                                            <option value="Facebook" {{ $steps->video == 'Tiktok' ? 'selected' : '' }}>
                                                Tiktok
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Loại video</label>
                                        {{-- {{ $course->id == $WillLearn->course_id ? 'selected':''}} --}}
                                        <select class="form-select @error('video_type') @enderror" name="video_type"
                                            aria-label="Default select example">
                                            <option value="1080p" {{ $steps->video_type == '1080p' ? 'selected' : '' }}>
                                                1080p</option>
                                            <option value="720p" {{ $steps->video_type == '720p' ? 'selected' : '' }}>720p
                                            </option>
                                            <option value="480p" {{ $steps->video_type == '480p' ? 'selected' : '' }}>480p
                                            </option>
                                            <option value="360p" {{ $steps->video_type == '360p' ? 'selected' : '' }}>360p
                                            </option>
                                            <option value="240p" {{ $steps->video_type == '240p' ? 'selected' : '' }}>
                                                240p
                                            </option>
                                            <option value="144p" {{ $steps->video_type == '144p' ? 'selected' : '' }}>
                                                144p
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <!-- .form-group -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="flatpickr01">Thời gian</label> <input
                                            id="flatpickr01" type="datetime-local" name="duration"
                                            value="{{ $steps->duration }}"
                                            class="form-control @error('duration') @enderror" data-toggle="flatpickr">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tên chính</label> <input id="flatpickr01"
                                    type="text" name="original_name" value="{{ $steps->original_name }}"
                                    class="form-control " data-toggle="flatpickr">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Hình ảnh</label>
                                <input accept="image/*" type='file' id="inputFile" name="image"
                                    class="form-control " />
                                <img type="hidden" width="200px" height="150px" id="blah1"
                                    src="{{ asset($steps->image) ?? $request->inputFile }}" alt=""
                                    data-toggle="flatpickr" />
                            </div>
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Liên kết
                                    ảnh</label> <input id="flatpickr01" type="text" name="image_url"
                                    value="{{ $steps->image_url }}" class="form-control " data-toggle="flatpickr">
                            </div>
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Liên kết
                                    video</label> <input id="flatpickr01" type="text" name="video_url"
                                    value="{{ $steps->video_url }}" class="form-control " data-toggle="flatpickr">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Mô tả</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                    value="{{ old('description') }}" id="ckeditor1" rows="5" style="resize: none">{{ old('description') ?? $steps->description }}"</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a class="btn btn-secondary float-left" href="{{ route('steps.index') }}">Hủy</a>
                                <button class="btn btn-info float-right" type="submit">Lưu</button>
                            </div>
                        </form><!-- /form -->
                    </div>
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /.card-deck-xl -->
    </div>
@endsection
