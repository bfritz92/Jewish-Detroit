<?php
/**
 * Single Event Content Template Part
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/single-event/content.php
 *
 * See more documentation about our Blocks Editor templating system.
 *
 * @link {INSERT_ARTCILE_LINK_HERE}
 *
 * @version 4.7
 *
 */
?>

<?php 
	$event_id	= $this->get( 'post_id' );
	$organizer	= $this->attr( 'organizer' );
	$co_chairs	= get_field('event_co_chairs');
	$special_pr	= get_field('event_price_special');
	$regform	= get_field('gravity_form_id');
	$qrcode		= get_field('qr_code_needed');
	$time_tba = get_field( "time_tba" );
	$date_tba = get_field( "date_tba" );
	$eventloc	= tribe_get_venue( $venue_id );
	$featured = get_field('multi_day_featured'); 
	$recurring = get_field('recurring_event_dates'); 
	$custom_event_location = get_field('custom_event_location'); 
 ?>
<?php // $use_gf = get_field('use_gf'); echo $use_gf; ?>
<ul class="individual-event--info">			
	<?php if ($custom_event_location) : ?>
		<li class="location"><?php echo $custom_event_location; ?></li>	
	<?php endif; ?>
	<?php if (strpos($eventloc, 'Virtual Event') !== false) : ?>
		<?php if ($custom_event_location) : ?>
			<li class="location" style="display:none;"><?php echo tribe_get_venue( $venue_id ); ?></li>
		<?php else : ?>
			<li class="location"><?php echo tribe_get_venue( $venue_id ); ?></li>
		<?php endif; ?>
	<?php else : ?>
		<?php if ($custom_event_location) : ?>
			<li class="location" style="display:none;"><?php echo tribe_get_venue( $venue_id ); ?>, <?php echo tribe_get_address( $venue_id ); ?>, <?php echo tribe_get_city( $venue_id ); ?> <?php echo tribe_get_state( $venue_id ); ?> <?php echo tribe_get_zip( $venue_id ); ?></li>
		<?php else : ?>
			<li class="location"><?php echo tribe_get_venue( $venue_id ); ?>, <?php echo tribe_get_address( $venue_id ); ?>, <?php echo tribe_get_city( $venue_id ); ?> <?php echo tribe_get_state( $venue_id ); ?> <?php echo tribe_get_zip( $venue_id ); ?></li>
		<?php endif; ?>
	<?php endif; ?>
 <li class="date">
	 <span class="hide-date">
	 <?php if ($date_tba) : ?>
	 	Event Postponed - Date TBD
	 <?php else : ?>
		<?php $curr_date = date('Y-m-d', time()); ?>
		<?php $event_date = tribe_get_start_date( $post->ID, false, 'Y' ) .'-'. tribe_get_start_date( $post->ID, false, 'm' ) .'-'. tribe_get_start_date( $post->ID, false, 'd' ); ?>
		<?php if ($curr_date > $event_date) : ?>
			Now
		<?php else : ?>
			<?php echo tribe_get_start_date( $post->ID, false, 'l' ); ?>, <?php echo tribe_get_start_date( $post->ID, false, 'F' ); ?> <?php echo tribe_get_start_date( $post->ID, false, 'jS' ); ?>
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
	</span>
	<?php if( have_rows('recurring_event_dates') ): ?>
	 		<hr />
		<?php while( have_rows('recurring_event_dates') ): the_row(); ?>
	 		
	 		<?php the_sub_field('date_and_time'); ?>
	 <br />
	 	<?php endwhile; ?>
	<?php endif;?>

	</li>
	<?php if ($special_pr) : ?>
		<li class="price"><?php echo $special_pr ?></li>
	<?php else : ?>
		<?php if (tribe_get_cost( null, true )) : ?>
			<li class="price"><?php echo tribe_get_cost( null, true ) ?></li>
		<?php endif; ?>
	<?php endif; ?>
	<?php if (tribe_get_organizer( $organizer )) : ?>
<li class="contact"><?php echo tribe_get_organizer( $organizer ); ?> <?php if (tribe_get_organizer_phone( $organizer )) : ?> - <?php echo tribe_get_organizer_phone( $organizer ); ?> <a href="mailto:<?php echo tribe_get_organizer_email( $organizer );?>"><?php echo tribe_get_organizer_email( $organizer );?></a><?php endif; ?></li>
	<?php endif; ?>
</ul>
	<section class="individual-event--details"> 					
	<?php the_content(); ?>
	</section>	
	<div class="entry-content">
	</div>