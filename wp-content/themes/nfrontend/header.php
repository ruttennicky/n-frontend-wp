<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
	    <?php wp_head(); ?>
        <title><?php wp_title(); ?></title>
  </head>
  <body>
    <div>
      <div id="fb-root"></div>
      <header class="container-fluid p-top-40">
        <div class="row">
          <div class="col-xs-6 hidden-md hidden-lg m-top-30">
            <a href="#mobile-menu-wrapper" title="<?php _e('lbl_menutitle','ndigital'); ?>" class="cta-primary very-small">
              <i class="fa fa-bars m-right-10"></i><?php _e('lbl_menulink','ndigital'); ?>
            </a>
          </div>
          <h1 class="col-xs-6 col-md-2 text-right md-text-left">
            <a href="<?php bloginfo('home'); ?>" title="<?php _e('lbl_homelink','ndigital'); ?>" class="no-border">
              <img src="<?php echo get_template_directory_uri(); ?>/images/logo_ndigital.jpg" alt="<?php _e('lbl_logoalt','ndigital'); ?>" class="h-125" />
            </a>
          </h1>
          <nav class="col-md-10 text-right hidden-xs hidden-sm m-top-40">
<?php
              wp_nav_menu(	array( 	'theme_location' => 'main-menu',
                          'menu_class' => 'm-0 list-inline',
                          'container' => '',
                          'menu_id' => 'main-menu'    ) );
?>
          </nav>
        </div>
      </header>
