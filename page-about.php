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
?><div id="employees"><?php
while (have_posts()) : the_post();
	$metas = get_post_meta ( get_the_ID(), null, true );
	?>
	<div class="employee">
		<?php
		if ( has_post_thumbnail() ) {
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
			// var_dump($large_image_url);
			echo '<img width="'.$large_image_url[1].'" height="'.$large_image_url[2].'" class="attachment-large wp-post-image large" src="'.$large_image_url[0].'" />';
		}
		?>
		<h3><?php the_title(); ?></h3>
		<?php foreach ($metas as $key => $value) {
			$key = trim($key);
	    	if ( '_' == $key{0} )
	        	continue;
			echo '<div class="'.strtolower($key).'">'.$value[0].'</div>';
		}
		?>
		<div class="employee-description">
		<?php the_content();?>
		</div>
	</div>
	<?php
endwhile;
?>
</div>