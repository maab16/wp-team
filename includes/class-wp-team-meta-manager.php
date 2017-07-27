<?php

class WP_Team_Meta_Manager {

	/**
	 * @var object $admin
	 */
	private $admin;

	/**
	 * @var object $loader
	 */
	protected $loader;

	/**
	 * Load Dependencies
	 * Register Hooks
	 * @param No
	 * @return void
	 */
	public function __construct() {

		$this->load_dependencies();
		$this->prepare_hooks();
		// Run Hooks
		$this->loader->run();
	}

	/**
	 * Load all Dependencies File
	 * @param No
	 * @return void
	 */
	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wp-team-manager-admin.php';

		require_once plugin_dir_path( __FILE__ ) . 'class-wp-team-meta-manager-loader.php';

		$this->admin = new WP_Team_Manager_Admin();
		
		$this->loader = new WP_Team_Manager_Loader();

	}

	/**
	 * Prepare All Hooks
	 * @param No
	 * @return void
	 */
	private function prepare_hooks() {
		// Add Action Hook
		$this->loader->add_action( 'admin_enqueue_scripts', $this->admin, 'admin_enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $this->admin, 'wp_enqueue_styles' );
		$this->loader->add_action( 'add_meta_boxes', $this->admin, 'add_meta_box' );
		$this->loader->add_action( 'init', $this->admin, 'wp_team_custom_post_type');
		$this->loader->add_action( 'init',$this->admin,'add_shortcodes');
		$this->loader->add_action( 'save_post',$this->admin,'wp_team_save_meta_data');
		// Add Filter Hook
		$this->loader->add_filter( 'wp_insert_post_data' ,$this->admin,'wp_team_change_title');
		$this->loader->add_filter( 'widget_text',$this->admin,'do_shortcode');
	}

	public static function load() {
		new WP_Team_Meta_Manager();
	}

	public function get_version() {
		return $this->version;
	}

}
