<!DOCTYPE html>
<html lang="ru">
<head>
    <title>
        <?php if(is_home()) {
            echo 'Последние новости и акции из мира туризма';
        }  elseif (is_search()) {
            echo 'Поиск по запросу: '; the_search_query();
        } else {
            single_term_title();
        }
        ?>
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php wp_head(); ?>
</head>
<body>
<div class="wrapper">
 <?php get_header(); ?>
    <!-- header_end-->
    <div class="main-content">
        <div class="content-wrapper">
            <div class="content">

                <h1 class="title-page">
                   <?php if(is_home()) {
                       echo 'Последние новости и акции из мира туризма';
                   }  elseif (is_search()) {
                       echo 'Поиск по запросу: '; the_search_query();
                   } else {
                       single_term_title();
                   }
                   ?>


                </h1>

                <?php if (have_posts()): ?>

                <div class="posts-list">

                    <?php while(have_posts()) : the_post(); ?>
                    <!-- post-mini-->
                    <div class="post-wrap">
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </div>
                        <div class="post-content">
                            <div class="post-content__post-info">
                                <div class="post-date"><?php the_time('d.m.Y'); ?></div>
                            </div>
                            <div class="post-content__post-text">
                                <div class="post-title">
                                    <?php the_title(); ?>
                                </div>
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="post-content__post-control"><a href="<?php the_permalink(); ?>" class="btn-read-post">Читать далее >></a></div>
                        </div>
                    </div>
                    <!-- post-mini_end-->

                    <?php endwhile; ?>
                </div>

                <div class="pagenavi-post-wrap">
                        <?php echo paginate_links() ?>
                </div>

                <?php endif; ?>

            </div>
            <!-- sidebar-->
            <?php get_sidebar() ?>
        </div>
    </div>
    <?php get_footer(); ?>
</div>
<!-- wrapper_end-->
<?php wp_footer() ?>
</body>
</html>