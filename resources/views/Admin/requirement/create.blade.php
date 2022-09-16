@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <!-- .page-title-bar -->
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Danh sách yêu cầu</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Thêm yêu cầu </h1>
        </header><!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">
                    <!-- .card-body -->
                    <div class="card-body">
                        <h4 class="card-title"> Thông tin cơ bản </h4>

                        <!-- form -->
                        <form action="{{ route('requirement.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Nội dung</label> <input id="flatpickr01"
                                    type="text" name="content" class="form-control @error('content') @enderror"
                                    data-toggle="flatpickr" placeholder="Nhập nội dung" value="{!! old('content') !!}">
                                @error('content')
                                    <div style="color: red">*{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Khóa học</label> <input id="flatpickr01"
                                    type="string" name="course_id" class="form-control @error('course_id') @enderror"
                                    data-toggle="flatpickr" placeholder="Nhập khóa học" value="{!! old('course_id') !!}">
                                @error('course_id')
                                    <div style="color: red">*{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- .form-group -->
                            <div class="form-group">
                                <a class="btn btn-secondary float-left" href="{{ route('requirement.index') }}">Hủy</a>
                                <button class="btn btn-info float-right" type="submit">Lưu</button>
                            </div>
                        </form><!-- /form -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-deck-xl -->
        </div>
    </div>
@endsection
