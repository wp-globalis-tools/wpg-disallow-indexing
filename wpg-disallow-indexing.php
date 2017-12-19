<?php
/**
 * Plugin Name:         WPG Disallow Indexing
 * Plugin URI:          https://github.com/wp-globalis-tools/wpg-disallow-indexing
 * Description:         Disallow indexing of your site on non-production environments
 * Author:              Pierre Dargham, Globalis Media Systems
 * Author URI:          https://www.globalis-ms.com/
 * License:             GPL2
 *
 * Version:             0.5.0
 * Requires at least:   4.0.0
 * Tested up to:        4.7.8
 */

namespace Globalis\WP\DisallowIndexing;

if (WP_ENV !== 'production') {
    define('WPG_NOINDEX', true);
    add_filter('pre_option_blog_public', '__return_zero');
    add_filter('robots_txt', __NAMESPACE__ . '\\robots_txt', 99, 2);
}

function robots_txt($output, $public)
{
    $output = "User-agent: *\r\n";
    $output .= "Disallow: /\r\n";
    return $output;
}
