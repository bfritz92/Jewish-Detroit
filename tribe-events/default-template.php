<?php

/**

 * Default Events Template

 * This file is the basic wrapper template for all the views if 'Default Events Template'

 * is selected in Events -> Settings -> Template -> Events Template.

 *

 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php

 *

 * @package TribeEventsCalendar

 *

 */



if ( ! defined( 'ABSPATH' ) ) {

  die( '-1' );

}



get_header();
$events_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<header id="title-bar">
  <div class="row expanded">
      <div class="small-3 columns">
          <div class="jfmd-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/FoundationPress/assets/images/jfmd-logo.svg" alt="The Jewish Federation of Metropolitan Detroit" class="show-for-medium" id="desktop-logo"/></a>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/FoundationPress/assets/images/jfmd-logo-mobile.svg" alt="The Jewish Federation of Metropolitan Detroit" class="hide-for-medium" id="mobile-logo" /></a>
          </div> <!-- .jfmd-logo -->
      </div> <!-- .small-3 .columns -->
    <div class="small-9 columns show-for-small-only">
          <div class="input-group" id="searchbar">
            <?php get_search_form(); ?>

            <!-- No users yet <a href="#" target="_blank"><i class="fa fa-2x fa-user right" aria-hidden="true"></i></a> -->
          </div> <!-- .input-group #searchbar-->
      
      </div> <!-- .small-9 .columns .show-for-small-only -->

      <?php do_action( 'foundationpress_before_content' ); ?>
      

      <div class="medium-6 columns">
          <h1 class="center">
              <?php if ($events_url == 'http://2016.jewishdetroit.org/events/') :Ω ?>
          <?php echo tribe_get_events_title(); ?>
        <?php else : ?>
          <?php echo 'Events' ?>  
                <?php endif; ?>
            </h1>
      </div> <!-- .small-6 .columns -->
    
      <div class="medium-3 columns hide-for-small-only">
          <div class="input-group" id="searchbar">
            <?php get_search_form(); ?>

            <!-- No users yet <a href="#" target="_blank"><i class="fa fa-2x fa-user right" aria-hidden="true"></i></a> -->
          </div> <!-- .input-group #searchbar-->
      
      </div> <!-- .medium-3 columns .hide-for-small-only -->
  </div>
</header>
</header>


<article id="content" class="event-page-single">
  <?php tribe_events_before_html(); ?>
  <?php tribe_get_view(); ?>
  <?php tribe_events_after_html(); ?>
</article> <!-- #content -->
<?php get_footer(); ?>