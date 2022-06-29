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

	<footer id="footer" class="footer grid">
		<div class="footer--id">
			<img class="footer-logo" src="https://2019.jewishdetroit.org/wp-content/uploads/2019/05/JFMD_WHT.svg" alt="Jewish Federation of Metropolitan Detroit Logo">
			<ul class="footer--contact">
				<li>Jewish Federation of Metropolitan Detroit</li>
				<li>6735 Telegraph Rd #30, </li>
				<li>Bloomfield Hills, MI 48301</li>
				<li class="teal">(248) 642-4260</li>
			</ul>
			<p class="footer--copyright">©2019 Jewish Federation of Metropolitan Detroit</p>
			<ul class="footer--legal">
				<li>Privacy Policy</li>
				<li>Ethics Policy</li>
				<li>Audited Financial Statements and Form 990 Reporting</li>
			</ul>
		</div>
    <?php get_search_form(); ?>
		<div class="footer--list-1">
			<ul class="footer--list--about-us">
				<li><a href="#" class="teal">About Us</a></li>
				<li><a href="#">Brand Guide</a></li>
				<li><a href="#">Publications</a></li>
				<li><a href="#">FAQ</a></li>
				<li><a href="#">Partner Agencies</a></li>
				<li><a href="#">Leadership</a></li>
				<li><a href="#">Jobs</a></li>
			</ul>
			<ul class="footer--list--get-involved">
				<li><a href="#" class="teal">Get Involved</a></li>
				<li><a href="#">Events</a></li>
				<li><a href="#">Israel & Overseas</a></li>
				<li><a href="#">NEXTGen Detroit</a></li>
				<li><a href="#">Women’s Philanthropy</a></li>
				<li><a href="#">Archives</a></li>
				<li><a href="#">Maimonides Society</a></li>
				<li><a href="#">Pound for Pound Men's Group</a></li>
				<li><a href="#">Interfaith Couples</a></li>
				<li><a href="#">Complete List of Groups</a></li>
			</ul>
		</div>
		<div class="footer--list-2">
			<ul class="footer--list--learn-more">
				<li><a href="#" class="teal">Learn More</a></li>
				<li><a href="#">Brand Guide</a></li>
				<li><a href="#">Publications</a></li>
				<li><a href="#">FAQ</a></li>
				<li><a href="#">Partner Agencies</a></li>
				<li><a href="#">Leadership</a></li>
				<li><a href="#">Jobs</a></li>
			</ul>
			<ul class="footer--list--directories">
				<li><a href="#" class="teal">Directories</a></li>
				<li><a href="#">Schools</a></li>
				<li><a href="#">Jewish Cemetery Index</a></li>
				<li><a href="#">Hillels</a></li>
				<li><a href="#">Congregations</a></li>
				<li><a href="#">Community Archives</a></li>
				<li><a href="#">Jewish Detroit Community Calendar</a></li>
				<li><a href="#">Jewish Women’s Foundation</a></li>
				<li><a href="#">Michigan Jewish Conference</a></li>
				<li><a href="#">Guide To Jewish Teen Opportunities</a></li>
				<li><a href="#">Maimonides</a></li>
			</ul>
		</div>
		
	</footer><!-- #colophon -->

</div><!-- #page -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

<!--<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>

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
$(document).ready(function() {
  var scrollTop = 0;
  $(window).scroll(function() {
    scrollTop = $(window).scrollTop();
    $(".counter").html(scrollTop);

    if (scrollTop >= 100) {
      $("#masthead").addClass("scrolled-nav");
    } else if (scrollTop < 100) {
      $("#masthead").removeClass("scrolled-nav");
    }
  });
});

var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("masthead").style.transform = "none";
  } else {
  	document.getElementById("masthead").style.transform = "translateY(-75px)";
	}
  prevScrollpos = currentScrollPos;
} 
</script>

<!-- Mobile Nav Toggle -->
<script>
/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("sideNav").toggleClass() = "translateX(-250px)";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("sideNav").style.transform = "translateX(250px)";
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
	/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false */

( function( window ) {

'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}

})( window );
</script>
	

<?php wp_footer(); ?>

</body>
</html>







