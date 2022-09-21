@extends('admin.master')
@section('content')
    <div class="page-inner">
        <!-- .page-title-bar -->
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Theo dõi chương học</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Sửa theo dõi chương học </h1>
        </header><!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">
                    <!-- .card-body -->
                    <div class="card-body">
                        <h4 class="card-title"> Thông tin cơ bản </h4>
                        <!-- form -->
                        <form action="{{ route('tracks.update', $tracks->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tiêu đề</label> <input id="flatpickr01"
                                    type="text" name="title" value="{{ $tracks->title }}"class="form-control "
                                    data-toggle="flatpickr">

                            </div>
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Miễn phí</label> <input id="flatpickr01"
                                    type="boolean" name="is_free" value="{{ $tracks->is_free }}" class="form-control "
                                    data-toggle="flatpickr">
                            </div>
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Chức vụ</label> <input id="flatpickr01"
                                    type="string" name="position" value="{{ $tracks->position }}" class="form-control "
                                    data-toggle="flatpickr">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Mã khóa học</label> <input id="flatpickr01"
                                    type="number" name="course_id" value="{{ $tracks->course_id }}" class="form-control "
                                    data-toggle="flatpickr">
                            </div>

                            <div class="form-group">
                                <a class="btn btn-secondary float-left" href="{{ route('tracks.index') }}">Hủy</a>
                                <button class="btn btn-info float-right" type="submit">Lưu</button>
                            </div>
                        </form><!-- /form -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-deck-xl -->
        </div>
    </div>
@endsection

