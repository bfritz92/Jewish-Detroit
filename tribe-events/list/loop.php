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
<div class="events-intro">
	<h1 class="baskerville blue events-intro--title">Upcoming Events</h1>
</div>
<?php
global $post;
global $more;
$more = false;
$count = 0;
?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php $counter = $count++; ?>
		<?php do_action( 'tribe_events_inside_before_loop' ); ?>
		<!-- Event  -->
		<?php $featured = get_field('multi_day_featured'); ?>
		<?php $featured_order = get_field('featured_event_order'); ?>
		<?php if ($featured) : ?>
			<section id="events-list" class="events-list featured-event" style="order:<?php echo $featured_order;?>">
		<?php else : ?>
			<section id="events-list" class="events-list" style="order:<?php echo $count;?>">
		<?php endif; ?>
			<?php tribe_get_template_part( 'list/single', 'event' ) ?>
		</section>
		<?php do_action( 'tribe_events_inside_after_loop' ); ?>
	<?php endwhile; ?>