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
                <h1 class="page-title mr-sm-auto"> Danh sách các bài học </h1>
                <div class="btn-toolbar">
                    <a href="{{ route('WillLearns.create') }}" class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-plus"></i>
                        <span class="ml-1">Thêm Mới</span>
                    </a>
                    <a href="{{ route('levels.export-WillLearns') }}" class="btn btn-primary">
                        <i class="fas fa-file"></i>
                        <span class="ml-1">Xuất file excel</span>
                    </a>
                </div><!-- /.btn-toolbar -->
            </div>

            <!-- /title and toolbar -->
        </header><!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">
                <!-- .card-header -->
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active " href="{{ route('WillLearns.index') }}">Tất Cả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('WillLearns.trash') }}">Thùng Rác</a>
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
                            <!-- .nav-tabs -->
                            <div class="input-group input-group-alt">
                                <!-- .input-group-prepend -->
                                <div class="input-group-prepend">
                                    <button class="btn btn-secondary" type="button" data-toggle="modal"
                                        data-target="#modalFilterColumns">Tìm nâng cao</button>
                                </div><!-- /.input-group-prepend -->
                                <div class="input-group">
                                    <div class="input-group-prepend">

                                        <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                                    </div><input type="text" class="form-control" name="key"
                                        value="{{ $f_key }}"
                                        placeholder="Tìm nhanh theo cú pháp (ma:Mã kết quả hoặc ten:Tên kết quả)">
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch"
                                        type="submit">Tìm kiếm</button>
                                </div>
                            </div><!-- /.input-group -->
                    </div>
                    @include('Admin.WillLearns.modals.modalWillLearnColumns')
                    @if (!count($WillLearns))
                        <p class="text-success">
                        <div class="alert alert-success"> <i class="fa fa-check" aria-hidden="true"></i>
                            không tìm thấy.
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
                        <div class="alert alert-danger"> <i class="fa fa-check" aria-hidden="true"></i>
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
                            <th >Khóa học</th>
                            <th> nội dung </th>
                            <th> Tùy chọn</th>
                        </tr>
                    </thead><!-- /thead -->
                    <tbody id="addRow" class="addRow">
                        @foreach ($WillLearns as $key => $WillLearn)
                            <tr class="item-{{ $WillLearn->id }}">
                                <th scope="row">{{ $WillLearn->id }}</th>
                                <th scope="row">{{ $WillLearn->course->title }}</th>
                                <td>{{ $WillLearn->content }}</td>

                                <td>
                                    <form action="{{ route('WillLearns.SoftDeletes', $WillLearn->id) }}" method="post">
                                        <a href="{{ route('WillLearns.edit', $WillLearn->id) }}"
                                            class="btn btn-sm btn-icon btn-secondary"><i
                                                class="fa fa-pencil-alt"></i></a>
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-icon btn-secondary"
                                            onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i
                                                class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="float:right">
                    {{ $WillLearns->links() }}
                </div>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    @endsection
