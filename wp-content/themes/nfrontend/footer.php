    </main>
    <footer class="container-fluid border-light-grey-top p-top-60 p-bottom-60 f-s-09">
    <div class="row">
      <nav class="col-xs-12 text-center">
<?php
          wp_nav_menu(	array( 	'theme_location' => 'footer-menu',
                          'menu_class' => 'm-0 list-inline',
                          'container' => '',
                          'menu_id' => 'footer-menu'    ) );
?>
        </nav>
      </div>
<?php
      if (get_option('address') !== 0): ?>
      <div class="row p-top-40">
          <div class="col-xs-12 text-center"><?php echo get_option('address'); ?></div>
      </div>
<?php
      endif;
      if (get_option('facebook_url') !== 0 || get_option('twitter_url') !== 0 || get_option('instagram_url') !== 0 || get_option('linkedin_url') !== 0 || get_option('pinterest_url') !== 0):
?>
      <div class="row p-top-40">
        <div class="col-xs-12 text-center f-s-15">
          <ul class="list-inline">
              <li><?php _e('lbl_socialtextprefix','nfrontend'); ?></li>
<?php     if (get_option('facebook_url') !=  ''): ?>
              <li>
                <a href="<?php echo get_option('facebook_url'); ?>" title="<?php _e('lbl_facebooklink','nfrontend'); ?>" class="no-border">
                  <i class="fa fa-facebook-official"></i>
                </a>
              </li>
<?php
          endif;
          if (get_option('twitter_url') != ''):
?>
              <li>
                <a href="<?php echo get_option('twitter_url'); ?>" title="<?php _e('lbl_twitterlink','nfrontend'); ?>" class="no-border">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
<?php
            endif;
            if (get_option('instagram_url') != ''):
?>
              <li>
                <a href="<?php echo get_option('instagram_url'); ?>" title="<?php _e('lbl_instagramlink','nfrontend'); ?>" class="no-border">
                  <i class="fa fa-instagram"></i>
                </a>
              </li>
<?php
            endif;
            if (get_option('linkedin_url') != ''):
?>
              <li>
                <a href="<?php echo get_option('linkedin_url'); ?>" title="<?php _e('lbl_linkedinlink','nfrontend'); ?>" class="no-border">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
<?php
            endif;
            if (get_option('pinterest_url') != ''):
?>
              <li>
                <a href="<?php echo get_option('pinterest_url'); ?>" title="<?php _e('lbl_pinterestlink','nfrontend'); ?>" class="no-border">
                  <i class="fa fa-pinterest"></i>
                </a>
              </li>
<?php         endif;    ?>
          </ul>
        </div>
      </div>
<?php  endif;   ?>
    </footer>
  </div>
  <nav id="mobile-menu-wrapper">
<?php
        wp_nav_menu(	array( 	'theme_location' => 'mobile-menu',
                    'container' => '',
                    'menu_id' => 'mobile-menu'    ) );
?>
    </nav>
<?php    if (get_option('fb_app_id') != ''):   ?>
    <div class="fb-customerchat"
      attribution="setup_tool"
      page_id="<?php echo get_option('fb_app_id'); ?>"
      theme_color="#fd5f5f">
    </div>
<?php
          endif;
  wp_footer();
?>
  </body>
</html>
