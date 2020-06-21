<?php
get_header();
pageBanner([
    'subtitle' => 'See what is happening around you!',
    'title' => 'All Events',
]);
?>

<div class="container container--narrow page-section">
  <?php

  // $today = date("Ymd");
  // $homePageEventsQuery = new WP_Query([
  //   'posts_per_page' => -11,
  //   'post_type' => 'events',
  //   'orderby' => 'meta_value_num',
  //   'meta_key' => 'event_date',
  //   'order' => 'asc',
  //   'meta_query' => [
  //     [
  //       'key'     => 'event_date',
  //       'value'   => $today,
  //       'type'    => 'numeric',
  //       'compare' => '>=',
  //     ]
  //   ]
  // ]);

  while (have_posts()) {
    the_post();
    get_template_part('template-parts/event-template');
    echo paginate_links( );
  }

  ?>

<hr class="section-break"></hr>
  <a href="<?php echo site_url( '/previous-events' ) ?>" title="Check out the past events!">Check out the past events!</a>
</div>

<?php
get_footer();
?>