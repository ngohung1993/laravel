<?php

use App\Helpers\FunctionHelpers;


?>


<div class="news-aboutus">
    <div class="container">
        <h2>Tin tức mới nhất</h2>
        <div class="row wow fadeIn" data-wow-duration="4" data-wow-delay="0.5s">
            <?php foreach (FunctionHelpers::get_posts_by_category_id(6, 3, 0, 1) as $key_new => $value_new) :?>

            <div class="col-xl-4 col-lg-4 col-md-6 col-12 d-none d-md-block item">
                <div class="news-item">
                    <a href="{{url("{$value_new['category']['slug']}/{$value_new['slug']}")}}">
                        <img alt="<?= $value_new['title']?>" src="<?= $value_new['avatar']?>">
                    </a>
                    <div class="time">
                        <i class="far fa-clock"></i> Ngày đăng: <?= date('d-m-Y',strtotime($value_new['created_at']))?>
                    </div>
                    <div class="title">
                        <a href="{{url("{$value_new['category']['slug']}/{$value_new['slug']}")}}" class="article-title" target="_blank">
                            <?= $value_new['title']?>
                        </a>
                    </div>
                    <div class="continue">
                        <a href="{{url("{$value_new['category']['slug']}/{$value_new['slug']}")}}" class="article-title" target="_blank">
                            Đọc tiếp →
                        </a>
                    </div>
                    <span class="source-name">Mới nhất</span>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="row command mm-load-more">
            <a href="" class="btn-registration">
                <span>Xem thêm</span>
            </a>
        </div>
    </div>
</div>

