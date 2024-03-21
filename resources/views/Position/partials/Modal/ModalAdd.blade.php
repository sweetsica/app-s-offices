<div id="modalAdd" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm vị trí</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="custom-validation" action="{{ route('position.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Vị trí/Chức danh *</label>
                                <input type="text" class="form-control" required
                                    placeholder="Nhập vị trí chức danh*" name="name"/>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Mã vị trí *</label>
                                <input type="text" class="form-control" required placeholder="Nhập mã vị trí*" name="code" />
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Đơn vị công tác *</label>
                                <select class="form-control select2" id="form-select" name="department_id">
                                    <option disabled selected>Chọn đơn vị công tác</option>
                                    @if (session('departments'))
                                    @foreach (session('departments') as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }} - {{ $department->code }}
                                        </option>
                                    @endforeach
                                @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Cấp nhân sự *</label>
                                <select class="form-control select2" id="form-select" name="position_level">
                                    <option disabled selected>Chọn cấp nhân sự</option>
                                    <option value="1">Công nhân viên</option>
                                    <option value="2">Chuyên viên / Kĩ thuật</option>
                                    <option value="3">Trưởng nhóm / Tổ trưởng</option>
                                    <option value="4">Trưởng phòng / Đội trường</option>
                                    <option value="5">Trưởng ban / Quản đốc</option>
                                    <option value="6">Giám đốc</option>
                                    <option value="7">Lãnh đạo</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Mô tả công việc</label>
                                <textarea class="form-control" rows="5" name="description"></textarea>
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
