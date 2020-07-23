<?php
get_header();

global $post;

$imgUrl = get_the_post_thumbnail_url($post->ID, 'full');
// $imgBg = $imgUrl ? 'style="background-image: URL(\'' . $imgUrl . '\');"' : '';

?>
<main class="blog-inner" itemscope itemtype="http://schema.org/Blog">
    <div class="head__bg bg__cover" itemprop="image">
        <img src="<?= $imgUrl; ?>" alt="article image">
    </div>
    <?php
    vnet_get_template('template-section_blog_art_head');
    vnet_get_template('template-section_blog_art_content');
    ?>
</main>

<? get_footer(); ?>