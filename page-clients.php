<?php
/**
 * Template Name: Page Clients
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php the_content(); ?>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
<?php $portfolios = \query_posts('posts_per_page=-1&post_type=client');
?><div id="clients"><?php
while (have_posts()) : the_post();
	$metas = get_post_meta ( get_the_ID(), null, true );
	?>
	<a href="<?php the_permalink(); ?>" >
		<div class="client col-sm-6 col-md-3">
			<?php
			if ( has_post_thumbnail() ) {
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
				// var_dump($large_image_url);
				echo '<img width="'.$large_image_url[1].'" height="'.$large_image_url[2].'" class="attachment-large wp-post-image large" src="'.$large_image_url[0].'" />';
			}
			?>
			<h3 class="client-title"><?php the_title(); ?></h3>
			<div class="client-description">
			<?php the_excerpt();?>
			</div>
		</div>
	</a>
	<?php
endwhile;
?>
</div>