<?php

/**
 * Plugin Name: Busines Directory Post Types and Taxonomies
 * Plugin URI:  http://github.com/jcasabona/lil-post-types
 * Description: A simple plugin for creating custom post types and taxonomies related to a business directory.
 * Version: 1.0.0
 * Author: Crystal McNeil
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/license/gpl-2.0.text
 * Text Domain: lil-post-types
 * Domain Path: /languages
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'LIL_VERSION', '1.0.0' );
define( 'LILDOMAIN', 'lil-post-types' );
define( 'LILPATH', plugin_dir_path( __FILE__ ) );

require_once( LILPATH . '/post-types/register.php' );
add_action( 'init', 'lil_register_business_type' );
