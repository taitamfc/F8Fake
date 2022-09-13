@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <!-- .page-title-bar -->
        <header class="page-title-bar">
            <!-- .breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Tables</a>
                    </li>
                </ol>
            </nav><!-- /.breadcrumb -->
            <!-- floating action -->
            <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button>
            <!-- /floating action -->
            <!-- title and toolbar -->
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto"> Danh sách Học viên </h1><!-- .btn-toolbar -->
                <div class="btn-toolbar">
                    <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-download"></i> <span
                            class="ml-1">Export</span></button> <button type="button" class="btn btn-light"><i
                            class="oi oi-data-transfer-upload"></i> <span class="ml-1">Import</span></button>
                    <div class="dropdown">
                        <button type="button" class="btn btn-light" data-toggle="dropdown"><span>More</span> <span
                                class="fa fa-caret-down"></span></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-arrow"></div><a href="#" class="dropdown-item">Add tasks</a> <a
                                href="#" class="dropdown-item">Invite members</a>
                            <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Share</a> <a
                                href="#" class="dropdown-item">Archive</a> <a href="#"
                                class="dropdown-item">Remove</a>
                        </div>
                    </div>
                </div><!-- /.btn-toolbar -->
            </div><!-- /title and toolbar -->
        </header><!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">
                <!-- .card-header -->
                <div class="card-header">
                    <!-- .nav-tabs -->
                    <div class="input-group input-group-alt">
                        <!-- .input-group-prepend -->
                        <div class="input-group-prepend">
                            <select class="custom-select">
                                <option selected> Filter By </option>
                                <option value="1"> Tags </option>
                                <option value="2"> Vendor </option>
                                <option value="3"> Variants </option>
                                <option value="4"> Prices </option>
                                <option value="5"> Sales </option>
                            </select>
                        </div><!-- /.input-group-prepend -->
                        <!-- .input-group -->
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                            </div><input type="text" class="form-control" placeholder="Search record">
                        </div><!-- /.input-group -->
                    </div>
                </div><!-- /.card-header -->
                <!-- .card-body -->
                <div class="card-body">
                    <!-- .form-group -->
                    <div class="form-group">
                        <!-- .input-group -->
                        <!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <a  href ="{{route('students.create')}}" class="btn btn-primary btn" style="color: red">Thêm </a>
                    <table class="table table-hover">
                        <!-- thead -->
                        <thead class="thead-">
                            <tr>
                                <th style="min-width:50px"> STT </th>
                                <th> Tên </th>
                                <th> Email </th>
                                <th> Password </th>
                                <th> Ảnh </th>
                                <th></th>
                            </tr>
                        </thead><!-- /thead -->
                        <!-- tbody -->
                        <tbody>
                            <!-- tr -->
                            @foreach ($students as $student)
                                <tr>
                                    <th scope="row">{{ $student->id }}</th>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->password }}</td>
                                    <td>
                                        @if ($student->image)
                                            <img src="{{ asset('AdminTheme/public/uploads/student/' . $student->image) }}" alt=""
                                                style="width: 80px; height: 80px">
                                        @else
                                            {{ 'Chưa có ảnh' }}
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{route('students.edit')}}" class="btn btn-primary"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <a href="" class="btn btn-danger"
                                            onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody><!-- /tbody -->
                    </table>
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        @endsection
