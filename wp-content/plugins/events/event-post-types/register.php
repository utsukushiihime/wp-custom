<?php

function event_register_post_type()
{

	$labels = array(
		'name' => __('Events', EVENTPATH),
		'singular_name' => __('Event', EVENTDOMAIN),
		'featured_image' => __('Event Image', EVENTDOMAIN),
		'set_featured_image' => __('Set Event Image', EVENTDOMAIN),
		'remove_featured_image' => __('Remove Event Image', EVENTDOMAIN),
		'use_featured_image' => __('Use Image', EVENTDOMAIN),
		'archives' => __('Events', EVENTDOMAIN),
		'add_new' => __('Add New Event', EVENTDOMAIN),
		'add_new_item' => __('Add New Event', EVENTDOMAIN),
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => 'events',
		'rewrite' => array('has_front'
		=> true),
		'menu_icon' => 'dashicons-calendar-alt',
		'supports' => array('title', 'editor', 'thumbnail'),
		'show_in_rest' => true,
	);

	register_post_type('event', $args);
}
