<?php
get_header();
pageBanner([
    'subtitle' => get_the_archive_description(),
    'title' => get_the_archive_title(),
]);
?>

<div class="container container--narrow page-section">
  <?php

  while (have_posts()) {
    the_post();
  ?>
  <div class="post-item">
    <h2 class="headline headline-medium headline--post-title">
      <a href="<?php the_permalink() ?>" title=""><?php the_title() ?></a>
    </h2>

    <div class="metabox">Posted by <?php the_author_posts_link(); ?> on <?php the_time('M n, Y.'); ?>in <?php echo get_the_category_list(', ') ?></div>
    <div class="generic-content">
      <?php the_content() ?>
  </div>

  <?php  
  }

  echo paginate_links( );

  ?>
</div>

<?php
get_footer();
?>