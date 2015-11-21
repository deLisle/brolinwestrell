<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
    <?php
      if ( has_post_thumbnail() ) {
        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
        // var_dump($large_image_url);
        echo '<img width="'.$large_image_url[1].'" height="'.$large_image_url[2].'" class="attachment-large img-responsive wp-post-image large" src="'.$large_image_url[0].'" />';
      }
      ?>
      <br>
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
  </article>
<?php endwhile; ?>
