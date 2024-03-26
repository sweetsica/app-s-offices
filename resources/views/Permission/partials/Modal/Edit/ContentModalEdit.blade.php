<form class="custom-validation" action="{{ route('permission.update', $permissionDetail->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="mb-3">
                    <label class="form-label">Tên Permission *</label>
                    <input type="text" class="form-control" required placeholder="Nhập tên Permission" name="name"
                        value="{{ $permissionDetail->name }}" />
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form>
