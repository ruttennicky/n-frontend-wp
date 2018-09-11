<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
	    <?php wp_head(); ?>
      <title><?php wp_title(); ?></title>
  </head>
  <body>
    	<div>
    		<header class="container-fluid p-top-40 p-bottom-40">
    			<div class="row">
  				 	<nav class="col-8 d-md-none m-top-30">
						<a href="#mobile-menu-wrapper">	<i class="fa fa-navicon m-right-10"></i><?php _e('lbl_mobilemenu','nfrontend'); ?></a>
					  </nav>
  				 	<div class="col-4 m-0">
  				 		<a href="<?php echo home_url(); ?>" title="<?php _e('lbl_tohomepage','nfrontend'); ?>">
  				 			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_ndigital.jpg" alt="<?php bloginfo('sitename'); ?>" class="img-responsive" width="100" />
  				 		</a>
  				 	</div>
  				 	<div class="col-8 d-none d-md-block">
    				 	<div class="row">
	    				 	<nav class="col-12 f-s-09">
		    				 	<?php
									wp_nav_menu(	array( 	'theme_location' => 'meta-menu',
															'menu_class' => 'm-0 list-inline pull-right',
															'container' => '',
															'menu_id' => 'language-menu'    ) );
								?>
	    				 	</nav>
    				 	</div>
    				 	<div class="row">
	    				 	<nav class="col-12 f-s-12 m-top-20">
	    				 		<?php
									wp_nav_menu(	array( 	'theme_location' => 'main-menu',
															'menu_class' => 'm-0 list-inline pull-right',
															'container' => '',
															'menu_id' => 'main-menu'    ) );
								?>
	    				 	</nav>
    				 	  </div>
  				 	  </div>
  				  </div>
    		</header>
        <main class="container-fluid p-top-60 p-bottom-80">
