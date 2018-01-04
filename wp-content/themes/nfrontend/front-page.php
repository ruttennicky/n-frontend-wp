<?php
    get_header();
    $fields = get_fields();
?>
<main class="container-fluid p-bottom-80">
<?php
    // if the slideshow is populated
    if ($fields['slideshow']):
?>
    <div class="row p-top-80 p-bottom-20 gallery-header">
<?php
      foreach ($fields['slideshow'] as $image):
?>
        <div class="col-xs-12 p-0">
          <img src="<?php echo $image['sizes']['frontpage-heading-image']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive"/>
        </div>
<?php
      endforeach;
?>
    </div>
<?php
    endif;
    // the main WP content loop
    if (have_posts() ) : while ( have_posts()) : the_post();
?>
    <div class="row p-top-60">
      <div class="col-xs-12 col-md-3 col-md-offset-2 md-text-right f-f-secondary f-italic f-s-12"><?php echo $fields['slogan']; ?></div>
      <div class="visible-md visible-lg col-xs-05 h-50 border-secondary-right"></div>
      <div class="col-xs-12 col-md-4 col-md-offset-05 xs-p-top-20">
          <?php the_content(); ?>
          <div class="m-top-40">
            <a href="<?php echo get_the_permalink(11); ?>" alt="<?php _e('lbl_contacttitle','ndigital'); ?>" class="cta-primary very-small"><?php _e('lbl_contactlink','ndigital'); ?></a>
          </div>
      </div>
    </div>
<?php
    endwhile; endif;
    // if the services are filled in
    if ($fields['services']):
?>
      <div class="row p-top-80">
          <h3 class="col-xs-12 text-center m-0"><?php _e('ttl_ourstudio','ndigital'); ?></h3>
      </div>
<?php
        wp_reset_query();
        $frontservices = new WP_Query(array('post__in' => $fields['services'],'post_type' => 'page'));
        if ($frontservices->have_posts()) : while ($frontservices->have_posts()) : $frontservices->the_post();
          $subfields = get_fields();
?>
          <div class="row p-top-40">
            <div class="col-xs-3 col-xs-offset-2 visible-md visible-lg text-right f-darker-grey"><i class="fa fa-<?php echo $subfields['icoon']; ?> fa-2x m-top-5"></i></div>
            <div class="col-xs-05 visible-md visible-lg h-3em border-secondary-right"></div>
            <div class="col-xs-12 col-md-4 col-md-offset-05 xs-p-top-20">
              <h5 class="m-0"><?php the_title(); ?></h5>
              <div class="m-top-10"><?php echo $subfields['samenvatting'] ?></div>
              <div class="m-top-10"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('lbl_readmore','ndigital'); ?></a></div>
            </div>
          </div>
<?php
        endwhile; endif;
    endif;
    // if there are references
    if ($fields['referenties'] && $fields['referenties_titel']):
?>
      <div class="row p-top-80">
        <h3 class="col-xs-12 text-center m-0"><?php echo $fields['referenties_titel']; ?></h3>
      </div>
      <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
<?php
        wp_reset_query();
        $frontreferences = new WP_Query(array('post__in' => $fields['referenties'],'post_type' => 'page'));
        if ($frontreferences->have_posts()) : while ($frontreferences->have_posts()) : $frontreferences->the_post();
          $subfields = get_fields();
?>
            <div class="col-xs-6 col-sm-4 col-md-3 m-top-40">
                <a href="<?php the_permalink(); ?>" title="<?php _e('lbl_referencetitle','ndigital'); ?> <?php echo $subfields['naam']; ?>">
                  <img src="<?php echo $subfields['logo']['sizes']['reference-logo']; ?>" alt="<?php echo $subfields['logo']['alt']; ?>" class="img-responsive" />
                </a>
            </div>
<?php    endwhile; endif; ?>
        </div>
      </div>
<?php
    endif;
    // if there is frontpage blogpost
    if ($fields['blogartikel'] && $fields['blog_titel']):
?>
      <div class="row p-top-80">
        <h3 class="col-xs-12 text-center m-0"><?php echo $fields['blog_titel']; ?></h3>
      </div>
<?php
      wp_reset_query();
      $frontarticle = new WP_Query(array('post__in' => $fields['blogartikel']));
      if ($frontarticle->have_posts()) : while ($frontarticle->have_posts()) : $frontarticle->the_post();
        $categories = get_the_category();
?>
        <div class="row p-top-40">
          <div class="col-xs-12 col-md-8 col-md-offset-2">
              <img src="<?php echo the_post_thumbnail_url('frontpage-blog-image'); ?>" class="img-responsive" />
              <div class="p-relative">
                <div class="p-absolute a-b-0 a-r-0 p-left-30 p-right-30 p-top-5 p-bottom-5 bg-secondary f-bold f-white">#<?php echo $categories[0]->cat_name; ?></div>
              </div>
          </div>
        </div>
        <div class="row p-top-40">
          <div class="col-xs-12 col-md-3 col-md-offset-2 md-text-right f-f-secondary f-italic f-s-12"><?php the_title(); ?></div>
          <div class="visible-md visible-lg col-xs-05 h-50 border-secondary-right"></div>
          <div class="col-xs-12 col-md-4 col-md-offset-05 xs-p-top-20">
            <div><?php the_excerpt(); ?></div>
            <div class="m-top-10"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('lbl_readmore','ndigital'); ?></a></div>
            <div class="m-top-40"><a href="<?php echo get_the_permalink(get_option('blog_page_id')); ?>" title="<?php _e('lbl_allarticlesalt','ndigital'); ?>" class="cta-primary very-small"><?php _e('lbl_allarticleslink','ndigital'); ?></a></div>
          </div>
        </div>
<?php
      endwhile; endif;
    endif;
    // if there is a mailchimp form configured
    if (get_option('mc_form_id') !== 0):
?>
    <div class="row p-top-80">
      <h3 class="col-xs-12 text-center m-0"><?php _e('ttl_newslettertitle','ndigital'); ?></h3>
    </div>
    <div class="row p-top-20">
      <div class="col-xs-12 col-md-6 col-md-offset-3 text-center"><?php _e('txt_newslettertext','ndigital'); ?></div>
    </div>
    <div class="row p-top-20">
      <div class="col-xs-12"><?php echo do_shortcode('[mc4wp_form id="'.get_option('mc_form_id').'"]'); ?></div>
    </div>
<?php
    endif;
?>
</main>
<?php get_footer(); ?>
