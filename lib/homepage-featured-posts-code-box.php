<?php
namespace Roots\Sage\HomepageFeaturedPostCodeBox;
use Roots\Sage\TemplateMetaBox;
use Roots\Sage\CodeBox;

/**
* Implement CodeBox class for the post/page that uses front-page.php template file.
*/
class HomepageFeaturedPostCodeBox extends CodeBox\CodeBox
{

  public function __construct()
  {
    add_action( 'add_meta_boxes_page',  array( $this, 'register' ) );
    add_action( 'save_post',  array( $this, 'save' ) );
  }
  
  /**
   * Inintite TemplateMetaBox class and setup the metaboxes to be shown in the admin page
   **/
  public function register()
  {
    global $post;
  
    $setup = new TemplateMetaBox\TemplateMetaBox($post);

    // top section
    $setup->add_meta_box(
      'homepage_featured_posts',
      'Homepage Featured Post',
      function($post) {
        // Add a nonce field so we can check for it later.
        wp_nonce_field( 'homepage_featured_posts[]', 'brolinwestrell_new_nonce' );

        $values = get_post_meta( $post->ID, '_homepage_featured_posts', true );
        $posts = \query_posts('posts_per_page=-1&post_type=page&status=published&orderby=data&order=DESC');
        echo '<label for="homepage_featured_posts"><em>Note:</em> <strong>Control/Command + Left Click</strong> to select more than one Page</label>';
        echo "<select name=\"homepage_featured_posts[]\" style=\"width:100%; height: 200px;\" multiple >";
        foreach ($posts as $post) {
            if( in_array($post->ID, $values) ) {
                echo "<option selected value=\"". $post->ID ."\">{$post->post_title}</option>";
            } else {
                echo "<option value=\"". $post->ID ."\">{$post->post_title}</option>";
            }
        }
        echo "</select>";
      },
      'page', 'advanced', 'core'
    );

    $setup->init(null, 'home');
  }

  /** 
   * Save post handler
   */
  function save($post_id) {
    
    parent::save($post_id);
    
    if (  !isset( $_POST['homepage_featured_posts'] ) ) {
      return;
    }
    // add more if needed
      // var_dump($_POST['homepage_featured_posts'] ); exit;
    update_post_meta( $post_id, '_homepage_featured_posts', $_POST['homepage_featured_posts'] );
  }

}
//Initiate the class
HomepageFeaturedPostCodeBox::init();