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
                        <form action="{{ route('blogs.update', $blog->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">mã người dùng</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="user_id" value="{{$blog->user_id}}" data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('user_id') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">phụ huynh</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="parent_id" value="{{$blog->parent_id}}" data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('parent_id') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">tiêu đề</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="title" value="{{$blog->title}}" data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('title') }}</p>
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        @endsection
