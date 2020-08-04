<?php
/**

/**
 * Template Name: Individual Event
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

<main id="individual-event" class="individual-event">
	<img class="individual-event--img" src="https://2019.jewishdetroit.org/wp-content/uploads/2019/06/NXG-Mixxer-1200x628.jpg">
	<h5 class="individual-event--department">NEXXTGen Detroit Presents</h5>

	<h1 class="individual-event--title baskerville">The Summer Mixxer @ Deluxx Fluxx</h1>
	<ul class="individual-event--info">
		<li class="location"> Deluxx Fluxx, 1274 Library St, Detroit, MI 48226</li>
		<li class="date"> Thursday, June 27th at 7:00 pm</li>
		<li class="price"> $36 Pre-Register/ $40 Door</li>
		<li class="contact"> Hallie Eisenberg - 248-502-2865</li>
	</ul>
	<section class="individual-event--details">
		<div class="individual-event--details--copy">
			<h2 class="blue baskerville">A #NoFilter Federation fundraiser at the most Instagrammed spot in #Detroit. </h2>

			<p>Deluxx Fluxx is a bar, arcade and art installation all in one — and this year it’s the site of our summertime fundraiser. Come out for a good cause mixxed with cocktails, food, music and all the black light photo ops you could ever want.</p>

			<p><span class="gray bold">$36*</span>  per person when you register online before June 26 at noon</p>

			<p><span class="gray bold">$40*</span> per person at the door</p>

			<p style="font-style: italic;">*Includes two (2) drink tixx and an $18 donation to the Jewish Federation’s 2019 Annual Campaign</p>

			<p>When you purchase your ticket to our Summer Mixxer, you’re joining a community of donors who are committed to taking care of the needs of the Jewish community, locally and around the world, and building a vibrant Jewish future, here in Detroit and everywhere a Jewish heart beats. Donations to the Jewish Federation are distributed to 17 local agencies as well as agencies overseas that are committed to ensuring Jews of every walk of life are safe, happy, healthy and can embrace their Jewish identify. Learn more about the work of the Federation and our agencies.</p>

			<p>Questions? Contact Hallie at eisenberg@jfmd.org</p>
		</div>
		<div class="individual-event--details--leadership">
			<ul>
				<li><h4 class="blue baskerville">Event Co-Chairs</h4></li>
				<li>Josh Ketai</li>
				<li>Mike Ran</li>
				<li>Lauren Sallen</li>
			</ul>
			<ul>
				<li><h4 class="blue baskerville">Event Committee</h4></li>
				<li>Marc Crane</li>
				<li>Jake Dangovian</li>
				<li>Jordan Friedman</li>
				<li>Robert Sallen</li>
				<li>Randee Shapiro</li>
				<li>Jessica Sherbin</li>
				<li>Josh Sklar</li>
			</ul>
		</div>
	</section>
	<section class="individual-event--registration">
	</section>
<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
			?>

</main>



<section id="donation-panel" class="donation-panel">
	<div class="donation-panel--wrapper">
		<div class="donation-panel--wrapper-copy fade">
			<h1 class="white baskerville">You Matter.</h1>
			<h5 class="white">The help we provide to the Jewish community in Detroit, in Israel and around the world is not possible without your support. Choose your level of impact…</h5>
		</div>
		<div class="donation-panel--buttons fade">
			<button class="button button-clear" id="donate-18">$18</button>
			<button class="button button-clear" id="donate-36">$36</button>
			<button class="button button-clear" id="donate-100">$100</button>
			<button class="button button-clear" id="donate-180">$180</button>
			<button class="button button-clear other" id="donate-other">Other</button>
			<button class="button button-white submit" id="donate-give">Give</button>
		</div>
	</div>
</section>
<?php
get_footer();