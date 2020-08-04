<?php
/*
Template Name: Missions Template
*/
get_header(); ?>
<?php the_field('css_hidden'); ?>
<?php while ( have_posts() ) : the_post(); ?>
<style>
	.gf_login_form h3 {
		display:none;
	}
</style>
</header>
<?php do_action( 'foundationpress_before_content' ); ?>
<div id="mission" role="main" class="mission">
<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
	<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
	<?php if (is_user_logged_in()) : ?>
	<div class="">
		<div class="">
			<div class="mission--heading">
				<div class="mission--heading--img">
					<?php the_post_thumbnail(); ?>
				</div>	
				<div class="mission--heading--name">
					<h1><?php the_field("mission_name"); ?></h1>				
				</div>		
				<div class="mission--heading--info">
					<div class="mission--heading--date">
						<h2 class=""><?php the_field("mission_dates"); ?></h2>
						<?php if (get_field("optional_extension_dates")) : ?>
							<h2 class=""><?php the_field("optional_extension_name") ?>: <?php the_field("optional_extension_dates"); ?></h2>
						<?php endif; ?>
					</div>
					<div class="mission--heading--cost">
							<?php if (get_field("mission_cost_prefix")) : ?>
								<?php the_field("mission_cost_prefix"); ?> 
							<?php endif; ?>
							<h3>Mission Cost:  
							<?php if (get_field("mission_name") == 'University Presidents Mission') : ?><br />
							No cost for participants, $1100 for spouses</h3>
							<?php elseif (get_field("mission_name") == 'Max M. Fisher Leadership Mission to Berlin and Israel') : ?>
							<br />
							<h4>Single participant: Land costs, including travel from Berlin to Tel Aviv, $0 plus airfare.
								<br />
							Couples: Land costs, including travel from Berlin to Tel Aviv, $9,500 plus airfare.</h4>
							<?php else : ?>
							<span class="">$<?php the_field("total_mission_amount_due"); ?></span>
							<?php endif; ?>
							<?php if (get_field("mission_name") == 'Forman II Leadership Mission') : ?>
							<br />
							<h3>$2500 for non-physician spouse.</h3>
							<br />
							<h3>Deposit due now: $500 per person</h3>
							<?php endif; ?>
							<!--Inna's Interfaith Mission-->
							<?php if (get_field("mission_name") == 'Nora and Guy Barron Interfaith Mission to Israel II') : ?><br />
							<h3>+ airfare</h3>
							<br/>
							<h3>Deposit due now: $400 per person</h3>
							<?php endif; ?>
							<!--Inna's Interfaith Mission-->
						<?php if (get_field("single_supplement_amount_due")) : ?>
							<h3 class="">Single Supplement: $<?php the_field("single_supplement_amount_due"); ?></h3>
						<?php endif; ?>
						<?php if (get_field("pre_trip_amount_due")) : ?>
							<?php if (get_field("optional_extension_name")) : ?>
								<h3 class=""><?php the_field("optional_extension_name") ?> Cost: $<?php the_field("pre_trip_amount_due"); ?></h3>
							<?php else : ?>
							<h3 class="">Optional Extension: $<?php the_field("pre_trip_amount_due"); ?></h3>
							<?php endif; ?>							
						<?php endif; ?>
						<?php if (get_field("mission_name") == 'Grosfeld 15 Leadership Mission') : ?>
							<h3 class="">50% Deposit Due By December 2, 2019<br />Final Payment Due By January 6, 2020</h3>
						<?php endif; ?>
				</div>
					
					
				</div>
				<div class="mission--heading--contact">
						<?php if (get_field("mission_contact_name")) : ?>				
							<h2 class="mission--heading--questions">Questions?</h2>
							<?php if (get_field("mission_name") == 'Max M. Fisher Leadership Mission to Berlin and Israel') : ?>	
								<p>Registration Form:<br>Jennifer Levine: (248) 203-1471 &bull; <a href="mailto:jlevine@jfmd.org">jlevine@jfmd.org</a></p>
								<p>Mission Related Questions:<br>Stacey Deweese: (248) 205-2547 &bull; <a href="mailto:deweese@jfmd.org">deweese@jfmd.org</a><br>Dan Greenberg: (248) 642-5638 &bull; <a href="mailto:dgreenberg@jfmd.org">dgreenberg@jfmd.org</a></p>
							<?php else : ?>
								<p><?php the_field("mission_contact_name"); ?><br /><?php the_field("mission_contact_phone"); ?><br /><a href="mailto:<?php the_field("mission_contact_email"); ?>"><?php the_field("mission_contact_email"); ?></a></p>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				<!--<div class="head contact">
					<?php if (get_field("mission_contact_name")) : ?>				
						<h2><i class="fa fa-info-circle"></i> Questions?</h2>
						<p><?php the_field("mission_contact_name"); ?><br /><?php the_field("mission_contact_phone"); ?><br /><a href="mailto:<?php the_field("mission_contact_email"); ?>"><?php the_field("mission_contact_email"); ?></a></p>
					<?php endif; ?>
				</div>-->
			</div>
		</div>
	</div> 
	<?php endif; ?>
	<section class="mission--container">
    	<?php if (!is_user_logged_in()) : ?>
			<!-- NEW START PAGE INFORMATION (BEGIN) -->
			<div class="" style="margin-top:3rem;">
				<div class="">
					<?php the_post_thumbnail(); ?>
				</div>
				<div class="">
					<h1><?php the_field("mission_name"); ?></h1>
					<h2><?php the_field("mission_dates"); ?></h2>		
					<h3 class="">Mission Cost:</h3>
						<?php if (get_field("mission_name") == 'University Presidents Mission') : ?><br />
							<h3>No cost for participants, $1100 for spouses</h3>
							
							<?php else : ?>
						<h3>$<?php the_field("total_mission_amount_due"); ?> per person</h3>
					<?php endif; ?>
					<?php if (get_field("mission_name") == 'Forman II Leadership Mission') : ?><br />
							<h3 class="">$2500 for non-physician spouse.</h3><br />
							<h3>Deposit due now: $500 per person</h3>
							<?php endif; ?>
