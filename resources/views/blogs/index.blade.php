@extends('Admin.master')
@section('content')
    <div class="page-inner">
        <!-- .page-title-bar -->
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Forms</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title"> Blog </h1>
        </header><!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <div class="card-deck-xl">
                <div class="card card-fluid">
                    <!-- .card-body -->
                    <div class="card-body">
                        <h4 class="card-title"> Flatpickr </h4>
                        <h6 class="card-subtitle mb-4"> Lightweight and powerful datetimepicker with no dependencies. </h6>
                        <!-- form -->
                        <form >
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr01">Basic</label> <input id="flatpickr01"
                                    type="text" class="form-control" data-toggle="flatpickr">
                            </div><!-- /.form-group -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr02">DateTime</label> <input id="flatpickr02"
                                    type="text" class="form-control" data-toggle="flatpickr" data-enable-time="true"
                                    data-date-format="Y-m-d H:i">
                            </div><!-- /.form-group -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr03">Human-friendly Dates</label> <input
                                    id="flatpickr03" type="text" class="form-control" data-toggle="flatpickr"
                                    data-alt-input="true" data-alt-format="F j, Y" data-date-format="Y-m-d">
                            </div><!-- /.form-group -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr04">minDate and maxDate</label> <input
                                    id="flatpickr04" type="text" class="form-control" data-toggle="flatpickr"
                                    data-default-date="2019-11-01" data-min-date="2019-11-03" data-max-date="2019-11-25">
                                <small class="form-text text-muted">14 days from now</small>
                            </div><!-- /.form-group -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr05">Disabling dates</label> <input
                                    id="flatpickr05" type="text" class="form-control" data-toggle="flatpickr"
                                    data-default-date="2019-11-01"
                                    data-disables='[ { "from": "2019-11-03", "to": "2019-11-03" }, { "from": "2019-11-20", "to": "2019-11-25" } ]'
                                    data-date-format="Y-m-d">
                            </div><!-- /.form-group -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr06">Selecting multiple dates</label> <input
                                    id="flatpickr06" type="text" class="form-control" data-toggle="flatpickr"
                                    data-mode="multiple" data-default-date='["2019-03-03", "2019-03-20"]'
                                    data-date-format="Y-m-d">
                            </div><!-- /.form-group -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr07">Range Calendar</label> <input
                                    id="flatpickr07" type="text" class="form-control" data-toggle="flatpickr"
                                    data-mode="range" data-date-format="Y-m-d"
                                    data-default-dates='["2019-03-03", "2019-03-20"]'>
                            </div><!-- /.form-group -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr08">Time Picker</label> <input id="flatpickr08"
                                    type="text" class="form-control" data-toggle="flatpickr" data-enable-time="true"
                                    data-no-calendar="true" data-date-format="H:i" data-default-date="13:45">
                            </div><!-- /.form-group -->
                            <!-- .form-group -->
                            <div class="form-group">
                                <label class="control-label" for="flatpickr-wrap">Wrap element</label>
                                <div class="input-group input-group-alt flatpickr" id="flatpickr9" data-toggle="flatpickr"
                                    data-wrap="true" data-alt-input="true" data-alt-format="F j, Y"
                                    data-alt-input-class="form-control" data-date-format="Y-m-d" value="2019-11-04"
                                    placeholder="DD/MM/YYYY">
                                    <input id="flatpickr-wrap" type="text" class="form-control" data-input="">
                                    <div class="input-group-append">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="flatpickr11">Month Select</label> <input
                                    id="flatpickr11" type="text" class="form-control" data-toggle="flatpickr"
                                    data-monthselect="true">
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                {{-- <label class="control-label" for="flatpickr11">Month Select</label> --}}
                               <input type="submid" value="thêm " class="btn btn-success">
                            </div>
                        </form><!-- /form -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-deck-xl -->
        @endsection
15 h 31
{{-- @extends('Admin.master')
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
      <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> <!-- /floating action -->
      <!-- title and toolbar -->
      <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto"> Basic Table </h1><!-- .btn-toolbar -->
        <div class="btn-toolbar">
          <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-download"></i> <span class="ml-1">Export</span></button> <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-upload"></i> <span class="ml-1">Import</span></button>
          <div class="dropdown">
            <button type="button" class="btn btn-light" data-toggle="dropdown"><span>More</span> <span class="fa fa-caret-down"></span></button>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-arrow"></div><a href="#" class="dropdown-item">Add tasks</a> <a href="#" class="dropdown-item">Invite members</a>
              <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Share</a> <a href="#" class="dropdown-item">Archive</a> <a href="#" class="dropdown-item">Remove</a>
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
          <Button class="btn btn-primary btn" style="color: red">Thêm Level</Button>
          <table class="table table-hover">
            <!-- thead -->
            <thead class="thead-">
              <tr>
                <th style="min-width:200px"> Product </th>
                <th> Variants </th>
                <th> Prices </th>
              </tr>
            </thead><!-- /thead -->
            <!-- tbody -->
            <tbody>
              <!-- tr -->
              <tr>
                <td> Wine - Chateau Bonnet </td>
                <td> 113 </td>
                <td> $22.38 </td>
              </tr><!-- /tr -->
              <!-- tr -->
              <tr>
                <td> Cookie - Oatmeal </td>
                <td> 216 </td>
                <td> $21.90 </td>
              </tr><!-- /tr -->
              <!-- tr -->
              <tr>
                <td> True - Vue Containers </td>
                <td> 191 </td>
                <td> $24.96 </td>
              </tr><!-- /tr -->
              <!-- tr -->
              <tr>
                <td> Nut - Pumpkin Seeds </td>
                <td> 329 </td>
                <td> $32.21 </td>
              </tr><!-- /tr -->
              <!-- tr -->
              <tr>
                <td> Artichoke - Bottom, Canned </td>
                <td> 375 </td>
                <td> $27.75 </td>
              </tr><!-- /tr -->
            </tbody><!-- /tbody -->
          </table>
        </div><!-- /.card-body -->
      </div><!-- /.card -->

@endsection --}}
