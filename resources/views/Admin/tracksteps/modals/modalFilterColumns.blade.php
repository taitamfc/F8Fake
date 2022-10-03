<!-- #modalFilterColumns -->
<div class="modal fade" id="modalFilterColumns" tabindex="-1" role="dialog" aria-labelledby="modalFilterColumnsLabel"
    aria-hidden="true">
    <!-- .modal-dialog -->
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <!-- .modal-content -->
        <div class="modal-content" style="height: fit-content;">
            <!-- .modal-header -->
            <div class="modal-header">
                <h5 class="modal-title" id="modalFilterColumnsLabel"> Lọc nâng cao </h5>
            </div><!-- /.modal-header -->
            <!-- .modal-body -->
            <div class="modal-body">
                <!-- #filter-columns -->
                <div id="filter-columns">
                    <!-- .form-row -->
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">ID</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="id"
                                    class="form-control filter-column f-name"
                                    value=" {{$f_id }} "  />
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Tên Chương Học</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text">
                                    <select name="track_id" id="" class="form-control filter-column f-name">
                                        <option value="">vui lòng chọn</option>
                                        @foreach ($tracks as $track)
                                            <option value="{{$track->id }} "{{$track->id==$f_track_id ?'selected':''}}>{{$track->title}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Tên Lộ Trình</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text">
                                <select name="step_id" id="" class="form-control filter-column f-name">
                                    <option value="">vui lòng chọn</option>
                                    @foreach ($steps as $step)
                                        <option value="{{$step->id }} "{{$step->id==$f_step_id ?'selected':''}}>{{$step->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Tên Thể Loại</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="step_type"
                                    class="form-control filter-column f-name"
                                    value=" {{$f_step_type }} " id="name" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Vị Trí  </label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="position"
                                    class="form-control filter-column f-name"
                                    value=" {{ $f_position}}"
                                    id="address" /></div>
                        </div>
                    </div>
                </div><!-- #filter-columns -->
                <!-- .btn -->
            </div><!-- /.modal-body -->
            <!-- .modal-footer -->
            <div class="modal-footer justify-content-start">
                <button type="submit" class="btn btn-primary" id="apply-filter">Áp dụng</button>
                <a href="{{ route('tracksteps.index') }}" class="btn btn-dark ">Đặt lại</a>
                <button type="button" data-dismiss="modal" class="btn btn-secondary ml-auto"
                    id="clear-filter">Hủy</button>
            </div><!-- /.modal-footer -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /#modalFilterColumns -->
