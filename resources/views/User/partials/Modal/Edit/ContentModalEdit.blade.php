<form class="custom-validation" method="POST" action="{{ route('user.update',$usersDetail->id) }}">
    @method('PUT')
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Mã *</label>
                    <input type="text" class="form-control" required placeholder="Nhập mã nhân sự*" name="code"
                        value="{{ $usersDetail->code }}" />
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Tên *</label>
                    <input type="text" class="form-control" required placeholder="Nhập tên nhân sự*" name="name"
                        value="{{ $usersDetail->name }}" />
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Vị trí *</label>
                    <select class="form-control select2" id="formSelect" required name="position_id">
                        <option value="">Chọn vị trí*</option>
                        @foreach (session('listPositions') as $position)
                            <option value="{{ $position->id }}"
                                {{ $position->id == $usersDetail->position_id ? 'selected' : '' }}>
                                {{ $position->code }} - {{ $position->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Phòng ban *</label>
                    <select class="form-control select2" id="formSelect" required name="department_id">
                        <option disabled>Chọn phòng ban*</option>
                        @foreach (session('departments') as $department)
                            <option value="{{ $department->id }}"
                                {{ $department->id == $usersDetail->department_id ? 'selected' : '' }}>
                                {{ $department->code }} - {{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Email *</label>
                    <input type="email" class="form-control" required placeholder="Nhập địa chỉ Email" name="email"
                        value="{{ $usersDetail->email }}" />
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Trạng thái *</label>
                    <select class="form-control select2" id="formSelect" required name="status">
                        <option disabled>Chọn trạng thái*</option>
                        <option value="0" {{ $usersDetail->status == 0 }}>Đang làm việc</option>
                        <option value="1" {{ $usersDetail->status == 1 }}>Ngừng làm việc</option>

                    </select>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="text" class="form-control" placeholder="Nhập password" name="password" />
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form>
