<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

	</div><!-- #content -->
	<section id="donation-panel" class="donation-panel">
		<div class="donation-panel--wrapper">
			<div class="donation-panel--wrapper-copy fade fade-in">
				<!-- ACF donation-title -->
				<h1 class="white"><?php the_field('donation_header', 'option'); ?></h1>
				<!-- ACF dontation-copy -->
				<h5 class="white"><?php the_field('donation_blurb', 'option'); ?></h5>
			</div>
			<div class="donation-panel--buttons fade fade-in">
				<?php echo do_shortcode( '[gravityform id='.get_field('gravity_form_id', 'option').' title=false description=false ajax=true]' ); ?>
			</div>
		</div>
	</section>
	<footer id="footer" class="footer">
    <div class="footer--container">
		<div class="footer--id">
			<img class="footer-logo" src="<?php the_field('footer_logo', 'option'); ?>" alt="Jewish Federation of Metropolitan Detroit Logo">
			<?php the_field('organization_contact', 'option'); ?>
			<p class="footer--copyright">&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?></p>
			<?php wp_nav_menu( array( 'theme_location' => 'footer-legal','container' => '','menu_class'=> 'footer--legal' ) ); ?>	
			<?php the_field('social_menu', 'option'); ?>      
		</div>
    <div class="footer--list-container">
      <div class="footer--list-1">
        <?php wp_nav_menu( array( 'theme_location' => 'footer-about-us','container' => '','menu_class'=> 'footer--about-us' ) ); ?>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-get-involved','container' => '','menu_class'=> 'footer--list--get-involved' ) ); ?>			
      </div>
      <div class="footer--list-2">
        <?php wp_nav_menu( array( 'theme_location' => 'footer-learn-more','container' => '','menu_class'=> 'footer--list--learn-more' ) ); ?>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-directories','container' => '','menu_class'=> 'footer--list--directories' ) ); ?>
      </div>	
    </div>
  </div>
	</footer>
</div><!-- #page -->


<!--<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>-->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
		
<script src="<?php echo get_template_directory_uri(); ?>/js/tabby.min.js"></script>
        <script>
	var tabs = new Tabby('[data-tabs]');
</script>
 <script>
 	$(document).ready(function(){

	//init ScrollMagic
	var controller = new ScrollMagic.Controller();

	// loop through each .project element
	$('.fade').each(function(){

		// build a scene
		var ourScene = new ScrollMagic.Scene({
			triggerElement: this.children[0],
			triggerHook: .8,
			reverse: false
		})
		.setClassToggle(this, 'fade-in') //add class to projects
		// .addIndicators({
		//	name: 'fade scene',
		//	colorTrigger: 'black',
		//	colorStart: '#75c695',
		//	colorEnd: 'pink'
		//}) // this requires a plugin
		.addTo(controller);

		});
});

 </script>

<!-- Navbar Search Autofocus -->
 <script>
  function selectSearch() {
    document.getElementById("search").focus();
  }
</script> 

<!-- Navbar Scroll-hide -->
<script>
$(document).ready(function () {
  
  'use strict';
  
   var c, currentScrollTop = 0,
       navbar = $('#masthead');

   $(window).scroll(function () {
      var a = $(window).scrollTop();
      var b = navbar.height();
     
      currentScrollTop = a;
     
      if (c < currentScrollTop && a > b + b) {
        navbar.addClass("scrollyhide");
      } else if (c > currentScrollTop && !(a <= b)) {
        navbar.removeClass("scrollyhide");
      }
      c = currentScrollTop;
  });
  
});
</script>
<!-- Mobile Nav Toggle -->
<script>
/* Set the width of the side navigation to 400px */
function openNav() {
  document.getElementById("sideNav").style.transform = "translateX(-400px)";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("sideNav").style.transform = "translateX(400px)";
} 
</script>

<!--Sidenav Show/Hide -->
<script>
  const dropDown = document.querySelectorAll('span.sidenav-dropdown');
  for(i=0;i<dropDown.length;i++)
	dropDown[i].onclick=doSomething;

function doSomething() {
 const current = event.currentTarget.parentNode;
 current.querySelector("ul").classList.toggle("show-menu");

}
  
</script>


<!--Accordion -->
<script>
	const accordionItem = document.querySelectorAll('.accordion-item');
                             
const onClickAccordionHeader = e => {
  if (e.currentTarget.parentNode.classList.contains('active')) {
    e.currentTarget.parentNode.classList.remove("active");
  } else {
    Array.prototype.forEach.call(accordionItem, (e) => {
      e.classList.remove('active');
    });
    e.currentTarget.parentNode.classList.add("active");
  }
};

const init = () => {
  Array.prototype.forEach.call(accordionItem, (e) => {
    e.querySelector('.accordion-header').addEventListener('click', onClickAccordionHeader, false);
  });
};

document.addEventListener('DOMContentLoaded', init);init
</script>

<script async src="https://widget.spreaker.com/widgets.js"></script>

<script>
	tabControl();

/*
We also apply the switch when a viewport change is detected on the fly
(e.g. when you resize the browser window or flip your device from 
portrait mode to landscape). We set a timer with a small delay to run 
it only once when the resizing ends. It's not perfect, but it's better
than have it running constantly during the action of resizing.
*/
var resizeTimer;
$(window).on('resize', function(e) {
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(function() {
    tabControl();
  }, 250);
});

/*
The function below is responsible for switching the tabs when clicked.
It switches both the tabs and the accordion buttons even if 
only the one or the other can be visible on a screen. We prefer
that in order to have a consistent selection in case the viewport
changes (e.g. when you esize the browser window or flip your 
device from portrait mode to landscape).
*/
function tabControl() {
  var tabs = $('.tabbed-content').find('.tabs');
  if(tabs.is(':visible')) {
    tabs.find('a').on('click', function(event) {
      event.preventDefault();
      var target = $(this).attr('href'),
          tabs = $(this).parents('.tabs'),
          buttons = tabs.find('a'),
          item = tabs.parents('.tabbed-content').find('.item');
      buttons.removeClass('active');
      item.removeClass('active');
      $(this).addClass('active');
      $(target).addClass('active');
    });
  } else {
    $('.item').on('click', function() {
      var container = $(this).parents('.tabbed-content'),
          currId = $(this).attr('id'),
          items = container.find('.item');
      container.find('.tabs a').removeClass('active');
      items.removeClass('active');
      $(this).addClass('active');
      container.find('.tabs a[href$="#'+ currId +'"]').addClass('active');
    });
  } 
}
</script>

<script>
// Open the full screen search box
function openSearch() {
  document.getElementById("searchOverlay").style.display = "block";
}

// Close the full screen search box
function closeSearch() {
  document.getElementById("searchOverlay").style.display = "none";
} 

//tie it to the searchbar icon thingy
 // Wait for the page to load first
 window.onload = function() {

//Get a reference to the link on the page
// with an id of "mylink"
var a = document.getElementById("mylink");

//Set code to run when the link is clicked
// by assigning a function to "onclick"
a.onclick = function(openSearch) {

  // Your code here...

  //If you don't want the link to actually 
  // redirect the browser to another page,
  // "google.com" in our example here, then
  // return false at the end of this block.
  // Note that this also prevents event bubbling,
  // which is probably what we want here, but won't 
  // always be the case.
  return false;
}
}
</script>
<?php wp_footer(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-3611591-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-3611591-1');
</script>

<!-- Mobile Nav Search and Toggle -->
<script>
function mobileSearch() {
  closeNav();
  openSearch();
}
</script>

</body>
</html>