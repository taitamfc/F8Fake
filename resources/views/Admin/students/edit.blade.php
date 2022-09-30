@extends('Admin.master')
@section('content')
    <!-- .page-title-bar -->
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('students.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Danh sách
                            học viên</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Chỉnh Sửa Học Viên </h1>
        </header>

        <div class="page-section">
            <form action="{{ route('students.update', $students->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <legend>Thông tin cơ bản</legend>
                        <div class="form-group">
                            <label for="tf1">Tên Học Viên</label> <input type="text" name="name"
                                value="{{ $students->name }}" class="form-control">
                            <small class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tf1"> Email </label> <input type="email" name="email"
                                value="{{ $students->email }}" class="form-control">
                            <small class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tf1">Mật khẩu</label> <input type="password" name="password"
                                value="{{ $students->password }}" class="form-control">
                            <small class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="flatpickr01">Hình ảnh</label><br>
                            <input accept="image/*" type='file' id="inputFile" name="image" /><br>
                            <br>
                            <img type="hidden" width="90px" height="90px" id="blah1"
                                src="{{ asset($students->image) }}" alt="" />
                        </div>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('image') }}</p>
                        @endif
                        <div class="form-actions">
                            <a class="btn btn-secondary float-right" href="{{ route('students.index') }}">Hủy</a>
                            <button class="btn btn-primary ml-auto" type="submit">Cập nhật</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
