@extends('Layout.MaserLayout')
@section('content-css')
    <style>
        ul {
            padding: 0;
        }

        .wapper-tree {
            height: calc(100vh - 210px);
            overflow: auto;
        }

        .title-child {
            font-size: 1rem;
            color: black;
            padding: 5px;
        }

        .title-child.active {
            color: #ca1f24;
            font-weight: 700
        }

        .title-child:hover {
            color: #ca1f24;
        }

        .item-accordion {
            background-color: #EBEBEB;
            color: black;
        }

        .item-accordion:hover {
            background-color: #ca1f24;
            color: #fff;
            font-weight: 700;
        }

        .tree,
        .tree ul {
            margin: 0;
            padding: 0;
            list-style: none
        }

        .tree ul {
            margin-left: 1em;
            position: relative
        }

        .tree ul ul {
            margin-left: .5em
        }

        .tree ul:before {
            content: "";
            display: block;
            width: 0;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            border-left: 2px dotted #ca1f24;
        }

        .tree li {
            margin: 0;
            padding: 0 1em;
            line-height: 2em;
            position: relative;
            font-size: 12px;
        }


        .tree ul li:last-child:before {
            background: #fff;
            height: auto;
            top: 1em;
            bottom: 0
        }

        .tree li a {
            text-decoration: none;
        }

        .indicator {
            font-size: 1.1rem;
            color: #ca1f24;
            margin-right: 5px
        }

        .indicator a {
            color: #ca1f24;
        }

        .tree li.open>ul {
            display: block;
        }

        tbody tr td div {
            max-width: 200px;
        }
    </style>
@endsection
@section('content')
    <div class="row mb-4">
        <div class="col-xl-3">
            @include('Department.partials.TreeDepartment.TreeDepartment')
        </div>
        <div class="col-xl-9">
            @include('Department.partials.Table.table')
        </div>
    </div>
    @include('Department.partials.Modal.Add.ModalAdd')
    @include('Department.partials.Modal.Edit.ModalEdit')
    @include('Department.partials.Modal.Delete.ModalDelete')
@endsection
@section('content-js')
    @include('Department.partials.Js.main')
@endsection
