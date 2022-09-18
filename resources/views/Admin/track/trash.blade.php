@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
                    </li>
                </ol>
            </nav>
            <a href="{{ route('track.index') }}" class="btn btn-success btn-floated"></a>
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto">Thùng Rác</h1>
            </div>
        </header>
        <div class="page-section">
            <div class="card card-fluid">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('track.index') }}">Tất Cả</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="form-group">
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
                                    <input type="text" class="form-control" name="key" value=""
                                        placeholder="Tìm nhanh theo cú pháp (ma:Mã kết quả hoặc ten:Tên kết quả)">
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch"
                                        type="submit">Tìm kiếm</button>
                                </div>
                            </div>
                            <!-- modalFilterColumns  -->
                            @include('Admin.track.modals.modalFilterColumns')
                            @if (Session::has('success'))
                                <p class="text-success">
                                <div class="alert alert-success"> <i class="fa fa-check" aria-hidden="true"></i>
                                    {{ Session::get('success') }}</div>
                                </p>
                            @endif
                            @if (Session::has('failed'))
                                <p class="text-danger">
                                <div class="alert alert-danger"> <i class="bi bi-x-circle" aria-hidden="true"></i>
                                    {{ Session::get('failed') }}</div>
                                </p>
                            @endif
                        </form>
                    </div>
                    <table class="table table-hover">
                        <!-- thead -->
                        <thead class="thead-">
                            <tr>
                                <th width="50px"> # </th>
                                <th width="100px"> Nội dung </th>
                                <th width="50px"> Chức năng </th>
                            </tr>
                        </thead><!-- /thead -->
                        <tbody>
                            <tr>
                                @foreach ($tracks as $track)
                            <tr>
                                <th scope="row"> {{ $track->id }} </th>
                                <td> {{ $track->title }} </td>
                                <td>

                                    <form action="{{ route('tracks.force_destroy', $track->id) }}" style="display:inline"
                                        method="post">
                                        <button onclick="return confirm('Bạn muốn xóa vĩnh viễn {{ $track->title }} ?')"
                                            class="btn btn-sm btn-icon btn-secondary"><i
                                                class="far fa-trash-alt"></i></button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <span class="sr-only">Edit</span></a> <a
                                        href="{{ route('tracks.restore', $track->id) }}"
                                        class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-trash-restore"></i> <span
                                            class="sr-only">Remove</span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
        {{-- <nav aria-label="Page navigation example">
            <div class='float:right'>
                <ul class="pagination">
                    <span aria-hidden="true"></span>
                </ul>
            </div>
        </nav> --}}
        {{-- {!! $tracks->links() !!} --}}
    @endsection
