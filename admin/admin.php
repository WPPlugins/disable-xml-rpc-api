<?php


function sample_admin_notice__success() {
	if ( ! PAnD::is_admin_notice_active( 'dsxmlrpc-notice-15' ) ) {
		return;
	}

	?>
	<div data-dismissible="dsxmlrpc-notice-15" class="updated notice notice-success is-dismissible">
	<h2>Your website is protected from XML-RPC DDOS attacks!</h2>
	<div class="dsxmlrpc-notice-innner">
		<p>You can help us make this plugin better by reviewing and giving it 5 stars</p>
		<a href="https://wordpress.org/support/plugin/disable-xml-rpc-api/reviews/#new-post" target="_blank" class="wporg-ratings" aria-label="4 out of 5 stars" data-title-template="%s out of 5 stars" data-rating="4" style="margin: 8px;text-decoration:none;color:#ffb900;"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span></a>
	</div>
	</div>
	<style>
	a.wporg-ratings span:hover {
    color: #FF9800 !important;
    }
	@media screen and (min-width: 782px) {
	.dsxmlrpc-notice-innner {
	display: flex;
	}}
	</style>
	<?php
}

add_action( 'admin_notices', 'sample_admin_notice__success' );