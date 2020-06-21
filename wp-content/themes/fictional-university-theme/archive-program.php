<?php
get_header();
print_r(get_field('page_banner_background_image').'ihi');
// pageBanner([
//   'backgroundImage' => get_field('page_banner_background_image')['sizes']['pageBanner'],
//   'subtitle' => 'There is something for everyone. Jump in!',
//   'title' => 'All Programs',
// ]);
?>

<div class="container container--narrow page-section">
	<ul class="link-list min-list">
  <?php

  while (have_posts()) {
    the_post();
  ?>
  	<li><a href="<?php echo the_permalink() ?>" title="<?php echo the_title() ?>"><?php echo the_title() ?></a></li>
  <?php  
  echo paginate_links( );

  }

  ?>
	</ul>

<?php get_footer(); ?>