@extends('layouts.admin.main')

@section('content')
    <div class="page-content " style="min-height: 602px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= url('admin') ?>">Bảng điều khiển</a></li>

            <li class="breadcrumb-item"><a href="<?= url('admin/categories') ?>">Danh mục</a></li>

            <li class="breadcrumb-item active">Thêm mới</li>
        </ol>
        <div class="clearfix"></div>

        <form method="post" action="{{ route('products.store') }}">
            @csrf
            @include('admin.products._form')
        </form>
    </div>
@endsection
