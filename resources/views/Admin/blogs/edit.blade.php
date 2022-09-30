@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{route('blogs.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang danh sách</a>
                </li>
            </ol>
        </nav>
        <header class="page-title-bar">
            <h1 class="page-title">Sửa Blog </h1>
        </header>
        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">
                    <div class="card-body">
                        <form action="{{ route('blogs.update', $blogs->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tiêu đề</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="title" value="{{$blogs->title}}" data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('title') }}</p>
                            @endif
                            {{-- <div class="form-group">
                                <label class="control-label" for="flatpickr01">Người đăng</label>

                                    <select name="user_id" class="form-control " id="inputGroupSelect02">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                                        @endforeach
                                    </select>
                            </div> --}}
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('user_id') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Ngày đăng</label> <input id="flatpickr01"
                                    type="date" class="form-control" name="published_at" value="{{$blogs->published_at}}" data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('published_at') }}</p>
                            @endif
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
                                <label class="control-label" >mô tả</label>
                                <textarea name="description" class="form-control" value="{{ old('description') }}" id="ckeditor1" rows="5"
                            style="resize: none"></textarea>
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('description') }}</p>
                            @endif<!-- /.form-group -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" >kiểu tiêu đề</label> <input
                                     type="text" name="meta_title" class="form-control">
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('meta_title') }}</p>
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
                                <label class="control-label" >hình bìa</label> <input id="flatpickr08"
                                    type="text" name="thumbnail" class="form-control"  data-enable-time="true">
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('thumbnail') }}</p>
                            @endif<!-- /.form-group -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" >nội dung</label>
                                <textarea name="content" class="form-control" value="{{ old('content') }}" id="ckeditor1" rows="5"
                            style="resize: none"></textarea>
                            </div>
                             @if ($errors->any())
                            <p style="color:red">{{ $errors->first('content') }}</p>
                            @endif

                            <div class="form-group">
                                <label class="control-label" >thời gian </label> <input
                                     type="number" name="min_read" class="form-control"
                                    >
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('min_read') }}</p>
                            @endif<!-- /.form-group -->
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
                                <label class="control-label" >phát hành</label>
                                     <select class="form-control" name="is_published" id="">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                     </select>
                            </div>@if ($errors->any())
                            <p style="color:red">{{ $errors->first('is_published') }}</p>
                            @endif<!-- /.form-group -->
                            <div class="form-group">
                               image
                                <input
                                     type="file" name="image" class="form-control"
                                   >
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('image') }}</p>
                            @endif<!-- /.form-group -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        @endsection
