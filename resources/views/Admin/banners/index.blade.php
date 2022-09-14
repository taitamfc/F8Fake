@extends('Admin.master')
@section('content')
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
            <h1 class="page-title mr-sm-auto">Quản Lý Khách Hàng</h1>
            <div class="btn-toolbar">
                {{-- @if (Auth::user()->hasPermission('Banner_create')) --}}
                <a href="{{ route('banners.create') }}" class="btn btn-primary mr-2">
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
                        <a class="nav-link active " href="{{ route('banners.index') }}">Tất Cả</a>
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
                                    <button class="btn btn-secondary" type="submit" data-toggle="modal" data-target="#modalSaveSearch"
                                       >Tìm kiếm</button>
                                </div>
                            </div>
                            <!-- modalFilterColumns  -->
                            @include('admin.banners.modals.modalFilterColumns')
                        </form>

                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Vị trí </th>
                                <th> loại </th>
                                <th> Ảnh bìa </th>
                                <th> Tiêu đề </th>
                                <th> Mô tả </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $banner)
                                <tr>
                                    <td class="align-middle"> {{ $banner->id }} </td>
                                    <td class="align-middle"> {{ $banner->placement }} </td>
                                    <td class="align-middle"> {{ $banner->type }} </td>
                                    <td>
                                        <img style="width:80px; height:80px" src="{{ asset($banner->banner) }}">
                                    </td>
                                    <td class="align-middle"> {{ $banner->title }} </td>
                                    <td class="align-middle"> {{ $banner->description }} </td>
                                    <td>
                                        <a href="{{ route('banners.edit', $banner->id) }}"
                                            class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i></a>
                                        <form action="{{ route('banners.destroy', $banner->id) }}" style="display:inline"
                                            method="post">
                                            <button onclick="return confirm('Xóa {{ $banner->name }} ?')"
                                                class="btn btn-sm btn-icon btn-secondary"><i
                                                    class="far fa-trash-alt"></i></button>
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr><!-- /tr -->
                            @endforeach
                        </tbody><!-- /tbody -->
                    </table><!-- /.table -->
                    {{ $banners->onEachSide(5)->links() }}

                </div>
            </div>
            <!-- /.table-responsive -->
            <!-- .pagination -->
        </div><!-- /.card-body -->
    </div>
    </div>
@endsection