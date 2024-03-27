<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>
                <div class="text-center">
                    STT
                </div>
            </th>
            <th>
                <div class="text-center">
                    Mã
                </div>
            </th>
            <th>
                <div class="text-center">
                    Tên
                </div>
            </th>
            <th>
                <div class="text-center">
                    Vị trí
                </div>
            </th>
            <th>
                <div class="text-center">
                    Phòng ban
                </div>
            </th>
            <th>
                <div class="text-center">
                    Email
                </div>
            </th>
            <th>
                <div class="text-center">
                    Phân quyền
                </div>
            </th>
            <th>
                <div class="text-center">
                    Trạng thái
                </div>
            </th>
            <th>
                <div class="text-center">
                    Hành động
                </div>
            </th>
        </tr>
    </thead>


    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>
                    <div class="text-center">
                        {{ $item->id }}
                    </div>
                </td>
                <td>
                    <div class="text-center">
                        {{ $item->code }}
                    </div>
                </td>
                <td>
                    <div class="text-center">
                        {{ $item->name }}
                    </div>
                </td>
                <td>
                    <div class="text-center">
                        {{ $item->position->name ?? ''}}
                    </div>
                </td>
                <td>
                    <div class="text-center">
                        {{ $item->department->name ?? ''}}
                    </div>
                </td>
                <td>
                    <div class="text-center">
                        {{ $item->email }}
                    </div>
                </td>

                <td>
                    <div class="text-center">
                        user
                    </div>
                </td>
                <td>
                    @switch($item->status)
                        @case(0)
                            <div class="text-center">
                                <span class="badge bg-success">Đang làm việc</span>
                            </div>
                        @break

                        @case(1)
                            <div class="text-center">
                                <span class="badge bg-danger">Ngưng làm việc</span>
                            </div>
                        @break
                    @endswitch

                </td>
                <td>
                    <div class="text-center">
                        <button class="px-3 text-primary btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit"
                            data-attr="{{ route('user.modalEdit', $item->id) }}"
                            style="border: none; background-color: transparent"><i
                                class="uil uil-pen font-size-18"></i></button>
                        <button class="px-3 text-danger btn-delete" data-bs-toggle="modal" data-bs-target="#modalDelete"
                            data-attr="{{ route('user.modalDelete', $item->id) }}"
                            style="border: none; background-color: transparent"><i
                                class="uil uil-trash-alt font-size-18"></i></button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
