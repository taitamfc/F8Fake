@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <!-- .page-title-bar -->
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{route('Will-learns.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Bài học</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Cập nhật bài học </h1>
        </header><!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">
                    <!-- .card-body -->
                    <div class="card-body">
                        <form action="{{ route('Will-learns.update',$WillLearn->id ) }}" method="post" enctype="multipart/form">
                            @csrf
                            @method('PUT')
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tên bài học<abbr name="Trường bắt buộc">*</abbr></label>
                                <input id="flatpickr01" name="content" value="{{ old('content') ?? $WillLearn->content }}" type="text" class="form-control @error('content') is-invalid @enderror"
                                    data-toggle="flatpickr">
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div><!-- /.form-group -->
                            <div class="form-group col-lg-3">
                                <label class="control-label" for="flatpickr01">Khóa học<abbr name="Trường bắt buộc">*</abbr></label>

                                    <select name="course_id" id="" class="form-control @error('course_id') is-invalid @enderror">
                                        @foreach ($courses as $course)
                                        <option value="{{ $course->id }}"{{ $course->id == $WillLearn->course_id ? 'selected':''}}>{{ $course->title}}</option>
                                        @endforeach
                                    </select>
                                @error('course_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a class="btn btn-secondary float-left" href="{{route('levels.index')}}">Hủy</a>
                                <button class="btn btn-primary float-right" type="submit">Lưu</button>
                            </div>
                        </form><!-- /form -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-deck-xl -->
        @endsection
