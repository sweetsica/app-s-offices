@extends('Layout.MaserLayout')
@section('content-css')
@endsection
@section('content')
    <form action="{{ route('rolePermission.updateRolePermission', $role->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <button type="submit" class="btn btn-success waves-effect waves-light me-3">
                                Lưu
                            </button>
                        </div>
                        <table id="datatable-scroll" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="text-center" data-bs-toggle="tooltip" title="">
                                            <input type="checkbox" class="form-check-input" id="selectall"> Role
                                        </div>
                                    </th>
                                    <th>
                                        <div class="text-center" data-bs-toggle="tooltip" title="Mã vị trí">
                                            Tên Permission
                                        </div>
                                    </th>

                                </tr>
                            </thead>

                            <tbody>
                                @if ($role->permissions)
                                    @foreach ($permissions as $permission)
                                        <tr class="results-table-row odd">
                                            <td>
                                                @php
                                                    $isChecked = false;
                                                    foreach ($role->permissions as $role_permission) {
                                                        if ($permission->id == $role_permission->id) {
                                                            $isChecked = true;
                                                            break;
                                                        }
                                                    }
                                                @endphp
                                                <div class="text-center">
                                                    <input type="checkbox" class="form-check-input selectedId"
                                                        {{ $isChecked ? 'checked' : '' }} name="permission[]"
                                                        value="{{ $permission->name }}" />
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center" data-bs-toggle="tooltip"
                                                    title="{{ $permission->name }}">
                                                    {{ $permission->name }}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('content-js')
    <script>
        $(document).ready(function() {
            $('#selectall').click(function() {
                $('.selectedId').prop('checked', this.checked);
            });

            $('.selectedId').change(function() {
                var check = ($('.selectedId').filter(":checked").length == $('.selectedId').length);
                $('#selectall').prop("checked", check);
            });
        });
    </script>
@endsection
