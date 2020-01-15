<?php

/* @var $category \App\Category */

?>

@extends('layouts.admin.main')

@section('title', 'Chỉnh sửa')

@section('content')
    <div class="page-content " style="min-height: 602px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= url('admin') ?>">Bảng điều khiển</a></li>

            <li class="breadcrumb-item"><a href="<?= url('admin/categories') ?>">Danh mục</a></li>

            <li class="breadcrumb-item active">Chỉnh sửa</li>
        </ol>
        <div class="clearfix"></div>

        <form method="post" action="{{ route('categories.update', $category['id']) }}">
            @method('PATCH')
            @csrf
            @include('admin.categories._form')
        </form>
    </div>
@endsection
