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
                        <form action="{{route('blogs.update', $blogs->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                        <label class="control-label" >Phụ huynh</label>
                                        <input type="number" value="{{$blogs->parent_id}}" name="parent_id" class="form-control"  >
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('parent_id') }}</p>
                                    @endif<!-- /.form-group -->
                                    <!-- .form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >Tiêu đề</label>
                                        <input   type="text" name="title" value="{{$blogs->title}}" class="form-control">
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('title') }}</p>
                                    @endif<!-- /.form-group -->
                                    <!-- .form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >Lượt xem</label> <input
                                             type="number" name="view_count" value="{{$blogs->view_count}}" class="form-control"
                                            >
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('view_count') }}</p>
                                    @endif<!-- /.form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >Phản hồi</label>
                                            <select class="form-control" name="is_recommend" value="{{$blogs->is_recommend}} id="">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                            </select>
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('is_recommend') }}</p>
                                    @endif<!-- /.form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >Kiểm duyệt</label>
                                            <select class="form-control" name="is_approved" value="{{$blogs->is_approved}}" id="">
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
                                        <label class="control-label" >Slug</label>
                                        <input type="text" name="slug" value="{{$blogs->slug}}" class="form-control">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('slug') }}</p>
                                    @endif<!-- /.form-group -->
                                    <!-- .form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >Kiểu mô tả</label> <input
                                             type="text" name="meta_description" value="{{$blogs->meta_description}}" class="form-control">
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('meta_description') }}</p>
                                    @endif<!-- /.form-group -->
                                    <!-- .form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >kiểu tiêu đề</label> <input
                                             type="text" name="meta_title"  value="{{$blogs->meta_title}}" class="form-control">
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('meta_title') }}</p>
                                    @endif<!-- /.form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >Ngày đăng</label> <input
                                             type="date" name="published_at" value="{{$blogs->published_at}}" class="form-control"
                                            >
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('published_at') }}</p>
                                    @endif<!-- /.form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >Đánh giá</label> <input
                                             type="number" name="reaction_count" value="{{$blogs->reaction_count}}" class="form-control"
                                            >
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('reaction_count') }}</p>
                                    @endif<!-- /.form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >Lượt bình luận</label> <input
                                             type="number" name="comments_count" value="{{$blogs->comments_count}}" class="form-control"
                                            >
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('comments_count') }}</p>
                                    @endif<!-- /.form-group -->
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="control-label" >Hình bìa</label> <input id="flatpickr08"
                                            type="text" name="thumbnail" class="form-control" value="{{$blogs->thumbnail}}"  data-enable-time="true">
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('thumbnail') }}</p>
                                    @endif<!-- /.form-group -->
                                    <!-- .form-group -->
                                    <div class="form-group">
                                        <label class="control-label" >Nội dung</label>
                                        <input type="text" name="content"  value="{{$blogs->content}}"    class="form-control" >
                                     </div>
                                     @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('content') }}</p>
                                    @endif

                                    <div class="form-group">
                                        <label class="control-label" >Phút đọc </label> <input
                                             type="number" name="min_read" value="{{$blogs->min_read}}" class="form-control">
                                    </div>
                                    @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('min_read') }}</p>
                                    @endif<!-- /.form-group -->
                                            <div class="form-group">
                                                <label class="control-label" >Lượt phản ứng</label>
                                                    <select class="form-control" name="is_reacted" value="{{$blogs->is_reacted}}"id="">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                    </select>
                                            </div>
                                            @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('is_reacted') }}</p>
                                            @endif<!-- /.form-group -->
                                            <div class="form-group">
                                                <label class="control-label" >Dấu trang</label>
                                                    <select class="form-control" name="is_bookmark" value="{{$blogs->is_bookmark}}" id="">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                    </select>
                                            </div>
                                            @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('is_bookmark') }}</p>
                                            @endif<!-- /.form-group -->
                                            <div class="form-group">
                                                <label class="control-label" >Lượng xuất bản</label>
                                                     <select class="form-control" name="is_published" value="{{$blogs->is_published}}" id="">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                     </select>
                                            </div>@if ($errors->any())
                                            <p style="color:red">{{ $errors->first('is_published') }}</p>
                                            @endif<!-- /.form-group -->
                                    </div>

                                </div>
                            </div>
                            <!-- /.form-group -->
                            <!-- .form-group -->


                            <div class="form-group">
                                <label class="control-label" >Mô tả</label>
                                <textarea name="description" value="{{$blogs->description}}" class="form-control"  id="ckeditor1" rows="5"
                            style="resize: none"></textarea>
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('description') }}</p>
                            @endif<!-- /.form-group -->
                            <!-- .form-group -->
                            <!-- .form-group -->





                            <div class="form-group">
                               Image
                                <input
                                     type="file" name="image" value="{{$blogs->image}}" class="form-control"
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
