=== Disable XML-RPC-API ===

Plugin Name: Disable XML-RPC-API
Plugin URI: https://kafeweb.com/
Description: Simple plugin to disable XML-RPC API and X-Pingback in WordPress 3.5+ for faster and more secure website.
Tags: disable xml-rpc, disable xmlrpc,remove xmlrpc, XML-RPC, xmlrpc.php, XML-RPC API, stop brute force attacks
Version: 1.0.1
Tested up to: 5.6
Requires at least: 3.5
Author: Amin Nazemi
Author URI: https://kafeweb.com/
License: GPLv2

Simple plugin to disable XML-RPC API and X-Pingback in WordPress 3.5+ for faster and more secure website
== Description ==

Pretty simply, this plugin disables the XML-RPC API on a WordPress site running 3.5 or above.

**PLUGIN FEATURES**

* Disable access to xmlrpc.php file using .httacess file 
* Disable X-pingback API to minimize CPU usage 
* Remove and disable xmlrpc API entirely 


Beginning in 3.5, XML-RPC is enabled by default. Additionally, the option to disable/enable XML-RPC was removed. For various reasons, site owners may wish to disable this functionality. This plugin provides an easy way to do so.

== Installation ==

1. Upload the disable-xml-rpc directory to the `/wp-content/plugins/` directory in your WordPress installation
2. Activate the plugin through the 'Plugins' menu in WordPress
3. XML-RPC-API is now disabled!

To re-enable XML-RPC, just deactivate the plugin through the 'Plugins' menu.

== Frequently Asked Questions ==

= Is there an admin interface for this plugin? =

No. This plugin is as simple as XML-RPC is off (plugin activated) or XML-RPC is on (plugin is deactivated).

= How do I know if the plugin is working? =

There are three easy methods for checking if XML-RPC is off:
1. Easiest way is going to this url: http://yourdomain/xmlrpc.php enter your domain name instead of 'yourdomain' if you see "Access forbidden!" or "403 error" it's working.
2. First, try using an XML-RPC client, like the official WordPress mobile apps. The WordPress mobile app should tell you that "XML-RPC services are disabled on this site" if the plugin is activated.
3. Or you can try the XML-RPC Validator, written by Danilo Ercoli of the Automattic Mobile Team - the tool is available at [http://xmlrpc.eritreo.it/](http://xmlrpc.eritreo.it/) with a blog post about it at [http://daniloercoli.com/2012/05/15/wordpress-xml-rpc-endpoint-validator/](http://daniloercoli.com/2012/05/15/wordpress-xml-rpc-endpoint-validator/). Keep in mind that you want the validator to fail and tell you that XML-RPC services are disabled.

= Something doesn't seem to be working correctly =

If the plugin is activated, but XML-RPC appears to still be working ... OR ... the plugin is deactivated, but XML-RPC is not working, then it's possible that another plugin or theme function is affecting the xmlrpc_enabled filter.

== Screenshots ==
screenshot-1.png
== Changelog ==

= 1.0.0 =
* Initial release

= 1.0.1 =
* Fix bugs
