<?php
    /* Template Name: Blog page */
    get_header();
    $fields = get_fields();
?>
<main class="container-fluid p-bottom-120">
<?php
    // if the slideshow is populated
    if ($fields['slideshow']):
?>
    <div class="row p-top-60 p-bottom-20 gallery-header">
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
          <h2 class="col-xs-12 col-md-6 col-md-offset-2"><?php the_title(); ?></h2>
      </div>
      <div class="row p-top-40">
        <div class="col-xs-12 col-md-6 col-md-offset-2"><?php the_content(); ?></div>
      </div>
<?php
    endwhile; endif;
    // get all the posts
    $articles = new WP_Query(array('page_type' => 'post'));
    if ($articles->have_posts() ) : while ($articles->have_posts()) : $articles->the_post();
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
            <div class="f-s-09 f-italic f-f-secondary f-grey"><?php _e('lbl_writtenon','ndigital'); ?> <?php the_date(); ?></div>
            <div class="m-top-10"><?php the_excerpt();//the_content(__('lbl_readmore','ndigital')); ?></div>
            <div class="m-top-20"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('lbl_readmore','ndigital'); ?></a>
        </div>
      </div>
<?php
    endwhile; endif;
?>
</main>
<?php get_footer(); ?>
