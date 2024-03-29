<?php
/*
Template Name: Missions Template (Mission Portal)
*/
get_header('mission-portal');
?>
<section id="primary" class="content-area">
		<main id="main" class="site-main">
<?php
	/* Start the Loop */
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content/content', 'blank' );		
	endwhile; // End of the loop.
?>
</main><!-- #main -->
	</section><!-- #primary -->
<?php
get_footer();