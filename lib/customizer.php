<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');


/**
* Customization Options for the themem
*/
class ThemeCustomizer
{
	
	function __construct()
	{
        add_action( 'customize_register', array($this, 'customize_manager' ));
	}

	/**
	* self initating class: singleton
	**/
	public static function init()
	{
	  static $instance = null;
	  if (null === $instance) {
	      $instance = new static();
	  }

	  return $instance;
	}

	/**
     * Add the Customize link to the admin menu
     * @return void
     */
    public function customizer_admin() {
        add_theme_page( 'Customize', 'Customize', 'edit_theme_options', 'customize.php' );
    }


    /**
     * Customizer manager demo
     * @param  WP_Customizer_Manager $wp_manager
     * @return void
     */
    public function customize_manager( $wp_manager )
    {
        $this->section( $wp_manager );
    }

    public function section( $wp_manager )
    {
        $wp_manager->add_section( 'customizer_section', array(
            'title'          => 'Additional Settings',
            'priority'       => 35,
        ) );

        // Background Color Setting
        $wp_manager->add_setting( 'footer_content_heading', array(
            'default'        => 'Welcome to our Brolin Westrell',
        ) );

        $wp_manager->add_control( new \WP_Customize_Control( $wp_manager, 'footer_content_heading', array(
            'label'   => 'Footer Content Heading',
            'section' => 'customizer_section',
            'type'      => 'textbox',
            'settings'   => 'footer_content_heading',
            'priority' => 1
        ) ) );


        $wp_manager->add_setting( 'footer_content_paragraph', array(
            'default'  => 'Our services spring from the combination of our differing experiences: the psychotherapist\'s unique knowledge of human behavior, 
		the managment supervisor\'s feel for leadership and the crisis manager\'s experience of extreme situations. 
		We believe that these are experiences that combine to make a real difference.',
        ) );

        $wp_manager->add_control( new \WP_Customize_Control( $wp_manager, 'footer_content_paragraph', array(
            'label'   => 'Footer Content Paragraph',
            'section' => 'customizer_section',
            'settings'   => 'footer_content_paragraph',
            'type'      => 'textarea',
            'priority' => 2
        ) ) );

        $wp_manager->add_setting( 'footer_facebook', array(
            'default'        => '#',
        ) );

        $wp_manager->add_control( new \WP_Customize_Control( $wp_manager, 'footer_facebook', array(
            'label'   => 'FooterFacebook Link',
            'section' => 'customizer_section',
            'type'      => 'textbox',
            'settings'   => 'footer_facebook',
            'priority' => 1
        ) ) );

        $wp_manager->add_setting( 'footer_linkedin', array(
            'default'        => '#',
        ) );

        $wp_manager->add_control( new \WP_Customize_Control( $wp_manager, 'footer_linkedin', array(
            'label'   => 'Footer Linkedin Link',
            'section' => 'customizer_section',
            'type'      => 'textbox',
            'settings'   => 'footer_linkedin',
            'priority' => 1
        ) ) );

        $wp_manager->add_setting( 'footer_mail', array(
            'default'        => '#',
        ) );

        $wp_manager->add_control( new \WP_Customize_Control( $wp_manager, 'footer_mail', array(
            'label'   => 'Footer Mail Link',
            'section' => 'customizer_section',
            'type'      => 'textbox',
            'settings'   => 'footer_mail',
            'priority' => 1
        ) ) );
    }
}

//Instantiate the class
ThemeCustomizer::init();