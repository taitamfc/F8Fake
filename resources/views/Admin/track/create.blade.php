@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <!-- .page-title-bar -->
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản lý track</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Thêm track </h1>
        </header><!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">
                    <!-- .card-body -->
                    <div class="card-body">
                        <h4 class="card-title"> Thông tin cơ bản </h4>

                        <!-- form -->
                        <form action="{{ route('track.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tiêu đề</label> <input id="flatpickr01"
                                    type="text" name="title" class="form-control @error('content') @enderror"
                                    data-toggle="flatpickr" placeholder="Nhập tiêu đề" value="{!! old('title') !!}">
                                @error('title')
                                    <div style="color: red">*{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label class="control-label" for="flatpickr01">Miễn phí</label> <input id="flatpickr01"
                                        type="boolean" name="is_free" class="form-control @error('content') @enderror"
                                        data-toggle="flatpickr" placeholder="Nhập miễn phí" value="{!! old('is_free') !!}">
                                    @error('is_free')
                                        <div style="color: red">*{{ $message }}</div>
                                    @enderror
                                    <!-- .form-group -->
                                    <div class="form-group">
                                        <label class="control-label" for="flatpickr01">Chức vụ</label> <input
                                            id="flatpickr01" type="text" name="position"
                                            class="form-control @error('content') @enderror" data-toggle="flatpickr" placeholder="Nhập chức vụ" value="{!! old('position') !!}">
                                        @error('position')
                                            <div style="color: red">*{{ $message }}</div>
                                        @enderror
                                        <!-- .form-group -->
                                        <div class="form-group">
                                            <label class="control-label" for="flatpickr01">Khóa học</label> <input
                                                id="flatpickr01" type="number" name="course_id"
                                                class="form-control @error('content') @enderror" data-toggle="flatpickr" placeholder="Nhập khóa học" value="{!! old('course_id') !!}">
                                            @error('course_id')
                                                <div style="color: red">*{{ $message }}</div>
                                            @enderror
                                            <div class="form-group">
                                                {{-- <label class="control-label" for="flatpickr11">Month Select</label> --}}
                                                {{-- <input type="submit" value="Hủy" class="btn btn-info"> --}}
                                                <a class="btn btn-info" href="{{ route('track.index') }}">Hủy</a>
                                                <input type="submit" value="Lưu" class="btn btn-info">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form><!-- /form -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-deck-xl -->
        @endsection
