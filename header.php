<!DOCTYPE html>
<html <?php language_attributes(); ?> id="Top">
    <head>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class('bg-light'); ?>>
    <main class="container-lg">
        <div class="row">
            <div class="col-3">
                <div>
                    <a href="<?php echo home_url(); ?>"><img class="img-fluid" src="<?php print IMG; ?>/usv_wap.png" alt="USV Logo"></a>
                </div>
            </div>
            <div class="col-9">
                <div>
                    <strong>
                        <a href="<?php echo home_url(); ?>" class="fs-2"><?php bloginfo('name'); ?></a>
                    </strong>
                    <br>
				    <span class="d-none d-md-block">Bezirksverband des <a href="http://www.schachbund-bayern.de/" target="_blank">Bayerischen
						Schachbundes</a> im <a href="http://www.schachbund.de/" target="_blank">Deutschen Schachbund
						e.V.</a> und <a href="http://www.blsv.de/" target="_blank">Bayerischen Landessportverband</a></span></div>
            </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-light bg-secondary" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php wp_nav_menu([
                    'theme_location' => 'header-nav',
                    'depth' => 1,
                    'container' => 'div',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'bs-example-navbar-collapse-1',
                    'menu_class' => 'navbar-nav mr-auto',
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker()
                    ]); ?>
        </nav>