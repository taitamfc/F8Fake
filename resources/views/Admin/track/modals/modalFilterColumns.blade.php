<!-- #modalFilterColumns -->
<div class="modal fade" id="modalFilterColumns" tabindex="-1" role="dialog" aria-labelledby="modalFilterColumnsLabel"
    aria-hidden="true">
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
                            <label class="">Tiêu đề</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="filter[title]"
                                    class="form-control filter-column f-name"
                                    value=" {{ isset($filter['title']) ? $filter['title'] : '' }} " id="title" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Miễn phí</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="boolean" name="filter[is_free]"
                                    class="form-control filter-column f-name"
                                    value=" {{ isset($filter['is_free']) ? $filter['is_free'] : '' }}"
                                    id="is_free" /></div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Chức vụ</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="filter[position]"
                                    class="form-control filter-column f-name"
                                    value=" {{ isset($filter['position']) ? $filter['position'] : '' }} " id="position" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Khóa học</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="number" name="filter[course_id]"
                                    class="form-control filter-column f-name"
                                    value=" {{ isset($filter['course_id']) ? $filter['course_id'] : '' }} " id="course_id" />
                            </div>
                        </div>
                    </div>
                </div><!-- #filter-columns -->
                <!-- .btn -->
            </div><!-- /.modal-body -->
            <!-- .modal-footer -->
            <div class="modal-footer justify-content-start">
                <button type="submit" class="btn btn-primary" id="apply-filter">Áp dụng</button>
                <a href="{{ route('step.index') }}" class="btn btn-dark ">Đặt lại</a>
                <button type="button" data-dismiss="modal" class="btn btn-secondary ml-auto"
                    id="clear-filter">Hủy</button>
            </div><!-- /.modal-footer -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /#modalFilterColumns -->
