<?php
/**
 * Template Name: Signature 2019
 * Landing page for programs with slideshow, links, razzle-dazz.
 *
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
get_header('signature-2019'); ?>

<section id="splash" class="splash">
	<div class="top-bar">
	<div style="width:60%;">
		<a class="nav-logo" href="https://www.jewishdetroit.org"><img class="nav-logo" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/03/12152504/jfmd-sm.png"></a>
	</div>
  <div>
    <ul class="menu">
    	<!--<li><a href="#leadership" class="gold-link">Leadership</a></li>-->
    	<li class=" hide-for-mobile-only" style="font-family:'oswald';"><a href="#sponsors" class="charcoal">Sponsors</a></li>
      <li><a href="#registration" role="button" class="button bold">Register Now</a></li>
    </ul>
  </div>
</div>
	<div class="splash-flex">
		<img class="splash-logo" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/03/08152026/Signature-logo1.svg">
		<div class="splash-info">
			<h2 class="charcoal">May 13th, 2019</h2>
			<h3 class="charcoal">Adat Shalom Synagogue</h3>
			<br>
			<h3 class="charcoal">7:00 pm Pre-Glow with Vanessa Bayer<br /><span style="font-size:1.50rem;">Sponsored by EHIM</span></h3>
			<h3 class="charcoal">7:30 pm General Registration</h3>
			<br>
			<h3 class="charcoal">You must be 21 or over to attend. Dietary Laws Observed</h3>
		</div>
	</div>
</section>


<section id="mission" class="mission">
	<div class="row">
		<div class="columns small-12 medium-10 small-centered double-border red-bg pt-1 pb-1">
			<h1 class="white mission-text">Signature is Women’s Philanthropy’s premiere annual Fundraising Event. This women’s only exclusive event is a celebration of community and philanthropy.</h1>
		</div>
	</div>
</section>


<section id="talent" class="talent">
	<div class="row">
		<div class="columns small-8">
			<h1 class="red pb-1">Welcoming Vanessa Bayer</h1>
			<p class="charcoal">Vanessa Bayer is an Emmy-nominated actress and comedian, known for her seven seasons on Saturday Night Live, as well as her roles in films such as Trainwreck, Office Christmas Party, and most recently, Netflix’s Ibiza. Vanessa will bring her stand-up comedy to this event and tell her Jewish story.</p>
		</div>
	</div>
</section>


<section id="impact" class="impact pt-3 pb-3">
	<div class="row">
		<div class="columns small-10 medium-6 small-centered medium-uncentered">
			<img class="pb-2" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/03/08152022/signature-impact.svg">
		</div>
		<div class="columns small-11 medium-6 small-centered medium-uncentered">
			<div class="double-border pl-1 pr-1 pt-1 pb-1 purple-bg">
				<p class="white">In addition to the cost of a ticket, a minimum donation of $180 to the Jewish Federation’s 2019 Annual Campaign is required of each guest. Your gift will support Federation and its 17 local and three international agencies as we work to take care of the needs of the Jewish people and build a vibrant Jewish future in Detroit, in Israel and around the world.</p>
			</div>
		</div>
	</div>

	<div class="row pt-2">
		<div class="columns small-10 small-centered medium-4 medium-uncentered mb-2">
			<img class="impact-img double-border" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/03/11162742/signature-1.jpg">
		</div>
		<div class="columns small-10 small-centered medium-4 medium-uncentered mb-2">
			<img class="impact-img double-border" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/03/11162738/signature-2.jpg">
		</div>
		<div class="columns small-10 small-centered medium-4 medium-uncentered mb-2">
			<img class="impact-img double-border" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/03/11162735/signature-3.jpg">
		</div>
	</div>
</section>


<section id="registration" class="registration">
	<div class="row">
		<div class="columns small-12 medium-10 large-8 small-centered text-center pt-2 pb-2">
			<h1 class="white pb-3">Registration</h1>
				<?php
					global $wp;
					$current_url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
					if (strpos($_SERVER['REQUEST_URI'], 'epic') !== false):
				
					else : ?>
					<style>
							.gchoice_586_165_3 {
								display:none;
							}
						</style>
					<?php endif;
					echo do_shortcode('[gravityform id="770" title="false" description="false" ajax="true"]');
				?> 		
		 </div>
	</div>
	
</section>


<section id="leadership" class="leadership">
<div class="row">
		<div class="columns small-12 medium-8 small-centered text-center pt-2 pb-2">
			<h1 class="white">Leadership</h1>
			<br>
			<ul class="leadership-list">
				<li>Carole BenEzra</li>
				<li>Pam Bloom</li>
				<li>Joan Chernoff Epstein</li>
				<li>Jennifer Freedland</li>
				<li>Robbie Sherman</li>
				<li>2019 Signature Event Co-Chairs</li>
			</ul>
			<br>
			<ul class="leadership-list">
				<li>Sue Kaufman</li>
				<li>Women’s Philanthropy President</li>
			</ul>
			<br>
			<ul class="leadership-list">
				<li>Betsy Heuer</li>
				<li>Women’s Philanthropy Campaign Chair</li>
			</ul>
		</div>
	</div>
</section>


<section id="sponsors" class="sponsors">
	<div class="row">
		<div class="columns small-12 medium-9 medium-centered small-centered text-center pt-2 pb-2">
			<h1 class="white">Sponsors</h1>
			<br>
			<h2 class="white">Diamond Sponsor</h2>
				<div class="sponsor-flex">
					<a href="https://www.ehimrx.com/"><img class="" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/03/12114543/EHIM-white.svg"></a>
				</div>
			<br>
			<h2 class="white">Platinum Sponsor</h2>
				<div class="sponsor-flex">
					<a href="http://www.ajmpack.com"><img class="" style="max-height:250px;" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/03/18160024/AJMLogo2016.png"></a>
					<a href="http://www.startrax.com"><img class="" style="max-height:250px;" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/04/03152316/Star-Trax-Logo.svg"></a>
				</div>
			<br>
			<h2 class="white pt-2">Silver Sponsors</h2>
			<div class="sponsor-grid pb-2">
					<a href="https://www.michderm.com/"><img class="" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/03/21090759/AD-Unique.png"></a>
					<a href="https://www.bradleyco.com/"><img class="" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/04/03152302/Bradley-Company-white.svg"></a>
					<a href="https://www.burnsandwilcox.com/"><img style="max-height:90px;" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/01/24145318/BurnsWilcox.svg"></a>
					<a href="https://www.orangetheoryfitness.com/"><img style="" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/03/27095803/Orange-Theory-Fitness-Logo.svg"></a>
					<a href="https://www.pncbank.com/"><img style="" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/04/03152306/PNC-Bank.svg"></a>
					<h1 class="white bold">Jane Sherman</h1>
					<a href="https://wallsidewindows.com/"><img style="max-height:100px;" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/03/12115031/Wallside-Windows-75th_2019-ONLY.svg"></a>
					
				</div>
			<br>
			<h2 class="white">Bronze Sponsors</h2>
			<div class="sponsor-grid-2">
					<a href="http://couzens.com/"><img class="" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/03/12114541/Couzens-Lansky-white.svg"></a>
					<a href="http://www.jaffelaw.com/"><img style="max-height:110px;" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/03/14161349/Jaffe-logo.svg"></a>
					<a href="http://www.qualitykosher.com/"><img src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/04/03152311/Quality-Kosher-Catering-logo.svg"></a>
					<img style="" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/03/27095757/Logo-Elana-Berlin.svg">
					<a href="http://www.lissfirm.com/"><img class="" src="https://s3-us-west-2.amazonaws.com/jfmdorg/~jfmd2016/wp-content/uploads/2019/03/29155850/liss-seder-andrews.svg"></a>
					<h3 class="white">Andi & Larry Wolfe</h3>
					<h4 class="white long-sponsor">Women’s Philanthropy Past Presidents & Campaign Chairs</h4>
				</div>
		</div>
	</div>




<?php get_footer('signature-2019'); ?>