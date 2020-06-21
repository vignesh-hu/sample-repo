<?php

get_header();

while (have_posts()) {
	the_post();
    pageBanner();
	?>
    

	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
		      <p>
		      	<a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('events') ?>"><i class="fa fa-home" aria-hidden="true"></i> Events Home</a>
		      	<span class="metabox__main">
		      		<?php the_title() ?>
		      	</span>
		      </p>
		    </div>
	    <div class="generic-content">
	    	<?php the_content() ?>
	    </div>

	    <?php
    	$relatedPrograms = get_field('related_programs');
    	if ($relatedPrograms) { ?>

    		
            <hr class="section-break" />
            <h2>Related Program(s)</h2>
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