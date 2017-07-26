<?php
/*
Plugin Name: WP Team
Plugin URI: https://github.com/maab16/wp-team
Description: Wordpress Team Plugin
Version: 0.1
Author: MD Abu Ahsan Basir
Author URI: http://www.devcodeskill.tk/author/maab16
License: GPL v2 or higher
License URI: License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-team-meta-manager.php';

function run_wp_team_meta_manager() {

	$spmm = new WP_Team_Meta_Manager();
	$spmm->run();

}

run_wp_team_meta_manager();

 // Grabs the inserted post data so you can modify it.

