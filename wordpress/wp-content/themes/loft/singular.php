<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Страница поста</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>

</head>
<body>
<div class="wrapper">
    <?php get_header(); the_post(); ?>
    <!-- header_end-->
    <div class="main-content">
        <div class="content-wrapper">
            <div class="content">
                <div class="article-title title-page">
                    <?php the_title(); ?>
                </div>
                <div class="article-image">
                    <?php
                        if(getChildCategoty(get_queried_object()->term_id)) {
                            the_post_thumbnail('full');
                        }
                    ?>

                </div>
                <div class="article-info">
                    <div class="post-date"><?php the_time('d.m.Y'); ?></div>
                </div>
                <div class="article-text">
                   <?php the_content(); ?>
                </div>
                <div class="article-pagination">
                    <?php if ($next_post = get_next_post()): ?>

                    <div class="article-pagination__block pagination-prev-left">
                        <a href="<?php echo get_term_link($next_post->ID); ?>" class="article-pagination__link">
                            <i class="icon icon-angle-double-left"></i>
                            Сдедующая   статья
                        </a>
                        <div class="wrap-pagination-preview pagination-prev-left">
                            <div class="preview-article__img">
                                <?php echo get_the_post_thumbnail($next_post->ID, array(170, 113)) ?>
                            </div>
                            <div class="preview-article__content">
                                <div class="preview-article__info">
                                    <a href="<?php echo get_term_link($next_post->ID); ?>" class="post-date">
                                        <?php echo get_the_time('d.m.Y', $next_post->ID)?>
                                    </a>
                                </div>
                                <div class="preview-article__text">
                                    <?php echo $next_post->post_title ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if ($previous_post = get_previous_post()): ?>
                    <div class="article-pagination__block pagination-prev-right">
                        <a href="<?php echo get_term_link($previous_post->ID); ?>" class="article-pagination__link">
                            Предыдущая статья
                            <i class="icon icon-angle-double-right"></i>
                        </a>
                        <div class="wrap-pagination-preview pagination-prev-right">
                            <div class="preview-article__img">
                                <?php echo get_the_post_thumbnail($previous_post->ID, array(170, 113)) ?>
                            </div>
                            <div class="preview-article__content">
                                <div class="preview-article__info">
                                    <a href="<?php echo get_term_link($previous_post->ID); ?>" class="post-date">
                                        <?php echo get_the_time('d.m.Y', $previous_post->ID)?>
                                    </a>
                                </div>
                                <div class="preview-article__text">
                                    <?php echo $previous_post->post_title ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>



            <!-- sidebar-->
            <?php get_sidebar() ?>
        </div>
    </div>
   <?php get_footer() ?>
</body>
</html>
