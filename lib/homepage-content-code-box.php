<?php
namespace Roots\Sage\HomepageContentCodeBox;
use Roots\Sage\TemplateMetaBox;
use Roots\Sage\CodeBox;

/**
* Implement CodeBox class for the post/page that uses front-page.php template file.
*/
class HomepageContentCodeBox extends CodeBox\CodeBox
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
      'homepage_second_content',
      'Homepage Second Content',
      function($post) {
        // Add a nonce field so we can check for it later.
        wp_nonce_field( 'homepage-second-content', 'brolinwestrell_new_nonce' );

        $value = get_post_meta( $post->ID, '_homepage_second_content', true );

        wp_editor( $value , 'homepage-second-content', array(
          'textarea_name' =>'homepage-second-content',
          'wpautop'       => true,
          ) );

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
    
    if (  !isset( $_POST['homepage-second-content'] )
     ) {
      return;
    }
    // add more if needed

    update_post_meta( $post_id, '_homepage_second_content', $_POST['homepage-second-content'] );
  }

}
//Initiate the class
HomepageContentCodeBox::init();