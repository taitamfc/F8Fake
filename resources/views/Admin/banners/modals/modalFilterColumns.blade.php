<div class="modal fade" id="modalFilterColumns" tabindex="-1" role="dialog" aria-labelledby="modalFilterColumnsLabel" aria-hidden="true">
    <!-- .modal-dialog -->
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <!-- .modal-content -->
        <div class="modal-content">
            <!-- .modal-header -->
            <div class="modal-header">
                <h5 class="modal-title" id="modalFilterColumnsLabel"> Lọc nâng cao </h5>
            </div><!-- /.modal-header -->
            <!-- .modal-body -->
            <div class="modal-body">
                <!-- #filter-columns -->
                <div id="filter-columns">
                    <!-- .form-row -->
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Tên khách hàng</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="filter[name]" class="form-control filter-column f-name" value=" {{ (isset($filter['name']) ? $filter['name'] : '') }} " id="name" /></div>
                        </div>
                    </div>

                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Địa chỉ</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="filter[address]" class="form-control filter-column f-name" value=" {{ (isset( $filter['address']) ? $filter['address'] : '')}}" id="address" /></div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Số điện thoại</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="filter[phone]" class="form-control filter-column f-name" value=" {{  (isset($filter['phone']) ? $filter['phone'] : '') }} " id="phone" /></div>
                        </div>
                    </div>
                </div><!-- #filter-columns -->
                <!-- .btn -->
            </div><!-- /.modal-body -->
            <!-- .modal-footer -->
            <div class="modal-footer justify-content-start">
            <button type="submit" class="btn btn-primary" id="apply-filter">Áp dụng</button>
                <a href="{{ route('banners.index') }}" class="btn btn-dark " >Đặt lại</a>
                <button type="button" data-dismiss="modal"  class="btn btn-secondary ml-auto" id="clear-filter">Hủy</button>
            </div><!-- /.modal-footer -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>