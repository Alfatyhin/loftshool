<footer class="main-footer">
    <div class="content-footer">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'footer_menu',
                'depth' => 1,
                'container' => 'div',
                'container_class' => 'bottom-menu',
                'menu_class' => 'b-menu__list',
            )
        )
        ?>
        <div class="copyright-wrap">
            <div class="copyright-text">Туристик<a href="/" class="copyright-text__link"> loftschool 2016</a></div>
        </div>
    </div>
</footer>
