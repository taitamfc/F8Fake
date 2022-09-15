@extends('Admin.master')
@section('content')
    <div class="container">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
                    </li>
                </ol>
            </nav>
            <!-- <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> -->
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto">Quản Lý Học viên</h1>
                <div class="btn-toolbar">
                    {{-- @if (Auth::user()->hasPermission('student_create')) --}}
                    <a href="{{ route('students.create') }}" class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-plus"></i>
                        <span class="ml-1">Thêm Mới</span>
                    </a>
                    <a href="" class="btn btn-primary">
                        <i class="fas fa-file"></i>
                        <span class="ml-1">Xuất file excel</span>
                    </a>
                    {{-- @endif --}}
                </div>
            </div>
        </header>
        <div class="page-section">
            <div class="card card-fluid">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active " href="{{ route('students.index') }}">Tất Cả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('students.trash') }}">Thùng Rác</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <form action="" method="GET" id="form-search">
                                @csrf
                                <div class="input-group input-group-alt">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-secondary" type="button" data-toggle="modal"
                                            data-target="#modalFilterColumns">Tìm nâng cao</button>
                                    </div>
                                    <div class="input-group has-clearable">
                                        <button type="button" class="close trigger-submit trigger-submit-delay"
                                            aria-label="Close">
                                            <span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
                                        </button>
                                        <div class="input-group-prepend trigger-submit">
                                            <span class="input-group-text"><span class="fas fa-search"></span></span>
                                        </div>
                                        <input type="text" class="form-control" name="key" value=""
                                            placeholder="Tìm nhanh theo cú pháp (ma:Mã kết quả hoặc ten:Tên kết quả)">
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch"
                                            type="submit">Tìm kiếm</button>
                                    </div>
                                </div>
                                <!-- modalFilterColumns  -->
                                @include('Admin.students.modals.modalFilterColumns')
                            </form>
                            <!-- modalFilterColumns  -->
                            {{-- @include('admin.students.modals.modalSaveSearch') --}}
                        </div>
                    </div>
                    {{-- @if (Session::has('success'))
            <div class="alert alert-success">{{session::get('success')}}</div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger">{{session::get('error')}}</div>
            @endif --}}
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-">
                                <tr>
                                    <th> # </th>
                                    <th> Ảnh </th>
                                    <th> Tên </th>
                                    <th> Email </th>
                                    <th> Password </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- tr -->
                                @foreach ($students as $student)
                                    <tr>
                                        <th scope="row">{{ $student->id }}</th>
                                        <td>
                                            <div class="rounded-circle ">
                                                <img class=" image_photo rounded-circle "
                                                    src="{{ !empty($student->image) ? asset($student->image) : asset('assets/images/no_image.png') }}"style="width:60px; height:60px">
                                            </div>
                                        </td>

                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->password }}</td>
                                        {{-- <td>
                                    @if ($student->image)
                                        <img src="{{ asset('AdminTheme/public/uploads/student/' . $student->image) }}" alt=""
                                            style="width: 80px; height: 80px">
                                    @else
                                        {{ 'Chưa có ảnh' }}
                                    @endif
                                </td> --}}
                                        {{-- <td>
                                            <img  src="{{ asset($student->image) }}" style="width:80px; height:80px">
                                        </td> --}}
                                       
                                        <td>
                                            <a href="{{ route('students.edit', $student->id) }}"
                                                class="btn btn-sm btn-icon btn-secondary"><i
                                                    class="fa fa-pencil-alt"></i></a>
                                            <a href="{{ route('students.destroy', $student->id) }}"
                                                class="btn btn-sm btn-icon btn-secondary"
                                                onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i
                                                    class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody><!-- /tbody -->
                        </table><!-- /.table -->
                        {{ $students->onEachSide(5)->links() }}
                        {{-- <div style="float:right">
                    {{ $students->links() }}
                </div> --}}
                    </div>
                    <!-- /.table-responsive -->
                    <!-- .pagination -->
                </div><!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
