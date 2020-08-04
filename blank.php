<?php
/**

/**
 * Template Name: Blank
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
<?php
	/* Start the Loop */
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content/content', 'blank' );		
	endwhile; // End of the loop.
?>
<!--
<section id="events-list" class="events-list">
	<div class="events-list--item">
		<a class="events-list--item--image" href="https://2019.jewishdetroit.org/summer-mixxer/"><img class="" src="https://2019.jewishdetroit.org/wp-content/uploads/2019/06/NXG-Mixxer-1200x628.jpg" /></a>
		<ul class="events-list--item--info">
			<li class="department">NEXTGen Detroit Presents:</li>
			<li class="title"><a class="" href="#"><h2>The Summer Mixxer @ Deluxx Fluxx</h2></a></li>
			<li class="date">Thursday, June 17 | 7:00 PM</li>
			<li class="description">#NoFilter Federation fundraiser at the most Instagrammed spot in #Detroit. Deluxx Fluxx is a bar, arcade and art installation all in one — and this year it’s the site of our summertime fundraiser. Come out for a good cause mixxed with cocktails, food, music and all the black ligh…</li>
			<li class="register"><a class="blue-link" href="https://2019.jewishdetroit.org/summer-mixxer/">Register</a></li>
		</ul>
	</div>
	<div class="events-list--item">
		<img class="" src="https://2019.jewishdetroit.org/wp-content/uploads/2019/06/19_R4TL_RegHdr.jpg" />
		<ul class="events-list--item--info">
			<li class="department">Israel and Overseas Presents:</li>
			<li class="title"><h2>Detroit Ride for the Living</h2></li>
			<li class="time">8:00 AM</li>
			<li class="date">Sunday, June 30</li>
			<li class="location">26325 Scotia Rd, Huntington Woods</li>
			<li class="description">The Krakow JCC’s Annual Ride for the Living is a 55 kilometer bike ride from Auschwitz to JCC Krakow that commemorates Jewish history and celebrates the miraculous rebirth of Jewish life in Poland today. This year, JFMD’s Israel & Overseas Department  and the JCC of Metropolitan …</li>
			<li class="register"><a class="blue-link baskerville ">Register</a></li>
		</ul>
	</div>
	<div class="events-list--item">
		<img class="events-list--item--image" src="https://2019.jewishdetroit.org/wp-content/uploads/2019/06/splish.jpg" />
		<ul class="events-list--item--info">
			<li class="department">NEXTGen Detroit and JFamily's</li>
			<li class="title"><h2>Splish Splash Bash in Honor of PJ Library's Book Mitzvah</h2></li>
			<li class="time">9:00 AM</li>
			<li class="date">Sunday, June 30</li>
			<li class="location">24725 Farmington Rd, Farmington Hills</li>
			<li class="description">In honor of PJ Library’s Book Mitzvah, join us for some summer fun and a bagel breakfast with the Cappuccino Man. We’ll be at Heritage Park in Farmington Hills enjoying the playground and splash pad, PJ Library story time, crafts and more! (For families with children ages 0 to 4.)</li>
			<li class="register"><a class="blue-link baskerville ">Register</a></li>
		</ul>
	</div>
	<div class="events-list--item">
		<img class="events-list--item--image" src="https://2019.jewishdetroit.org/wp-content/uploads/2019/06/Friday-Field-Day-NXG-2019-10047.jpg" />
		<ul class="events-list--item--info">
			<li class="department">NEXTGen Detroit and Come Play Detoit Present:</li>
			<li class="title"><h2>A Good Ol' Fashioned Field Day</h2></li>
			<li class="time">5:00pm</li>
			<li class="date">Friday, July 12</li>
			<li class="location">27705 Greenfield Rd, Southfield</li>
			<li class="description">Cost: $5 per person We’re throwing a good ol’ fashioned field day! It’s gonna be just like you remember — tug-of-war, potato sack race, relays. But you’re older now, so don’t forget to stretch. Dress in recess wear and get to Catalpa Oaks in Southfield at 5 PM sharp so you don’t …</li>
			<li class="register"><a class="blue-link baskerville ">Register</a></li>
		</ul>
	</div>
	<div class="events-list--item">
		<img class="events-list--item--image" src="https://2019.jewishdetroit.org/wp-content/uploads/2019/06/NXG-VolunteerEvent-FBBannerNXG-2019-10061-4.jpg" />
		<ul class="events-list--item--info">
			<li class="department">NEXTGen Detroit Volunteers Present:</li>
			<li class="title"><h2>Repair the World Detroit at Cadillac Urban Garden</h2></li>
			<li class="time">10:00 AM</li>
			<li class="date">Sunday, July 14</li>
			<li class="location">4601 Marritt St, Detroit</li>
			<li class="description">Meet us in the garden for a morning of volunteering at Cadillac Urban Garden as part of our Summer of Service series! We’re excited to lend a hand and add to the thousands of volunteer hours that have transformed this once abandoned parking lot into a thriving community vegetable …</li>
			<li class="register"><a class="blue-link baskerville ">Register</a></li>
		</ul>
	</div>
	<div class="events-list--item">
		<img class="events-list--item--image" src="https://2019.jewishdetroit.org/wp-content/uploads/2019/06/SoireeFacebook-Header-NXG-2019-10049-1.jpg" />
		<ul class="events-list--item--info">
			<li class="department">NEXTGen Detroit and Chabad of Greater Detroit Present:</li>
			<li class="title"><h2>The 6th Annual Shabbat Summer Soirée Garden Party</h2></li>
			<li class="time">7:00 PM</li>
			<li class="date">Friday, July 19</li>
			<li class="location">Address Provided Upon RSVP</li>
			<li class="description">Celebrate Shabbat with NEXTGen Detroit and ChabaD at the Siegel Mansion in Detroit’s historic Boston-Edison neighborhood. Designed by Albert Kahn and built in 1915, the 13,000 sq. ft. Italian-style villa was the private residence of Benjamin Siegel, owner of the upscale B. Siegel …</li>
			<li class="register"><a class="blue-link baskerville ">Register</a></li>
		</ul>
	</div>
	<div class="events-list--item">
		<img class="events-list--item--image" src="https://2019.jewishdetroit.org/wp-content/uploads/2019/06/InterFaith-Tamarack-Visit-FINAL-CCD-2019-10036-1.jpg" />
		<ul class="events-list--item--info">
			<li class="department">Interfaith Couples Presents:</li>
			<li class="title"><h2>Tamarack Camps Visit and Tour</h2></li>
			<li class="time">6:00 PM</li>
			<li class="date">Wednesday, August 7</li>
			<li class="location">4631 Perryville Road, Ortonville</li>
			<li class="description">Join other Interfaith couples for a visit to one of Federation’s all-star agencies, Tamarack Camps. We’ll have dinner, take a tour and meet with camp’s leadership and Israeli campers. We’ll finish the evening with s’mores around the campfire. Space is limited. Please register by …</li>
			<li class="register"><a class="blue-link baskerville ">Register</a></li>
		</ul>
	</div>
</section>

<a href=""><h3 class="events-page--load-more blue">Load More Events <i class="fas fa-angle-double-right"></i></h3></a>

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
-->
<!-- # Hide until we can figure out how to include with styling
<section id="donation-panel" class="donation-panel">
	<div class="donation-panel--wrapper">
		<div class="donation-panel--wrapper-copy fade fade-in">
			
			<h1 class="white">You Matter.</h1>
 
			<h5 class="white">The help we provide to the Jewish community in Detroit, in Israel and around the world is not possible without your support. Choose your level of impact…</h5>
		</div>
		<div class="donation-panel--buttons fade fade-in">
			<?php echo do_shortcode( '[gravityform id=11 title=false description=false ajax=true]
' ); ?>
		</div>
	</div>
</section>-->
<?php
get_footer();