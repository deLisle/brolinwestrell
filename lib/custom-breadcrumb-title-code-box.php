<?php
namespace Roots\Sage\CustomBreadcrumbTitleCodeBox;
use Roots\Sage\TemplateMetaBox;
use Roots\Sage\CodeBox;

/**
* Implement CodeBox class for the post/page that uses front-page.php template file.
*/
class CustomBreadcrumbTitleCodeBox extends CodeBox\CodeBox
{

  public function __construct()
  {
    add_action( 'add_meta_boxes',  array( $this, 'register' ) );
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
      'custom_breadcrumb_title',
      'Breadcrumb Title',
      function($post) {
        // Add a nonce field so we can check for it later.
        wp_nonce_field( 'custom_breadcrumb_title', 'brolinwestrell_new_nonce' );

        $_custom_breadcrumb_title = get_post_meta( $post->ID, '_custom_breadcrumb_title', true );
        ?>
        <div class="form-field">
          <input type="text" name="custom_breadcrumb_title" id="custom_breadcrumb_title" value="<?php echo $_custom_breadcrumb_title; ?>">
        </div>
        <?php
      },
      array('page', 'post'), 'normal', 'core'
    );

    $setup->init(function() {
      return true;
    });
  }

  /** 
   * Save post handler
   */
  function save($post_id) {
    
    parent::save($post_id);
    
    if (  !isset( $_POST['custom_breadcrumb_title'] ) ) {
      return;
    }
    // add more if needed
      // var_dump($_POST['custom_breadcrumb_title'] ); exit;
    update_post_meta( $post_id, '_custom_breadcrumb_title', $_POST['custom_breadcrumb_title'] );
  }

}
//Initiate the class
CustomBreadcrumbTitleCodeBox::init();