<?php

/**
 * Plugin Name: Events
 * Plugin URI:  http://github.com/jcasabona/lil-post-types
 * Description: A simple plugin for creating events.
 * Version: 1.0.0
 * Author: Crystal McNeil
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/license/gpl-2.0.text
 * Text Domain: event-posts
 * Domain Path: /languages
 */

if (!defined('WPINC')) {
	die;
}

define('EVENT_VERSION', '1.0.0');
define('EVENTDOMAIN', 'event-post-types');
define('EVENTPATH', plugin_dir_path(__FILE__));

require_once(EVENTPATH . '/event-post-types/register.php');

add_action('init', 'event_register_post_type');
