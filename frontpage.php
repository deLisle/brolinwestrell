<?php
/**
 * Template Name: Frontpage
 */
?>
<?php while (have_posts()) : the_post(); ?>
  	<?php get_template_part('templates/page', 'header'); ?>
  	<?php
	if ( has_post_thumbnail() ) {
		$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		// var_dump($full_image_url);
		echo '<img width="'.$full_image_url[1].'" height="'.$full_image_url[2].'" class="attachment-full wp-post-image full img-responsive" src="'.$full_image_url[0].'" />';
	}
	?>
	<div class="row">
		<div class="col-sm-8">
			<?php get_template_part('templates/content', 'page'); ?>
		 </div>
		<?php echo \do_shortcode('[latest_articles count=2 position="right"]') ?>
	</div>
<?php endwhile; ?>
