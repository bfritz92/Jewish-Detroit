<?php
/**

/**
 * Template Name: Department Home Page
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
<section id="intro" class="intro dept-intro <?php the_field('css_slug'); ?> grid">
	<!-- Featured Image-->
	<div class="dept-intro--splash">
	</div>

	<div class="dept-intro--title">
		<!--ACF  HEADLINE -->
		<?php if ( get_field('headline')) :  ?>
			<h1 class="blue"><?php the_field('headline'); ?></h1>
		<?php else : ?>		
			<h1 class="blue"><?php the_title(); ?></h1>
		<?php endif; ?>
		<!--ACF  BYLINE -->
		<h2 class="charcoal"><?php the_field('byline'); ?></h2>
	</div>
	<?php $email_header = get_field('email_header'); ?>
	<?php if($email_header) : ?>	
		<aside class="dept-intro--cta">
			<!--ACF  CTA-title -->
			<h3 class="dept-intro--cta__title"><?php the_field('email_header'); ?></h3>
			<div class="dept-intro--cta__content fade">
				<!--ACF  CTA-copy -->
				<div class="dept-intro--cta__text fade">
					<p class=""><?php the_field('email_text'); ?></p>				
				</div>
				<!-- This is the code you will get from Mailchimp’s NAKED Signup Form -->
				<div id="email-signup" class="dept-intro--cta--signup">
					<?php echo do_shortcode( '[gravityform id=766 title=false description=false ajax=true]' ); ?>
				</div>
			<!--End mc_embed_signup-->
		</aside>
	<?php endif; ?>		
	<div class="dept-intro--background"></div>
	<div class="dept-intro--copy fade">
		<!--ACF  intro--title -->
		<h2 class="mt2 fade"><?php the_field('intro_copy_headline'); ?></h2>
		<p><?php the_field('intro_copy_text'); ?></p>
		<!--ACF END intro-copy -->
	</div>
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