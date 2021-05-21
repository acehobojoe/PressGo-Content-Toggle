<?php
namespace PressGo_Widget_Pack;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.0.0
 */
class ToggleHandlerClass {



  /**
   * Instance
   *
   * @since 1.0.0
   * @access private
   * @static
   *
   * @var ToggleHandlerClass The single instance of the class.
   */
  private static $_instance = null;

  /**
   * Instance
   *
   * Ensures only one instance of the class is loaded or can be loaded.
   *
   * @since 1.2.0
   * @access public
   *
   * @return ToggleHandlerClass An instance of the class.
   */
  public static function instance() {
    if ( is_null( self::$_instance ) ) {
      self::$_instance = new self();
    }

    return self::$_instance;
  }


  /**
   * widget_scripts
   *
   * Load required plugin core files.
   *
   * @since 1.2.0
   * @access public
   */

   public function widget_scripts() {
     wp_register_script( 'plugin-script', plugins_url( '/Elementor-Widget-Pack/assets/js/pluginpack.js', __FILE__ ), [ 'jquery' ], true );
     wp_register_script( 'toggle-script', plugins_url( '/assets/js/toggle.js', __FILE__ ), [ 'jquery' ], true );

   }

   public function enqueue() {
     wp_enqueue_script( 'toggle-script', plugin_dir_url( __FILE__ ) . '/Elementor-Widget-Pack/assets/js/toggle.js', array('jquery'), self::VERSION );
     wp_enqueue_style( 'toggle-style', plugin_dir_url( __FILE__ ) . '/Elementor-Widget-Pack/assets/css/togl-style.css', [], self::VERSION );

   }
   public function enqueue_styles_widget() {
     wp_register_style( 'toggle-style', plugin_dir_url( __FILE__ ) . '/Elementor-Widget-Pack/assets/css/togl-style.css', [], self::VERSION );
   }






  /**
   * Include Widgets files
   *
   * Load widgets files
   *
   * @since 1.2.0
   * @access private
   */
  private function include_widgets_files() {
    require_once( __DIR__ . '/widgets/toggleslider.php' );
    require_once( 'plugin.php' );
  }

  /**
   * Register Widgets
   *
   * Register new Elementor widgets.
   *
   * @since 1.2.0
   * @access public
   */
  public function register_widgets() {
    // Its is now safe to include Widgets files
    $this->include_widgets_files();

    // Register Widgets
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\PressGo() );
  }





  /**
   *  Plugin class constructor
   *
   * Register plugin action hooks and filters
   *
   * @since 1.2.0
   * @access public
   */
  public function __construct() {


    // Register widgets
    add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );

  //Require Styles + Scripts
     if ($widget) {
       add_action( 'elementor/frontend/after_register_scripts', [ $this, 'enqueue_scripts_widget' ] );
       add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_styles_widget' ] );

     }

     add_action('elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_style( 'toggle-style' );
    wp_enqueue_script( 'toggle-script' );


});


}
}




// Instantiate Plugin Class
ToggleHandlerClass::instance();
