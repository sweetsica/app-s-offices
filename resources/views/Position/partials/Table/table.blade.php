@php
    $arrayPosition = [
        1 => 'Công nhân viên',
        2 => 'Chuyên viên / Kĩ thuật',
        3 => 'Trưởng nhóm / Tổ trưởng',
        4 => 'Trưởng phòng / Đội trường',
        5 => 'Trưởng ban / Quản đốc',
        6 => 'Giám đốc',
        7 => 'Lãnh đạo',
        8 => 'Giám sát',
        9 => 'Quản lý cấp cao',
        10 => 'Quản lý cấp trung',
        11 => 'Lao động phổ thông',
        12 => 'Cộng tác',
    ];

    function getPositionLevel($dataPositionLevel, $arrayPosition)
    {
        $positionLevel = '';
        foreach ($arrayPosition as $key => $value) {
            if ($key == $dataPositionLevel) {
                $positionLevel = $value;
            }
        }

        return $positionLevel;
    }
@endphp

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-success waves-effect waves-light me-3" data-bs-toggle="modal"
                data-bs-target="#modalAdd">
                <i class="uil uil-plus"></i> Thêm
            </button>
            <button type="button" class="btn btn-primary waves-effect waves-light">
                <i class="uil uil-filter"></i>
            </button>
        </div>
        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>
                        <div class="text-center" data-bs-toggle="tooltip" title="STT">
                            STT
                        </div>
                    </th>
                    <th>
                        <div class="text-center" data-bs-toggle="tooltip" title="Mã vị trí">
                            Mã vị trí
                        </div>
                    </th>
                    <th>
                        <div class="text-center" data-bs-toggle="tooltip" title="Tên vị trí/Chức danh">
                            Tên vị trí/Chức danh
                        </div>
                    </th>
                    <th>
                        <div class="text-center" data-bs-toggle="tooltip" title="Cấp nhân sự">
                            Cấp nhân sự
                        </div>
                    </th>
                    <th>
                        <div class="text-center" data-bs-toggle="tooltip" title="Đơn vị công tác">
                            Đơn vị công tác
                        </div>
                    </th>
                    <th>
                        <div class="text-center" data-bs-toggle="tooltip" title="Mô tả công việc (Tóm tắt)">
                            Mô tả công việc (Tóm tắt)
                        </div>
                    </th>
                    <th>
                        <div class="text-center" data-bs-toggle="tooltip" title="Hành động">
                            Hành động
                        </div>
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($positions as $position)
                    <tr>
                        <td>
                            <div class="text-center" data-bs-toggle="tooltip" title="STT">
                                {{ $position->id }}
                            </div>
                        </td>
                        <td>
                            <div class="text-center" data-bs-toggle="tooltip" title="Mã vị trí">
                                {{ $position->code }}
                            </div>
                        </td>
                        <td>
                            <div class="text-center" data-bs-toggle="tooltip" title="Tên vị trí/Chức danh">
                                {{ $position->name }}
                            </div>
                        </td>
                        <td>
                            <div class="text-center" data-bs-toggle="tooltip" title="Cấp nhân sự">
                                {{ getPositionLevel($position->position_level, $arrayPosition) }}
                            </div>
                        </td>
                        <td>
                            <div class="text-center" data-bs-toggle="tooltip" title="Đơn vị công tác">
                                {{ $position->departement->name }}
                            </div>
                        </td>
                        <td>
                            <div class="text-center" data-bs-toggle="tooltip" title="Mô tả công việc (Tóm tắt)">
                                {{ $position->description }}
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <button class="px-3 text-primary btn-edit" data-bs-toggle="modal"
                                    data-bs-target="#modalEdit"
                                    data-attr="{{ route('position.modalEdit', $position->id) }}"
                                    style="border: none; background-color: transparent"><i
                                        class="uil uil-pen font-size-18"></i></button>
                                <button class="px-3 text-danger btn-delete" data-bs-toggle="modal"
                                    data-bs-target="#modalDelete"
                                    data-attr="{{ route('position.modalDelete', $position->id) }}"
                                    style="border: none; background-color: transparent"><i
                                        class="uil uil-trash-alt font-size-18"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
