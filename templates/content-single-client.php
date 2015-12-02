<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    
    <div class="entry-content row">
      <div class="col-sm-7">
        <?php if (class_exists('MultiPostThumbnails')) :
          MultiPostThumbnails::the_post_thumbnail(
              get_post_type(),
              'logo'
          );
        endif; ?>
        <br>
        <header>
          <h1 class="entry-title text-left"><?php the_title(); ?></h1>
        </header>
        <?php the_content(); ?>
      </div>
      <div class="col-sm-5">
        <?php
        if ( has_post_thumbnail() ) {
          $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
          // var_dump($large_image_url);
          echo '<img width="'.$large_image_url[1].'" height="'.$large_image_url[2].'" class="attachment-large img-responsive wp-post-image large" src="'.$large_image_url[0].'" />';
        }
        ?>
      </div>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
  </article>
<?php endwhile; ?>
