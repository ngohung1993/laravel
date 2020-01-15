<?php

use App\Helpers\FunctionHelpers;


$child = (array) FunctionHelpers::get_custom_fields_by_parent_id($section['id'], 1)[0];

?>



<div class="customers">
    <div class="container">
        <h2><?= $child['title'] ?></h2>
        <p class="desc"><?= $child['description'] ?></p>
        <div class="row">
            <?php foreach (FunctionHelpers::get_custom_fields_by_parent_id($child['id'], 1) as $key => $value) : $value = (array) $value ?>
            <div class="col-md-3 col-sm-6 col-xs-6 customer-item">
                <a href="<?= $value['description']?>" target="_blank" rel="nofollow">
                    <img src="<?= $value['avatar']?>" alt="<?= $value['title']?>"/>
                </a>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>