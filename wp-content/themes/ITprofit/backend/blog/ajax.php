<?
function ajax_blog()
{

    $args = [
        'post_type' => 'post-blog',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
    ];
    if($_POST['id']){
        $args['tax_query'] = [
                [
                    'taxonomy' => 'cat-blog',
                    'field'    => 'id',
                    'terms'    => $_POST['id'],
                ]
        ];
    }
    $result = false;
    $blogs = new WP_Query($args);
    if ($blogs->have_posts())
    {
        $result = '';
        while ($blogs->have_posts())
        {
            $blogs->the_post();
            $result .= "<section class='blog__section'><div class='container'><div class='blog__item'>";
            $result .= "<a href='" . get_the_permalink() . "'>";
            $result .= "<div class='blog__img bg__cover' style='background-image: url(" . get_the_post_thumbnail_url( get_the_ID(), 'preview-blog') . ");'></div></a></div>";
            $result .= "<div class='blog_h3'><a href='" . get_the_permalink() . "' class='like__h3'>" . get_the_title() . "</a></div>";
            $terms = get_the_terms(get_the_ID(), 'cat-blog');
            if ($terms)
            {
                $result .= "<div class='tags__block'>";
                foreach ($terms as $term)
                {
                    $result .= "<a class='blue__txt bold' data-id='" . $term->term_id . "' href='javascript:void(0);'>" . $term->name . "</a>";
                }
                $result .= "</div>";
            }
            $result .= "<p>" . get_the_excerpt() . "</p></div></section>";
        }
        wp_reset_postdata();
    }
    if($result) {
        echo $result;
    } else {
        echo "В данной категории нету статей!";
    }

    die;
}
