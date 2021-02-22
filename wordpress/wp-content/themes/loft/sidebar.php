<div class="sidebar">

    <?php if($tags = get_terms(array('taxonomy' => 'post_tag', 'hide_empty' => true))): ?>

    <div class="sidebar__sidebar-item">
        <div class="sidebar-item__title">Теги</div>
        <div class="sidebar-item__content">
            <ul class="tags-list">
               <?php foreach ($tags as $tag): ?>
                   <li class="tags-list__item">
                       <a href="<?php echo get_term_link($tag) ?>" class="tags-list__item__link">
                           <?php echo $tag->name; ?>
                       </a>
                   </li>
               <? endforeach; ?>
            </ul>
        </div>
    </div>

    <? endif; ?>

    <?php if($category = getChildCategoty(get_queried_object()->term_id)): ?>

    <div class="sidebar__sidebar-item">
        <div class="sidebar-item__title">Категории</div>

        <div class="sidebar-item__content">
            <ul class="category-list">
                <?php foreach ($category as $item) :?>
                <li class="category-list__item">
                    <a href="<?php print_r($item['parent']['link']); ?>" class="category-list__item__link">
                        <?php print_r($item['parent']['name']); ?>
                    </a>
                    <ul class="category-list__inner">
                        <?php foreach ($item['child'] as $item): ?>
                        <li class="category-list__item">
                            <a href="<?php print_r($item['link']); ?>" class="category-list__item__link">
                                <?php print_r($item['name']); ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
    <?php else: ?>
    <?php $news = get_the_category(get_queried_object()->term_id); ?>
    <?php //var_dump($news); ?>
        <div class="sidebar__sidebar-item">
            <div class="sidebar-item__title">новости</div>

            <div class="sidebar-item__content">
                <ul class="category-list">
                    <?php $posts = get_posts ("category=" .get_queried_object()->term_id ."&orderby=date&numberposts=10"); ?>
                    <?php if ($posts) : ?>
                        <?php foreach ($posts as $post) : setup_postdata ($post); ?>

                    <li class="category-list__item">
                        <a href="<?php the_permalink() ?>" rel="bookmark" class="category-list__item__link" ><?php the_title(); ?></a>
                    </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
    <?php endif; ?>

    <?php if ( is_active_sidebar( 'true_side' ) ) : ?>

        <div id="true-side" class="sidebar__sidebar-item">

            <?php dynamic_sidebar( 'true_side' ); ?>

        </div>

    <?php endif; ?>

</div>
