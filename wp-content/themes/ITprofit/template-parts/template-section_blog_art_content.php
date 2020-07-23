<?php

/**
 * Контент статьи блога
 */
?>

<? if (have_posts()):while (have_posts()):the_post(); ?>
<article class="seo__about" itemscope itemtype="http://schema.org/BlogPosting">
  <div class="container">
    <!-- <div class="txt__opacity post-excerpt">
      <?= get_the_excerpt(); ?>
    </div> -->
    <div class="editor-content">
      <? the_content(); ?>
    </div>
  </div>
</article>
<? endwhile; endif; ?>