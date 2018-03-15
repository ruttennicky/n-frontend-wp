<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
	    <?php wp_head(); ?>
      <title><?php wp_title(); ?></title>
  </head>
  <body>
    	<div>
    		<header class="container p-top-40 p-bottom-40">
    			<div class="row">
  				 	<nav class="col-xs-12 visible-xs visible-sm">
    				 	<ul id="mobile-menu-button" class="list-inline m-0">
							<li><i class="fa fa-navicon m-right-10"></i><a href="#mobile-menu"><?php _e('lbl_mobilemenu','nfrontend'); ?></a></li>
    				 	</ul>
					  </nav>
  				 	<div class="col-md-3 m-0 visible-md visible-lg">
  				 		<a href="<?php echo home_url(); ?>" title="<?php _e('lbl_tohomepage','nfrontend'); ?>">
  				 			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_ndigital.jpg" alt="<?php bloginfo('sitename'); ?>" class="img-responsive" width="100" />
  				 		</a>
  				 	</div>
  				 	<div class="col-md-9 visible-md visible-lg">
    				 	<div class="row">
	    				 	<nav class="col-xs-12 f-s-09">
		    				 	<?php
									wp_nav_menu(	array( 	'theme_location' => 'meta-menu',
															'menu_class' => 'm-0 list-inline pull-right',
															'container' => '',
															'menu_id' => 'language-menu'    ) );
								?>
	    				 	</nav>
    				 	</div>
    				 	<div class="row">
	    				 	<nav class="col-xs-12 f-s-12 m-top-20">
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
        <main class="container p-top-60 p-bottom-80">
