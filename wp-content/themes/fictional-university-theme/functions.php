<?php

/**
 * Enqueue scripts
 *
 * @param string $handle Script name
 * @param string $src Script url
 * @param array $deps (optional) Array of script names on which this script depends
 * @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
 * @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
 */
function university_files() {
	wp_enqueue_script( 'main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), null, '1.0', true);
	wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i"');
	wp_enqueue_style( 'font-awesom', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style( 'university_main_styles', get_stylesheet_uri());
}
add_action( 'wp_enqueue_scripts', 'university_files' );


function university_features () {
	register_nav_menus([
		// 'headerMenuLocation' => 'Header Menu Location',
		// 'footerLocationOne' => 'Footer Location One',
		// 'footerLocationTwo' => 'Footer Location Two',
	]);

	add_theme_support( 'title-tag' );
	
	// featured images are also sometimes
	// referred to as thumbnails.
	add_theme_support( 'post-thumbnails' );

	// handle image sizes
	add_image_size( 'professorLandscape', 400, 260, true );
	add_image_size( 'professorPortrait', 480, 650, true );
	add_image_size( 'pageBanner', 1500, 350, true );
}

add_action( 'after_setup_theme', 'university_features' );

function university_adjust_queries ($query) {
	// before it gets a query, it will run this function
	// var_dump($query);
	// note that this is a powerful method that affects the 
	// admin queries, as well as the queries for each post type
	// so we have to put it inside a condition
	// !is_admin() && $query->query_vars['post_type'] === 'events'
	// we're also ensuring to call this function only on the main query,
	// so that it does not affect our custom queries
	if (!is_admin() AND is_main_query()) {

		if (is_post_type_archive('events')) {
			$today = date("Ymd");
			$query->set('posts_per_page', -1);
			$query->set('post_type', 'events');
			$query->set('orderby', 'meta_value_num');
			$query->set('meta_key', 'event_date');
			$query->set('order', 'asc');
			$query->set('meta_query', [
				[
					'key'     => 'event_date',
			        'value'   => $today,
			        'type'    => 'numeric',
			        'compare' => '>=',
			    ]
			]);
		} else if (is_post_type_archive('program')) {
			$query->set('posts_per_page', -1);
			$query->set('post_type', 'program');
			$query->set('orderby', 'title');
			$query->set('order', 'asc');
		}

	}
}

add_action( 'pre_get_posts', 'university_adjust_queries');

function pageBanner ($pageBannerArray = null) {
	// if (!$pageBannerArray['backgroundImage']) {
	// 	$pageBannerArray['backgroundImage'] = get_theme_file_uri('/images/bus.jpg');
	// }
	echo 'oneone';
	if (!$pageBannerArray['backgroundImage']) { // if nothing was passed
		echo 'nothing was sent ---->  ';
		echo get_field('page_banner_background_image').'akjflnsjhdnlkj';
		if (get_field('page_banner_background_image')) { // there is a stored banner image
			echo 'there is already an image stored in the db.';
			// print_r(get_field('page_banner_background_image'));
			$pageBannerArray['backgroundImage'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
		} else {
			// there is not stored banner image
			echo 'using the default image, cos nothing is stored';
			$pageBannerArray['backgroundImage'] = get_theme_file_uri('/images/bus.jpg');
		}
	}

	if (!$pageBannerArray['subtitle']) {
		$pageBannerArray['subtitle'] = get_field('page_banner_subtitle');
	}
	if (!$pageBannerArray['title']) {
		$pageBannerArray['title'] = get_the_title();
	}
?>
	<div class="page-banner">
	    <div class="page-banner__bg-image" style="background-image: url(<?php echo $pageBannerArray['backgroundImage'] ?>);"></div>
	    <div class="page-banner__content container container--narrow">
	        <h1 class="page-banner__title"><?php echo $pageBannerArray['title'] ?></h1>
	        <div class="page-banner__intro">
	            <p><?php echo $pageBannerArray['subtitle'] ?></p>
	        </div>
	    </div> 
	</div>

<?php
}