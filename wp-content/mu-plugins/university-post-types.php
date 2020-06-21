<?php


function university_post_types () {

	// Register Event Type
	register_post_type( 'events', [
		'rewrite' => [
			'slug' => 'events'
		],
		'has_archive' => true, # this is not working yet
		'public' => true, # this will make it public to editors and viewers of the website
		'labels' => [
			'name' => 'Events',
			'add_new_item' => 'Add New Event',
			'edit_item' => 'Edit Event',
			// 'menu_name' => 'All Events',
			'all_items' => 'All Events',
			'singular_name' => 'Event'
		],
		'menu_icon' => 'dashicons-calendar',
		'supports' => [
			'title',
			'editor',
			'custom-fields', # rather we'll us a plugin to handle custom fields
			'excerpt',
		]
	]);

	// Register Program Post Type
	register_post_type( 'program', [
		'rewrite' => [
			'slug' => 'programs'
		],
		'has_archive' => true, # this is not working yet
		'public' => true, # this will make it public to editors and viewers of the website
		'labels' => [
			'name' => 'Programs',
			'add_new_item' => 'Add New Program',
			'edit_item' => 'Edit Program',
			'menu_name' => 'All Programs',
			'singular_name' => 'Program'
		],
		'menu_icon' => 'dashicons-awards',
		'supports' => [
			'title',
			'editor',
		]
	]);

	// Register Professor Post Type
	register_post_type( 'professor', [
		// We do not need the professor archive
		// So remove the has_archive and rewrite keys
		'public' => true, # this will make it public to editors and viewers of the website
		'labels' => [
			'name' => 'professors',
			'add_new_item' => 'Add New Professor',
			'edit_item' => 'Edit Professor',
			'menu_name' => 'All Professors',
			'singular_name' => 'Professor'
		],
		'menu_icon' => 'dashicons-businessperson',
		'supports' => [
			'title',
			'editor',
			'thumbnail'
		]
	]);
}

add_action('init', 'university_post_types');