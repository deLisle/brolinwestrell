<div class="container-fluid">
	<div class="container content row text-center">
		<hr>
		<h2><?php echo get_theme_mod('footer_content_heading', true); ?></h2>
		<p><?php echo get_theme_mod('footer_content_paragraph', true); ?></p>
	</div>
</div>
<footer class="content-info">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
    <h2 class="uppercase"><?php echo get_bloginfo('title') ?></h2>
    <h4 class="uppercase"> Copyright <?php echo date('Y') ?></h4>
  </div>
</footer>
