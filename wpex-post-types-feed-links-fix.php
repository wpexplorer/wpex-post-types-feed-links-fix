<?php
/*
Plugin Name: WPEX Post Types Feed Link Fix
Plugin URI: http://www.wpexplorer.com
Description: Fixes 404 errors on custom post types due to WP automatic-feed-links bug
Author: AJ Clarke
Version: 1.0
Author URI: http://www.wpexplorer.com
*/

function wpex_post_types_feed_link_fix() {
	if ( is_single() && ! is_singular( 'post' ) ) {
		$obj         = get_post_type_object( get_post_type() );
		$has_archive = $obj->has_archive;
		if ( empty( $has_archive ) ) {
			add_filter( 'post_comments_feed_link', '__return_false' );
		}
	}
}
add_action( 'wp', 'wpex_post_types_feed_link_fix' );