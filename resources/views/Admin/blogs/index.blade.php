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
                <h1 class="page-title mr-sm-auto"> Danh sách blog  </h1><!-- .btn-toolbar -->
                <div class="btn-toolbar">
                    {{-- @if (Auth::user()->hasPermission('Customer_create')) --}}
                    <a href="{{route('blogs.create')}}"   class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-plus"></i>
                        <span class="ml-1">Thêm Mới</span>
                    </a>

                    <a href="" class="btn btn-primary">
                        <i class="fas fa-file"></i>
                        <span class="ml-1">Xuất file excel</span>
                    </a>
                    {{-- @endif --}}
                </div><!-- /.btn-toolbar -->
            </div>
            <!-- /title and toolbar -->
        </header><!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active " href="{{ route('blogs.index') }}">Tất Cả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('blogs.trash')}}">Thùng Rác</a>
                        </li>
                    </ul>
                </div>
                <!-- .card-header -->
                <div class="card-header">
                    <form action="" method="GET" id="form-search">
                        <!-- .nav-tabs -->
                        <div class="input-group input-group-alt">
                            <!-- .input-group-prepend -->
                            <div class="input-group-prepend">
                                <button class="btn btn-secondary" type="button" data-toggle="modal"
                                    data-target="#modalFilterColumns">Tìm nâng cao</button>
                            </div><!-- /.input-group-prepend -->

                            <!-- .input-group -->
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                                </div>
                                <input type="text" class="form-control" name="key" value="{{$f_key}}" placeholder="Tìm tiêu đề">
                            </div><!-- /.input-group -->
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit" data-toggle="modal" data-target="#modalSaveSearch" >Tìm kiếm</button>
                            </div>
                        </div>
                        @include('Admin.blogs.modals.modalblogcolumn')
                    </form>
                </div><!-- /.card-header -->
                @if (Session::has('success'))
                <div class="alert alert-success">{{session::get('success')}}</div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-success">{{session::get('error')}}</div>
                @endif
                <div class="card-body">

                    <div class="form-group">

                    </div><!-- /.form-group -->

                    <table class="table table-hover">
                   <!-- thead -->
                        <thead class="thead-">


                            <tr>

                                <th> # </th>
                                <th> Tiêu đề </th>
                                <th> Người đăng </th>
                                <th> Ngày đăng </th>
                                <th> Xuất bản</th>
                                <th> Thao tác</th>
                            </tr>
                        </thead><!-- /thead -->
                        <!-- tbody -->
                        <tbody>
                            <!-- tr -->
                            @foreach ($blogs as $blog)
                                <tr>
                                    <th scope="row">{{ $blog->id }}</th>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->user->username }}</td>
                                    <td>{{ $blog->published_at }}</td>
                                    <td>{!! $blog->is_published !!}</td>
                                    {{-- <td><img src="{{$blog->image}}" alt="" height="80px" width="100px" ></td>
                                    <td>{{ $blog->content }}</td> --}}
                                    <td>
                                        <form action="{{ route('blogs.SoftDeletes', $blog->id) }}" method="post">
                                            <a href="{{ route('blogs.edit', $blog->id) }}"
                                                class="btn btn-sm btn-icon btn-secondary"><i
                                                    class="fa fa-pencil-alt"></i></a>
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-sm btn-icon btn-secondary"
                                                onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody><!-- /tbody -->
                    </table>
                </div><!-- /.card-body -->
                {{$blogs->links()}}
            </div><!-- /.card -->
        @endsection
