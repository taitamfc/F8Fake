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
                        <form action="{{route('blogs.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- .form-group -->
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="control-label" >Người đăng</label>
                                       <select name="user_id" id="" class="form-control">
                                        @foreach ($users as $user )
                                            <option value="{{$user->id}}">{{$user->username}}</option>
                                        @endforeach
                                       </select>

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" >nội dung</label>
                                        <input type="number" name="parent_id" class="form-control"  >
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('parent_id') }}</p>
                                    @endif<!-- /.form-group -->
                                    <!-- .form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >tiêu đề</label>
                                        <input   type="text" name="title" class="form-control">
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('title') }}</p>
                                    @endif<!-- /.form-group -->
                                    <!-- .form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >lượt xem</label> <input
                                             type="number" name="view_count" class="form-control"
                                            >
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('view_count') }}</p>
                                    @endif<!-- /.form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >phản hồi</label>
                                            <select class="form-control" name="is_recommend" id="">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                            </select>
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('is_recommend') }}</p>
                                    @endif<!-- /.form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >kiểm duyệt</label>
                                            <select class="form-control" name="is_approved" id="">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                            </select>
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('is_approved') }}</p>
                                    @endif<!-- /.form-group -->
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="control-label" >slug</label>
                                        <input type="text" name="slug" class="form-control">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('slug') }}</p>
                                    @endif<!-- /.form-group -->
                                    <!-- .form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >kiểu mô tả</label> <input
                                             type="text" name="meta_description" class="form-control">
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('meta_description') }}</p>
                                    @endif<!-- /.form-group -->
                                    <!-- .form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >kiểu tiêu đề</label> <input
                                             type="text" name="meta_title" class="form-control">
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('meta_title') }}</p>
                                    @endif<!-- /.form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >xuất bản</label> <input
                                             type="date" name="published_at" class="form-control"
                                            >
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('published_at') }}</p>
                                    @endif<!-- /.form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >đánh giá</label> <input
                                             type="number" name="reaction_count" class="form-control"
                                            >
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('reaction_count') }}</p>
                                    @endif<!-- /.form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >lượt bình luận</label> <input
                                             type="number" name="comments_count" class="form-control"
                                            >
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('comments_count') }}</p>
                                    @endif<!-- /.form-group -->
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="control-label" >hình bìa</label> <input id="flatpickr08"
                                            type="text" name="thumbnail" class="form-control"  data-enable-time="true">
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('thumbnail') }}</p>
                                    @endif<!-- /.form-group -->
                                    <!-- .form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >nội dung</label>
                                        <input type="text" name="content" class="form-control" >
                                     </div>
                                     @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('content') }}</p>
                                    @endif

                                    <div class="form-group">
                                        <label class="control-label" >thời gian </label> <input
                                             type="number" name="min_read" class="form-control">
                                    </div>
                                            <div class="form-group">
                                                <label class="control-label" >phản hồi</label>
                                                    <select class="form-control" name="is_reacted" id="">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                    </select>
                                            </div>
                                            @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('is_reacted') }}</p>
                                            @endif<!-- /.form-group -->
                                            <div class="form-group">
                                                <label class="control-label" >dấu trang</label>
                                                    <select class="form-control" name="is_bookmark" id="">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                    </select>
                                            </div>
                                            @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('is_bookmark') }}</p>
                                            @endif<!-- /.form-group -->
                                            <div class="form-group">
                                                <label class="control-label" >Lượng xuất bản</label>
                                                     <select class="form-control" name="is_published" id="">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                     </select>
                                            </div>@if ($errors->any())
                                            <p style="color:red">{{ $errors->first('is_published') }}</p>
                                            @endif<!-- /.form-group -->
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('min_read') }}</p>
                                    @endif<!-- /.form-group -->
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <!-- .form-group -->


                            <div class="form-group">
                                <label class="control-label" >mô tả</label>
                                <textarea name="description" class="form-control" value="{{ old('description') }}" id="ckeditor1" rows="5"
                            style="resize: none"></textarea>
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('description') }}</p>
                            @endif<!-- /.form-group -->
                            <!-- .form-group -->
                            <!-- .form-group -->





                            <div class="form-group">
                               image
                                <input
                                     type="file" name="image" class="form-control"
                                   >
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('image') }}</p>
                            @endif<!-- /.form-group -->


                            <div class="form-actions">
                                <a class="btn btn-secondary float-right" href="{{route('blogs.index')}}">Hủy</a>
                                <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                            </div>
                        </form><!-- /form -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-deck-xl -->
        @endsection
