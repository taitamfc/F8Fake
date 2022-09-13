@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <!-- .page-title-bar -->
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Forms</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Thêm Học viên </h1>
        </header><!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">
                    <!-- .card-body -->
                    <div class="card-body">

                        <!-- form -->
                        <form method="post" action="{{ route('students.store') }}">
                            @csrf

                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Họ Và Tên</label>
                                <input id="flatpickr01" type="text" name="name" class="form-control"
                                    data-toggle="flatpickr">

                                @error('name')
                                    <p style="color:red">*{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-label" for="flatpickr02">Email</label>
                                <input id="flatpickr02" type="email" name="email" class="form-control"
                                    data-toggle="flatpickr" data-enable-time="true">

                                @error('email')
                                    <p style="color:red">*{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- /.form-group -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr03">Mật Khẩu</label>
                                <input id="flatpickr03" type="password" name="password" class="form-control"
                                    data-toggle="flatpickr" data-alt-input="true">

                                @error('password')
                                    <p style="color:red">*{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="flatpickr03">Ảnh</label>
                                <input id="flatpickr03" type="file" name="image" class="form-control"
                                    data-toggle="flatpickr" data-alt-input="true">

                                @error('image')
                                    <p style="color:red">*{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- /.form-group -->


                           
                                {{-- <label class="control-label" for="flatpickr11">Month Select</label> --}}
                                <button type="submit"class="btn btn-success">Thêm</button>
                                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /form -->
        </div><!-- /.card-body -->
        <!-- /.card-deck-xl -->
    @endsection
