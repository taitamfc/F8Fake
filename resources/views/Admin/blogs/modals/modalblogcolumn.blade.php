<!-- #modalFilterColumns -->
<div class="modal fade" id="modalFilterColumns" tabindex="-1" role="dialog" aria-labelledby="modalFilterColumnsLabel"
    aria-hidden="true">
    <!-- .modal-dialog -->
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <!-- .modal-content -->
        <div class="modal-content" style="height: fit-content" >
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
                            <label class="">tiêu đề</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="title"
                                    class="form-control filter-column f-name"
                                    value=" {{$f_title }} " id="name" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class=""> người đăng</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="user_id" id="" class="form-control">
                                @foreach ($blogs as $blog )
                                    <option value="{{$f_user_id}}">{{$blog->user->username}}</option>
                                @endforeach

                               </select>
                    </div>

                </div><!-- #filter-columns -->
                <!-- .btn -->
            </div><!-- /.modal-body -->
            <!-- .modal-footer -->
            <div class="modal-footer justify-content-start">
                <button type="submit" class="btn btn-primary" id="apply-filter">Áp dụng</button>
                <a href="{{ route('blogs.index') }}" class="btn btn-dark ">Đặt lại</a>
                <button type="button" data-dismiss="modal" class="btn btn-secondary ml-auto"
                    id="clear-filter">Hủy</button>
            </div><!-- /.modal-footer -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /#modalFilterColumns -->
