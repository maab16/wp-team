<?php

class WP_Team_Manager_Admin {

	/**
	 * @param version
	 */
	protected $version;

	public function __construct($version = 1.0)
	{
		$this->version = $version;
	}

	/**
	 * Register Admin/Dashboard Script and Styles
	 * @param No
	 * @return void
	 */
	public function admin_enqueue_styles() {

		wp_enqueue_style(
			'wp-team-meta-manager-admin',
			plugin_dir_url( __FILE__ ) . 'css/wp-team-admin.css',
			array(),
			$this->version,
			FALSE
		);
	}
	/**
	 * Register Public Script and Styles
	 * @param No
	 * @return void
	 */
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
		/*
		 * Register Script
		 */
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

	/**
	 * Register Custom Meta Boxes
	 * @param No
	 * @return void
	 */
	public function add_meta_box() {

		add_meta_box(
			"wp-team-meta-box", 
			"Add Team Menmer", 
			array($this,"wp_team_meta_box_markup"), 
			"wp-team", 
			"normal", 
			"core"
		);

	}

	/**
	 * Render WP Team Meta Box Markup
	 * @param No
	 * @return void
	 */
	public function wp_team_meta_box_markup($object)
	{
		require_once plugin_dir_path( __FILE__ ) . 'partials/wp-team-meta-box.php';
		wp_nonce_field( plugin_basename( __FILE__ ), 'wp-team' );
	}

	/**
	 * Add WP Team Custom Post 
	 * @param No
	 * @return void
	 */
	public function wp_team_custom_post_type()
	{
		$labels = [
			"name" 					=> __("Teams"),
			"singular_name" 		=> __("Team"),
			"all_items" 			=> __("All Teams"),
			"add_new" 				=> __("Add Member"),
			"add_new_item"  		=> __(" "),
			"edit_item" 			=> __("Edit Team"),
			"new_item"				=> __("New Team"),
			"view_item" 			=> __("View Team"),
			"search_item" 			=> __("Search Team"),
			"not_found" 			=> __("No items found"),
			"not_found_in_trash" 	=> __("No items found in trash"),
			"parent_item_colon" 	=> __("Parent Team"),



		];
		register_post_type("wp-team", array(
				"labels" 				=> $labels,
				"public" 				=> true, 
				"has_archive" 			=> true,
				"rewrite" 				=> array("slug"=> "team"),
				"supports" 				=> array("thumbnail"),
				"capability_type" 		=> "post",
				"publicly_queryable" 	=> true,
				"taxonomies" 			=> array(""),
			)
		);
	}

	/**
	 * Add Short Codes
	 * @param No
	 * @return void
	 */
	public function add_shortcodes()
	{

	    add_shortcode('wp-team', array($this,'wp_team_shortcode'));
	}

	/**
	 * Add Wp Team Short Code
	 * @param array $atts
	 * @param string $content
	 * @param string $tag
	 * @return void
	 */
	public function wp_team_shortcode($atts = [], $content = null, $tag = '')
	{
		global $new_whitelist_options;
		// normalize attribute keys, lowercase
		$atts = array_change_key_case((array)$atts, CASE_LOWER);

		// override default attributes with user attributes
		extract(shortcode_atts(
					[
		                'title' 		=> get_option('title'),
		                'dots' 			=> get_option('dots'),
		                'infinite'		=> get_option('infinite'),
		                'autoplay'		=> get_option('autoplay'),
		                'prev'			=> get_option('prev'),
		                'next'			=> get_option('next'),
		                'slides' 		=> get_option('slides'),
		                'scroll'		=> get_option('scroll'),
		                'md_slides'		=> get_option('md_slides'),
		                'md_scroll'		=> get_option('md_scroll'),
		                'sm_slides'		=> get_option('sm_slides'),
		                'sm_scroll'		=> get_option('sm_scroll'),
		                'xs_slides'		=> get_option('xs_slides'),
		                'xs_scroll'		=> get_option('xs_scroll')
		            ], 
		            $atts, 
		            $tag
		        ));
		require_once plugin_dir_path( __FILE__ ) . 'partials/wp-team-shortcode.php'; 
		require_once plugin_dir_path( __FILE__ ) . 'partials/wp-team-config.php'; 
	}

	/**
	 * Save Wp Team Meta Data
	 * @param integer $post_id
	 * @return void
	 */
	public function wp_team_save_meta_data($post_id)
	{

		if ( !isset($_POST['wp-team']) || ! wp_verify_nonce( $_POST['wp-team'], plugin_basename(__FILE__) ) ) 

			return;

		if(!current_user_can("edit_post", $post_id))
			return $post_id;

		if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
			return $post_id;

		if (!isset($_POST['wp-team-member-name']) || $_POST['wp-team-member-name'] == "") {
            return;
        }

        if (!isset($_POST['wp-team-member-title']) || $_POST['wp-team-member-title'] == "") {
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

	/**
	 * Change Wp Team Title auto draft to Team Member Name
	 * @param array $data
	 * @return array $data
	 */
	public function wp_team_change_title( $data )
	{
	  if ( isset($_POST['wp-team']) && wp_verify_nonce( $_POST['wp-team'], plugin_basename(__FILE__) ))

	    $data['post_title'] =  $_POST['wp-team-member-name']; 
	  
	  return $data; 
	}

	public function wp_team_register_settings() {

		// if ( !isset($_POST['wp-team-setting']) || ! wp_verify_nonce( $_POST['wp-team-setting'], plugin_basename(__FILE__) ) ) 
		// 	return;

		// if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
		// 	return;

		foreach ($_POST as $key => $value) {
			if($key == 'submit')
				continue;
			add_option( $key, $value);
			register_setting( 'wp_team_options_group', $key, 'myplugin_callback' );
		}
	}

	public function wp_team_register_options_page() {
	  add_options_page('WP Team', 'Team Settings', 'manage_options', 'wp-team', [$this , 'wp_team_options_page']);
	}

	public function wp_team_options_page()
	{
	  require_once plugin_dir_path( __FILE__ ) . 'partials/wp-team-settings.php'; 
	}


	public function add_plugin_settings_link( $links ) {
	    $settings_link = '<a href="options-general.php?page=wp-team">' . __( 'Settings' ) . '</a>';
	    array_push( $links, $settings_link );
	  	return $links;
	}

}