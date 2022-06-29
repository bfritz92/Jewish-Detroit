<?php
/*
Template Name: Grants Template
*/
get_header(); ?>
<?php the_field('grant_css'); ?>
<?php while ( have_posts() ) : the_post(); ?>
<style>
	.gf_login_form h3, .gform_wrapper form .gf_page_steps .gf_step .gf_step_number {
		display:none;
		
	}
</style>
</header>
<div id="mission" role="main" class="mission">
<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
	<?php if (is_user_logged_in()) : ?>
	<div class="">
		<div class="">
			<div class="mission--heading">
				<div class="mission--heading--name">
					<h1><?php the_title(); ?></h1>				
				</div>										
			</div>
		</div>
	</div> 
	<?php endif; ?>
	<section class="mission--container">
    	<?php if (!is_user_logged_in()) : ?>
			<div class="">
		<div class="">
			<div class="mission--heading">
				<div class="mission--heading--name">
					<h1><?php the_title(); ?></h1>				
				</div>										
			</div>
		</div>
	</div> 
			<!-- NEW START PAGE INFORMATION (BEGIN) -->
			<div id="register" class="mission--container--register" >
				<div class="" style="float:left; width:50%;">
					<h2 class="">Login</h2>
					<a id="login" name="login"></a>		
					<?php echo do_shortcode('[gravityform action="login" description="false" logged_in_message="You are logged in!" registration_link_display="false" forgot_password_text="Forgot password? Click here." /]
'); ?>						
				</div>
				<div class="" style="float:right; width:50%;">
					<h2 class="">Register Here</h2>
					<?php echo do_shortcode('[gravityform id="712" title="false" description="false" ajax="false"]'); ?>
				</div>
				
			</div> 
     	<?php else : ?>
			<?php 
				$user_id = get_current_user_id();
				$grant_name_string = get_post_meta(get_the_ID(), 'grant_slug', true);
				$submit_and_done = get_user_meta($user_id, $grant_name_string.'_submit_and_done', true);
				if ($submit_and_done == 'Submit') : 
			?>
				<style>				
					.gform_page_fields {
  						pointer-events: none;
  						opacity: .5;
					}
				</style>
		<?php endif; ?>
        	<?php echo do_shortcode('[gravityform id="746" title="false" description="false" ajax="true"]'); ?>		
			<div class="mission--container--forgot-password">  	
				<a href="/change-password/">Change Your Password</a>
			</div>				
        <?php endif; ?>
 	</section>
</article>
</div>
</div>
<?php endwhile;?>
<?php get_footer(); ?>