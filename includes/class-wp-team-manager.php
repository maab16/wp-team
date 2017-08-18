<?php

class WP_Team_Manager {

	/**
	 * @var object $admin
	 */
	private $admin;

	/**
	 * @var object $loader
	 */
	protected $loader;

	/**
	 * @var string $basePath
	 */
	public $basePath;

	/**
	 * @var string $baseDir
	 */
	public $baseDir;

	/**
	 * @var string $version
	 */
	public $version;

	/**
	 * Load Dependencies
	 * Register Hooks
	 * @param No
	 * @return void
	 */
	public function __construct($version) {

		$this->version = $version;

		$this->baseDir = plugin_dir_path( dirname( __FILE__ ) );
		$this->baseName = plugin_basename($this->baseDir. '/wp-team.php');

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

		require_once $this->baseDir . 'admin/class-wp-team-manager-admin.php';

		require_once plugin_dir_path( __FILE__ ) . 'class-wp-team-manager-loader.php';

		$this->admin = new WP_Team_Manager_Admin($this->version);
		
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
		$this->loader->add_action( 'admin_init', $this->admin ,'wp_team_register_settings' );
		$this->loader->add_action('admin_menu', $this->admin ,'wp_team_register_options_page');
		// Add Filter Hook
		$this->loader->add_filter( 'wp_insert_post_data' ,$this->admin,'wp_team_change_title');
		$this->loader->add_filter( 'widget_text',$this->admin,'do_shortcode');
		$this->loader->add_filter( "plugin_action_links_".$this->baseName , $this->admin , 'add_plugin_settings_link' );
	}

	public static function load($version = '1.0') {
		new WP_Team_Manager($version);
	}

	public function getVersion() {
		return $this->version;
	}

}
