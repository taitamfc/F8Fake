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
                            <div class="input text"><input type="string" name="filter[title]"
                                    class="form-control filter-column f-name"
                                    value=" {{ isset($filter['title']) ? $filter['title'] : '' }} " id="title" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Nội dung</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="filter[content]"
                                    class="form-control filter-column f-name"
                                    value=" {{ isset($filter['content']) ? $filter['content'] : '' }}"
                                    id="content" /></div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Mô tả</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="filter[description]"
                                    class="form-control filter-column f-name"
                                    value=" {{ isset($filter['description']) ? $filter['description'] : '' }} " id="description" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Thời gian</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="datetime-local" name="filter[duration]"
                                    class="form-control filter-column f-name"
                                    value=" {{ isset($filter['duration']) ? $filter['duration'] : '' }} " id="duration" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Loại video</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="string" name="filter[video_type]"
                                    class="form-control filter-column f-name"
                                    value=" {{ isset($filter['video_type']) ? $filter['video_type'] : '' }} " id="video_type" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Tên chính</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="string" name="filter[original_name]"
                                    class="form-control filter-column f-name"
                                    value=" {{ isset($filter['original_name']) ? $filter['original_name'] : '' }} " id="original_name" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Hình ảnh</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="file" name="filter[image]"
                                    class="form-control filter-column f-name"
                                    value=" {{ isset($filter['image']) ? $filter['image'] : '' }} " id="image" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Video</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="file" name="filter[video]"
                                    class="form-control filter-column f-name"
                                    value=" {{ isset($filter['video']) ? $filter['video'] : '' }} " id="video" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Liên kết ảnh</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="filter[image_url]"
                                    class="form-control filter-column f-name"
                                    value=" {{ isset($filter['image_url']) ? $filter['image_url'] : '' }} " id="image_url" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Liên kết video</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="filter[video_url]"
                                    class="form-control filter-column f-name"
                                    value=" {{ isset($filter['video_url']) ? $filter['video_url'] : '' }} " id="video_url" />
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
