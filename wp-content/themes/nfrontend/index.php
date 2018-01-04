<?php
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
?>
</main>
<?php get_footer(); ?>
