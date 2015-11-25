<?php
/**
 * Template Name: Page About
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php the_content(); ?>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
<?php $portfolios = \query_posts('posts_per_page=-1&post_type=employee_portfolios');
while (have_posts()) : the_post();
	$metas = get_post_meta ( get_the_ID(), null, true );
	foreach ($metas as $key => $value) {
		$key = trim($key);
    	if ( '_' == $key{0} )
        	continue;
		echo '<div class="'.$key.'">'.$value[0].'</div>';
	}
	if ( has_post_thumbnail() ) {
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
		// var_dump($large_image_url);
		echo '<img width="'.$large_image_url[1].'" height="'.$large_image_url[2].'" class="attachment-medium wp-post-image medium" src="'.$large_image_url[0].'" />';
	}
	the_content( 'Read the full post »' );
endwhile;
?>