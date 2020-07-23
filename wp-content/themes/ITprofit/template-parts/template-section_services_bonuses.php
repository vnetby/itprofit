<?php
// $args = get_field('service_bonuses');
// if (!is_array($args)) return;
// $title = get_from_array($args, 'title');
// $list = get_array_from_array($args, 'list');
// if (!$list) return;

$args = get_field('services_bonuses_new');
if (!is_array($args)) return;
?>

<section class="section section-bonuses" data-admin>

    <div class="container">
        <div class="serice-bonuses-list">
            <?php
            foreach ($args as &$item) {
                $ico = get_from_array($item, 'ico');
                $ico  = $ico ? wp_get_attachment_image_url($ico, 'thumbnail') : false;
                $title = get_from_array($item, 'title');
                $desc = get_from_array($item, 'desc');
            ?>
                <div class="servie-bonus-col">
                    <div class="service-bonus-card">
                        <?php
                        if ($ico) {
                        ?>
                            <div class="service-bonus-ico">
                                <img src="<?= $ico; ?>" alt="bonus ico">
                            </div>
                        <?php
                        }
                        if ($title) {
                        ?>
                            <h3 class="bonus-title like__h3"><?= $title; ?></h3>
                        <?php
                        }
                        if ($desc) {
                        ?>
                            <div class="service-bonus-desc">
                                <?= $desc; ?>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>



    <?php
    ob_start();
    ?>
    <div class="container">
        <?php
        if ($title) {
        ?>
            <h2 class="section-title"><?= $title; ?></h2>
        <?php
        }
        ?>
        <div class="bonuses-list">
            <?php
            foreach ($list as &$bonus) {
                $text = get_from_array($bonus, 'bonus');
            ?>
                <div class="bonus-col">
                    <div class="bonus-item">
                        <div class="ico-col">
                            <?= vnet_get_svg('red-rect'); ?>
                        </div>
                        <div class="content-col">
                            <?= $text; ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
    ob_get_clean();
    ?>
</section>