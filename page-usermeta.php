<?php
/*
Template Name: Get User Meta
*/

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php 
				$user_info = get_user_meta(555);
				var_dump($user_info);
			?>
			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
