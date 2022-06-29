<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
		<section id="events-list" class="events-list">
	<!-- Events Loop -->
			<div class="events-intro">
				<h1 class="baskerville blue events-intro--title">Upcoming NEXTGen Events</h1>
			</div>			
		<?php if ( have_posts() ) : ?>			
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'blank' );		
			endwhile; // End of the loop.
			// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
			</section>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
