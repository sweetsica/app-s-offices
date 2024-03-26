@extends('Layout.MaserLayout')
@section('content-css')
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            @include('Permission.partials.Table.table')
        </div>
    </div>
    @include('Permission.partials.Modal.Add.ModalAdd')
    @include('Permission.partials.Modal.Edit.ModalEdit')
    @include('Permission.partials.Modal.Delete.ModalDelete')
@endsection
@section('content-js')
@endsection
