<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

$no_registration = get_field('hide_register_button');
$time_tba = get_field( "time_tba" );
$date_tba = get_field( "date_tba" );
$featured = get_field('multi_day_featured'); 
?>
	<div class="events-list--item">

	<a class="events-list--item--image" href="<?php echo esc_url( tribe_get_event_link() ); ?>">
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
            <img src="<?php echo $image[0]; ?>">
    	<?php endif; ?>
	</a>
		<ul class="events-list--item--info">
			<li class="department">
				<?php 
    				echo strip_tags(tribe_get_event_taxonomy($event_id, 'before=&sep= and &after'));
    			?>
			Presents:</li>
			<li class="title"><a class="" href="<?php echo esc_url( tribe_get_event_link() ); ?>"><h2><?php the_title() ?></h2></a></li>
 			<li class="time">
				<?php if ($date_tba) : ?>
					Event Postponed - Date TBD
				<?php else : ?>				
					<?php echo tribe_get_start_date(null, false, 'l'); ?>, <?php echo tribe_get_start_date(null, false, 'F'); ?> <?php echo tribe_get_start_date(null, false, 'j'); ?>
					<?php if ($featured) : ?>
					<?php else : ?>
						at <?php echo tribe_get_start_date(null, false, 'g:i a'); ?>
					<?php endif; ?>
					<?php if ($featured) : ?>	 	
						- 
						<?php echo tribe_get_end_date( $post->ID, false, 'l' ); ?>, <?php echo tribe_get_end_date( $post->ID, false, 'F' ); ?> <?php echo tribe_get_end_date( $post->ID, false, 'jS' ); ?>	
					<?php else : ?>
					<?php endif; ?>
				<?php endif; ?>
			</li>			
			<li class="date"></li>
			<?php if ($no_registration) : ?>
				<li class="register"><a class="blue-link" href="<?php echo esc_url( tribe_get_event_link() ); ?>">Learn More</a></li>
			<?php else : ?>
				<li class="register"><a class="blue-link" href="<?php echo esc_url( tribe_get_event_link() ); ?>">Register</a></li>
			<?php endif; ?>
		</ul>
	</div>