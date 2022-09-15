@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <!-- .page-title-bar -->
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{route('levels.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Cấp độ</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Thêm cấp độ </h1>
        </header><!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">
                    <!-- .card-body -->
                    <div class="card-body">
                        {{-- <h4 class="card-title"> Flatpickr </h4>
                        <h6 class="card-subtitle mb-4"> Lightweight and powerful datetimepicker with no dependencies. </h6> --}}
                        <!-- form -->
                        <form action="{{ route('levels.store') }}" method="post" enctype="multipart/form">
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
                                {{-- <input id="flatpickr01" name="title" value="{{ old('title') }}" type="text" class="form-control @error('title') is-invalid @enderror"
                                    data-toggle="flatpickr"> --}}
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
