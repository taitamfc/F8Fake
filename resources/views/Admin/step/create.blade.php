@extends('Admin.master')
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
            <h1 class="page-title"> Thêm khóa học </h1>
        </header><!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">
                    <!-- .card-body -->
                    <div class="card-body">
                        <h4 class="card-title"> Thông tin cơ bản </h4>

                        <!-- form -->
                        <form action="{{ route('step.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tiêu đề</label> <input id="flatpickr01"
                                    type="text" name="title" class="form-control @error('title') @enderror"
                                    data-toggle="flatpickr" placeholder="Nhập tiêu đề" value="{!! old('title') !!}">
                                @error('title')
                                    <div style="color: red">*{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Nội dung</label> <input id="flatpickr01"
                                    type="text" name="content" class="form-control @error('content') @enderror"
                                    data-toggle="flatpickr" placeholder="Nhập nội dung" value="{!! old('content') !!}">
                                @error('content')
                                    <div style="color: red">*{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Mô tả</label> <input id="flatpickr01"
                                    type="text" name="description" class="form-control @error('description') @enderror"
                                    data-toggle="flatpickr" placeholder="Nhập mô tả" value="{!! old('description') !!}">
                                @error('description')
                                    <div style="color: red">*{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Thời gian</label> <input id="flatpickr01"
                                    type="datetime-local" name="duration" value="{!! old('duration') !!}"
                                    class="form-control @error('duration') @enderror" data-toggle="flatpickr">
                                @error('duration')
                                    <div style="color: red">*{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <p>Loại video</p>
                                <select class="form-select @error('video_type') @enderror" name="video_type"
                                    aria-label="Default select example">
                                    <option value="0" {{ old('video_type') == 0 ? 'selected' : '' }} disabled selected>
                                        --Vui
                                        lòng chọn--</option>
                                    <option value="1" {{ old('video_type') == 1 ? 'selected' : '' }}>1080p</option>
                                    <option value="2" {{ old('video_type') == 2 ? 'selected' : '' }}>720p</option>
                                    <option value="3" {{ old('video_type') == 3 ? 'selected' : '' }}>480p</option>
                                    <option value="4" {{ old('video_type') == 4 ? 'selected' : '' }}>360p</option>
                                    <option value="5" {{ old('video_type') == 5 ? 'selected' : '' }}>240p</option>
                                    <option value="6" {{ old('video_type') == 6 ? 'selected' : '' }}>144p</option>
                                    {{-- @foreach ($steps as $step)
                                        <option value="">{{ $step->video_type }}>{{ $step->name }}</option>
                                    @endforeach --}}
                                </select>
                                @error('video_type')
                                    <div style="color: red">*{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tên chính</label> <input id="flatpickr01"
                                    type="text" name="original_name"
                                    class="form-control @error('original_name') @enderror" data-toggle="flatpickr"
                                    placeholder="Nhập tên chính" value="{!! old('original_name') !!}">
                                @error('original_name')
                                    <div style="color: red">*{{ $message }}</div>
                                @enderror
                            </div>
                            <input accept="image/*" type='file' id="imgInp" name="inputFile"
                                class="form-control @error('image') @enderror" value="{!! old('image') !!}" />
                            <img type="hidden" width="200px" height="200px" id="blah" src=""
                                alt="" />
                            @error('image')
                                <div style="color: red">*{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <p>Video</p>
                                <select class="form-select @error('video') @enderror" name="video"
                                    aria-label="Default select example">
                                    <option value="0" {{ old('video') == 0 ? 'selected' : '' }} disabled selected>
                                        --Vui lòng chọn--</option>
                                    <option value="1" {{ old('video') == 1 ? 'selected' : '' }}>Youtube</option>
                                    <option value="2" {{ old('video') == 2 ? 'selected' : '' }}>Facebook</option>
                                    <option value="3" {{ old('video') == 3 ? 'selected' : '' }}>Tiktok</option>
                                    {{-- @foreach ($steps as $step)
                                        <option value="">{{ $step->video }}{{ $step->name }}</option>
                                    @endforeach --}}
                                </select>
                                @error('video')
                                    <div style="color: red">*{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Liên kết ảnh</label> <input
                                    id="flatpickr01" type="text" name="image_url"
                                    class="form-control @error('image_url') @enderror" data-toggle="flatpickr"
                                    placeholder="Nhập liên kết ảnh" value="{!! old('image_url') !!}">
                                @error('image_url')
                                    <div style="color: red">*{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Liên kết video</label> <input
                                    id="flatpickr01" type="text" name="video_url"
                                    class="form-control @error('video_url') @enderror" data-toggle="flatpickr"
                                    placeholder="Nhập liên kết video" value="{!! old('video_url') !!}">
                                @error('video_url')
                                    <div style="color: red">*{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a class="btn btn-secondary float-left" href="{{ route('step.index') }}">Hủy</a>
                                <button class="btn btn-info float-right" type="submit">Lưu</button>
                            </div>
                        </form><!-- /form -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-deck-xl -->
        @endsection
