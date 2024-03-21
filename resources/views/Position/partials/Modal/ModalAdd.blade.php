<div id="modalAdd" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm vị trí</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="custom-validation" action="#">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Vị trí/Chức danh *</label>
                                <input type="text" class="form-control" required
                                    placeholder="Nhập vị trí chức danh*" />
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Mã vị trí *</label>
                                <input type="text" class="form-control" required placeholder="Nhập mã vị trí*" />
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Đơn vị công tác *</label>
                                <select class="form-control select2" id="form-select">
                                    <option disabled selected>Chọn đơn vị công tác</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Cấp nhân sự *</label>
                                <select class="form-control select2" id="form-select">
                                    <option disabled selected>Chọn cấp nhân sự</option>
                                    <option value="Công nhân viên">Công nhân viên</option>
                                    <option value="Chuyên viên / Kĩ thuật">Chuyên viên / Kĩ thuật</option>
                                    <option value="Trưởng nhóm / Tổ trưởng">Trưởng nhóm / Tổ trưởng</option>
                                    <option value="Trưởng phòng / Đội trường">Trưởng phòng / Đội trường</option>
                                    <option value="Trưởng ban / Quản đốc">Trưởng ban / Quản đốc</option>
                                    <option value="Giám đốc">Giám đốc</option>
                                    <option value="Lãnh đạo">Lãnh đạo</option>
                                    <option value="Giám sát">Giám sát</option>
                                    <option value="Quản lý cấp cáo">Quản lý cấp cáo</option>
                                    <option value="Quản lý cấp trung">Quản lý cấp trung</option>
                                    <option value="Lao động phổ thông">Lao động phổ thông</option>
                                    <option value="Cộng tác">Cộng tác</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Mô tả công việc</label>
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
