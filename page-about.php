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
?>