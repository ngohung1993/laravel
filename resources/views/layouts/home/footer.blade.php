<?php

use App\Helpers\FunctionHelpers;



$child = FunctionHelpers::get_custom_fields_by_parent_id(13, 1);



?>

<div class="callus">
    <i class="i_phone">
        <span style="display:none;">.</span>
    </i>
    <a href="tel:0967048347">
        <span class="hot-line_text">HOTLINE TƯ VẤN: </span>
        0967 048 347
    </a>
</div>

<div class="footer-page">
    <div class="container">
        <div class="row">
            <?php foreach (FunctionHelpers::get_custom_fields_by_parent_id($child[0]->id, 1) as $key => $value) : $value = (array)$value ?>

            <div class="no-padding col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div class="box-support-footer wow fadeInLeft" data-wow-delay="0.5s"
                     style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
                    <div class="img-footer-support">
                        <img alt="<?= $value['title']?>" src="<?= $value['avatar']?>">
                    </div>
                    <div class="content-footer-support">
                        <p><?= $value['title']?></p>
                        <a href="tel:<?= strip_tags($value['description'])?>"><?= strip_tags($value['description'])?></a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <div class="menu-footer wow fadeInUp" data-wow-delay="0.4s"
                 style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                <?php foreach (FunctionHelpers::get_custom_fields_by_parent_id($child[1]->id, 1) as $key => $value) : $value = (array)$value ?>

                <div class="no-padding col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="menu-item">
                        <h2><?= $value['title']?></h2>
                        <?= $value['content']?>
                    </div>
                </div>

                <?php endforeach;?>
            </div>
        </div>


    </div>

</div>
<div class="copyright" style="padding: 15px 0;color: #7d8492;overflow: hidden;font-size: 14px">
    <div class="row">
        <div class="col-md-12" style="text-align: center;">

                <span>© Copyright 2018 <a href="javascript:void(0)" title="Tigerweb" target="_blank"><b
                                style="color: #ffffff">TigerWeb</b></a> - Nền tảng quản lý và bán hàng đa kênh được sử dụng nhiều nhất Việt Nam</span>
        </div>
    </div>
</div>






