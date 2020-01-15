@extends('layouts.admin.main')

@section('title', 'Chỉnh sửa')

@section('content')
    <div class="page-content " style="min-height: 602px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= url('admin/dashboard') ?>">Bảng điều khiển</a></li>

            <li class="breadcrumb-item"><a href="<?= url('admin/pages') ?>">Trang</a></li>

            <li class="breadcrumb-item active">Chỉnh sửa</li>
        </ol>
        <div class="clearfix"></div>

        @include('admin.pages._form')
    </div>
@endsection
