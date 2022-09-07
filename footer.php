<footer role="contentinfo" class="bg-secondary text-white rounded">
    <?php wp_nav_menu([
                    'theme_location' => 'footer-nav',
                    'depth' => 1,
                    'container' => '',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => 'nav',
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker()
                    ]); ?>
	<a href="#Top" class="top"><em class="fas fa-chess-rook"></em> Top</a>
	<p>&copy;&nbsp;<?php echo date( 'Y' ); ?> Unterfränkischer Schachverband e.V.</p>
</footer>
<?php wp_footer(); ?>
</main>
</body>
</html>