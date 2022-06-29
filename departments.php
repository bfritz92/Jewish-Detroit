<?php
/**

/**
 * Template Name: Department Home Page
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
<section id="intro" class="intro dept-intro <?php the_field('css_slug'); ?> grid">
	<!-- Featured Image-->
	<div class="dept-intro--splash">
	</div>

	<div class="dept-intro--title">
		<!--ACF  HEADLINE -->
		<?php if ( get_field('headline')) :  ?>
			<h1 class="blue"><?php the_field('headline'); ?></h1>
		<?php else : ?>		
			<h1 class="blue"><?php the_title(); ?></h1>
		<?php endif; ?>
		<!--ACF  BYLINE -->
		<h2 class="charcoal"><?php the_field('byline'); ?></h2>
	</div>
	<aside class="dept-intro--cta">
		<!--ACF  CTA-title -->
		<h3 class="dept-intro--cta__title"><?php the_field('email_header'); ?></h3>

		<div class="dept-intro--cta__content fade">
			<!--ACF  CTA-copy -->
			<div class="dept-intro--cta__text fade">
				<p class=""><?php the_field('email_text'); ?></p>
				
			</div>
				<!-- This is the code you will get from Mailchimp’s NAKED Signup Form -->
			<div id="email-signup" class="dept-intro--cta--signup">
			<?php echo do_shortcode( '[gravityform id=766 title=false description=false ajax=true]' ); ?>
			</div>
			<!--End mc_embed_signup-->

	</aside>
	
	<div class="dept-intro--background"></div>
	<div class="dept-intro--copy fade">
		<!--ACF  intro--title -->
		<h2 class="mt2 fade"><?php the_field('intro_copy_headline'); ?></h2>
		<p><?php the_field('intro_copy_text'); ?></p>
		<!--ACF END intro-copy -->
	</div>
</section>
	<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();
			the_content();
		endwhile; // End of the loop.
	?>
	
	<?php /* -- Hide if block has been created -- BEGIN	
	<section id="front-page-intro" class="front-page-intro">
		<!-- ACF intro--image-1 IMG-->
		<figure class="front-page-intro--img-1">
		</figure>
		<figure class="front-page-intro--panel-1">
			<div class="front-page-intro--panel-1--text fade">
				<!-- ACF intro--panel-1--subhead -->
				<p class="mb0 bold subhead">We want you to know that we're</p>
				<!-- ACF intro--panel-1--heading -->
				<h1 class="m0 book heading baskerville">#Hereforgood</h1>
				<!-- ACF intro--panel-1--copy -->
				<p class="mt0 copy">As the hub of our community, Federation takes care of the Jewish people and helps build a stronger, more vibrant Jewish life every day, in Detroit, Israel and around the world.</p>
				<!-- ACF intro-panel-1--link -->
				<a class="bold gray-link baskerville" tabindex="0">Learn More About What We Do <i class="fas fa-angle-double-right"></i></a>
			</div>
		</figure>
		<!-- ACF intro--image-2 IMG-->
		<figure class="front-page-intro--panel-2">

			<div class="front-page-intro--panel-2--text fade">
				<!-- ACF intro--panel-2--subhead -->
				<p class="mb0 bold subhead">Let us help you</p>
				<!-- ACF intro-panel-2--heading -->
				<h1 class="m0 book heading baskerville">Find Your Place</h1>
				<!-- ACF intro-panel-2--copy -->
				<p class="mt0 copy">Whether you're a volunteer, a donor or a participant at one of our programs, you're making a difference in our community and chainging lives-- including your own</p>
				<!-- ACF intro-panel-2--link -->
				<a class="bold gray-link baskerville" tabindex="0">Find A Place at Federation <i class="fas fa-angle-double-right"></i></a>
			</div>
		</figure>
		<figure class="front-page-intro--img-2">
		</figure>
	</section>

	<section id="depts" class="depts fade">
		<h1 class="dark-gray book baskerville pb1">Get Involved</h1>
		<!-- ACF get-involved--copy -->
		<h5 class="dark-gray byline">Jewish Detroit has something meaningful, fun and fulfilling for you. Discover your good today</h5>
		<div class="carousel fade" data-flickity='{ "wrapAround": true }'>
		  <a href="#" class="carousel-cell depts--item depts--archives">
		  	<div class="depts--item--title">
		  		<h5 class="">Archives</h5>
		  	</div>
		  </a>
		  <a href="http://2019.jewishdetroit.org/get-involved/womens-philanthropy" class="carousel-cell depts--item depts--womens" tabindex="0">
		  	<div class="depts--item--title">
		  		<h5 class="">Women's Philanthropy</h5>
		  	</div>
		  </a>
		  <a href="http://2019.jewishdetroit.org/get-involved/nextgen" class="carousel-cell depts--item depts--nextgen" tabindex="0">
		  	<div class="depts--item--title">
		  		<h5 class="">NEXTGen Detroit</h5>
		  	</div>
		  </a>
		  <a href="#" class="carousel-cell depts--item depts--real-estate" tabindex="0">
		  	<div class="depts--item--title">
		  		<h5 class="">Real Estate</h5>
		  	</div>
		  </a>
		  <a href="#" class="carousel-cell depts--item depts--attorneys" tabindex="0">
		  	<div class="depts--item--title">
		  		<h5 class="">Attorneys</h5>
		  	</div>
		  </a>
		  <a href="#" class="carousel-cell depts--item depts--maimonides" tabindex="0">
		  	<div class="depts--item--title">
		  		<h5 class="">Maimonides Society</h5>
		  	</div>
		  </a>
		  <a href="#" class="carousel-cell depts--item depts--mega" tabindex="0">
		  	<div class="depts--item--title">
		  		<h5 class="">Mega Event</h5>
		  	</div>
		  </a>
		  <a href="#" class="carousel-cell depts--item depts--israel" tabindex="0">
		  	<div class="depts--item--title">
		  		<h5 class="">Israel & Overseas</h5>
		  	</div>
		  </a>
		  <a href="#" class="carousel-cell depts--item depts--interfaith" tabindex="0">
		  	<div class="depts--item--title">
		  		<h5 class="">Interfaith Couples</h5>
		  	</div>
		  </a>
		  <a href="#" class="carousel-cell depts--item depts--debut" tabindex="0">
		  	<div class="depts--item--title">
		  		<h5 class="">Debut</h5>
		  	</div>
		  </a>
		  <a href="#" class="carousel-cell depts--item depts--mens" tabindex="0">
		  	<div class="depts--item--title">
		  		<h5 class="">Pound for Pound Men's Group</h5>
		  	</div>
		  </a>
		</div>
</section> 

<section id="ways-to-give" class="ways-to-give grid">
		<div class="ways-to-give--copy fade">
			<!-- ACF ways-to-give--heading -->
			<h1 class="white book baskerville pb1">Ways to Give</h1>
			<!-- ACF ways-to-give--copy -->
			<h5 class="white bold">Tikkun olam. You can help heal the world.
				Any amount you give amounts to something significant.</h5>
		</div>
		<div class="ways-to-give--blocks fade">
			  <div class="accordion">
    <div class="accordion-item">
      <div class="accordion-header">
      	<!-- ACF ways-to-give--item-1 -->
        <h2>Donate Now</h2>
      </div>
      <div class="accordion-body">
      	<!-- ACF ways-to-give--item-1--copy -->
        <p>Keep our Jewish communities strong. Make your tax-deductible gift today.</p>
        <a href="#" class="button button-small button-blue">Learn More</a>
      </div>
    </div>
    <div class="accordion-item">
      <div class="accordion-header">
      	<!-- ACF ways-to-give--item-2 -->
        <h2>Make it Monthly</h2>
      </div>
      <div class="accordion-body">
      	<!-- ACF ways-to-give--item-2--copy -->
        <p>Your recurring donation helps sustain our community and build a vibrant Jewish future.</p>
        <a href="#" class="button button-small button-blue">Learn More</a>
      </div>
    </div>
    <div class="accordion-item">
      <div class="accordion-header">
      	<!-- ACF ways-to-give--item-3 -->
        <h2>Send a Tribute</h2>
      </div>
      <div class="accordion-body">
      	<!-- ACF ways-to-give--item-3--copy -->
        <p>Send a card in memory of a friend or loved one, or in honor of an important milestone.</p>
        <a href="#" class="button button-small button-blue">Learn More</a>
      </div>
    </div>
    <div class="accordion-item">
      <div class="accordion-header">
      	<!-- ACF ways-to-give--item-4 -->
        <h2>Legacy Giving</h2>
      </div>
      <div class="accordion-body">
      	<!-- ACF ways-to-give--item-4--copy -->
        <p>Ensure you, your work and your values will continue to be remembered.</p>
        <a href="#" class="button button-small button-blue">Learn More</a>
      </div>
    </div>
    <div class="accordion-item">
      <div class="accordion-header">
      	<!-- ACF ways-to-give--item-5 -->
        <h2>Philanthropic Donor Advised Funds</h2>
      </div>
      <div class="accordion-body">
      	<!-- ACF ways-to-give--item-5--copy -->
        <p>Establish a tax-free fund to provide critical financial support to the organizations most important to you.</p>
        <a href="#" class="button button-small button-blue">Learn More</a>
      </div>
    </div>
    <div class="accordion-item">
      <div class="accordion-header">
      	<!-- ACF ways-to-give--item-6 -->
        <h2>Centennial Fund</h2>
      </div>
      <div class="accordion-body">
      	<!-- ACF ways-to-give--item-6--copy -->
        <p>Become a torchbearer and lead the way for generations to come.</p>
        <a href="#" class="button button-small button-blue">Learn More</a>
      </div>
    </div>
  </div>
  
		</div>
</section>

<section id="events-list" class="events-list">
	<h1 class="baskerville blue events-list">Upcoming Events</h1>
	<div class="events-list--item">
		<a class="events-list--item--image" href="https://2019.jewishdetroit.org/summer-mixxer/"><img class="" src="https://2019.jewishdetroit.org/wp-content/uploads/2019/06/NXG-Mixxer-1200x628.jpg" />
		<ul class="events-list--item--info">
			<li class="department">NEXTGen Detroit Presents:</li>
			<li class="title"><h2>The Summer Mixxer @ Deluxx Fluxx</h2></li>
			<li class="time">7:00 PM</li>
			<li class="date">Thursday, June 17</li>
			<li class="location">1274 Library St, Detroit</li>
			<li class="description">#NoFilter Federation fundraiser at the most Instagrammed spot in #Detroit. Deluxx Fluxx is a bar, arcade and art installation all in one — and this year it’s the site of our summertime fundraiser. Come out for a good cause mixxed with cocktails, food, music and all the black ligh…</li>
			<li class="register"><a class="gray-link" href="https://2019.jewishdetroit.org/summer-mixxer/">Register <i class="fas fa-angle-double-right"></i></a></li>
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
			<li class="register"><a class="gray-link">Register <i class="fas fa-angle-double-right"></i></a></li>
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
			<li class="register"><a class="gray-link">Register <i class="fas fa-angle-double-right"></i></a></li>
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
			<li class="register"><a class="gray-link">Register <i class="fas fa-angle-double-right"></i></a></li>
		</ul>
	</div>

</section>


<a href="https://2019.jewishdetroit.org/events-front"><h3 class="events-page--load-more blue">See More Events <i class="fas fa-angle-double-right"></i></h3></a>
-- Hide if block has been created -- BEGIN
*/?>
	</div>

<?php
get_footer();