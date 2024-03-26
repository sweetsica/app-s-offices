<form class="custom-validation" action="" method="PUT">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="mb-3">
                    <label class="form-label">Tên role *</label>
                    <input type="text" class="form-control" required placeholder="Nhập tên Role" name="name" />
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form>
