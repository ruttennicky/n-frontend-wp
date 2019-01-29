<?php
	function load_js() {
		if(!is_admin()) {
				wp_deregister_script('jquery');
				wp_enqueue_script('jquery','//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js',array(),false,true);
	      wp_enqueue_script('jquery-mmenu','//cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/5.6.5/js/jquery.mmenu.min.js',array('jquery'),false,true);
	      wp_enqueue_script('jquery-fancybox','//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.0/jquery.fancybox.min.js',array('jquery'),false,true);
				if (get_option('g_api') != '')
					wp_enqueue_script('googlemaps','//maps.googleapis.com/maps/api/js?key='.get_option('g_api'),array('jquery'),false,true);
	      wp_enqueue_script('jquery-slick','//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js',array( 'jquery' ),false,true);
  			wp_enqueue_script('jquery-css3animateit', '//cdnjs.cloudflare.com/ajax/libs/css3-animate-it/1.0.3/js/css3-animate-it.min.js',array('jquery'),false,true);
				if (get_option('bc_id') != '')
					wp_enqueue_script('blueconic', '//cdn.blueconic.net/ndgtlstd.js',array('jquery'),false,true);
				wp_enqueue_script('pingdom', '//rum-static.pingdom.net/pa-5c4cbec69a3f8300160004db.js',array('jquery'),false,true);
				wp_enqueue_script('nfrontend', get_template_directory_uri() . '/js/nfrontend.js',array('jquery'),false,true);
    }
	}

	function load_css() {
		if(!is_admin()) {
			wp_dequeue_style('mailchimp-for-wp-checkbox');
			wp_dequeue_style('boxes');
			wp_dequeue_style('jquery-qtip');
			wp_dequeue_style('jquery-rating');

			wp_enqueue_style('font-awesome','//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',false,false,'all');
			wp_enqueue_style('jquery-fancybox','//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.0/jquery.fancybox.min.css',false,false,'all');
			wp_enqueue_style('jquery-mmenu','//cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/5.6.5/css/jquery.mmenu.all.min.css',false,false,'all');
			wp_enqueue_style('jquery-css3animateit','//cdnjs.cloudflare.com/ajax/libs/css3-animate-it/1.0.3/css/animations.min.css',false,false,'all');
			wp_enqueue_style('nfrontend',get_stylesheet_uri(),false,false,'all');
		}
	}

  function load_metas() {
      echo '
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		      <link rel="apple-touch-icon" sizes="180x180" href="'. get_stylesheet_directory_uri() .'/images/favicons/apple-touch-icon.png">
		      <link rel="icon" type="image/png" href="'. get_stylesheet_directory_uri() .'/images/favicons/favicon-32x32.png" sizes="32x32">
		      <link rel="icon" type="image/png" href="'. get_stylesheet_directory_uri() .'/images/favicons/favicon-16x16.png" sizes="16x16">
		      <link rel="mask-icon" href="'. get_stylesheet_directory_uri() .'/images/favicons/safari-pinned-tab.svg">
		      <meta name="theme-color" content="#ffffff">
      ';
  }

	function load_hj() {
		if (get_option('hj_id') != '') {
			echo "<script>
		    		(function(h,o,t,j,a,r){
		        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
		        h._hjSettings={hjid:". get_option('hj_id').",hjsv:6};
		        a=o.getElementsByTagName('head')[0];
		        r=o.createElement('script');r.async=1;
		        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
		        a.appendChild(r);
		    		})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
						</script>";
		}
	}

  function load_ga() {
		if (get_option('ga_id') != '') {
	    echo "<script async src='//www.googletagmanager.com/gtag/js?id=". get_option('ga_id') ."'></script>
						<script>
						  window.dataLayer = window.dataLayer || [];
						  function gtag(){dataLayer.push(arguments);}
						  gtag('js', new Date());
						  gtag('config', '". get_option('ga_id') ."',{'anonymize_ip': true });
						</script>";
		}
  }

  function load_gtm() {
		if (get_option('gtm_id') != '') {
	    echo "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
						new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
						j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
						'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
						})(window,document,'script','dataLayer','".get_option('gtm_id')."');</script>";
		}
	}

	function load_fb_graph() {
		if (get_option('fb_page_id') != '') {
			echo "<div id='fb-root'></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
				js.src = 'https://connect.facebook.net/". get_locale() ."/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>";
		}
	}


	function load_theme_setup() {
		load_theme_textdomain( 'nfrontend', get_template_directory() . '/languages' );
	}

	function load_theme_blocks() {
	  register_nav_menus(
	    array(
	      'main-menu' 	=> __('Main menu'),
	      'footer-menu' => __('Footer menu'),
        'mobile-menu' => __('Mobile menu'),
        'meta-menu' 	=> __('Meta menu'),
        'lang-menu' 	=> __('Language menu')
	    )
	  );
	}

	function load_custom_options() {
	    register_setting('general','contact_form_id');
	    register_setting('general','contact_page_id');
	    register_setting('general','vacature_page_id');
			register_setting('general','blog_page_id');
	    register_setting('general','mc_form_id');
		  register_setting('general','facebook_url');
		  register_setting('general','twitter_url');
		  register_setting('general','instagram_url');
		  register_setting('general','linkedin_url');
		  register_setting('general','pinterest_url');
			register_setting('general','portfolio_url');
		  register_setting('general','address');
		  register_setting('general','ga_id');
			register_setting('general','gtm_id');
			register_setting('general','hj_id');
			register_setting('general','fb_page_id');
		  register_setting('general','g_api');
		  register_setting('general','notice');
			register_setting('general','theme_color');
			register_setting('general','show_bc');
			register_setting('general','bc_id');
			register_setting('general','d_id');
	    add_settings_field('contact_form_id','<label for="cfid">Contact form ID</label>','custom_field_cfid','general');
	    add_settings_field('contact_page_id','<label for="cpid">Contact page ID</label>','custom_field_cpid','general');
	    add_settings_field('vacature_page_id','<label for="vpid">Vacature page ID</label>','custom_field_vpid','general');
			add_settings_field('blog_page_id','<label for="bpid">Blog page ID</label>','custom_field_bpid','general');
	    add_settings_field('mailchimp_form_id','<label for="mcfid">Mailchimp form ID</label>','custom_field_mcfid','general');
	    add_settings_field('facebook_url','<label for="f_url">Facebook URL</label>','custom_field_furl','general');
	    add_settings_field('twitter_url','<label for="t_url">Twitter URL</label>','custom_field_turl','general');
	    add_settings_field('instagram_url','<label for="i_url">Instagram URL</label>','custom_field_iurl','general');
	    add_settings_field('linkedin_url','<label for="l_url">LinkedIn URL</label>','custom_field_lurl','general');
	    add_settings_field('pinterest_url','<label for="p_url">Pinterest URL</label>','custom_field_purl','general');
			add_settings_field('portfolio_url','<label for="pf_url">Portfolio URL</label>','custom_field_pfurl','general');
	    add_settings_field('address','<label for="address">Adres</label>','custom_field_addr','general');
	    add_settings_field('ga_id','<label for="ga_id">Google Analytics ID</label>','custom_field_gaid','general');
			add_settings_field('hj_id','<label for="hj_id">Hotjar ID</label>','custom_field_hjid','general');
			add_settings_field('gtm_id','<label for="ga_id">Google Tag Manager ID</label>','custom_field_gtmid','general');
	    add_settings_field('g_api','<label for="g_api">Google API key</label>','custom_field_gapi','general');
			add_settings_field('fb_page_id','<label for="fb_page_id">Facebook page ID</label>','custom_field_fbpid','general');
			add_settings_field('theme_color','<label for="theme_color">Theme color</label>','custom_field_tc','general');
			add_settings_field('bc_id','<label for="bc_id">Blueconic id</label>','custom_field_bcid','general');
			add_settings_field('d_id','<label for="d_id">Drift id</label>','custom_field_did','general');
			add_settings_field('notice','<label for="notice">Melding</label>','custom_field_notice','general');

	}

	function custom_field_cfid() 	{		echo '<input type="text" id="cfid" name="contact_form_id" value="' . get_option( 'contact_form_id') . '" />';			}
	function custom_field_cpid() 	{		echo '<input type="text" id="cpid" name="contact_page_id" value="' . get_option( 'contact_page_id') . '" />';			}
	function custom_field_vpid() 	{		echo '<input type="text" id="vpid" name="vacature_page_id" value="' . get_option( 'vacature_page_id') . '" />';		}
	function custom_field_bpid() 	{		echo '<input type="text" id="bpid" name="blog_page_id" value="' . get_option( 'blog_page_id') . '" />';						}
	function custom_field_mcfid() {		echo '<input type="text" id="mcfid" name="mc_form_id" value="' . get_option( 'mc_form_id') . '" />';							}
	function custom_field_furl() 	{		echo '<input type="text" id="f_url" name="facebook_url" value="' . get_option( 'facebook_url') . '" />';					}
	function custom_field_turl() 	{		echo '<input type="text" id="t_url" name="twitter_url" value="' . get_option( 'twitter_url') . '" />';						}
	function custom_field_iurl() 	{		echo '<input type="text" id="i_url" name="instagram_url" value="' . get_option( 'instagram_url') . '" />';				}
	function custom_field_lurl() 	{		echo '<input type="text" id="l_url" name="linkedin_url" value="' . get_option( 'linkedin_url') . '" />';					}
	function custom_field_purl() 	{		echo '<input type="text" id="p_url" name="pinterest_url" value="' . get_option( 'pinterest_url') . '" />';				}
	function custom_field_pfurl() {		echo '<input type="text" id="pf_url" name="portfolio_url" value="' . get_option( 'portfolio_url') . '" />';				}
	function custom_field_addr()	{		echo '<textarea id="address" name="address">' . get_option('address') . '</textarea>';														}
	function custom_field_gapi() 	{		echo '<input type="text" id="g_api" name="g_api" value="' . get_option( 'g_api') . '" />';												}
	function custom_field_hjid() 	{		echo '<input type="text" id="hj_id" name="hj_id" value="' . get_option( 'hj_id'). '" />';													}
	function custom_field_gaid() 	{		echo '<input type="text" id="ga_id" name="ga_id" value="' . get_option( 'ga_id'). '" />';													}
	function custom_field_fbpid() {		echo '<input type="text" id="fb_page_id" name="fb_page_id" value="' . get_option( 'fb_page_id') . '" />';					}
	function custom_field_gtmid() {		echo '<input type="text" id="gtm_id" name="gtm_id" value="' . get_option( 'gtm_id'). '" />';											}
	function custom_field_bcid() 	{		echo '<input type="text" id="bc_id" name="bc_id" value="' . get_option( 'bc_id'). '" />';													}
	function custom_field_did() 	{		echo '<input type="text" id="d_id" name="d_id" value="' . get_option( 'd_id'). '" />';														}
	function custom_field_tc() 		{		echo '<input type="text" id="theme_color" name="theme_color" value="' . get_option( 'theme_color'). '" data-default-color="#444" class="color-field"/>'; 	}
	function custom_field_notice(){		wp_editor( get_option( 'notice'), 'notice', array('media_buttons' => false, 'textarea_rows' => 5, 'teeny' => true, 'quicktags' => false) );	}

	function load_custom_login_logo() {
        echo '
        <style type="text/css">
        	body.login div#login h1 a {
            	background-image: url('. get_stylesheet_directory_uri() .'/images/favicons/android-chrome-192x192.png);
       		}
    	</style>
        ';
	}

	function load_drift_chat()
	{
		if (get_option('d_id'))
		{
			echo '
					<script>
					"use strict";
					!function() {
					var t = window.driftt = window.drift = window.driftt || [];
					if (!t.init) {
						if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
						t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ],
						t.factory = function(e) {
							return function() {
								var n = Array.prototype.slice.call(arguments);
								return n.unshift(e), t.push(n), t;
							};
						}, t.methods.forEach(function(e) {
							t[e] = t.factory(e);
						}), t.load = function(t) {
							var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
							o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
							var i = document.getElementsByTagName("script")[0];
							i.parentNode.insertBefore(o, i);
						};
					}
					}();
					drift.SNIPPET_VERSION = "0.3.1";
					drift.load("' . get_option('d_id') . '");
					</script>
			';
		}
	}

	function remove_verions_js_css($src) {
		if ( strpos( $src, 'ver=' ) )
			$src = remove_query_arg( 'ver', $src );
		return $src;
	}

	function load_acf_google_api() {
		acf_update_setting('google_api_key', get_option('g_api'));
	}

	add_action('wp_enqueue_scripts','load_js');
	add_action('wp_enqueue_scripts','load_css');
  add_action('wp_head','load_metas',10);
	add_action('wp_footer','load_ga',40);
	add_action('wp_footer','load_gtm',50);
	add_action('wp_footer','load_hj',60);
	add_action('wp_footer','load_fb_graph',70);
	add_actiom('wp_footer','load_drift_chat',80);
	add_action('init','load_theme_blocks');
  add_action('login_enqueue_scripts','load_custom_login_logo');
  add_action('after_setup_theme','load_theme_setup');
	add_action('acf/init', 'load_acf_google_api');

  add_filter('style_loader_src','remove_verions_js_css',9999);
  add_filter('script_loader_src','remove_verions_js_css',9999);
  add_filter('admin_init','load_custom_options');

  add_theme_support('yoast-seo-breadcrumbs');
	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');

	remove_action('wp_head','wp_generator');
	remove_action('wp_head','print_emoji_detection_script',7);
	remove_action('wp_print_styles','print_emoji_styles');

	remove_action('admin_print_scripts','print_emoji_detection_script');
	remove_action('admin_print_styles','print_emoji_styles');
?>
