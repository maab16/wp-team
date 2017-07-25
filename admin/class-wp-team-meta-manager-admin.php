<?php

class WP_Team_Meta_Manager_Admin {

	private $version;

	public function __construct( $version ) {
		$this->version = $version;
	}

	public function enqueue_styles() {

		wp_enqueue_style(
			'wp-team-meta-manager-admin',
			plugin_dir_url( __FILE__ ) . 'css/wp-team-meta-manager-admin.css',
			array(),
			$this->version,
			FALSE
		);
	}

	public function add_meta_box() {

		add_meta_box(
			'wp-team-meta-manager-admin',
			'Wp Team Meta Manager',
			array( $this, 'render_meta_box' ),
			'post',
			'normal',
			'core'
		);

	}

	public function render_meta_box() {
		require_once plugin_dir_path( __FILE__ ) . 'partials/wp-team-meta-manager.php';
	}

}