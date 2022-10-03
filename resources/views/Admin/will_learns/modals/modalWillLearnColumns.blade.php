<!-- #modalFilterColumns -->
<div class="modal fade" style="height: fit-content;" id="modalFilterColumns" tabindex="-1" role="dialog"
    aria-labelledby="modalFilterColumnsLabel" aria-hidden="true">
    <!-- .modal-dialog -->
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <!-- .modal-content -->
        <div class="modal-content">
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
                            <label class="">Tên cấp độ</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="content"
                                    class="form-control filter-column f-name" value="{{ $f_content }}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Mã</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="id"
                                    class="form-control filter-column f-name" value="{{ $f_id }}" /></div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Khóa học:</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text">
                                {{-- <input type="text" name="course_id" class="form-control filter-column f-name"
                                    id="course_id" value="{{ $f_course_id }}" /> --}}
                                <select name="course_id" id=""class="form-control filter-column f-name">
                                    <option value="">--chọn tên khóa học--</option>
                                    @foreach ($f_courses as $course)
                                        <option
                                            value="{{ $course->id }}"{{ $course->id == $f_course_id ? 'selected' : '' }}>
                                            {{ $course->certificate_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div><!-- #filter-columns -->
                <!-- .btn -->
            </div><!-- /.modal-body -->
            <!-- .modal-footer -->
            <div class="modal-footer justify-content-start">
                <button type="submit" class="btn btn-primary" id="apply-filter">Áp dụng</button>
                <a href="{{ route('levels.index') }}" class="btn btn-dark ">Đặt lại</a>
                <button type="button" data-dismiss="modal" class="btn btn-secondary ml-auto"
                    id="clear-filter">Hủy</button>
            </div><!-- /.modal-footer -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /#modalFilterColumns -->
