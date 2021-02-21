<?php
// подключение стилей
add_action('wp_enqueue_scripts', function () {
   wp_enqueue_style('libs', get_stylesheet_directory_uri() . '/css/libs.min.css' );
   wp_enqueue_style('main', get_stylesheet_directory_uri() . '/css/main.css', array(), time() );
   wp_enqueue_style('media', get_stylesheet_directory_uri() . '/css/media.css', array(), time() );

   wp_enqueue_script('jquery');
   wp_enqueue_script('js', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), null, true);
});

register_nav_menus(
    array (
        'head_menu' => 'Меню в шапке',
        'footer_menu' => 'Меню в футере'
    )
);

add_theme_support('post-thumbnails');

// register sidebar
function true_register_wp_sidebars() {

    /* В боковой колонке - первый сайдбар */
register_sidebar(
    array(
        'id' => 'true_side', // уникальный id
        'name' => 'Боковая колонка', // название сайдбара
        'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
        'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
        'after_title' => '</h3>'
    )
);

}

add_action( 'widgets_init', 'true_register_wp_sidebars' );







function getChildCategoty($termID)
{
    $taxonomyName = "category";
    $termchildren = get_term_children( $termID, $taxonomyName );

    foreach ($termchildren as $child) {
        $term = get_term_by( 'id', $child, $taxonomyName );
        $childID = $term->term_id;

        if (get_term_children( $childID, $taxonomyName )) {

            $childChildren[$childID]['parent']['link'] = get_term_link( $term->term_id, $term->taxonomy );
            $childChildren[$childID]['parent']['name'] = $term->name;

            $child = get_term_children( $childID, $taxonomyName );

            foreach ($child as $item) {
                $term = get_term_by( 'id', $item, $taxonomyName );
                $id = $term->term_id;
                $childChildren[$childID]['child'][$id]['link'] = get_term_link( $term->term_id, $term->taxonomy );
                $childChildren[$childID]['child'][$id]['name'] = $term->name;
            }
        }
    }
    if (!empty($childChildren)) {
        return $childChildren;
    } else {
        return false;
    }

}