<!-- Inna's Interfaith Mission -->
					<?php if (get_field("mission_name") == 'Nora and Guy Barron Interfaith Mission to Israel II') : ?><br />
							<h3 class="">Deposit due now: $400 per person</h3>
								
							<?php endif; ?>
					
       <!-- Inna's Interfaith Mission -->
					<?php if (get_field("single_supplement_amount_due")) : ?>
						<h4 class="">Single Supplement: $<?php the_field("single_supplement_amount_due"); ?></h4>
					<?php endif; ?>
					<?php if (get_field("pre_trip_amount_due")) : ?>
						<h4 class="">Optional Extension: $<?php the_field("pre_trip_amount_due"); ?></h4>					
					<?php endif; ?>
					<?php if (get_field("optional_extension_dates")) : ?>
							<h4 class=""><?php the_field("optional_extension_name") ?>: <?php the_field("optional_extension_dates"); ?></h4>
					<?php endif; ?>
					<?php if (get_field("mission_name") == 'Grosfeld 15 Leadership Mission') : ?>
						<h4 class="">50% Deposit Due By December 2, 2019<br />Final Payment Due By January 6, 2020</h4>
					<?php endif; ?>
				</div>
			</div> <!-- .row -->
			<!-- NEW START PAGE INFORMATION (BEGIN) -->
			<div id="register" class="mission--container--register" >
				<div class="">
					<h2 class="">Register Here</h2>
					<?php echo do_shortcode('[gravityform id="19" title="false" description="false" ajax="false"]'); ?>
				</div>
				<div class="">
					<h2 class="">Login</h2>
					<a id="login" name="login"></a>		
					<?php echo do_shortcode('[gravityform action="login" description="false" logged_in_message="You are logged in!" registration_link_display="false" forgot_password_text="Forgot password? Click here." /]
'); ?>						
				</div>
			</div> 
     	<?php else : ?>
			
        	<?php echo do_shortcode('[gravityform id="18" title="false" description="false" ajax="true"]'); ?>		
			<div class="mission--container--forgot-password">  	
				<a href="/change-password/">Change Your Password</a>
			</div>				
        <?php endif; ?>
 	</section>
</article>
</div>
</div>
<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>
<?php get_footer(); ?>