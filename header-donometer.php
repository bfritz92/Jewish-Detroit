<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 30; URL=$url1");
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />		
		<?php wp_head(); ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="<?php echo get_template_directory_uri(); ?>/assets/javascript/campaign/numscroller.js"></script>
  </head>
	<body <?php body_class(); ?>>
	

  <div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

   
	<header id="scoll-nav">
      <nav class="top-bar">
         <button type="button" class="button show-for-medium-only" id="medium-menu-button" data-open="mobile-menu"><i class="fa fa-lg fa-bars" aria-hidden="true"></i> Menu</button>
        <!-- Main Menu -->
        <div class="top-bar-left show-for-large" id="only-large-screens">
 
        </div>
        <!-- Social -->
        <div class="top-bar-right show-for-medium">
          <ul class="menu align-left" id="social-menu">
            <li class="donate"><a href="<?php echo esc_url( home_url( '/' ) ); ?>donate">Donate</a>
            </li>
            <li><a href="https://www.facebook.com/detroitfederation" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="https://twitter.com/detfederation" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="https://vimeo.com/detroitfederation" target="_blank"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
            <li><a href="https://www.flickr.com/photos/jewishdetroit/" target="_blank"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>
          </ul>
        </div>
        <!-- Mobile Top Bar-->
        <ul class="menu align-left show-for-small-only" id="mobile-top-bar">
            <li>
              <button type="button" class="button" data-open="mobile-menu"><i class="fa fa-lg fa-bars" aria-hidden="true"></i> Menu</button>
            </li>
            <li class="donate">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>donate">Donate</a>
            </li>
        </ul>
      </nav>
      
