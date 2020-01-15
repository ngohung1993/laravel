<?php

/* @var $posts array App\Posts */

?>

@extends('layouts.admin.main')

@section('title', 'Thư viện')

@section('content')
    <div class="page-content " style="min-height: 602px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=url('admin/dashboard') ?>">Bảng điều khiển</a></li>

            <li class="breadcrumb-item active">Thư viện</li>
        </ol>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <iframe width="100%" height="450" frameborder="0"
                        src="{{url('library/filemanager/dialog.php')}}">
                </iframe>
            </div>
        </div>
    </div>
@endsection
