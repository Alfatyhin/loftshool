<header class="main-header">
    <div class="top-header">
        <div class="top-header__wrap">
            <div class="logotype-block">
                <div class="logo-wrap"><a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg" alt="Логотип" class="logo-wrap__logo-img"></a></div>
            </div>

            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'head_menu',
                    'depth' => 1,
                    'container' => 'nav',
                    'container_class' => 'main-navigation',
                    'menu_class' => 'nav-list',

                )
            )
            ?>
        </div>
    </div>
    <div class="bottom-header">
        <div class="search-form-wrap">
            <form action="<?php echo site_url() ?>" class="search-form">
                <input type="text" name="s" placeholder="Поиск..." class="search-form__input">
                <button class="search-form__btn-search"><i class="icon icon-search"></i></button>
            </form>
        </div>
    </div>
</header>