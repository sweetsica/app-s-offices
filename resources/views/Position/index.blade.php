@extends('Layout.MaserLayout')
@section('content-css')
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            @include('Position.partials.Table.table')
        </div>
    </div>
    @include('Position.partials.Modal.Add.ModalAdd')
    @include('Position.partials.Modal.Edit.ModalEdit')
    @include('Position.partials.Modal.Delete.ModalDelete')
@endsection
@section('content-js')
@endsection
