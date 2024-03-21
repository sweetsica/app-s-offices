@extends('Layout.MaserLayout')
@section('content-css')
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            @include('Position.partials.Table.table')
        </div>
    </div>
    @include('Position.partials.Modal.ModalAdd')
@endsection
@section('content-js')
@endsection
