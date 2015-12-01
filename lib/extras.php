<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <br><br><a class="view-more" href="' . get_permalink() . '">' . __('View More', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


/**
 * latest articles
 */

// [bartag foo="foo-value"]
function latest_articles( $atts ) {
  $a = shortcode_atts( array(
    'count' => 1,
    'position' => 'right',
  ), $atts );
  $class = array('center'=> '', 'left' => 'pull-left col-sm-3', 'right' => 'pull-right col-sm-3');
  wp_reset_query(); wp_reset_postdata();
  $posts = \get_posts('post_type=post&order=date&order=DESC&numberposts=' . $a['count']);
  // echo('class="'.$class[$a['position']].'"' );
  $html = '<aside class="latest-articles ' . $class[$a['position']] . '">';

  foreach ( $posts as $post ) : setup_postdata( $post );
  $html .='<div class="article" >';
  if ( has_post_thumbnail($post->ID) ) {
      $medium_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
      $html .= '<img width="'.$medium_image_url[1].'" height="'.$medium_image_url[2].'" class="attachment-medium wp-post-image medium" src="'.$medium_image_url[0].'" />';
    }
  $html .= "<h3 class=\"h4\">". $post->post_title . "</h3>";
  $html .= '<time class="updated" datetime="'. get_post_time('c', true, $post->ID) .'">'. get_the_date('F j, Y', $post->ID) . '</time>';
  $html .= '<p>'.substr($post->post_content, 0, 100) .'</p>';
  $html .= '<a href="' . get_permalink($post->ID) .'" >Read More</a>';
  $html .= '</div>';
  endforeach;
  wp_reset_postdata();
  return $html.'</div>';
}
add_shortcode( 'latest_articles', __NAMESPACE__ . '\\latest_articles' );