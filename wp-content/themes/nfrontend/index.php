<?php	get_header();		?>
<div class="row">
	<div class="col-xs-12">
<?php	if ( have_posts() ) : while ( have_posts() ) : the_post();	?>
			<h1 class="m-0"><?php	the_title();	?></h1>
			<div class="m-top-40"><?php	the_content();	?></div>
<?php	endwhile; endif; 	?>
	</div>
</div>
<?php get_footer(); ?>
