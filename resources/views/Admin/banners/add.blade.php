@extends('Admin.master')
@section('content')
    <header class="page-title-bar">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('banners.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Khách
                        Hàng</a>
                </li>
            </ol>
        </nav>
        <h1 class="page-title">Thêm Khách Hàng</h1>
    </header>

    <div class="page-section">
        <form action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- @method('PUT') --}}
            <div class="card">
                <div class="card-body">
                    <legend>Thông tin cơ bản</legend>
                    <div class="form-group">
                        <label for="tf1">Vị trí<abbr name="Trường bắt buộc">*</abbr></label> <input name="placement"
                            type="text" class="form-control" value="{{ old('placement') }}"
                            placeholder="Nhập tên vị trí">
                        <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('placement') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">loại<abbr name="Trường bắt buộc">*</abbr></label> <input name="type"
                            type="text" class="form-control" value="{{ old('type') }}" id=""
                            placeholder="Nhập loại">
                        <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('type') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="flatpickr01">Ảnh Bìa</label><br>
                        <input accept="image/*" type='file' id="inputFile" name="banner" /><br>
                        <br>
                        <img type="hidden" width="90px" height="90px" id="blah" src="#"
                            alt=""  />
                    </div>
                    @if ($errors->any())
                        <p style="color:red">{{ $errors->first('banner') }}</p>
                    @endif


                    <div class="form-group">
                        <label for="tf1">Tiêu đề<abbr name="Trường bắt buộc">*</abbr></label> <input name="title"
                            type="text" class="form-control" value="{{ old('title') }}" id=""
                            placeholder="Nhập Tiêu đề">
                        <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Mô tả<abbr name="Trường bắt buộc">*</abbr></label>
                        <textarea name="description" class="form-control" value="{{ old('description') }}" id="ckeditor1" rows="5"
                            style="resize: none"></textarea>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Chi tiết<abbr name="Trường bắt buộc">*</abbr></label> <input name="cta_title"
                            type="text" class="form-control" value="{{ old('cta_title') }}" id=""
                            placeholder="Nhập chi tiết">
                        <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('cta_title') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Link<abbr name="Trường bắt buộc">*</abbr></label> <input name="link_to"
                            type="text" class="form-control" value="{{ old('link_to') }}" id=""
                            placeholder="Nhập link">
                        <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('link_to') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Quyền ưu tiên<abbr name="Trường bắt buộc">*</abbr></label> <input
                            name="priority" type="text" value="{{ old('priority') }}" class="form-control"
                            id="" placeholder="Nhập quyền ưu tiên">
                        <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('priority') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Kỳ Hạn<abbr name="Trường bắt buộc">*</abbr></label> <input name="expires"
                            type="date" class="form-control" value="{{ old('expires') }}" id=""
                            placeholder="Nhập kỳ hạn">
                        <small id="" class="form-text text-muted"></small>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('expires') }}</p>
                        @endif
                    </div>

                    <div class="form-actions">
                        <a class="btn btn-secondary float-right" href="{{ route('banners.index') }}">Hủy</a>
                        <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
