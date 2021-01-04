<?php
/**
 * Plugin Name: Elementor Repeat Animations
 * Description: This is a plugin that adds options to add animation to your content , sections,columns or text widget.
 * Plugin URI:  https://sivacreative.com/
 * Version:     1.0.0
 * Author:      Siva Creative
 * Author URI:  https://sivacreative.com/
 * Text Domain: repeat-animation-elementor
 * Settings URI: https://sivacreative.com/
 */
 
 if ( ! defined( 'ABSPATH' ) ) exit;
 
 
define( 'REPEAT_ANIMATION_ELEMENTOR_PLUGIN', '1.0.0' );
define( 'REPEAT_ANIMATION_ELEMENTOR_PREVIOUS_STABLE_VERSION', '1.0.0' );

define( 'REPEAT_ANIMATION_ELEMENTOR__FILE__', __FILE__ );
define( 'REPEAT_ANIMATION_ELEMENTOR_PLUGIN_BASE', plugin_basename( REPEAT_ANIMATION_ELEMENTOR__FILE__ ) );
define( 'REPEAT_ANIMATION_ELEMENTOR_PATH', plugin_dir_path( REPEAT_ANIMATION_ELEMENTOR__FILE__ ) );

define( 'REPEAT_ANIMATION_ELEMENTOR_MODULES_PATH', REPEAT_ANIMATION_ELEMENTOR_PATH . 'modules/' );
define( 'REPEAT_ANIMATION_ELEMENTOR_URL', plugins_url( '/', REPEAT_ANIMATION_ELEMENTOR__FILE__ ) );
define( 'REPEAT_ANIMATION_ELEMENTOR_ASSETS_URL', REPEAT_ANIMATION_ELEMENTOR_URL . 'assets/' );
define( 'REPEAT_ANIMATION_ELEMENTOR_MODULES_URL', REPEAT_ANIMATION_ELEMENTOR_URL . 'modules/' );
define( 'REPEAT_ANIMATION_ELEMENTOR_PHP_FILES_URL', REPEAT_ANIMATION_ELEMENTOR_URL . 'siva_php_files/' );
define( 'REPEAT_ANIMATION_ELEMENTOR_WIDGET_FILES_URL', REPEAT_ANIMATION_ELEMENTOR_URL . 'widgets/' );
 
use Elementor\Controls_Manager; 

 
class Repeat_Animation_Elementor {
	
	/**
	 * Plugin Version
	 *
	 * @since 1.2.1
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.2.0
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.2.0
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * @access public
	 */
	
	public function __construct() {
		
		add_action( 'plugins_loaded', array( $this, 'init' ) );
		
	}
	
	public function init() {
		
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}
		
		add_action( 'elementor/elements/categories_registered', array($this,'add_rea_elementor_widget_categories'));
		add_action( 'admin_init', 'repeat_animation_elementor_register_settings' );
		add_action('admin_menu', array($this,'repeat_animation_elementor_register_options_page'));
		add_action( 'admin_notices', 'repeat_animation_elementor_admin_mesage' );
		add_action( 'admin_init', 'repeat_animation_elementor_notice_dismissed' );
		add_action( 'wp_enqueue_scripts', 'repeat_animation_elementor_scripts' );
		add_action('admin_bar_menu',  array($this,'repeat_animation_elementor_add_toolbar_items'), 100);
		add_action('admin_enqueue_scripts', 'admin_repeat_animation_elementor_js_siva');
		
		if ( is_admin() ) {
				add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( &$this, 'repeat_animation_elementor_plugin_manage_link' ), 10, 4 );
				
						}
						
		add_action( 'elementor/element/section/section_layout/after_section_end', array( $this, 'RegisterSectionControls1' ), 10, 2 );
				
		// Once we get here, We have passed all validation checks so we can safely include our plugin
		//require_once( 'plugin.php' );
		require_once( 'repeat-animations-elementor-options-page.php' );
	    require_once('repeat-animations-widgets-registered.php');
		
	}
	
	
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'repeat-animation-elementor' ),
			'<strong>' . esc_html__( 'Elementor Repeat Animations', 'repeat-animation-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'repeat-animation-elementor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'repeat-animation-elementor' ),
			'<strong>' . esc_html__( 'Elementor Repeat Animations', 'repeat-animation-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'repeat-animation-elementor' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'repeat-animation-elementor' ),
			'<strong>' . esc_html__( 'Elementor Repeat Animations', 'repeat-animation-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'repeat-animation-elementor' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	
	


public function repeat_animation_elementor_register_options_page() {
	
  add_options_page('Elementor Repeat Animations Settings', 'Elementor Repeat Animations', 'manage_options', 'repeat_animation_elementor', 'repeat_animation_elementor_options_page');
  
}



public function repeat_animation_elementor_add_toolbar_items($admin_bar){
    $admin_bar->add_menu( array(
        'id'    => 'repeat_animation-elementor',
        'title' => 'Elementor Repeat Animations',
        'href'  => '/wp-admin/options-general.php?page=repeat_animation_elementor',
        'meta'  => array(
            'title' => __('Go To Elementor Repeat Animations'),            
        ),
    ));






}

public function repeat_animation_elementor_plugin_manage_link( $actions, $plugin_file, $plugin_data, $context ) {

    // add a 'Configure' link to the front of the actions list for this plugin

    return array_merge( array( 'configure' => '<a href="/wp-admin/options-general.php?page=repeat_animation_elementor">Settings</a>' ), $actions );

}


public function RegisterSectionControls1( $element, $sectionId ) {

      $element->start_controls_section('repeat_animations',
            [
                'label'         => __('Repeat Animation'),
                'tab'           => Controls_Manager::TAB_LAYOUT
            ]
        );

        $element->add_control('repeat_animation_switcher',
            [
                'label'         => __( 'Enable'),
                'type'          => Controls_Manager::SWITCHER,
                'return_value'  => 'yes',
                'prefix_class'  => 'repeat-animation-',
                'render_type'   => 'template'
            ]
        );

        $element->end_controls_section();
    }


    public function add_rea_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'siva-plugins',
		[
			'title' => __( 'Siva Plugins', 'plugin-name' ),
			'icon' => 'fa fa-plug',
		]
	);
	$elements_manager->add_category(
		'second-category',
		[
			'title' => __( 'Second Category', 'plugin-name' ),
			'icon' => 'fa fa-plug',
		]
	);

}
	
	
	
	
} 

// Repeat_Animation_Elementor.
new Repeat_Animation_Elementor();

