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
$no_registration = get_field('hide_register_button');

?>
<?php if ( $posts ) : ?>
	<?php if ( is_front_page() ) : ?> 
		<section id="events-list" class="events-list">
			<h1 class="baskerville blue events-list">Upcoming Events</h1>
	<?php else : ?>
		<section id="events" class="dept-events <?php the_field('css_slug',$post_id); ?> white">
			<h2 class="dept-events--title blue baskerville fade">Upcoming Events</h2>
			<div class="dept-events--events-grid">
	<?php endif; ?>		
	<?php			
		$a = 1;
		foreach ( $posts as $post ) :
			setup_postdata( $post );
				$time_tba = get_field( "time_tba" );
$date_tba = get_field( "date_tba" );
$featured = get_field('multi_day_featured'); 
	?>
	<?php if ( is_front_page() ) : ?>   
		<div class="events-list--item">	
			<a class="events-list--item--image" href="<?php echo esc_url( tribe_get_event_link() ); ?>" style="position:relative;">
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
				<img class="" src="<?php echo $image[0]; ?>">
				<?php if ( get_field( 'sold_out' ) == "yes" ): ?>
					<div class="ribbon <?php echo get_field( 'sold_out_color'); ?> ribbon-top-right"><span><?php echo get_field( 'sold_out_lang'); ?></span></div>
				<?php endif; ?>
			</a>		
			<ul class="events-list--item--info">		
				<li class="department">	
					<?php 
						echo strip_tags(tribe_get_event_taxonomy($event_id, 'before=&sep= and &after'));
					?>
					<?php if (strpos(tribe_get_event_taxonomy($event_id), ' and ') !== false) :
    echo 'Present:';
	else :
	echo 'Presents:';
endif; ?></li>		
				<li class="title"><a class="events-list--item--image" href="<?php echo esc_url( tribe_get_event_link() ); ?>"><h2><?php the_title() ?></h2></a></li>
				<li class="time">
				<?php if ($date_tba) : ?>
					Event Postponed - Date TBD
				<?php else : ?>	
					<?php $curr_date = date('Y-m-d', time()); ?>
					<?php $event_date = tribe_get_start_date( $post->ID, false, 'Y' ) .'-'. tribe_get_start_date( $post->ID, false, 'm' ) .'-'. tribe_get_start_date( $post->ID, false, 'd' ); ?>
					<?php if ($curr_date > $event_date) : ?>
						Now
					<?php else : ?>
						<?php echo tribe_get_start_date(null, false, 'l'); ?>, <?php echo tribe_get_start_date(null, false, 'F'); ?> <?php echo tribe_get_start_date(null, false, 'j'); ?>
					<?php endif; ?>
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
				<li class="register"><a class="events-list--item--image" href="<?php echo esc_url( tribe_get_event_link() ); ?>"></a><a class="gray-link" href="<?php echo esc_url( tribe_get_event_link() ); ?>">Register</a></li>
			</ul>
		</div>
	<?php else : ?>
		<div class="dept-events--detail event-<?php echo $a++;?> blue fade">
			<a class="events-list--item--image" href="<?php echo esc_url( tribe_get_event_link() ); ?>" style="position:relative;">
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
				<img src="<?php echo $image[0]; ?>" />
				<?php if ( get_field( 'sold_out' ) == "yes" ): ?>
					<div class="ribbon <?php echo get_field( 'sold_out_color'); ?> ribbon-top-right"><span><?php echo get_field( 'sold_out_lang'); ?></span></div>
				<?php endif; ?>
			</a>			
			<ul class="dept-events--detail__info">
				<li class="host m0"><h5><?php echo strip_tags(tribe_get_event_taxonomy($event_id, 'before=&sep= and &after')); ?></h5></li>
				<li class="title m0"><h2><a href="<?php echo esc_url( tribe_get_event_link() ); ?>"><?php the_title() ?></a></h2></li>
				<li class="location m0"><i class="fas fa-map-marker-alt gray"></i><?php echo tribe_get_venue( $venue_id ); ?></li>
				<li class="date m0"><i class="fas fa-calendar-day gray"></i><?php echo tribe_get_start_date( $post->ID, false, 'l' ); ?>, <?php echo tribe_get_start_date( $post->ID, false, 'F' ); ?> <?php echo tribe_get_start_date( $post->ID, false, 'j' ); ?></li>
				<li class="time m0">
				<?php if ($date_tba) : ?>
					<i class="far fa-clock gray"></i>Event Postponed - Date TBD
				<?php else : ?>	
					<?php $curr_date = date('Y-m-d', time()); ?>
					<?php $event_date = tribe_get_start_date( $post->ID, false, 'Y' ) .'-'. tribe_get_start_date( $post->ID, false, 'm' ) .'-'. tribe_get_start_date( $post->ID, false, 'd' ); ?>
					<?php if ($curr_date > $event_date) : ?>
						<i class="far fa-clock gray"></i>Now
					<?php else : ?>
						<i class="far fa-clock gray"></i><?php echo tribe_get_start_date(null, false, 'l'); ?>, <?php echo tribe_get_start_date(null, false, 'F'); ?> <?php echo tribe_get_start_date(null, false, 'j'); ?>
					<?php endif; ?>
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
				<li class="register m0"><a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="gray gray-link">Learn More or Register</a></li>
			</ul>
		</div>	
	<?php endif; ?>
	<?php endforeach; wp_reset_postdata(); ?>  
	<?php if ($post_type == tribe_events || is_front_page()) : ?>  
		<a class="events-page--load-more" href="/events/">
			<h3 class="blue-link">See More Events</h3>
		</a></div>
	<?php endif; ?>
			</section>
	<?php if ( is_front_page() ) : ?> 
	<?php else : ?>
			</div>
</section>
	<?php endif; ?>			
<?php
// No events were found.
else : ?>
<section id="events" class="dept-events <?php the_field('css_slug',$post_id); ?> white">
			<h2 class="dept-events--title blue baskerville fade">Upcoming Events</h2>
			
<p class="center">There are no upcoming <?php the_title(); ?> <?php printf( esc_html__( '%s', 'the-events-calendar' ), $events_label_plural_lowercase ); ?>  at this time, but please check out <a href="/events/">Federation's other events</a>.</p>
	
	</section>
<?php
endif; 
?>
		
