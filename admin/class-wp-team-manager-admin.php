<?php

class WP_Team_Meta_Manager_Admin {

	private $version;

	public function __construct( $version ) {
		$this->version = $version;
	}

	public function admin_enqueue_styles() {

		wp_enqueue_style(
			'wp-team-meta-manager-admin',
			plugin_dir_url( __FILE__ ) . 'css/wp-team-meta-manager-admin.css',
			array(),
			$this->version,
			'all'
		);
	}

	public function wp_enqueue_styles(){
		wp_enqueue_style(
			'wp-team-slick-theme',
			plugin_dir_url( __FILE__ ) . 'css/slick-theme.css',
			array(),
			$this->version,
			'all'
		);
		wp_enqueue_style(
			'wp-team-slick',
			plugin_dir_url( __FILE__ ) . 'css/slick.css',
			array(),
			$this->version,
			'all'
		);
		wp_enqueue_style(
			'wp-team-color',
			plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css',
			array(),
			$this->version,
			'all'
		);
		wp_enqueue_style(
			'wp-team-style',
			plugin_dir_url( __FILE__ ) . 'css/wp-team-style.css',
			array(),
			$this->version,
			'all'
		);

		wp_enqueue_script(
			'script',
			plugin_dir_url( __FILE__ ) . 'js/jquery.min.js',
			array ('jquery'), 
			3.1, 
			true
		);
		wp_enqueue_script(
			'mouse-detect',
			plugin_dir_url( __FILE__ ) . 'js/mouse-detect.js',
			array(),
			$this->version,
			'all'
		);
		wp_enqueue_script(
			'slick',
			plugin_dir_url( __FILE__ ) . 'js/slick.min.js',
			array(),
			$this->version,
			'all'
		);
		wp_enqueue_script(
			'custom',
			plugin_dir_url( __FILE__ ) . 'js/custom_script.js',
			array(),
			$this->version,
			'all'
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

	public function add_wp_team_custom_meta_box()
	{
		add_meta_box(
			"wp-team-meta-box", 
			"Add New Team", 
			array($this,"wp_team_meta_box_markup"), 
			"wp-team", 
			"normal", 
			"core"
		);
	}

	public function wp_team_meta_box_markup($object)
	{
		wp_nonce_field( plugin_basename( __FILE__ ), 'wp-team' );
		require_once plugin_dir_path( __FILE__ ) . 'partials/wp-team-meta-box.php';
	}

	public function wp_team_custom_post_type()
	{
		$labels = [
			"name" => __("Teams"),
			"singular_name" => __("Team"),
			"all_items" 	=> __("All Teams"),
			"add_new" 		=> __("Add Team"),
			"add_new_item"  => __(" "),
			"edit_item" 	=> __("Edit Team"),
			"new_item"		=> __("New Team"),
			"view_item" 	=> __("View Team"),
			"search_item" 	=> __("Search Team"),
			"not_found" 	=> __("No items found"),
			"not_found_in_trash" 	=> __("No items found in trash"),
			"parent_item_colon" 	=> __("Parent Team"),



		];
		register_post_type("wp-team", array(
				"labels" => $labels,
				"public" => true, 
				"has_archive" => true,
				"rewrite" => array("slug"=> "team"),
				"supports" => array("thumbnail"),
				"capability_type" => "post",
				"publicly_queryable" => true,
				"taxonomies" => array(""),
			)
		);
	}

	public function wp_team_shortcodes_init()
	{

	    add_shortcode('wp-team', array($this,'wp_team_shortcode'));
	}

	public function wp_team_shortcode($atts = [], $content = null, $tag = ''){


		require_once plugin_dir_path( __FILE__ ) . 'partials/wp-team-shortcode.php'; 
	}

	/* Callback to Save Meta Data */

	public function wp_team_save_meta_data($post_id)
	{

		if ( !isset($_POST['wp-team']) || ! wp_verify_nonce( $_POST['wp-team'], plugin_basename(__FILE__) ) ) 

			return;

		if(!current_user_can("edit_post", $post_id))
			return $post_id;

		if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
			return $post_id;

		if (!isset($_POST['wp-team-name']) || $_POST['wp-team-name'] == "") {
            return;
        }

        if (!isset($_POST['wp-team-title']) || $_POST['wp-team-title'] == "") {
            return;
        }

		foreach ($_POST as $key => $value) {
            update_post_meta(
                $post_id,
                $key,
                $value
            );
		}
	}

	public function wp_team_change_title( $data )
	{
	  if ( isset($_POST['wp-team']) && wp_verify_nonce( $_POST['wp-team'], plugin_basename(__FILE__) ))

	    $data['post_title'] =  $_POST['wp-team-name']; 
	  
	  return $data; 
	}

}