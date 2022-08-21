<?php
/*
Plugin Name: Disable XML-RPC-API
Plugin URI: https://neatma.com/dsxmlrpc-plugin/
Description: Lightweight plugin to disable XML-RPC API and Pingbacks,Trackbacks for faster and more secure website.
Version: 2.1.4
Tested up to: 6.0
Requires at least: 3.5
Author: Neatma
Author URI: https://neatma.com/
License: GPLv2
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use dsxmlrpc\xmlrpcSecurity;

// Constants
define('DSXMLRPC_FILE', __FILE__);
define('DSXMLRPC_PLUGIN_FILE', plugin_dir_path(__FILE__));
define('DSXMLRPC_URL', plugin_dir_url(__FILE__));
define('DSXMLRPC_HOME_PATH', function_exists('get_home_path') ? get_home_path() : ABSPATH);

require_once(DSXMLRPC_PLUGIN_FILE . 'disable-xml-rpc-api.php');
require_once(DSXMLRPC_PLUGIN_FILE . '/admin/admin.php');
require_once(DSXMLRPC_PLUGIN_FILE . '/lib/skelet/framework.config.php');
if (!class_exists('PAnD')) {
    require_once(DSXMLRPC_PLUGIN_FILE . '/lib/admin-notices/persist-admin-notices-dismissal.php');
}

// Initialize the main class
xmlrpcSecurity::initialize();

