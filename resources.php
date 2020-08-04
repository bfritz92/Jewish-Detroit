<?php
/**

/**
 * Template Name: Resources
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

<section class="resources--splash">
	<img class="resources--splash--img" src="https://2019.jewishdetroit.org/wp-content/uploads/2019/07/resources-splash-sm.jpg">
	<div class="resources--splash--copy">
		<h1 class="baskerville">Resources</h1>
		<p class="">At Federation, one of our missions is to help you discover the breadth and depth of Jewish educational, spiritual and communal resources available in our community.  
From a welcoming congregation near you to Jewish day schools and Yeshivas, to college campus engagement with Hillel, and our community’s cemetery index, you’ll find them in abundance with the directories below. </p>
	</div>
</section>

<section class="resources--directories">
	<img class="resources--directories--img" src="https://2019.jewishdetroit.org/wp-content/uploads/2019/07/resources-directories-sm.jpg">
	<div class="resources--directories--copy">
		<h2 class="baskerville">Directories</h2>
		<ul>
			<li><a href="/resources/schools/" class="blue-link">Schools Directory</a></li>
			<li><a href="/resources/hillels/" class="blue-link">Hillels</a></li>
			<li><a href="https://cemetery.jewishdetroit.org/" class="blue-link">Cemetery Index</a></li>
			<li><a href="/resources/congregations/" class="blue-link">Congregations</a></li>
		</ul>
	</div>
</section>

<section class="resources--calendar">
	<img class="resources--calendar--img" src="https://2019.jewishdetroit.org/wp-content/uploads/2019/07/resources-events-sm.jpg">
	<div class="resources--calendar--copy">
		<h2 class="baskerville blue">Community Calendar</h2>
		<h3 class=""><a href="https://jewishdetroitcalendar.org/" class="blue-link">Click here to see upcoming events in the community</a></h3>
	</div>
	<div class="resources--calendar--events">
		<!-- Herb Add - Pull from Calendar | Begin -->
		<div class="row" id="rest-events" data-equalizer> 
		</div>
		<!-- Herb Add - Pull from Calendar | Bnd -->		
		<a href="https://jewishdetroitcalendar.org" class="button button-blue" target="_blank">Join us at an Event!</a>
	</div>
</section>

<section class="resources--mjc">
	<img class="resources--mjc--img" src="https://2019.jewishdetroit.org/wp-content/uploads/2019/07/resources-mjc-sm.jpg">
	<div class="resources--mjc--copy">
		<h2 class="baskerville blue">The Michigan Jewish Conference</h2>
		<p class="">The Michigan Jewish Conference (MJC) provides resources in the form of grants that help sustain vibrant Jewish life in smaller communities throughout Michigan. A program of the Jewish Federation of Metropolitan Detroit, the MJC supports dynamic Jewish cultural and educational programming in 17 member communities outside of Metro Detroit.</p>
		<a class="blue-link baskerville" href="/mjc/">Learn More</a>
	</div>
</section>








<?php
get_footer();