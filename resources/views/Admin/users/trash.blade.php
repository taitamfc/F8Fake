@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <!-- .page-title-bar -->
        <header class="page-title-bar">
            <!-- .breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang chủ</a>
                    </li>
                </ol>
            </nav><!-- /.breadcrumb -->
            <!-- floating action -->
            <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button>
            <!-- /floating action -->
            <!-- title and toolbar -->
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto"> Danh sách các mục đã xóa </h1><!-- .btn-toolbar -->
            </div><!-- /title and toolbar -->
        </header><!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">
                <!-- .card-header -->
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('users.index') }}">Tất Cả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"
                                href="
                            {{ route('users.trash') }}
                            ">Thùng
                                Rác</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <!-- .card-body -->
                <div class="card-body">
                    <!-- .form-group -->
                    <div class="form-group">
                        <!-- .input-group -->
                        <!-- /.input-group -->
                        <form action="" method="GET" id="form-search">
                            @csrf
                            <div class="input-group input-group-alt">
                                <div class="input-group-prepend">
                                    <button class="btn btn-secondary" type="button" data-toggle="modal"
                                        data-target="#modalFilterColumns">Tìm nâng cao</button>

                                </div>
                                <div class="input-group has-clearable">
                                    <button type="button" class="close trigger-submit trigger-submit-delay"
                                        aria-label="Close">
                                        <span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
                                    </button>
                                    <div class="input-group-prepend trigger-submit">
                                        <span class="input-group-text"><span class="fas fa-search"></span></span>
                                    </div>
                                    <input type="text" class="form-control" name="key" value="{{ $f_key }}"
                                        placeholder="Tìm nhanh theo cú pháp (ma:Mã kết quả hoặc ten:Tên kết quả)">
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch"
                                        type="submit">Tìm kiếm</button>
                                </div>
                            </div>
                            <!-- modalFilterColumns  -->
                            @include('Admin.users.modals.modalFilterColumns')
                            @if (!count($users))
                                <p class="text-success">
                                <div class="alert alert-danger"> <i class="bi bi-x-circle"aria-hidden="true"></i>
                                    không tìm thấy kết quả.
                                </div>
                                </p>
                            @endif
                            @if (Session::has('success'))
                                <p class="text-success">
                                <div class="alert alert-success"> <i class="fa fa-check" aria-hidden="true"></i>
                                    {{ Session::get('success') }}</div>
                                </p>
                            @endif
                            @if (Session::has('error'))
                                <p class="text-danger">
                                <div class="alert alert-danger"> <i class="bi bi-x-circle"aria-hidden="true"></i>
                                    {{ Session::get('error') }}</div>
                                </p>
                            @endif
                        </form>
                    </div><!-- /.form-group -->

                    <table class="table table-hover">
                        <!-- thead -->
                        <thead class="thead-">
                            <tr>
                                <th style="min-width:50px"> #</th>
                                <th> Ảnh Đại Diện </th>
                                <th> Tên Sinh Viên </th>
                                <th> Email </th>
                                <th> Tùy Chọn </th>
                            </tr>
                        </thead><!-- /thead -->
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>
                                        <img class=" image_photo rounded-circle" src="{{ asset($user->avatar) }}"
                                            style="width:75px;height:75px">
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-2">
                                                    @can('restore', App\Models\User::class)
                                                    <form action="{{ route('users.RestoreDelete', $user->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-sm btn-icon btn-secondary"><i
                                                                class="bi bi-arrow-counterclockwise"></i></button>
                                                    </form>
                                                    @endcan
                                                </div>
                                                <div class="col-2">
                                                    @can('delete', App\Models\User::class)
                                                    <form action="{{ route('users.destroy', $user->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-icon btn-secondary"
                                                            onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i
                                                                class="far fa-trash-alt"></i></button>
                                                    </form>
                                                    @endcan
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody><!-- /tbody -->
                    </table>
                    {{ $users->onEachSide(5)->links() }}
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /.card -->
    </div><!-- /.card -->
@endsection
