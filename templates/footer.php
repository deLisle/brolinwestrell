<div class="container-fluid">
	<div class="container content row text-center">
		<hr>
		<h2><?php echo get_theme_mod('footer_content_heading', true); ?></h2>
		<p><?php echo get_theme_mod('footer_content_paragraph', true); ?></p>
	</div>
</div>
<div class="container-fluid footer-contact-newsletter">
	<div class="container content row">
		<div class="col-sm-6">
			<?php echo get_theme_mod('footer_contact_us', true); ?>
		</div>
		<div class="col-sm-6">
			<?php echo get_theme_mod('footer_newsletter', true); ?>
		</div>
	</div>
</div>
<footer class="content-info">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
    <h2 class="uppercase"><?php echo get_bloginfo('title') ?></h2>
    <h4 class="uppercase"> Copyright <?php echo date('Y') ?></h4>
    <br>
    <section>
    	<a href="<?php echo get_theme_mod('footer_facebook'); ?>" class="social-media facebook">Facebook</a>
    	<a href="<?php echo get_theme_mod('footer_linkedin'); ?>" class="social-media linkedin">LinkedIn</a>
    	<a href="<?php echo get_theme_mod('footer_mail'); ?>" class="social-media mail">Mail</a>
    </section>
  </div>
</footer>
