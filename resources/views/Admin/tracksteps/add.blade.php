@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('tracksteps.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang danh
                        sách</a>
                </li>
            </ol>
        </nav>
        <header class="page-title-bar">
            <h1 class="page-title">Thêm Group </h1>
        </header>
        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">
                    <div class="card-body">
                        <form action="{{ route('tracksteps.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Chương Học</label>
                                <select name="track_id" class="form-control " id="inputGroupSelect02">
                                    @foreach ($tracks as $track)
                                        <option value="{{ $track->id }}">{{ $track->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('track_id') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Thể Loại</label>
                                <input id="flatpickr01" type="text" class="form-control" value="{{ old('step_type') }}"
                                    name="step_type" data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('step_type') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Khóa Học</label>
                                <select name="step_id" class="form-control " id="inputGroupSelect02">
                                    @foreach ($steps as $step)
                                        <option value="{{ $step->id }}">{{ $step->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('step_id') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Chức Vụ</label>
                                <input id="flatpickr01" type="text" class="form-control" value="{{ old('position') }}"
                                    name="position" data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('position') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Công Khai</label>
                                <select name="is_published" class="form-control " id="inputGroupSelect02">
                                    <option value="{{ 1 }}">Có</option>
                                    <option value="{{ 2 }}">Không</option>
                                </select>
                                {{-- <input id="flatpickr01" type="text" class="form-control"
                                    value="{{ old('is_published') }}" name="is_published" data-toggle="flatpickr"> --}}
                            </div>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('is_published') }}</p>
                            @endif
                            <div class="form-actions">
                                <a class="btn btn-secondary float-right" href="{{route('tracksteps.index')}}">Hủy</a>
                                <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection
