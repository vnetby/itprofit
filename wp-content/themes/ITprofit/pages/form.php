<?php
/*
* Template Name: Шаблон страницы с Формой обратной связи
*/
get_header();

$form_id = get_field('page_form_id');
?>

<section class="form__section">
    <div class="container">
        <h1 class="h1"><?= get_the_title(); ?></h1>
        <div class="form__block">
            <?php
            if ($form_id) {
                the_contact_form($form_id, ['form_class' => 'validate-form']);
            }
            ?>
        </div>
        <? if (have_posts()):while (have_posts()):the_post(); ?>
        <? if(get_the_content()): ?>
        <div>
            <? the_content(); ?>
        </div>
        <? endif; ?>
        <? endwhile; endif; ?>
    </div>

</section>
<?php
get_footer();
?>