<?php

use App\Helpers\FunctionHelpers;

?>


<div class="slide-partner">
    <div class="container">
        <div class="row">
            <div id="owl-carousel-partner" class="owl-carousel">
                <?php foreach (FunctionHelpers::get_custom_fields_by_parent_id($section['id'], 1) as $key => $value) : $value = (array) $value ?>

                <div style="padding: 20px 0;">
                    <img class="img-editor img-responsive"
                         alt="<?= $value['description']?>" src="<?= $value['avatar']?>">
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>



