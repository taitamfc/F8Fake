@extends('Admin.master')
@section('content')
    <div class="container">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('students.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Danh sách
                            Học viên</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title">Thêm Học Viên</h1>
        </header>

        <div class="page-section">
            <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="card">
                    <div class="card-body">
                        <legend>Thông tin cơ bản</legend>
                        <div class="form-group">
                            <label for="tf1">Họ tên<abbr name="Trường bắt buộc">*</abbr></label> <input name="name"
                                type="text" class="form-control" id="" placeholder="Nhập tên học viên">
                            <small id="" class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tf1">Email<abbr name="Trường bắt buộc">*</abbr></label> <input name="email"
                                type="text" class="form-control" id="" placeholder="Nhập Email">
                            <small id="" class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tf1">Password<abbr name="Trường bắt buộc">*</abbr></label> <input
                                name="password" type="text" class="form-control" id=""
                                placeholder="Nhập password">
                            <small id="" class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1">Hình ảnh </label>
                            <input type="file" name="image" class="form-control-file file" >
                            <img id="showImage" class="rounded image_show w-100"
                                            src="">
                            <small id="" class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('image') }}</p>
                            @endif
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('.file').change(function(e) {
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        $('#showImage').attr('src', e.target.result);
                                        console.log(e);
                                    }
                                    reader.readAsDataURL(e.target.files['0']);
                                });
                            });
                        </script>

                        <div class="form-actions">
                            <a class="btn btn-secondary float-right" href="{{ route('students.index') }}">Hủy</a>
                            <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
