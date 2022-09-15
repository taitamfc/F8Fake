@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{route('tracksteps.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang danh sách</a>
                </li>
            </ol>
        </nav>
        <header class="page-title-bar">
            <h1 class="page-title">Sửa TrackStep </h1>
        </header>
        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">
                    <div class="card-body">
                        <form action="{{ route('tracksteps.update', $tracksteps->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Track</label> 
                                <select name="track_id" class="form-select" id="inputGroupSelect02">
                                    @foreach ($tracks as $track)
                                        <option value="{{ $track->id }}">{{ $track->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('track_id') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Thể Loại</label> <input id="flatpickr01"
                                    type="text" class="form-control" value="{{$tracksteps->step_type}}" name="step_type" data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('step_type') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Step</label> 
                                <select name="step_id" class="form-select" id="inputGroupSelect02">
                                    @foreach ($steps as $step)
                                        <option value="{{ $step->id }}">{{ $step->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('step_id') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Chức Vụ</label> <input id="flatpickr01"
                                    type="text" class="form-control" value="{{$tracksteps->position}}" name="position" data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('position') }}</p>
                            @endif
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Công Khai</label> 
                                <input id="flatpickr01"
                                    type="text" class="form-control" value="{{$tracksteps->is_published}}" name="is_published" data-toggle="flatpickr">
                            </div>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('is_published') }}</p>
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection