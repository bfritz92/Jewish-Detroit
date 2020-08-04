<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/loop.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php
global $post;
global $more;
$more = false;
$count = 1;
?>

<div class="tribe-events-loop">

	<?php while ( have_posts() ) : the_post(); ?>
		<?php $counter = $count++; ?>
		<?php do_action( 'tribe_events_inside_before_loop' ); ?>
		<!-- Event  -->
		<?php
		$post_parent = '';
		if ( $post->post_parent ) {
			$post_parent = ' data-parent-post-id="' . absint( $post->post_parent ) . '"';
		}
		?>
        <?php if ($counter % 2 != 0) : ?>
        	<div class="row" data-equalizer="" data-resize="" data-events="">        	
        <?php endif; ?>
			<div class="large-6 columns">          	
				<?php tribe_get_template_part( 'list/single', 'event' ) ?>
			</div>
		<?php if ($counter % 2 == 0) : ?>
        	</div>
        <?php endif; ?>

		<?php do_action( 'tribe_events_inside_after_loop' ); ?>
	<?php endwhile; ?>

</div><!-- .tribe-events-loop -->
