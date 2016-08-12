<?php
/*
Plugin Name: WPEX Post Types Feed Link Fix
Plugin URI: https://github.com/wpexplorer/wpex-post-types-feed-links-fix/blob/master/wpex-post-types-feed-links-fix.php
Author URI: http://www.wpexplorer.com
Description: Removes broken comments feed link on custom post types registered with has_archive set to false a known bug https://core.trac.wordpress.org/ticket/24867
Author: AJ Clarke
Version: 1.0
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