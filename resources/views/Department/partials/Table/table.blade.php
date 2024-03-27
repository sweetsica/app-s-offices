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
                        <div class="text-center" data-bs-toggle="tooltip" title="Mã đơn vị">
                            Mã đơn vị
                        </div>
                    </th>
                    <th>
                        <div class="text-center" data-bs-toggle="tooltip" title="Tên đơn vị">
                            Tên đơn vị
                        </div>
                    </th>
                    <th>
                        <div class="text-center" data-bs-toggle="tooltip" title="Đơn vị cha">
                            Đơn vị cha
                        </div>
                    </th>
                    <th>
                        <div class="text-center" data-bs-toggle="tooltip" title="Địa bàn">
                            Địa bàn
                        </div>
                    </th>
                    <th>
                        <div class="text-center" data-bs-toggle="tooltip" title="Trưởng bộ phận">
                            Trưởng bộ phận
                        </div>
                    </th>
                    <th>
                        <div class="text-center" data-bs-toggle="tooltip" title="Chức năng nhiệm vụ">
                            Chức năng nhiệm vụ
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
                @foreach ($data as $item)
                    <tr>
                        <td>
                            <div class="text-center" data-bs-toggle="tooltip" title="Mã đơn vị">
                                {{ $item->code }}
                            </div>
                        </td>
                        <td>
                            <div class="text-center" data-bs-toggle="tooltip" title="Tên đơn vị">
                                {{ $item->name }}
                            </div>
                        </td>
                        <td>
                            <div class="text-center" data-bs-toggle="tooltip" title="Đơn vị cha">
                                {{ $item->daddy->name ?? ''}}
                            </div>
                        </td>
                        <td>
                            <div class="text-center" data-bs-toggle="tooltip" title="Địa bàn">
                                Địa bàn
                            </div>
                        </td>
                        <td>
                            <div class="text-center" data-bs-toggle="tooltip" title="Trưởng bộ phận">
                                {{ $item->user->name ?? ''}}
                            </div>
                        </td>
                        <td>
                            <div class="text-center" data-bs-toggle="tooltip" title="Chức năng nhiệm vụ">
                                {{ $item->description }}
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <button class="px-3 text-primary btn-edit" data-bs-toggle="modal"
                                    data-bs-target="#modalEdit"
                                    data-attr="{{ route('department.modalEdit', $item->id) }}"
                                    style="border: none; background-color: transparent"><i
                                        class="uil uil-pen font-size-18"></i></button>
                                <button class="px-3 text-danger btn-delete" data-bs-toggle="modal"
                                    data-bs-target="#modalDelete"
                                    data-attr="{{ route('department.modalDelete', $item->id) }}"
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
