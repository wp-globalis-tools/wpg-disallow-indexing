<?php
/*
Plugin Name:  Disallow Indexing
Plugin URI:   https://github.com/wp-globalis-tools/wpg-disallow-indexing
Description:  Disallow indexing of your site on non-production environments.
Version:      1.0.0
Author:       Pierre Dargham, GLOBALIS media system
Author URI:   https://github.com/wp-globalis-tools/wpg-disallow-indexing
*/

if (WP_ENV !== 'production') {
  add_filter('pre_option_blog_public', '__return_zero');
}
