<?php
/**
 * Created by PhpStorm.
 * User: vietlv
 * Date: 11/30/2018
 * Time: 3:51 PM
 */

?>
@extends('layouts.admin.login')

@section('content')
    <style>
        .content {
            margin: 60px auto 0 auto !important;
        }
    </style>

    <div class="content">
        <h3 class="form-title font-green">Đăng nhập vào hệ thống</h3>
        <div class="content-wrapper">
            <form method="POST" action="{{ route('admin.store') }}">
                @csrf
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="username" class="col-form-label text-md-right">{{ __('Tên đăng nhập') }}</label>
                    <input id="username" type="text" name="username" required autofocus
                           class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}">
                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password" class="col-form-label text-md-right">{{ __('Mật khẩu') }}</label>
                    <input id="password" type="password" required
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="checkbox checkbox-primary">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Nhớ mật khẩu') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a class="lost-pass-link" href=""
                               title="Lost password">Quên mật khẩu?</a>
                        </div>
                    </div>
                </div>

                <div class="form-group form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-sign-in"></i>
                        Đăng nhập
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="copyright">
        <p>
            Copyright 2018 © Tigerweb Technologies. Version:
            <span>2.0</span>
        </p>
        <p>
        <span class="active">
            <a href="">
                <img src="{{asset('/dashboard/img/us.png')}}" title="English" alt="English">
                <span>English</span>
            </a>
        </span>
            <span style="margin-left: 10px;">
            <a href="">
                <img src="{{asset('/dashboard/img/vn.png')}}" title="Tiếng Việt" alt="Tiếng Việt">
                <span>Tiếng Việt</span>
            </a>
        </span>
        </p>
    </div>
@endsection
