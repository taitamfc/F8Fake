@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{route('comments.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang danh sách</a>
                </li>
            </ol>
        </nav>
        <header class="page-title-bar">
            <h1 class="page-title">Sửa Comment </h1>
        </header>
        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">
                    <div class="card-body">
                        <form action="{{ route('comments.update', $comment->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">loại</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="commentstable_type" value="{{$comment->commentstable_type}}" data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('commentstable_type') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">nội dung</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="comment" value="{{$comment->comment}}" data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('comment') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">phê duyệt</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="approved" value="{{$comment->approved}}" data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('approved') }}</p>
                            @endif

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        @endsection
