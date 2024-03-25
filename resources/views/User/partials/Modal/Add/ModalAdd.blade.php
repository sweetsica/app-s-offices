<div id="modalAdd" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm nhân sự</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="custom-validation" method="POST" action="{{ route('user.store') }} ">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Mã *</label>
                                <input type="text" class="form-control" required placeholder="Nhập mã nhân sự*"
                                    name="code" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tên *</label>
                                <input type="text" class="form-control" required placeholder="Nhập tên nhân sự*"
                                    name="name" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Vị trí *</label>
                                <select class="form-control select2" id="formSelect" required name="position_id">
                                    <option disabled selected>Chọn vị trí*</option>
                                    @foreach (session('listPositions') as $position)
                                        <option value="{{ $position->id }}">
                                            {{ $position->code }} - {{ $position->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Phòng ban *</label>
                                <select class="form-control select2" id="formSelect" required name="department_id">
                                    <option disabled selected>Chọn vị trí*</option>
                                    @foreach (session('departments') as $department)
                                        <option value="{{ $department->id }}">
                                            {{ $department->code }} - {{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" required placeholder="Nhập địa chỉ Email"
                                    name="email" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Trạng thái *</label>
                                <select class="form-control select2" id="formSelect" required name="status">
                                    <option disabled selected>Chọn trạng thái*</option>
                                    <option value="0">Đang làm việc</option>
                                    <option value="1">Ngừng làm việc</option>

                                </select>
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
