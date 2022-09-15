@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{route('levels.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Cấp độ</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Thêm cấp độ </h1>
        </header>
        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">

                    <div class="card-body">

                        <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Chọn cấp độ<abbr name="Trường bắt buộc">*</abbr></label>
                                <select name="level_id" id=""class="form-control @error('title') is-invalid @enderror"
                                data-toggle="flatpickr">
                                    <option value="">--chọn cấp độ--</option>
                                    @foreach ($levels as $leve )
                                    <option value="{{ $leve->id }}">{{ $leve->title }}</option>
                                    @endforeach
                                </select>
                                @error('level_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tiêu đề<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="title" value="{{ old('title') }}" type="text" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tên chứng chỉ<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="certificate_name" value="{{ old('certificate_name') }}" type="text" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('certificate_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Đường dẫn<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="slug" value="{{ old('slug') }}" type="text" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Mô tả<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="description" value="{{ old('description') }}" type="text" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">nội dung tổng hơp<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="compeleted_content" value="{{ old('compeleted_content') }}" type="text" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('compeleted_content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">ảnh<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="image" value="{{ old('image') }}" type="file" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Icon<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="icon" value="{{ old('icon') }}" type="text" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('icon')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Nội dung<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="content" value="{{ old('content') }}" type="text" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tiêu đề<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="title" value="{{ old('title') }}" type="text" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Loại video<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="video_type" value="{{ old('video_type') }}" type="text" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('video_type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Đường dẫn video<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="video" value="{{ old('video') }}" type="text" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('video')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tỉ lệ đạt được<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="pass_percent" value="{{ old('pass_percent') }}" type="number" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('pass_percent')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Quyền Ưu Tiên<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="priority" value="{{ old('priority') }}" type="number" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('priority')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Số sinh viên<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="student_count" value="{{ old('student_count') }}" type="number" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('student_count')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">old_prive<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="old_prive" value="{{ old('old_prive') }}" type="number" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('old_prive')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">giá<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="price" value="{{ old('price') }}" type="number" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Giá đặt hàng<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="pre_order_price" value="{{ old('pre_order_price') }}" type="number" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('pre_order_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Có liên quan<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="is_relatable" value="{{ old('is_relatable ') }}" type="text" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('is_relatable ')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Chuẩn bị ra mắt<abbr name="Trường bắt buộc">*</abbr></label><br>
                                <input name="is_coming_soon" type="radio" value="1" />True<br>
                                <input name="is_coming_soon" type="radio" value="0" />False<br>

                                @error('is_coming_soon')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Chuyên nghiệp<abbr name="Trường bắt buộc">*</abbr></label>
                                <br>
                                <input name="is_pro" type="radio" value="1" />True<br>
                                <input name="is_pro" type="radio" value="0" />False<br>

                                @error('is_pro')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Hoàn Thành:<abbr name="Trường bắt buộc">*</abbr></label>
                                <br>
                                <input name="is_completable" type="radio" value="1" />True<br>
                                <input name="is_completable" type="radio" value="0" />False<br>

                                @error('is_completable')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Ngày xuất bản<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="published_at" value="{{ old('published_at ') }}" type="date" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('published_at ')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- /.form-group -->
                            <div class="form-group">
                                <a class="btn btn-secondary float-left" href="{{route('levels.index')}}">Hủy</a>
                                <button class="btn btn-primary float-right" type="submit">Lưu</button>
                            </div>
                        </form><!-- /form -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-deck-xl -->
        @endsection
