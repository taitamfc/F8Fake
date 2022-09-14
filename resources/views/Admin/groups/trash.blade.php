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
            <h1 class="page-title mr-sm-auto">Quản Lý Chi Nhánh - Thùng Rác</h1>
        </div>
    </header>
    <div class="page-section">
        <div class="card card-fluid">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link  " href="{{ route('groups.index') }}">Tất Cả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('groups.trash') }}">Thùng Rác</a>
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
                                    <input type="text" class="form-control" name="query" value=""
                                        placeholder="Tìm nhanh theo cú pháp (ma:Mã kết quả hoặc ten:Tên kết quả)">
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch"
                                        type="button">Lưu bộ lọc</button>
                                </div>
                            </div>
                            <!-- modalFilterColumns  -->
                            @include('Admin.groups.modals.modalFilterColumns')
                        </form>
                        <!-- modalFilterColumns  -->
                        {{-- @include('Admin.groups.modals.modalSaveSearch') --}}
                    </div>
                </div>
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ session::get('success') }}</div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ session::get('error') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Tên </th>
                                <th> Mô Tả </th>
                                <th> Hành Động </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($branches as $branch)
                                <tr>
                                    <td class="align-middle"> {{ $branch->id }} </td>
                                    <td class="align-middle"> {{ $branch->name }} </td>
                                    <td class="align-middle"> {{ $branch->ward->name }} </td>

                                    <td>
                                        @if (Auth::user()->hasPermission('Branch_forceDelete'))
                                            <form action="{{ route('branches.force_destroy', $branch->id) }}"
                                                style="display:inline" method="post">
                                                <button onclick="return confirm('Xóa vĩnh viễn {{ $branch->name }} ?')"
                                                    class="btn btn-sm btn-icon btn-secondary"><i
                                                        class="far fa-trash-alt"></i></button>
                                                @csrf
                                                @method('delete')
                                            </form>
                                        @endif

                                        @if (Auth::user()->hasPermission('Branch_restore'))
                                            <span class="sr-only">Edit</span></a> <a
                                                href="{{ route('branches.restore', $branch->id) }}"
                                                class="btn btn-sm btn-icon btn-secondary"><i
                                                    class="fa fa-trash-restore"></i> <span class="sr-only">Remove</span></a>
                                        @endif
                                    </td>
                                </tr><!-- /tr -->
                            @endforeach
                        </tbody><!-- /tbody -->
                    </table><!-- /.table -->
                    <div style="float:right">
                        {{ $branches->links() }}
                    </div>
                </div>
                <!-- /.table-responsive -->
                <!-- .pagination -->
            </div><!-- /.card-body -->
        </div>
    </div>
@endsection
