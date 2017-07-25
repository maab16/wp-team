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

		add_meta_box(
			"wp-team-meta-box", 
			"Team Meta", 
			array($this,"wp_team_meta_box_markup"), 
			'post',
			'side',
			'core'
		);

	}

	public function render_meta_box() {
		require_once plugin_dir_path( __FILE__ ) . 'partials/wp-team-meta-manager.php';
	}

	public function add_wp_team_custom_meta_box()
	{
		add_meta_box(
			"wp-team-meta-box", 
			"Team Meta", 
			array($this,"wp_team_meta_box_markup"), 
			"wp-team", 
			"normal", 
			"core"
		);
	}

	public function wp_team_meta_box_markup($object)
	{
		require_once plugin_dir_path( __FILE__ ) . 'partials/wp-team-meta-box.php';
	}

	public function wp_team_custom_post_type()
	{
		register_post_type("wp-team", array(
				"labels" => array("name" => __("Team"), "singular_name" => __("Team")),
				"public" => true, 
				"has_archive" => true,
				"rewrite" => array("slug"=> "team"),
				"supports" => array("editor", "title", "excerpt", "thumbnail", "comments"),
				"capability_type" => "post",
				"publicly_queryable" => true,
				"taxonomies" => array("category", "post_tag"),
			)
		);
	}

}