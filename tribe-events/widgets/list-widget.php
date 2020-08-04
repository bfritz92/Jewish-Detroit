<?php
/**
 * Events List Widget Template
 * This is the template for the output of the events list widget.
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is needed.
 *
 * This view contains the filters required to create an effective events list widget view.
 *
 * You can recreate an ENTIRELY new events list widget view by doing a template override,
 * and placing a list-widget.php file in a tribe-events/widgets/ directory
 * within your theme directory, which will override the /views/widgets/list-widget.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @version 4.1.1
 * @return string
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_plural = tribe_get_event_label_plural();
$events_label_plural_lowercase = tribe_get_event_label_plural_lowercase();

$posts = tribe_get_list_widget_events();
$post_type = get_post_type($post->ID); 
?>
<section id="events-list" class="events-list">
	<h1 class="baskerville blue events-list">Upcoming Events</h1>	
<?php // Check if any event posts are found.
if ( $posts ) : ?>
		<?php
		// Setup the post data for each event.
		foreach ( $posts as $post ) :
			setup_postdata( $post );
			?>
<?php // if ($post_type == tribe_events) : ?>   
<div class="events-list--item">	
	<a class="events-list--item--image" href="<?php echo esc_url( tribe_get_event_link() ); ?>">
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
		<img class="" src="<?php echo $image[0]; ?>">
	</a>		
	<ul class="events-list--item--info">
		<a class="events-list--item--image" href="<?php echo esc_url( tribe_get_event_link() ); ?>">
			<li class="department">El  NEXTGen Detroit Presents:</li>
			<li class="title"><h2><?php the_title() ?></h2></li>
			<li class="time"><?php echo tribe_get_start_date(null, false, 'g:i a'); ?></li>
			<li class="date"><?php echo tribe_get_start_date( $post->ID, false, 'l' ); ?>, <?php echo tribe_get_start_date( $post->ID, false, 'F' ); ?> <?php echo tribe_get_start_date( $post->ID, false, 'j' ); ?></li>
			<li class="location"><?php echo tribe_get_address( $venue_id ); ?>,<?php echo tribe_get_city( $venue_id ); ?> </li>
			<li class="description"><?php echo get_the_excerpt(); ?></li>
		</a>
		<li class="register"><a class="events-list--item--image" href="<?php echo esc_url( tribe_get_event_link() ); ?>"></a><a class="gray-link" href="<?php echo esc_url( tribe_get_event_link() ); ?>">Register <i class="fas fa-angle-double-right" aria-hidden="true"></i></a></li>
	</ul>
</div>
<?php // else : ?>
<!--	<div class="event-container fade">
		<h3 class="blue event-date"><li class=""><?php echo tribe_get_start_date( $post->ID, false, 'M' ); ?> <?php echo tribe_get_start_date( $post->ID, false, 'j' ); ?></h3>
	  <div class="event">
	    
	      <div class="event-overlay"></div>
	      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
		  <img class="event-image" src="<?php echo $image[0]; ?>">
	      <div class="event-details fadeIn-right">
	        <h3 class="event-details--title"><?php the_title() ?></h3>
	        <ul class="event-details--desc">
	        	<li class=""><?php echo tribe_get_start_date(null, false, 'g:i a'); ?></li>
	        	<li class=""><?php echo tribe_get_start_date( $post->ID, false, 'M' ); ?> <?php echo tribe_get_start_date( $post->ID, false, 'j' ); ?></li>
	        	<li class=""><?php echo tribe_get_venue ( $post->ID ); ?><?php echo tribe_get_venue( $venue_id ); ?></li>
	        	<li class="details"><?php echo get_the_excerpt(); ?></li>
	        </ul>
	        <a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="button button-small button-blue event-details--register">Register</a>
	      </div>
	    
	  </div>
	</div>-->		
<?php // endif; ?>
<?php endforeach; ?>  
<?php if ($post_type == tribe_events) : ?>  
	<a href="/events-front/">
		<h3 class="events-page--load-more blue">See More Events <i class="fas fa-angle-double-right" aria-hidden="true"></i></h3>
	</a>
<?php endif; ?>
<?php
// No events were found.
else : ?>
	<p class="center"><?php printf( esc_html__( 'There are no upcoming %s at this time.', 'the-events-calendar' ), $events_label_plural_lowercase ); ?></p>
<?php
endif; 
	?>
</section>