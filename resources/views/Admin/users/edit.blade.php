@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('users.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang danh
                        sách</a>
                </li>
            </ol>
        </nav>
        <header class="page-title-bar">
            <h1 class="page-title">Sửa User </h1>
        </header>

        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">
                    <div class="card-body">
                        <form action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tên Sinh Viên</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="name" value="{{ $users->name }}"
                                    data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('name') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Email</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="email" value="{{ $users->email }}"
                                    data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('email') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Mật Khẩu</label> <input id="flatpickr01"
                                    type="password" class="form-control" name="password" value="{{ $users->password }}"
                                    data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('password') }}</p>
                            @endif

                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tên Tài Khoản</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="username" value="{{ $users->username }}"
                                    data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('username') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Họ</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="first_name" value="{{ $users->first_name }}"
                                    data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('first_name') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tên</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="last_name" value="{{ $users->last_name }}"
                                    data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('last_name') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Tên Đầy Đủ</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="full_name" value="{{ $users->full_name }}"
                                    data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('full_name') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Ảnh Đại Diện</label><br>
                                <input accept="image/*" type='file' id="inputFile" name="avatar" /><br>
                                <img type="hidden" width="90px" height="90px" id="blah1"
                                    src="{{ asset($users->avatar) }}" alt="" />
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('avatar') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Bio</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="bio"
                                    value="{{ $users->bio }}"data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('bio') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Avatar Url</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="avatar_url"
                                    value="{{ $users->avatar_url }}" data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('avatar_url') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Cover Url</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="cover_url"
                                    value="{{ $users->cover_url }}" data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('cover_url') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Nhận xét bị chặn</label> <input
                                    id="flatpickr01" type="text" class="form-control" name="is_comment_blocked"
                                    value="{{ $users->is_comment_blocked }}" data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('is_comment_blocked') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Bị chặn</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="is_blocked"
                                    value="{{ $users->is_blocked }}" data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('is_blocked') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Nhóm</label> <input id="flatpickr01"
                                    type="text" class="form-control" name="group_id" value="{{ $users->group_id }}"
                                    data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('group_id') }}</p>
                            @endif
                            <div class="form-actions">
                                <a class="btn btn-secondary float-right" href="{{ route('users.index') }}">Hủy</a>
                                <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection
