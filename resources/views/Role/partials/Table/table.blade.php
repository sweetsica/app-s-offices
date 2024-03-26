<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-success waves-effect waves-light me-3" data-bs-toggle="modal"
                data-bs-target="#modalAdd">
                <i class="uil uil-plus"></i> Thêm
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
                            Tên role
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
                <tr>
                    <td>
                        <div class="text-center" data-bs-toggle="tooltip" title="STT">
                            1
                        </div>
                    </td>
                    <td>
                        <div class="text-center" data-bs-toggle="tooltip" title="Tên">
                            Tên Role
                        </div>
                    </td>

                    <td>
                        <div class="text-center">
                            <button class="px-3 text-primary btn-edit" data-bs-toggle="modal"
                                data-bs-target="#modalEdit" data-attr="{{ route('role.modalEdit', 1) }}"
                                style="border: none; background-color: transparent"><i
                                    class="uil uil-pen font-size-18"></i></button>
                            <button class="px-3 text-danger btn-delete" data-bs-toggle="modal"
                                data-bs-target="#modalDelete" data-attr="{{ route('role.modalDelete', 1) }}"
                                style="border: none; background-color: transparent"><i
                                    class="uil uil-trash-alt font-size-18"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
