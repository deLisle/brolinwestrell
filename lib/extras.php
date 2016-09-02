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
  return ' &hellip; <br><br><a class="view-more" href="' . get_permalink() . '">L&auml;s mer</a>';
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
  $html .= '<p>'.substr($post->post_content, 0, 100) .'...</p>';
  $html .= '<a href="' . get_permalink($post->ID) .'" >'. __('L&auml;s mer', 'sage').'</a>';
  $html .= '</div>';
  endforeach;
  wp_reset_postdata();
  return $html.'</div>';
}
add_shortcode( 'latest_articles', __NAMESPACE__ . '\\latest_articles' );



/**
* add order column to admin listing screen for header text
*/
function add_new_employee_portfolios_column($employee_portfolios_columns) {
  $employee_portfolios_columns['menu_order'] = "Order";
  return $employee_portfolios_columns;
}
add_action('manage_edit-employee_portfolios_columns', __NAMESPACE__ . '\\add_new_employee_portfolios_column');

/**
* show custom order column values
*/
function show_order_column($name){
  global $post;

  switch ($name) {
    case 'menu_order':
      $order = $post->menu_order;
      echo $order;
      break;
   default:
      break;
   }
}
add_action('manage_employee_portfolios_posts_custom_column', __NAMESPACE__ . '\\show_order_column');

/**
* make column sortable
*/
function order_column_register_sortable($columns){
  $columns['menu_order'] = 'menu_order';
  return $columns;
}
add_filter('manage_edit-employee_portfolios_sortable_columns', __NAMESPACE__ . '\\order_column_register_sortable');