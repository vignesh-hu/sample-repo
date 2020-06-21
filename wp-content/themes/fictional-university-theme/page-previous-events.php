<?php

get_header();

$today = date("Ymd");
$homePageEventsQuery = new WP_Query([
	'paged' => get_query_var('paged', 1), // this tell the cutstom query which page number of results that it should be on
	'posts_per_page' => 2,
	'post_type' => 'events',
	'orderby' => 'meta_value_num',
	'meta_key' => 'event_date',
	'order' => 'asc',
	'meta_query' => [
		[
			'key'     => 'event_date',
			'value'   => $today,
			'type'    => 'numeric',
			'compare' => '<',
		]
	]
]);


pageBanner([
    'subtitle' => "Don't forget to replace the subtitle later.",
    'title' => get_the_title(),
]);
?>

<div class="container container--narrow page-section">

<?php
	while ($homePageEventsQuery->have_posts()) {
		$homePageEventsQuery->the_post();
		get_template_part('template-parts/event-template');
	}

// pagination only automatically works with default queries and not custom queries like we have in this page
// So we have to pass in an array for the page
echo paginate_links([
	'total' => $homePageEventsQuery->max_num_pages
]);
?>
</div>
<?php

get_footer();

?>