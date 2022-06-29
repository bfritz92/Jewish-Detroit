<?php
/**

/**
 * Template Name: Home Page
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
	<!-- Featured Image-->
	<section id="front-page-splash" class="content-area front-page-splash">
		<div class="front-page-splash--img">
			<?php if (get_field('home_banner_image_url', 'option')) : ?>
				<a href="<?php the_field('home_banner_image_url', 'option') ?>"><?php the_post_thumbnail('full'); ?></a>
			<?php else : ?>
				<?php the_post_thumbnail('full'); ?>
			<?php endif; ?>
		</div>
		<!-- <div class="front-page-splash--copy">
			<!--ACF  HEADLINE -->
			<!-- <h1 class="white front-page-splash--headline fade"><?php the_field('headline'); ?></h1>
			<!-- ACF BYLINE -->
			<!-- <p class="white front-page-splash--byline fade"><?php the_field('byline'); ?></p> 
		</div>-->
	</section>
	<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();
			the_content();
		endwhile; // End of the loop.
	?>

	</div>
<?php
get_footer();