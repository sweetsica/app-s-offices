<form class="custom-validation" action="{{ route('position.update',$positionDetail->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Vị trí/Chức danh *</label>
                    <input type="text" class="form-control" required placeholder="Nhập vị trí chức danh*"
                        name="name" value="{{ $positionDetail->name }}" />
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Mã vị trí *</label>
                    <input type="text" class="form-control" required placeholder="Nhập mã vị trí*" name="code"
                        value="{{ $positionDetail->code }}" />
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Đơn vị công tác *</label>
                    <select class="form-control select2" id="form-select" name="department_id">
                        <option disabled selected>Chọn đơn vị công tác</option>
                        @if (session('departments'))
                            @foreach (session('departments') as $department)
                                <option value="{{ $department->id }}"
                                    {{ $positionDetail->department_id == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }} - {{ $department->code }}
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
                        <option value="1" {{ $positionDetail->position_level == 1 ? 'selected' : '' }}>Công nhân
                            viên</option>
                        <option value="2" {{ $positionDetail->position_level == 2 ? 'selected' : '' }}>Chuyên viên
                            / Kĩ thuật
                        </option>
                        <option value="3" {{ $positionDetail->position_level == 3 ? 'selected' : '' }}>Trưởng nhóm
                            / Tổ trưởng
                        </option>
                        <option value="4" {{ $positionDetail->position_level == 4 ? 'selected' : '' }}>Trưởng
                            phòng / Đội trường
                        </option>
                        <option value="5" {{ $positionDetail->position_level == 5 ? 'selected' : '' }}>Trưởng ban
                            / Quản đốc
                        </option>
                        <option value="6" {{ $positionDetail->position_level == 6 ? 'selected' : '' }}>Giám đốc
                        </option>
                        <option value="7" {{ $positionDetail->position_level == 7 ? 'selected' : '' }}>Lãnh đạo
                        </option>
                        <option value="8" {{ $positionDetail->position_level == 8 ? 'selected' : '' }}>Giám sát
                        </option>
                        <option value="9" {{ $positionDetail->position_level == 9 ? 'selected' : '' }}>Quản lý
                            cấp cáo</option>
                        <option value="10" {{ $positionDetail->position_level == 10 ? 'selected' : '' }}>Quản lý
                            cấp trung</option>
                        <option value="11" {{ $positionDetail->position_level == 11 ? 'selected' : '' }}>Lao động
                            phổ thông</option>
                        <option value="12" {{ $positionDetail->position_level == 12 ? 'selected' : '' }}>Cộng tác
                        </option>
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-12">
                <div class="mb-3">
                    <label class="form-label">Mô tả công việc</label>
                    <textarea class="form-control" rows="5" name="description">{{ $positionDetail->description }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form>
