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
            <h1 class="page-title"> Thêm mới </h1>
        </header><!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">
                    <!-- .card-body -->
                    <div class="card-body">
                        <h4 class="card-title">  </h4>
                        <h6 class="card-subtitle mb-4"> </h6>
                        <!-- form -->
                        <form action="{{route('comments.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" >Người đăng</label>
                               <select name="user_id" id="" class="form-control">
                                @foreach ($users as $user )
                                    <option value="{{$user->id}}">{{$user->username}}</option>
                                @endforeach
                               </select>
                            </div><!-- /.form-group -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" > Tên khóa học</label>
                                <select name="course_id" id="" class="form-control">
                                    @foreach ($courses as $course )
                                        <option value="{{$course->id}}">{{$course->certificate_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('course_id') }}</p>
                            @endif<!-- /.form-group -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" >Bình luận</label>
                                <input   type="text" name="comment" class="form-control">

                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('comment') }}</p>
                            @endif<!-- /.form-group -->
                            <div class="form-group">
                                <label class="control-label" >Loại bảng nhận xét</label>
                                <input   type="text" name="commentstable_type" class="form-control">

                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('commentstable_type') }}</p>
                            @endif<!-- /.form-group -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" >Phê duyệt</label>
                                {{-- <input type="number" name="approved" class="form-control"> --}}
                                <select name="approved" id="" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                                <small class="form-text text-muted"></small>
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('approved') }}</p>
                            @endif<!-- /.form-group -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" >Tiêu đề</label>
                                <select name="course_id" id="" class="form-control">
                                    @foreach ($courses as $course )
                                        <option value="{{$course->id}}">{{$course->title}}</option>
                                    @endforeach
                                   </select>
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('course_id') }}</p>
                            @endif<!-- /.form-group -->

                            <div class="form-actions">
                                <a class="btn btn-secondary float-right" href="{{route('comments.index')}}">Hủy</a>
                                <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                            </div>
                        </form><!-- /form -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-deck-xl -->
        @endsection
