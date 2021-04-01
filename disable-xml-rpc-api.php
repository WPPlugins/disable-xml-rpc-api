<?php
/*
Plugin Name: Disable XML-RPC-API
Plugin URI: https://neatma.com/
Description: Lightweight plugin to disable XML-RPC API and Pingbacks,Trackbacks for faster and more secure website.
Version: 1.0.9
Tested up to: 5.7
Requires at least: 3.5
Author: Neatmarketing
Author URI: https://neatma.com/
License: GPLv2
*/

//
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

define('dsxmlrpc_plugin_url', plugin_dir_path(__FILE__));
define('dsxmlrpc_home_path', function_exists('get_home_path') ? get_home_path() : ABSPATH);

if ( ! class_exists( 'PAnD' ) ) {
require_once(dsxmlrpc_plugin_url . '/lib/admin-notices/persist-admin-notices-dismissal.php');
}

require_once(dsxmlrpc_plugin_url . 'admin/admin.php');

add_action( 'admin_init', array( 'PAnD', 'init' ) );
add_filter('xmlrpc_enabled', '__return_false');

//
// Disable X-Pingback to header
add_filter( 'wp_headers', 'dsxmlrpc_x_pingback' );
add_filter('pings_open', '__return_false', PHP_INT_MAX);

function dsxmlrpc_x_pingback( $headers ) {
	
  unset( $headers['X-Pingback'] );
         return $headers;
}


//
// Fix htaccess permissions
function dsxmlrpc_file_chmod() { 
	 $htaccess_file = dsxmlrpc_home_path . '.htaccess';
	  chmod($htaccess_file, 0755);
}

//
// Disable access to xmlrpc.php entirely with .htaccess file
function dsxmlrpc_add_htaccess() {
 
	$filename = dsxmlrpc_plugin_url . '/admin/dsxmlrpc-htaccess';
	$htaccess_file = dsxmlrpc_home_path . '.htaccess';
	insert_with_markers($htaccess_file, 'DS-XML-RPC-API', extract_from_markers($filename, 'DS-XML-RPC-API')) ?  :  dsxmlrpc_file_chmod();
}
add_action('admin_init', 'dsxmlrpc_add_htaccess', 1, 2 );

//
//Remove .htaccess codes when disabled
function dsxmlrpc_remove_htaccess() {

    $filename = dsxmlrpc_plugin_url . '/admin/dsxmlrpc-htaccess';
    $htaccess_file = dsxmlrpc_home_path . '.htaccess';
    insert_with_markers($htaccess_file, 'DS-XML-RPC-API', '') ?  :  dsxmlrpc_file_chmod();
	delete_option('dsxmlrpc-notice-forever');	
}
add_action( 'deactivated_plugin', 'dsxmlrpc_remove_htaccess', 2, 2 );

//
//  unistallation actions
function dsxmlrpc_uninstall_action(){
	delete_option('dsxmlrpc-notice-forever');
}