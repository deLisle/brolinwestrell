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
		<div class="col-sm-12 firstpage-header-box">
			<p>Vi hjälper organisationer att hantera utmaningar, att klara kriser och att utvecklas. Vi vägleder chefer och medarbetare i att hitta rätt i sina yrkesroller och att möta livets prövningar. I såväl vardag som kris. Enkelt uttryckt är vi en resurs för er organisation när den drabbas av motgång eller behöver ta nya steg.</p>
			<img src="/wp-content/themes/brolinwestrell/assets/images/front-1.jpg" class="img-responsive" style="height: 233px; margin-right: 15px; float: left;" />
			<img src="/wp-content/themes/brolinwestrell/assets/images/front-2.jpg" class="img-responsive" style="height: 233px; margin-right: 15px; float: left;" />
			<img src="/wp-content/themes/brolinwestrell/assets/images/front-3.jpg" class="img-responsive" style="height: 233px; margin-right: 15px; float: left;" />
		</div>
		<div class="col-sm-8">
			<?php get_template_part('templates/content', 'page'); ?>
		 </div>
		<?php echo \do_shortcode('[latest_articles count=1 position="right"]') ?>
	</div>
<?php endwhile; ?>
