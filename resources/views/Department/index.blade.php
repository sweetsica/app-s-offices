@extends('Layout.MaserLayout')
@section('content-css')
@endsection
@section('content')
    <div class="row mb-4">
        <div class="col-xl-4">
            @include('Department.partials.TreeDepartment.TreeDepartment')
        </div>

        <div class="col-xl-8">
            @include('Department.partials.Table.table')
        </div>
    </div>
    @include('Department.partials.Modal.ModalAdd')
@endsection
@section('content-js')
@endsection
