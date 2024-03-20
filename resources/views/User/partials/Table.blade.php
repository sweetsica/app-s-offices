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
        @foreach ($users as $user)
        <tr>
            <td>
                <div class="text-center">
                    {{$user->id}}
                </div>
            </td>
            <td>
                <div class="text-center">
                    {{$user->code}}
                </div>
            </td>
            <td>
                <div class="text-center">
                    {{$user->name}}
                </div>
            </td>
            <td>
                <div class="text-center">
                    Nhân viên kinh doanh
                </div>
            </td>
            <td>
                <div class="text-center">
                    Phòng kinh doanh
                </div>
            </td>
            <td>
                <div class="text-center">
                    {{$user->email}}
                </div>
            </td>

            <td>
                <div class="text-center">
                    user
                </div>
            </td>
            <td>
                    @switch($user->status)
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
                    <button class="px-3 text-primary" style="border: none"><i
                            class="uil uil-pen font-size-18"></i></button>
                    <button class="px-3 text-danger" style="border: none"><i
                            class="uil uil-trash-alt font-size-18"></i></button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
