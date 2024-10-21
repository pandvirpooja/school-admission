<?php
/**
 * Plugin Name: Tanda Core
 * Description: Tanda Core Plugin Contains Elementor Widgets Specifically created for Tanda WordPress Theme.
 * Plugin URI:  wordpressriverthemes.com/tanda
 * Version:     1.3.0
 * Author:      WordPressRiver
 * Author URI:  https://themeforest.net/user/wordpressriver/portfolio
 * Text Domain: tanda-core
 *
 * Elementor tested up to: 3.5.0
 * Elementor Pro tested up to: 3.5.0
 */


if ( !defined('ABSPATH') )
    die('-1');

// Make sure the same class is not loaded twice in free/premium versions.
if ( !class_exists( 'tanda_core' ) ) {
	/**
	 * Main tanda Core Class
	 *
	 * The main class that initiates and runs the tanda Core plugin.
	 *
	 * @since 1.7.0
	 */
	final class tanda_core {
		/**
		 * tanda Core Version
		 *
		 * Holds the version of the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string The plugin version.
		 */
		const VERSION = '1.0' ;
		/**
		 * Minimum Elementor Version
		 *
		 * Holds the minimum Elementor version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum Elementor version required to run the plugin.
		 */
		const MINIMUM_ELEMENTOR_VERSION = '1.7.0';
		/**
		 * Minimum PHP Version
		 *
		 * Holds the minimum PHP version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum PHP version required to run the plugin.
		 */
		const  MINIMUM_PHP_VERSION = '5.4' ;
        /**
         * Plugin's directory paths
         * @since 1.0
         */
        const CSS = null;
        const JS = null;
        const IMG = null;
        const VEND = null;

		/**
		 * Instance
		 *
		 * Holds a single instance of the `tanda_core` class.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 * @static
		 *
		 * @var tanda_core A single instance of the class.
		 */
		private static  $_instance = null ;
		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 * @static
		 *
		 * @return tanda_core An instance of the class.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Clone
		 *
		 * Disable class cloning.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'tanda-core' ), '1.7.0' );
		}

		/**
		 * Wakeup
		 *
		 * Disable unserializing the class.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'tanda-core' ), '1.7.0' );
		}

		/**
		 * Constructor
		 *
		 * Initialize the tanda Core plugins.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function __construct() {
			$this->core_includes();
			$this->init_hooks();
			do_action( 'tanda_core_loaded' );
		}

		/**
		 * Include Files
		 *
		 * Load core files required to run the plugin.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function core_includes() {
		
		}

		/**
		 * Init Hooks
		 *
		 * Hook into actions and filters.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 */
		private function init_hooks() {
			add_action( 'init', [ $this, 'i18n' ] );
			add_action( 'plugins_loaded', [ $this, 'init' ] );
		}

		/**
		 * Load Textdomain
		 *
		 * Load plugin localization files.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function i18n() {
			load_plugin_textdomain( 'tanda-core', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
		}



		/**
		 * Init tanda Core
		 *
		 * Load the plugin after Elementor (and other plugins) are loaded.
		 *
		 * @since 1.0.0
		 * @since 1.7.0 The logic moved from a standalone function to this class method.
		 *
		 * @access public
		 */
		public function init() {

			if ( !did_action( 'elementor/loaded' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
				return;
			}

			// Check for required Elementor version

			if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
				return;
			}

			// Check for required PHP version

			if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
				return;
			}

			// Add new Elementor Categories
			add_action( 'elementor/init', [ $this, 'add_elementor_category' ] );

			// Register Widget Styles
			add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_widget_styles' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );

			// Register Widget Scripts
			add_action( 'elementor/frontend/after_register_scripts', [ $this,'register_widget_scripts' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'register_widget_scripts' ] );

			// Register New Widgets
			add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_missing_main_plugin() {
			$message = sprintf(
			/* translators: 1: tanda Core 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'tanda-core' ),
				'<strong>' . esc_html__( 'tanda core', 'tanda-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'tanda-core' ) . '</strong>'
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required Elementor version.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_minimum_elementor_version() {
			$message = sprintf(
			/* translators: 1: tanda Core 2: Elementor 3: Required Elementor version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'tanda-core' ),
				'<strong>' . esc_html__( 'tanda Core', 'tanda-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'tanda-core' ) . '</strong>',
				self::MINIMUM_ELEMENTOR_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required PHP version.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function admin_notice_minimum_php_version() {
			$message = sprintf(
			/* translators: 1: tanda Core 2: PHP 3: Required PHP version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'tanda-core' ),
				'<strong>' . esc_html__( 'tanda Core', 'tanda-core' ) . '</strong>',
				'<strong>' . esc_html__( 'PHP', 'tanda-core' ) . '</strong>',
				self::MINIMUM_PHP_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Add new Elementor Categories
		 *
		 * Register new widget categories for tanda Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function add_elementor_category() {
			\Elementor\Plugin::instance()->elements_manager->add_category( 'tanda', [
				'title' => __( 'tanda Elements', 'tanda-core' ),
			], 1 );
		}


		/**
		 * Register Widget Scripts
		 *
		 * Register custom scripts required to run Saasland Core.
		 *
		 * @since 1.6.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function register_widget_scripts() {
			wp_register_script( 'main', plugins_url( '/assets/js/main.js', __FILE__ ), array( 'jquery' ), false, true );
		}




		/**
		 * Register Widget Styles
		 *
		 * Register custom styles required to run Saasland Core.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		
		public function enqueue_widget_styles() {

		}

		/**
		 * Register New Widgets
		 *
		 * Include tanda Core widgets files and register them in Elementor.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function on_widgets_registered() {
			$this->include_widgets();
			$this->register_widgets();
		}

		/**
		 * Include Widgets Files
		 *
		 * Load tanda Core widgets files.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function include_widgets() {
					
			require_once( __DIR__ . '/widgets/tanda-hero.php' );

		    require_once( __DIR__ . '/widgets/tanda-about.php' );

		    require_once( __DIR__ . '/widgets/tanda-choose.php' );

		    require_once( __DIR__ . '/widgets/tanda-work.php' );

		    require_once( __DIR__ . '/widgets/tanda-workabout.php' );

		    require_once( __DIR__ . '/widgets/tanda-services.php' );

		    require_once( __DIR__ . '/widgets/tanda-case.php' );

		    require_once( __DIR__ . '/widgets/tanda-counter.php' );

		    require_once( __DIR__ . '/widgets/tanda-team.php' );

		    require_once( __DIR__ . '/widgets/tanda-faq.php' );

		    require_once( __DIR__ . '/widgets/tanda-why.php' );

		    require_once( __DIR__ . '/widgets/tanda-experience.php' );

		    require_once( __DIR__ . '/widgets/tanda-mission.php' );	

		    require_once( __DIR__ . '/widgets/tanda-blog.php' );

		    require_once( __DIR__ . '/widgets/tanda-client.php' );

		    require_once( __DIR__ . '/widgets/tanda-contact.php' );

		    require_once( __DIR__ . '/widgets/tanda-teamsingle.php' );

		    require_once( __DIR__ . '/widgets/tanda-casesingle.php' );

		    require_once( __DIR__ . '/widgets/tanda-servicesingle.php' );

		    // Home Version Two 

		    require_once( __DIR__ . '/widgets/tanda-hero2.php' );

		    require_once( __DIR__ . '/widgets/tanda-testimonial.php' );

		    // Home Version Three 

		    require_once( __DIR__ . '/widgets/tanda-hero3.php' );

		    require_once( __DIR__ . '/widgets/tanda-features.php' );
		    
		    // Home Version Four 

		    require_once( __DIR__ . '/widgets/tanda-hero4.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-features2.php' );
		    
		    // Home Version Five 

		    require_once( __DIR__ . '/widgets/tanda-hero5.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-about2.php' );
		    
		    // Home Version Six 

		    require_once( __DIR__ . '/widgets/tanda-hero6.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-about3.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-faq1.php' );
		    
		    // Home Version Seven 

		    require_once( __DIR__ . '/widgets/tanda-hero7.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-about4.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-service2.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-quickcontact.php' );
		    
		    // Home Version Eight 

		    require_once( __DIR__ . '/widgets/tanda-hero8.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-service3.php' );
		    
		    // Home Version Nine 

		    require_once( __DIR__ . '/widgets/tanda-hero9.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-about5.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-service4.php' );
		    
		    // Home Version Ten 

		    require_once( __DIR__ . '/widgets/tanda-hero10.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-service6.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-choose1.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-counter1.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-case1.php' );
		    
		    // Home Version Eleven 

		    require_once( __DIR__ . '/widgets/tanda-hero11.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-service5.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-client1.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-about6.php' );
		    
		    require_once( __DIR__ . '/widgets/tanda-process1.php' );

        }
			
		/**
		 * Register Widgets
		 *
		 * Register tanda Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function register_widgets() {

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_hero_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_about_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_choose_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_work_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_workabout_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_services_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_case_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_counter_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_team_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_faq_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_why_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_experience_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_mission_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_blog_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_client_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_contact_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_teamsingle_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_casesingle_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_servicesingle_Widget() );

			// Home Version Two 

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_hero2_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_testimonial_Widget() );

			// Home Version Three 

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_hero3_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_features_Widget() );
			
			// Home Version Four 
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_hero4_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_features2_Widget() );
				
		    // Home Version Five 
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_hero5_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_about2_Widget() );
			
			 // Home Version Six 
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_hero6_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_about3_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_faq1_Widget() );
			
			// Home Version Seven 
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_hero7_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_about4_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_service7_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_quickcontact_Widget() );
			
			// Home Version Eight 
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_hero8_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_service8_Widget() );
			
			// Home Version Nine 
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_hero9_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_about5_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_service9_Widget() );
			
			// Home Version Ten 
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_hero10_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_service10_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_choose10_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_counter10_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_case10_Widget() );
			
			// Home Version Eleven 
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_hero11_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_service11_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_client11_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_about11_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_tanda_process11_Widget() );
			
		}
	}
} 
// Make sure the same function is not loaded twice in free/premium versions.

if ( !function_exists( 'tanda_core_load' ) ) {
	/**
	 * Load tanda Core
	 *
	 * Main instance of tanda_core.
	 *
	 * @since 1.0.0
	 * @since 1.7.0 The logic moved from this function to a class method.
	 */
	function tanda_core_load() {
		return tanda_core::instance();
	}

	// Run tanda Core
    tanda_core_load();
}