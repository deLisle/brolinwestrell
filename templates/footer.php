<?php if ( basename( get_page_template() ) === 'page-about.php' ): ?>
<div class="container-fluid secondary-content">
		<div class="container content row text-center">
			<div id="employees"><?php
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
</div></div></div>
<?php endif; if ( is_front_page() ): ?>
	<div class="container-fluid secondary-content">
		<div class="container content row text-center">
			<?php
			// var_dump(get_the_ID(), get_post_meta(get_the_ID(), '_homepage_second_content', true));
			if ( get_post_meta( get_the_ID(), '_homepage_second_content', true ) ) {
				echo get_post_meta( get_the_ID(), '_homepage_second_content', true );
			}
			?>
		</div>
	</div>
	<div class="container-fluid">
		<?php if ( $posts = get_post_meta( get_the_ID(), '_homepage_featured_posts', true ) ): 
			$count = 0;
			foreach ($posts as $post): $content_post = get_post($post->ID); $count++; ?>
			<?php if ($count % 2 == 0): ?>
				<div class="featured-post row">
					<div class="col-sm-6 wp-post-image-container featured-row-index-<?=$count;?>">
						
						<?php
							if ( has_post_thumbnail() ) {
								$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
								echo '<img width="'.$full_image_url[1].'" height="'.$full_image_url[2].'" class="attachment-full wp-post-image full img-responsive" src="'.$full_image_url[0].'" />';
							}
						?>
						
					</div>
					<div class="col-sm-6 post-info vertically-centered-container">
						<div class="vertically-centered">
						<h3><?php echo get_the_title($post->ID) ?></h3>
						<p><?php the_excerpt('') ?></p>
						<a href="<?php echo get_permalink($post->ID)?>" class="link-read-more" >Läs mer</a>
						</div>
					</div>
					
				</div>
			<?php else: ?>
				<div class="featured-post row">
					<div class="col-sm-6 wp-post-image-container featured-row-index-<?=$count;?>">
						
						<?php
							if ( has_post_thumbnail() ) {
								$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
								echo '<img width="'.$full_image_url[1].'" height="'.$full_image_url[2].'" class="attachment-full wp-post-image full img-responsive" src="'.$full_image_url[0].'" />';
							}
						?>
					</div>
					<div class="col-sm-6 post-info vertically-centered-container">
						<div class="vertically-centered">
						<h3><?php echo get_the_title($post->ID) ?></h3>
						<p><?php the_excerpt('') ?></p>
						<a href="<?php echo get_permalink($post->ID)?>" class="link-read-more" >Läs mer</a>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php endforeach;
		endif; ?>
	</div>
<?php endif; ?>
<div class="container-fluid footer-contact-newsletter">
	<div class="container content row">
		<div class="col-sm-6">
			<div class="corner-right">
				<img src="/wp-content/themes/brolinwestrell/assets/images/corner-right.png" width="30" />
			</div>
			<?php echo get_theme_mod('footer_contact_us', true); ?>
		</div>
		<div class="col-sm-6">
			<div class="corner-left">
				<img src="/wp-content/themes/brolinwestrell/assets/images/corner-left.png" width="30" />
			</div>
			<?php echo do_shortcode(get_theme_mod('footer_newsletter', true)); ?>
		</div>
	</div>
</div>
<footer class="content-info">
  <div class="container">
    <h2 class="uppercase"><?php echo get_bloginfo('title') ?></h2>
    <h5 class="uppercase"> Copyright <?php echo date('Y') ?></h5>
    <section>
    	<a href="<?php echo get_theme_mod('footer_facebook'); ?>" class="social-media facebook">Facebook</a>
    	<a href="<?php echo get_theme_mod('footer_linkedin'); ?>" class="social-media linkedin">LinkedIn</a>
    	<a href="<?php echo get_theme_mod('footer_mail'); ?>" class="social-media mail">Mail</a>
    </section>
  </div>
</footer>
