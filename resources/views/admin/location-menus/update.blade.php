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
        <form method="post" action="{{ route('location-menus.update') }}">
            @csrf
            @include('admin.location-menus._form')
        </form>
    </div>
@endsection
