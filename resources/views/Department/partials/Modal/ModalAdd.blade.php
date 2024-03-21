<div id="modalAdd" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm phòng ban</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="custom-validation" action="#">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tên đơn vị *</label>
                                <input type="text" class="form-control" required placeholder="Nhập tên đơn vị*" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Đơn vị cha</label>
                                <select class="form-control select2" id="form-select">
                                    <option disabled selected>Chọn đơn vị cha</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Mã đơn vị</label>
                                <input type="text" class="form-control" placeholder="Nhập mã đơn vị" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">STT vị trí</label>
                                <input type="text" class="form-control" placeholder="Nhập STT vị trí" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Địa bàn</label>
                                <select class="form-control select2" id="form-select">
                                    <option disabled selected>Chọn địa bàn</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Trưởng bộ phận</label>
                                <select class="form-control select2" id="form-select">
                                    <option disabled selected>Chọn trưởng bộ phận</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Chức năng, nhiệm vụ đơn vị</label>
                                <textarea class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
