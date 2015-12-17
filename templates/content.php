<?php if ( $_SERVER["REQUEST_URI"] == '/nyheter/' ) { ?>
<p>Under de snart tio år som BrolinWestrell funnits har det hänt en del. I nyhetsarkivet har vi samlat en del av det vi velat berätta om under åren och en del som media uppmärksammat.</p>
<br />
<?php }?>
<article <?php post_class('inner-container'); ?>>
  <header>
    <?php get_template_part('templates/entry-meta'); ?>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </header>
  <div class="entry-summary clearfix">
 	<?php
  	if ( has_post_thumbnail() ) {
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-thumb' );
			// var_dump($large_image_url);
			echo '<img width="'.$large_image_url[1].'" height="'.$large_image_url[2].'" class="attachment-blog-thumb alignleft wp-post-image blog-thumb" src="'.$large_image_url[0].'" />';
	}
	?>

    <?php the_excerpt(); ?>
  </div>
</article>
