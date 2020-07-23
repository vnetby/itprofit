<? get_header(); ?>
<main>
    <section class="form__section">
        <div class="container">
            <h1 class="h1"><?= get_the_title(); ?></h1>
            <? if (have_posts()):while (have_posts()):the_post(); ?>
            <div>
                <? the_content(); ?>
            </div>
            <? endwhile; endif; ?>
        </div>
    </section>
</main>
<? get_footer(); ?>