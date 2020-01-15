<?php

use App\Helpers\FunctionHelpers;
?>
<div id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="col-10 col-xl-10 d-flex align-items-center header-left">
                <a id="logo" class="main-logo" href="/">
                    <img src="{{asset('advertises/tigerweb.png')}}" height="60"
                         alt="logo">
                </a>
                <ul class="main-menu d-flex">
                    <?php foreach (FunctionHelpers::get_categories_by_parent_id(null, null, 1, 0) as $key_mn => $value_mn) :?>
                    <?php if (FunctionHelpers::get_categories_by_parent_id($value_mn['id'], null, 1, 0)) {?>
                    <li class="sub-lv2 d-none d-xl-block">
                        <a class="menu-item " href="">
                            <?= $value_mn['title']?>
                            <i class="ti-angle-down"></i>
                        </a>
                        <div class="sub-menu offline-sale">
                            <div class="menu-items d-flex">
                                <div class="desc">
                                    <a href="">
                                        <?= $value_mn['title']?>
                                    </a>
                                    <p><?= $value_mn['description']?></p>
                                </div>
                                <div class="col-m">
                                    <ul>
                                        <?php foreach (FunctionHelpers::get_categories_by_parent_id($value_mn['id'], null, 1, 0) as $key_sub => $value_sub) : ?>

                                        <?php if ($value_sub['serial'] % 3 == 1):?>
                                        <li>
                                            <a href="{{$value_sub['slug']}}">
                                                <?= $value_sub['title']?>
                                            </a>
                                            <?= $value_sub['description']?>
                                        </li>
                                        <?php endif;endforeach;?>
                                    </ul>
                                </div>
                                <div class="col-l">
                                    <ul>
                                        <?php foreach (FunctionHelpers::get_categories_by_parent_id($value_mn['id'], null, 1, 0) as $key_sub => $value_sub) : ?>

                                        <?php if ($value_sub['serial'] % 3 == 2):?>
                                        <li>
                                            <a href="{{$value_sub['slug']}}">
                                                <?= $value_sub['title']?>
                                            </a>
                                            <?= $value_sub['description']?>
                                        </li>
                                        <?php endif;endforeach;?>
                                    </ul>
                                </div>
                                <div class="col-s">
                                    <ul class="no-border">
                                        <?php foreach (FunctionHelpers::get_categories_by_parent_id($value_mn['id'], null, 1, 0) as $key_sub => $value_sub) : ?>
                                        <?php if ($value_sub['serial'] % 3 == 0):?>
                                        <li>
                                            <a href="{{$value_sub['slug']}}">
                                                <?= $value_sub['title']?>
                                            </a>
                                            <?= $value_sub['description']?>
                                        </li>
                                        <?php endif;?>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php } else if ($key_mn == 0){ ?>
                    <li class="d-none d-xl-block">
                        <a class="menu-item " href="/">
                            <?= $value_mn['title']?>
                        </a>
                    </li>
                    <?php } else {?>
                    <li class="d-none d-xl-block">
                        <a class="menu-item " href="{{url("{$value_mn['slug']}")}}">
                            <?= $value_mn['title']?>
                        </a>
                    </li>
                    <?php }endforeach;?>
                </ul>
            </div>
            <div class="col-2 text-right">
                <ul class="main-menu d-none d-xl-flex justify-content-end">
                    <li class="trial">
                        <a class="btn-registration event-Sapo-Free-Trial-form-open" href="javascript:;">
                            <span>Dùng thử</span>
                        </a>
                    </li>
                </ul>
                <a href="javascript:;" class="d-inline-block d-xl-none btn-menu" onclick="openMenu();">
                    <i class="ti-menu"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="menu-mobile">
    <div class="logo-mobile">
        <a href="/">
            <img src="{{asset('advertises/logo-tiger.png')}}" height="52"
                 alt="Sapo logo">
        </a>
        <a href="javascript:;" class="btn-close-menu" onclick="closeMenu();">
            <i class="ti-close"></i>
        </a>
    </div>
    <ul class="nav">
        <?php foreach (FunctionHelpers::get_categories(null, 1, 1) as $key_mn => $value_mn) :?>
        <?php if (FunctionHelpers::get_categories_by_parent_id($value_mn['id'], null, 1, 0)) {?>
        <li class="show-sub <?= $key_mn == 0 ? 'list_landing' : ''?>">
            <a data-toggle="collapse" href="#collapse1">
                <?= $value_mn['title']?>
                <i class="caret-down"></i>
            </a>
            <div id="collapse1" class="panel-collapse collapse">
                <ul class="sub-menu">
                    <?php foreach (FunctionHelpers::get_categories_by_parent_id($value_mn['id'], null, 1, 0) as $key_sub => $value_sub) : ?>
                    <li>
                        <a href="">
                            <?= $value_sub['title']?>
                        </a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </li>
        <?php } else { ?>
        <li>
            <a href="">
                <?= $value_mn['title']?>
            </a>
        </li>
        <?php } ?>
        <?php endforeach;?>
    </ul>
    <ul class="nav nav-bottom">
        <li class="trial">
            <a class="btn-registration event-Sapo-Free-Trial-form-open"
               href="javascript:;">
                <span>Dùng thử</span>
            </a>
        </li>
    </ul>
</div>
<div class="overlay-menu"></div>
<script type="text/javascript" async="">
    addLoadEvent(function () {
        $('.show-sub').click(function () {
            rotateArrow($(this));
        });
    });

    function rotateArrow(clickElement) {
        if (!$(clickElement).find('.in').length) {
            $(clickElement).find('.btn-down').css({
                '-moz-transform': 'rotate(90deg)',
                '-webkit-transform': 'rotate(90deg)',
                '-o-transform': 'rotate(90deg)',
                '-ms-transform': 'rotate(90deg)',
                'transform': 'rotate(90deg)'
            });
        }
        else {
            $(clickElement).find('.btn-down').css({
                '-moz-transform': 'rotate(0deg)',
                '-webkit-transform': 'rotate(0deg)',
                '-o-transform': 'rotate(0deg)',
                '-ms-transform': 'rotate(0deg)',
                'transform': 'rotate(0deg)'
            });
        }
    }

    function isVisibleScrollbar() {
        var offset = $("#header").offset();
        var curWin = $(window);
        var top = curWin.scrollTop() - 51;
        if (top >= 0)
            return true;
        return false;
    }

    function openMenu() {
        $('body').css('overflow', 'hidden');
        $('.overlay-menu').addClass('show');
        $('.menu-mobile').addClass('show');
    }

    function closeMenu() {
        $('body').css('overflow', '');
        $('.overlay-menu').removeClass('show');
        $('.menu-mobile').removeClass('show');
    }
</script>


