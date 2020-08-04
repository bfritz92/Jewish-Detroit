<?php
/*
Template Name: Grants Template
*/
get_header(); ?>
<?php the_field('grant_css'); ?>
<?php while ( have_posts() ) : the_post(); ?>
<style>
	.gf_login_form h3 {
		display:none;
	}
</style>
</header>
<?php do_action( 'foundationpress_before_content' ); ?>
<div id="mission-full-width" role="main">
<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
	<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
	<?php if (is_user_logged_in()) : ?>
	<div class="row expanded">
		<div class="large-12 medium-12 small-12">
			<p>&nbsp;</p>
			<h1><?php the_title(); ?></h1>	
			<p>&nbsp;</p>
		</div>
	</div> 
	<?php endif; ?>
	<section class="mission-container">
    	<?php if (!is_user_logged_in()) : ?>
			<!-- NEW START PAGE INFORMATION (BEGIN) -->
			<div class="row" style="margin-top:3rem;">
				<div class="medium-12 small-12 columns">
					<h1><?php the_title(); ?></h1>
				</div> <!-- .medium-6 .small-12 -->				
			</div> <!-- .row -->
			<!-- NEW START PAGE INFORMATION (BEGIN) -->
			<div id="register" class="row" style="margin-top:3rem;">
				<div class="medium-6 small-12 columns">
					<h1 class="entry-title">Register Here</h1>
					<?php echo do_shortcode('[gravityform id="712" title="false" description="false" ajax="false"]'); ?>
				</div> <!-- .medium-6 .small-12 -->
				<div class="medium-6 small-12 columns right_login_form">
					<h1 class="entry-title">Login</h1>
					<a id="login" name="login"></a>		
					<?php echo do_shortcode('[gravityform action="login" description="false" logged_in_message="You are logged in!" registration_link_display="false" forgot_password_text="Forgot password? Click here." /]
'); ?>						
				</div><!-- .medium-6 .small-12 -->
			</div> <!-- .row -->
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
			<div class="forgot-password">  	
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