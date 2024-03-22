<form class="custom-validation" action="" method="PUT">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Tên đơn vị *</label>
                    <input type="text" class="form-control" required placeholder="Nhập tên đơn vị*" name="name"
                        value="{{ $departmentDetail->name }}" />
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Đơn vị cha</label>
                    <select class="form-control select2" id="form-select" name="parent_id">
                        <option disabled selected>Chọn đơn vị cha</option>
                        @foreach (session('departments') as $department)
                            <option value="{{ $department->id }}"
                                {{ $department->id == $departmentDetail->parent_id ? 'selected' : '' }}>
                                {{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Mã đơn vị *</label>
                    <input type="text" class="form-control" required placeholder="Nhập mã đơn vị *" name="code"
                        value="{{ $departmentDetail->code }}" />
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">STT vị trí</label>
                    <input type="text" class="form-control" placeholder="Nhập STT vị trí" name="order"
                        value="{{ $departmentDetail->order }}" />
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Địa bàn</label>
                    <select class="form-control select2" id="form-select" name="area_id">
                        <option disabled selected>Chọn địa bàn</option>
                        <option value="1" {{ $departmentDetail->area_id == 1 }}>Hà Nội</option>
                        <option value="2" {{ $departmentDetail->area_id == 2 }}>TP. HCM</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Trưởng bộ phận</label>
                    <select class="form-control select2" id="form-select" name="user_id">
                        <option disabled selected>Chọn trưởng bộ phận</option>
                        @if (session('users'))
                            @foreach (session('users') as $q)
                                <option
                                    value="{{ $q->id }}"{{ $department->id == $departmentDetail->user_id ? 'selected' : '' }}>
                                    {{ $q->name }} -
                                    {{ $q->code }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="mb-3">
                    <label class="form-label">Chức năng, nhiệm vụ đơn vị</label>
                    <textarea class="form-control" rows="5" name="description">{{ $departmentDetail->description }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form>
