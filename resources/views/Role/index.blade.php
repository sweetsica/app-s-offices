@extends('Layout.MaserLayout')
@section('content-css')
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            @include('Role.partials.Table.table')
        </div>
    </div>
    @include('Role.partials.Modal.Add.ModalAdd')
    @include('Role.partials.Modal.Edit.ModalEdit')
    @include('Role.partials.Modal.Delete.ModalDelete')
@endsection
@section('content-js')
@endsection
