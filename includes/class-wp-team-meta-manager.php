<?php

class WP_Team_Meta_Manager {

	protected $loader;

	protected $plugin_slug;

	protected $version;

	public function __construct() {

		$this->plugin_slug = 'wp-team-meta-manager-slug';
		$this->version = '0.1';

		$this->load_dependencies();
		$this->define_admin_hooks();

	}

	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wp-team-manager-admin.php';

		require_once plugin_dir_path( __FILE__ ) . 'class-wp-team-meta-manager-loader.php';
		$this->loader = new WP_Team_Meta_Manager_Loader();

	}

	private function define_admin_hooks() {

		$admin = new WP_Team_Meta_Manager_Admin( $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $admin, 'admin_enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $admin, 'wp_enqueue_styles' );
		$this->loader->add_action( 'add_meta_boxes', $admin, 'add_meta_box' );
		$this->loader->add_action( 'init', $admin, 'wp_team_custom_post_type');
		$this->loader->add_action( 'add_meta_boxes',$admin,"add_wp_team_custom_meta_box");
		$this->loader->add_action( 'init',$admin,'wp_team_shortcodes_init');
		$this->loader->add_action( 'save_post',$admin,'wp_team_save_meta_data');
		$this->loader->add_filter( 'wp_insert_post_data' ,$admin,'wp_team_change_title');

	}

	public function run() {
		$this->loader->run();
	}

	public function get_version() {
		return $this->version;
	}

}
