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
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto">Quản Lý Học viên</h1>
                <div class="btn-toolbar">
                    <a href="{{ route('students.create') }}" class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-plus"></i>
                        <span class="ml-1">Thêm Mới</span>
                    </a>
                    <a href="" class="btn btn-primary">
                        <i class="fas fa-file"></i>
                        <span class="ml-1">Xuất file excel</span>
                    </a>
                </div>
            </div>
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ Session::get('success') }}
                </p>
            @endif
        </header>
        <div class="page-section">
            <div class="card card-fluid">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active " href="{{ route('students.index') }}">Tất Cả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Thùng Rác</a>
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
                                        <input type="text" class="form-control" name="key" value="{{$f_key}}"
                                            placeholder="Tìm nhanh theo cú pháp (ma:Mã kết quả hoặc ten:Tên kết quả)">
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch"
                                            type="submit">Tìm kiếm</button>
                                    </div>
                                </div>
                                @include('Admin.students.modals.modalFilterColumns')
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-">
                                <tr>
                                    <th> # </th>
                                    <th> Ảnh </th>
                                    <th> Tên </th>
                                    <th> Email </th>
                                    {{-- <th> Password </th> --}}
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $key => $student)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>
                                            <div class="rounded-circle ">
                                                <img class=" image_photo rounded-circle "
                                                    src="{{ !empty($student->image) ? asset($student->image) : asset('assets/images/no_image.png') }}"style="width:60px; height:60px">
                                            </div>
                                        </td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        {{-- <td>{{ $student->password }}</td> --}}
                                        <td>
                                            <a href="{{ route('students.edit', $student->id) }}"
                                                class="btn btn-sm btn-icon btn-secondary"><i
                                                    class="fa fa-pencil-alt"></i></a>
                                            <form action="{{ route('students.destroy', $student->id) }}"
                                                style="display:inline" method="post">
                                                <button onclick="return confirm('Bạn chắc chắn muốn xóa? ?')"
                                                    class="btn btn-sm btn-icon btn-secondary"><i
                                                        class="far fa-trash-alt"></i></button>
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $students->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
