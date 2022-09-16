@extends('Admin.master')
@section('content')
    <!-- .page-title-bar -->
    <header class="page-title-bar">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('banners.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý danh sách</a>
                </li>
            </ol>
        </nav>
        <h1 class="page-title"> Chỉnh Sửa danh sách</h1>
    </header>

    <div class="page-section">
        {{-- <form method="post" action="{{ route('banners.update', $banner->id) }}">
            @csrf
            @method('PUT') --}}
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                    <form action="{{route('banners.update', $banners->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="tf1">Vị trí</label> <input type="text" name="placement"
                            value="{{ $banners->placement }}" class="form-control" >
                        <small class="form-text text-muted"></small>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('placement') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Loại</label> <input type="text" name="type"
                            value="{{ $banners->type }}" class="form-control" >
                        <small class="form-text text-muted"></small>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('type') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Ảnh bìa</label> <input type="file" name="banner"
                             class="form-control" >
                        <small class="form-text text-muted"></small>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('banner') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Tiêu đề </label> <input type="text" name="title"
                            value="{{ $banners->title }}" class="form-control" >
                        <small class="form-text text-muted"></small>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Mô tả</label> <input type="text" name="description" id="ckeditor1"
                            value="{{ $banners->description }}" class="form-control" >
                        <small class="form-text text-muted"></small>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Chi tiết</label> <input type="text" name="cta_title"
                            value="{{ $banners->cta_title }}" class="form-control" >
                        <small class="form-text text-muted"></small>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('cta_title') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Link</label> <input type="text" name="link_to"
                            value="{{ $banners->link_to }}" class="form-control" >
                        <small class="form-text text-muted"></small>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('link_to') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Quyền ưu tiên</label> <input type="text" name="priority"
                            value="{{ $banners->priority }}" class="form-control" >
                        <small class="form-text text-muted"></small>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('priority') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tf1">Kỳ hạn</label> <input type="text" name="expires"
                            value="{{ $banners->expires }}" class="form-control" >
                        <small class="form-text text-muted"></small>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('expires') }}</p>
                        @endif
                    </div>
                    <div class="form-actions">
                        <a class="btn btn-secondary float-right" href="{{ route('banners.index') }}">Hủy</a>
                        <button class="btn btn-primary ml-auto" type="submit">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
