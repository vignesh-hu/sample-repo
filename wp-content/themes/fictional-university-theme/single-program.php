<?php

get_header();

while (have_posts()) {
	the_post();
  pageBanner();
	?>

	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
      <p>
      	<a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program') ?>"><i class="fa fa-home" aria-hidden="true"></i> All Programs</a>
      	<span class="metabox__main">
      		<?php the_title() ?>
      	</span>
      </p>
    </div>
    <div class="generic-content">
    	<?php the_content() ?>
    </div>



    <?php
      $today = date("Ymd");
      $eventsQuery = new WP_Query([
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
            'compare' => '>=',
          ],
          [
            'key'     => 'related_programs',
            'value'   => '"'.get_the_ID().'"',
            'compare' => 'LIKE',
          ]
        ]
      ]);

      ?>

      <hr class="section-break" />
      <h2 class="headline headline--medium">Upcoming <?php the_title( ) ?> Event</h2>

      <?php

      if ($eventsQuery->have_posts()) {
        while ($eventsQuery->have_posts()) {
          $eventsQuery->the_post();
          get_template_part('template-parts/event-template');
        ?>
          <div class="event-summary">
            <a class="event-summary__date t-center" href="<?php echo the_permalink() ?>">
              <?php $eventData = new DateTime(get_field('event_date')) ?>
              <span class="event-summary__month"><?php echo $eventData->format('M') ?></span>
              <span class="event-summary__day"><?php echo $eventData->format('d') ?></span>
              <span class="event-summary__year"><?php echo $eventData->format('Y') ?></span>
            </a>
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny"><a href="<?php echo the_permalink() ?>"><?php the_title() ?></a></h5>
              <p>
                <?php
                echo has_excerpt()
                ? get_the_excerpt()
                : wp_trim_words(get_the_content(), 18)
                ?>
                <a href="<?php the_permalink() ?>" class="nu gray">Learn more</a>
              </p>
            </div>
          </div>
        <?php
        }
      } else {
        ?>
        There are no upcoming events.
        <?php
      }


      wp_reset_postdata();


      $relatedProfessors = new WP_Query([
        'posts_per_page' => -1,
        'post_type' => 'professor',
        'orderby' => 'title',
        'order' => 'asc',
        'meta_query' => [
          [
            'key'     => 'related_programs',
            'value'   => '"'.get_the_ID().'"',
            'compare' => 'LIKE',
          ]
        ]
      ]);

      ?>

      <hr class="section-break" />
      <h2 class="headline headline--medium"><?php the_title() ?> Professors</h2>

      <?php

      if ($relatedProfessors->have_posts()) {
        echo '<ul class="professor-cards">';
        while ($relatedProfessors->have_posts()) {
          $relatedProfessors->the_post()
        ?>
          <li class="professor-card__list-item">
            <a class="professor-card" href="<?php the_permalink( )?>" title="<?php the_title() ?>">
              <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorLandscape') ?>" />
              <span class="professor-card__name">
                <?php the_title() ?>
              </span>
            </a>
          </li>
        <?php
        }
        echo '</ul>';
      } else {
        ?>
        There are no upcoming events.
        <?php
      }
    ?>

  </div>
	<?php
}
get_footer();

?>