<?php
namespace Roots\Sage\ClientsCodeBox;
use Roots\Sage\TemplateMetaBox;
use Roots\Sage\CodeBox;

/**
* Implement CodeBox class for the post/page that uses front-page.php template file.
*/
class ClientsCodeBox extends CodeBox\CodeBox
{

  public function __construct()
  {
    add_action( 'add_meta_boxes_clients',  array( $this, 'register' ) );
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
      'client_url',
      'Client URL',
      function($post) {
        // Add a nonce field so we can check for it later.
        wp_nonce_field( 'clients_codebox', 'magplus_new_nonce' );

        $value = get_post_meta( $post->ID, '_client_url', true );

        _e( 'Current URL: <strong>'. $value . '</strong><br>', 'sage' );
        echo '<hr><table><tr><td>
          <label for="client_url">';
        _e( 'Enter Custom URL', 'sage' );
        echo '</label><br />
        <input type="url" name="client_url" id="clientUrl" class="form-control" size="50" value="'.$value.'"> <strong>OR</strong></td>
        <td> <label for="wordpress_links">Select a internal page/post:</label><br> ';
        // WP_Query arguments
        $args = array (
          'post_type'              => array('post', 'page'),
          'post_status'            => array( 'Published' ),
          'pagination'             => false,
          'order'                  => 'ASC',
          'orderby'                => 'title',
          'cache_results'          => false,
        );

        // The Query
        $query = new \WP_Query( $args );

        // The Loop
        if ( $query->have_posts() ) {
        ?><select name="wordpress_links" id="wordpressLinks" class="form-control" onchange="changeEventHandler(event);" >
            <option value="#">None</option>
        <?php
          while ( $query->have_posts() ) {
            $query->the_post();
            ?><option value="<?php the_permalink(); ?>"><?php the_title(); ?></option><?php
          }
        ?></select></td></tr>
        <tr>
        <td colspan="2">
          <label for="">App Store Link:&nbsp;&nbsp;&nbsp;</label>
          <input type="url" value="<?php echo get_post_meta( $post->ID, '_appStoreLink', true ); ?>" size="50" name="appStoreLink"/>
        </td>
        </tr>
        <tr>
        <td colspan="2">
          <label for="">Google Play Link:</label>
          <input type="url" value="<?php echo get_post_meta( $post->ID, '_googlePlayLink', true ); ?>" size="50" name="googlePlayLink"/>
        </td>
        </tr>
        </table><?php
        } 

        // Restore original Post Data
        wp_reset_postdata();
      },
      'clients', 'advanced', 'core'
    );

    $setup->init();
  }

  /** 
   * Save post handler
   */
  function save($post_id) {
    
    parent::save($post_id);
    
    if ( ! isset( $_POST['client_url'] ) ) {
      return;
    }
    if ( ! isset( $_POST['appStoreLink'] ) ) {
      return;
    }
    if ( ! isset( $_POST['googlePlayLink'] ) ) {
      return;
    }
    // add more if needed

    update_post_meta( $post_id, '_client_url', $_POST['client_url'] );
    update_post_meta( $post_id, '_appStoreLink', $_POST['appStoreLink'] );
    update_post_meta( $post_id, '_googlePlayLink', $_POST['googlePlayLink'] );
  }

}
//Initiate the class
ClientsCodeBox::init();