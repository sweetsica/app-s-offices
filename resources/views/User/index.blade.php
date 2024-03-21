@extends('Layout.MaserLayout')
@section('content-css')
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-success waves-effect waves-light me-3" data-bs-toggle="modal"
                            data-bs-target="#modalAdd">
                            <i class="uil uil-plus"></i> Thêm
                        </button>
                        <button type="button" class="btn btn-primary waves-effect waves-light">
                            <i class="uil uil-filter"></i>
                        </button>
                    </div>
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @include('User.partials.Table')
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    @include('User.partials.Modal.ModalAdd')
@endsection
@section('content-js')
@endsection
