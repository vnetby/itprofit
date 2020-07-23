<?php
$args = get_field('service_stages_acf');
if (!is_array($args)) return;
?>

<section class="stages__section" data-admin>
    <div class="container">
        <div class="stages__list">
            <?php
            foreach ($args as $key => $post_datas_arr) {
                $name = get_from_array($post_datas_arr, 'title');
                $val = get_from_array($post_datas_arr, 'desc');
            ?>
                <div class="stage__item">
                    <div class="stage-head">
                        <div class="num">
                            <?= ($key + 1) ?>
                            <!-- <span class="num-label"><?= pll__('этап'); ?></span> -->
                        </div>
                        <h3 class="stage-title like__h3"><?= $name ?></h3>
                    </div>
                    <div class="stage-body">
                        <?= $val ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>