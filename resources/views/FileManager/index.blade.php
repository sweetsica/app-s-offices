@extends('Layout.MaserLayout')
@section('content-css')
@endsection
@section('content')
    <div class="d-xl-flex">
        <div class="w-100">
            <div class="d-xl-flex">
                @include('FileManager.partials.Components.CardCreateFile')
                <!-- filemanager-leftsidebar -->

                @include('FileManager.partials.Components.CardContentFile')
                <!-- end w-100 -->
            </div>
        </div>

        @include('FileManager.partials.Components.CardTotalFile')
    </div>
    {{-- @include('FileManager.partials.Modal.CreateFile') --}}
    @include('FileManager.partials.Modal.CreateFolder')
    @include('FileManager.partials.Modal.UploadFile')
@endsection
@section('content-js')
@endsection
