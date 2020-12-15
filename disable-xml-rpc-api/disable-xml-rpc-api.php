<?php
/*
Plugin Name: Disable XML-RPC-API
Plugin URI: https://kafeweb.com/
Description: Simple plugin to disable XML-RPC API and X-Pingback in WordPress 3.5+ for faster and more secure website.
Version: 1.0.0
Tested up to: 5.5.3
Requires at least: 	3.5
Author: Amin Nazemi
Author URI: https://kafeweb.com/
License: GPLv2
*/

require_once(ABSPATH . 'wp-admin/includes/misc.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');




$plugin = 'disable-xml-rpc-api/disable-xml-rpc-api.php';

add_filter('xmlrpc_enabled', '__return_false');

// Disable X-Pingback to header

add_filter( 'wp_headers', 'dsxmlrpc_x_pingback' );
add_filter('pings_open', '__return_false', PHP_INT_MAX);

function dsxmlrpc_x_pingback( $headers ) {
  unset( $headers['X-Pingback'] );
         return $headers;
}




// Disable access to xmlrpc.php entirely with .htaccess file

function dsxmlrpc_add_htaccess() {
 
$home_path = function_exists('get_home_path') ? get_home_path() : ABSPATH;
$filename = dirname(__FILE__) . '/dsxmlrpc-htaccess';
$htaccess_file = $home_path . '.htaccess';

insert_with_markers($htaccess_file, 'DS-XML-RPC-API', extract_from_markers($filename, 'DS-XML-RPC-API'));
}
    add_action('admin_init', 'dsxmlrpc_add_htaccess', 1, 2 );



function dsxmlrpc_remove_htaccess() {
   $home_path = function_exists('get_home_path') ? get_home_path() : ABSPATH;
   $filename = dirname(__FILE__) . '/dsxmlrpc-htaccess';
   $htaccess_file = $home_path . '.htaccess';
    	insert_with_markers($htaccess_file, 'DS-XML-RPC-API', '');
}
add_action( 'deactivated_plugin', 'dsxmlrpc_remove_htaccess', 2, 2 );