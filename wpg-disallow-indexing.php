<?php
/*
Plugin Name:  Disallow Indexing
Plugin URI:   https://github.com/wp-globalis-tools/wpg-disallow-indexing
Description:  Disallow indexing of your site on non-production environments
Version:      0.4.0
Author:       Pierre Dargham, GLOBALIS media system
Author URI:   https://github.com/wp-globalis-tools/wpg-disallow-indexing
*/

namespace Globalis\DisallowIndexing;


if (WP_ENV !== 'production') {
	define('WPG_NOINDEX', true);
	add_filter('pre_option_blog_public', '__return_zero');
	add_filter('robots_txt', __NAMESPACE__ . '\\robots_txt', 99, 2);
}

function robots_txt($output, $public) {
	$output = "User-agent: *\r\n";
	$output .= "Disallow: /\r\n";
	return $output;
}
