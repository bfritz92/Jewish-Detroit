<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

$event_id = get_the_ID();
$gravity_forms_id = types_render_field("gravity-form-id", array());
?>
<div id="tribe-events-content-wrapper" class="tribe-clearfix">
<div class="row expanded">
<?php while ( have_posts() ) :  the_post(); ?>
<!-- Single Event -->
  <div class="large-8 medium-8 small-12 columns">
    <div class="event-header-container">
          <?php if (has_post_thumbnail( $post->ID ) ): ?>
      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
            <img src="<?php echo $image[0]; ?>">
      <?php endif; ?>
            <div class="row expanded">
            <!-- Date -->
              <div class="date">
                  <div class="day"><?php echo tribe_get_start_date(null, false, 'j'); ?></div>
                    <div class="month"><?php echo tribe_get_start_date(null, false, 'M'); ?></div>
                </div>
          <h2><?php the_title() ?></h2>
        </div>
      </div>
      <div class="event-info-container">
        <?php if( get_field( 'hide_register_button') ): 
              echo '<ul class="menu vertical event-info-container">';
              else : echo '<div style="padding:1rem 1rem 0rem;">
          <a href="#register" class="small-12 columns pill button">Register</a>
        </div>
        <ul class="menu vertical event-info-container">
              <li></li>';
              endif;
            ?>
        
        
      
        
              <li id="event-location">
                  <a href="<?php echo tribe_get_map_link(); ?>" target="_blank">
                    <i class="fa fa-lg fa-map-marker" aria-hidden="true"></i>
                    <?php echo tribe_get_venue( $venue_id ); ?><?php if (tribe_get_address( $venue_id )) : ?>, <?php echo tribe_get_address( $venue_id ); ?><?php endif; ?><?php if (tribe_get_city( $venue_id )) : ?>, <?php echo tribe_get_city( $venue_id ); ?><?php endif; ?><?php if (tribe_get_state( $venue_id )) : ?>, <?php echo tribe_get_state( $venue_id ); ?><?php endif; ?> <?php echo tribe_get_zip( $venue_id ); ?>
                    </a>
            </li>
                <li>
                  <div class="row expanded">   
                      <i class="fa fa-lg fa-clock-o" aria-hidden="true"></i>
                        <?php echo tribe_get_start_date(null, false, 'l, F jS'); ?> at <?php echo tribe_get_start_date(null, false, 'g:i a'); ?>
                        <button class="hollow button right"><a href="<?php echo tribe_get_gcal_link(); ?>">Add to Google Calendar</a></button>
                        <button class="hollow button right"><a href="<?php echo tribe_get_single_ical_link(); ?>">Add to iCal</a></button>
                    </div>
            </li>
                <?php if ( tribe_get_cost() ) : ?>
                
                <li>
                <i class="fa fa-lg fa-money" aria-hidden="true"></i>
                      <?php echo tribe_get_cost( null, true ) ?>
              </li>
                <?php endif; ?>
                <?php if ( tribe_get_organizer() ) : ?>
                <?php 
            $organizer_name = tribe_get_organizer();
            $organizerName = explode(' ',trim($organizer_name));
          ?>
          <li>
                  <i class="fa fa-lg fa-phone" aria-hidden="true"></i>
                    <?php echo tribe_get_organizer() ?> - <?php echo tribe_get_organizer_phone() ?>
                    <div class="hollow button right"> <a href="mailto:<?php echo tribe_get_organizer_email() ?>">
                      Email <?php echo $organizerName[0] ?></a></div>
                   
                    <button class="hollow button right hide-for-medium" href="tel:<?php echo tribe_get_organizer_phone() ?>">
                      Call <?php echo $organizerName[0] ?>
                    </button>
            </li>
                <?php endif; ?>
          </ul>
      </div>

    <div class="row expanded event-info-container">
          <!-- <h3>About</h3> -->
            <?php the_content(); ?>
            <?php if ($gravity_forms_id) : ?>
              <p>&nbsp;</p>
				<h3>Register Here</h3><a name="register" id="register"></a>									   
                <?php echo do_shortcode('[gravityform id="'.$gravity_forms_id.'" title="false" description="false" ajax="true"]'); ?>
            <?php endif; ?>
    </div>

  </div> <!-- .large-8 .medium-8 .small-12 .columns -->
  <!-- Upcoming Events -->
    <div class="large-4 medium-4 small-12 columns">          

    <div class="upcoming-event-sidebar">
      <?php if( get_field( 'events_sidebar') ): 
      else : 
		echo dynamic_sidebar( 'sidebar-events' ); 
      endif;
      ?>
	</div> <!-- .upcoming-event-sidebar -->
  </div> <!-- .large-4 .medium-4 .small-12 .columns -->
<?php endwhile; ?>
</div> <!-- .row .expanded -->
</div>