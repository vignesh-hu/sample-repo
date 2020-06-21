<?php

get_header();

while (have_posts()) {
	the_post();
    pageBanner([
        // 'backgroundImage' => get_field('page_banner_background_image')['sizes']['pageBanner'],
        'subtitle' => get_field('page_banner_subtitle'),
        'title' => get_the_title(),
    ]);
	?>

	<div class="container container--narrow page-section">
	    <div class="generic-content">
            <div class="row-group">
                <div class="one-third">
                    <?php the_post_thumbnail('professorLandscape'); ?>
                </div>
                <div class="two-third">
                    <?php the_content(); ?>
                </div>
            </div>
	    </div>

	    <?php
    	$relatedPrograms = get_field('related_programs');
    	if ($relatedPrograms) { ?>

    		
            <hr class="section-break" />
            <h2>Subjects Taught</h2>
    		<ul class="link-list min-list">
    			<?php
    			foreach ($relatedPrograms as $relatedProgram) {?>
    				<li><a href="<?php echo get_the_permalink( $relatedProgram )?>" title="<?php echo get_the_title( $relatedProgram ) ?>"><?php echo get_the_title( $relatedProgram ) ?></a></li>

    			<?php
    			}
    			?>    		
    		</ul>
    	<?php }
    	?>

	  </div>
	<?php
}
get_footer();

?>