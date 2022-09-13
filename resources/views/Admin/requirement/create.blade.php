@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <!-- .page-title-bar -->
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản lý step</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Thêm chương học </h1>
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
                                    type="text" name="content" class="form-control" data-toggle="flatpickr">
                            </div>
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Khóa học</label> <input id="flatpickr01"
                                    type="string" name="course_id" class="form-control" data-toggle="flatpickr">
                            </div>
                            <!-- .form-group -->
                            <div class="form-group">

                                {{-- <label class="control-label" for="flatpickr11">Month Select</label> --}}
                                <input type="submit" value="Hủy" class="btn btn-info">
                                <input type="submit" value="Lưu" class="btn btn-info">
                            </div>
                        </form><!-- /form -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-deck-xl -->
        @endsection
