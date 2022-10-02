@extends('Admin.master')
@include('Admin.courses.slugs.slug')
@section('content')

    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('courses.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Khóa
                            học</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Thêm khóa học </h1>
        </header>
        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">
                    <div class="card-body">
                        <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tiêu đề<abbr
                                        name="Trường bắt buộc">*</abbr></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                                    onkeyup="ChangeToSlug();" name="title" id="slug" aria-describedby="emailHelp"
                                    placeholder="">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tên chứng chỉ<abbr
                                        name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="certificate_name" value="{{ old('certificate_name') }}"
                                    type="text" class="form-control @error('certificate_name') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('certificate_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Đường dẫn<abbr
                                        name="Trường bắt buộc">*</abbr></label>

                                <input type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}"
                                    onkeyup="ChangeToSlug();" name="slug" id="convert_slug" aria-describedby="emailHelp"
                                    placeholder="">
                                @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Mô tả<abbr
                                        name="Trường bắt buộc">*</abbr></label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" id="ckeditor1" rows="5"
                                    style="resize: none"></textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="card-body border-top">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label" for="flatpickr01">Chọn cấp độ<abbr
                                                    name="Trường bắt buộc">*</abbr></label>
                                            <select name="level_id"
                                                id=""class="form-control @error('level_id') is-invalid @enderror"
                                                data-toggle="flatpickr">
                                                <option value="">--Chọn cấp độ--</option>
                                                @foreach ($levels as $level)
                                                    <option value="{{ $level->id }}">{{ $level->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('level_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label" for="flatpickr01">Ảnh<abbr
                                                    name="Trường bắt buộc">*</abbr></label>
                                            <input id="flatpickr01" name="image" value="{{ old('image') }}"
                                                type="file" class="form-control @error('image') is-invalid @enderror"
                                                data-toggle="flatpickr">
                                            @error('image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label" for="flatpickr01">Icon<abbr
                                                    name="Trường bắt buộc">*</abbr></label>
                                            <input id="flatpickr01" name="icon" value="{{ old('icon') }}"
                                                type="text" class="form-control @error('icon') is-invalid @enderror"
                                                data-toggle="flatpickr">
                                            @error('icon')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Nội dung<abbr
                                        name="Trường bắt buộc">*</abbr></label>
                                <textarea name="content" class="form-control @error('content') is-invalid @enderror" value="{{ old('description') }}" id="ckeditor" rows="5"
                                    style="resize: none"></textarea>
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Loại video<abbr
                                        name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="video_type" value="{{ old('video_type') }}"
                                    type="text" class="form-control @error('video_type') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('video_type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="card-body border-top">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label" for="flatpickr01">Đường dẫn video<abbr
                                                    name="Trường bắt buộc">*</abbr></label>
                                            <input id="flatpickr01" name="video" value="{{ old('video') }}"
                                                type="text" class="form-control @error('video') is-invalid @enderror"
                                                data-toggle="flatpickr">
                                            @error('video')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label" for="flatpickr01">Tỉ lệ đạt được<abbr
                                                    name="Trường bắt buộc">*</abbr></label>
                                            <input id="flatpickr01" name="pass_percent"
                                                value="{{ old('pass_percent') }}" type="number"
                                                class="form-control @error('pass_percent') is-invalid @enderror"
                                                data-toggle="flatpickr">
                                            @error('pass_percent')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label" for="flatpickr01">Quyền Ưu Tiên<abbr
                                                    name="Trường bắt buộc">*</abbr></label>
                                            <input id="flatpickr01" name="priority" value="{{ old('priority') }}"
                                                type="number"
                                                class="form-control @error('priority') is-invalid @enderror"
                                                data-toggle="flatpickr">
                                            @error('priority')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-top">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label" for="flatpickr01">Giá<abbr
                                                    name="Trường bắt buộc">*</abbr></label>
                                            <input id="flatpickr01" name="price" value="{{ old('price') }}"
                                                type="number" class="form-control @error('price') is-invalid @enderror"
                                                data-toggle="flatpickr">
                                            @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label" for="flatpickr01">Old_prive<abbr
                                                    name="Trường bắt buộc">*</abbr></label>
                                            <input id="flatpickr01" name="old_prive" value="{{ old('old_prive') }}"
                                                type="number"
                                                class="form-control @error('old_prive') is-invalid @enderror"
                                                data-toggle="flatpickr">
                                            @error('old_prive')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label" for="flatpickr01">Số sinh viên<abbr
                                                    name="Trường bắt buộc">*</abbr></label>
                                            <input id="flatpickr01" name="student_count"
                                                value="{{ old('student_count') }}" type="number"
                                                class="form-control @error('student_count') is-invalid @enderror"
                                                data-toggle="flatpickr">
                                            @error('student_count')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-top">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label" for="flatpickr01">Giá đặt hàng<abbr
                                                    name="Trường bắt buộc">*</abbr></label>
                                            <input id="flatpickr01" name="pre_order_price"
                                                value="{{ old('pre_order_price') }}" type="number"
                                                class="form-control @error('pre_order_price') is-invalid @enderror"
                                                data-toggle="flatpickr">
                                            @error('pre_order_price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label" for="flatpickr01">Có liên quan<abbr
                                                    name="Trường bắt buộc">*</abbr></label>
                                            <input id="flatpickr01" name="is_relatable"
                                                value="{{ old('is_relatable ') }}" type="text"
                                                class="form-control @error('is_relatable') is-invalid @enderror"
                                                data-toggle="flatpickr">
                                            @error('is_relatable ')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label" for="flatpickr01">Ngày xuất bản<abbr
                                                    name="Trường bắt buộc">*</abbr></label>
                                            <input id="flatpickr01" name="published_at" type="date"
                                                value="{{ old('published_at') }}"
                                                class="form-control @error('published_at') is-invalid @enderror"
                                                data-toggle="flatpickr">
                                            @error('published_at ')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Nội dung tổng hơp<abbr
                                        name="Trường bắt buộc">*</abbr></label>
                                <textarea name="compeleted_content" class="form-control" value="{{ old('description') }}" id="ckeditor0"
                                    rows="5" style="resize: none"></textarea>
                                @error('compeleted_content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="card-body border-top">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="switcher-control">
                                                <input type="checkbox"
                                                name="is_pro"id="checkbox1" class="switcher-input" value="1" >
                                                <span class="switcher-indicator"></span>
                                            </label>
                                            <label class="control-label" for="flatpickr01">Chuyên nghiệp</label>

                                            @error('is_pro')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="switcher-control">
                                                <input type="checkbox"
                                                name="is_coming_soon"id="checkbox1" class="switcher-input" value="1" >
                                                <span class="switcher-indicator"></span>
                                            </label>
                                            <label class="control-label" for="flatpickr01">Chuẩn bị ra mắt</label><br>
                                            @error('is_coming_soon')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="switcher-control">
                                                <input type="checkbox"
                                                name="is_completable"id="checkbox1" class="switcher-input" value="1" >
                                                <span class="switcher-indicator"></span>
                                            </label>
                                            <label class="control-label" for="flatpickr01"> Hoàn Thành </label>
                                            @error('is_completable')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-secondary float-left" href="{{ route('courses.index') }}">Hủy</a>
                                <button class="btn btn-primary float-right" type="submit">Lưu</button>
                            </div>
                        </form><!-- /form -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div>
      <!-- /.card-deck-xl -->
        @endsection
