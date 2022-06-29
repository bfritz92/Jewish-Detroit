<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<script data-search-pseudo-elements src="https://kit.fontawesome.com/79a22ac9a8.js"></script>
	<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<?php wp_head(); ?>
	<?php
		$header_logo		= get_field('header_logo', 'option');
		$header_logo_mobile	= get_field('header_logo_mobile', 'option');
	?>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '442352042998271');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=442352042998271&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<meta name="facebook-domain-verification" content="2n9xt4hj40d3h4cxqmvgk133absq15" />
<style>
	@media only screen and (min-width: 600px) {
		#masthead a::after {
			content: "| <?php single_post_title(); ?>";
			font-weight:400;
			font-family:"gotham-book";
		}
	}
</style>
</head>
<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentynineteen' ); ?></a>
		<nav id="masthead" class="main-nav" tabindex="0" role="navigation">
			<a id="navLogo" class="nav-logo" href="/" aria-label="<?php echo $header_logo['alt']; ?>"><img src="<?php echo $header_logo['url']; ?>" alt="<?php echo $header_logo['alt']; ?>"></a>
			<a id="navLogo" class="nav-logo-mobile" href="/" aria-label="<?php echo $header_logo_mobile['alt']; ?>"><img src="<?php echo $header_logo_mobile['url']; ?>" alt="<?php echo $header_logo_mobile['alt']; ?>"></a> 
			<?php wp_nav_menu( array( 'theme_location' => 'header-mainnav','container' => '','menu_id'=> 'navList','menu_class'=> 'nav-list hide-for-mobile' ) ); ?>
			<?php wp_nav_menu( array( 'theme_location' => 'header-donate','container' => '','menu_id'=> '','menu_class'=> 'nav-list__mobile show-for-mobile-only' ) ); ?>
		</nav><!-- #masthead -->
		<?php wp_nav_menu( array( 'theme_location' => 'header-sidenav','container' => '','menu_id'=> 'sideNav','menu_class'=> 'sidenav' ) ); ?>		
	<div id="content" class="site-content">
	<div id="searchOverlay" class="overlay">
  		<span class="closebtn mt2" onclick="closeSearch()" title="Close Overlay"><i class="fas fa-window-close"></i></span>
  		<div class="overlay-content">
			  <h3 class="white">Search</h3>
		  <?php get_search_form(); ?>
  		</div>
	</div> 