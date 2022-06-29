<?php
/*
Template Name: Campaign Closed Gift Form
*/
get_header(); ?>
<link rel="stylesheet" href="/wp-content/themes/FoundationPress/assets/stylesheets/campaign.css">
<style>
li.gchoice_156_35_2 { display: none; }
</style>
<?php global $current_user; get_currentuserinfo(); ?>
<?php 
	global $wpdb;
	setlocale(LC_MONETARY, 'en_US');
	/* Get Current User Information */
	$user_ID = get_current_user_id();
	$staff_name = $current_user->display_name;	
	/* Campaign Numbers */
	$submission_count = do_shortcode( '[gravityforms action="entry_count" id="156"]');	
	$donototal = 1000 + $submission_count; 
	$swat_count = $wpdb->get_var( "SELECT COUNT(*) FROM ".$wpdb->prefix."gf_entry_meta WHERE form_id = 156 AND meta_key LIKE 27.1 AND meta_value LIKE 'Yes'" );
	/* Individual Numbers */
	$closed_count = $wpdb->get_var( "SELECT COUNT(*) FROM ".$wpdb->prefix."gf_entry_meta WHERE form_id = 156 AND meta_key =26 AND meta_value LIKE '$staff_name'" );	
	$letter_count = get_user_meta($user_ID, 'campaign2019_letters_points', true);
	$caller_count = $wpdb->get_var( "SELECT COUNT(*) FROM ".$wpdb->prefix."gf_entry_meta WHERE form_id = 707 AND meta_key =41 AND meta_value LIKE '%$staff_name%'" );
	$data_entry_count = $wpdb->get_var( "SELECT COUNT(*) FROM ".$wpdb->prefix."gf_entry_meta WHERE form_id = 706 AND meta_key =41 AND meta_value LIKE '%$staff_name%'" );
	$caller_points = $caller_count * 3;	
	$data_entry_points = $data_entry_count * 5;
	$in_swat = get_user_meta($user_ID, 'in_swat', true);
	$super_sunday_points = get_user_meta($user_ID, 'super_sunday_points', true);
	$campaign_swat_points = get_user_meta($user_ID, 'campaign_swat_points', true);
	$campaign_swat_points_money = get_user_meta($user_ID, 'campaign_swat_money', true);
	// $campaign_swat_points_money = $campaign_swat_points * 5;
	$closed_points = (($closed_count + $super_sunday_points) * 1) - $campaign_swat_points;
	$letter_points = $letter_count * .04;
	$total_points = $closed_points + $letter_points + $caller_points + $data_entry_points;

	/* Individual Numbers + Top Closer Number for Public View */
	$individual_tally = $wpdb->get_results( "SELECT value, COUNT(*) c FROM ".$wpdb->prefix."gf_entry_meta WHERE form_id = 156 AND meta_key = 16 AND value NOT REGEXP 'Lay'  GROUP BY value ORDER BY COUNT(*) DESC LIMIT 0, 7 " );						
	$top_closer = $wpdb->get_results( "SELECT value, COUNT(*) c FROM ".$wpdb->prefix."gf_entry_meta WHERE form_id = 156 AND meta_key = 16 GROUP BY value ORDER BY COUNT(*) DESC LIMIT 0, 1 " );	
?>
<?php /*
	$last_closer = $wpdb->get_results( "SELECT meta_value FROM ".$wpdb->prefix."gf_entry_meta WHERE form_id = 156 AND meta_key = 26 AND meta_value NOT REGEXP 'Lay Leader' ORDER BY entry_id DESC LIMIT 0, 1 " );
	$last_closer_time = $wpdb->get_results( "SELECT meta_value FROM ".$wpdb->prefix."gf_entry_meta WHERE form_id = 156 AND meta_key = 32 AND meta_value NOT REGEXP 'Lay Leader' ORDER BY entry_id DESC LIMIT 0, 1 " );
	foreach ($last_closer as $closer) {
		$closer_final = $closer->meta_value;
		$str= preg_replace('/\W\w+\s*(\W*)$/', '$1', $closer_final);
	}
	foreach ($last_closer_time as $closer_time) {
		$closer_time = $closer_time->meta_value;       
    }
 	echo '<div class="popup">'.$str . ' closed a gift ' . time_elapsed_string($closer_time) .'.</div>'; */
?>
<style>
	.popup { display: none; color:#FFF; background-color:rgba(0,0,0,.50); width:400px; position: fixed; bottom:0; left:0; padding:10px;}
</style>
<script type="text/javascript">
	$('.popup').delay(2000).show(0);
	$('.popup').delay(9000).hide(0);
</script>
<?php get_template_part( 'template-parts/featured-image' ); ?>
<!-- Secondary Nav -->
<header id="title-bar"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <div class="row expanded">
      <div class="small-3 columns">
         <div class="jfmd-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/FoundationPress/assets/images/jfmd-logo.svg" alt="The Jewish Federation of Metropolitan Detroit" class="desktop-logo" /></a>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/FoundationPress/assets/images/jfmd-logo-mobile.svg" alt="The Jewish Federation of Metropolitan Detroit" class="mobile-logo" /></a>
      </div> <!-- .small-3 .columns -->
      </div> <!-- .row .expanded -->

      <?php do_action( 'foundationpress_before_content' ); ?>
      <?php while ( have_posts() ) : the_post(); ?>

      <div class="small-6 columns">
          <h1 class="center"><?php the_title(); ?></h1>
      </div> <!-- .small-6 .columns -->

      <div class="small-3 columns">
          <div class="input-group" id="searchbar">
            <?php get_search_form(); ?>

            <!-- No users yet <a href="#" target="_blank"><i class="fa fa-2x fa-user right" aria-hidden="true"></i></a> -->
          </div> <!-- .input-group #searchbar-->
      
      </div> <!-- .small-3 .columns -->
    
  </div> <!-- .row .expanded -->
</header>
</header>

<div id="page-full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>

  <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
      <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
      <div class="entry-content">
          <?php if ( is_user_logged_in() ) :  ?>
			<h1 class="center normal">Welcome Back <?php echo $current_user->first_name; ?>. You have <strong><?php echo $total_points ?></strong> points.</h1>
		  	<h2 class="center normal"><strong>Gifts Closed:</strong> <?php echo $closed_points; ?> Points</h2>
		  	<h2 class="center normal"><strong>Letters Written:</strong> <?php echo $letter_points; ?> Points *</h2>
		  	<h2 class="center normal"><strong>Telethon Calling:</strong> <?php echo $caller_points; ?> Points</h2>	
		 	<h2 class="center normal"><strong>Telethon Data Entry:</strong> <?php echo $data_entry_points; ?> Points</h2>
		  	<?php if ($in_swat) : ?>
		  		<?php $swat_2019 = $wpdb->get_var( "SELECT SUM(meta_value) FROM ".$wpdb->prefix."gf_entry_meta WHERE form_id = 156 AND meta_key = 7 AND meta_key LIKE 27.1 AND meta_value LIKE 'Yes'" ); ?>
		  		<?php $total_2019 = $wpdb->get_var( "SELECT SUM(meta_value) FROM ".$wpdb->prefix."gf_entry_meta WHERE form_id = 156 AND meta_key = 7" ); ?>
		  		<h3 class="center" style="color:#005581;"><u>Total Amount Raised for SWAT 2019: <?php echo $swat_2019 ?></u></h3>
		  		<div class="row expanded total-amounts" data-equalizer>
		  			<div class="large-6 medium-12 small-12 columns" data-equalizer-watch>
		  				<h3 class="center normal"><i class="fas fa-sort-amount-up"></i><br /><?php echo $swat_count ?><br />SWAT Team Pledges</h3>
					</div>
					<div class="large-6 medium-12 small-12 columns" data-equalizer-watch>
		  				<h3 class="center normal"><i class="far fa-money-bill-alt"></i><br /><?php echo money_format('%(n',$total_2019) . "\n"; ?><br />Total Amount Raised for Campaign 2019</h3>	
					</div>
		  		</div>			
		  	<?php else : ?>
		  		<?php $total_2019 = $wpdb->get_var( "SELECT SUM(meta_value) FROM ".$wpdb->prefix."gf_entry_meta WHERE form_id = 156 AND meta_key = 7" ); ?>
		  		<div class="row expanded total-amounts">
					<div class="large-12 columns">
		  				<h3 class="center normal"><i class="far fa-money-bill-alt"></i><br /><?php echo money_format('%(n',$total_2019) . "\n"; ?><br />Total Amount Raised for Campaign 2019</h3>		  	
					</div>
		  		</div>
			<?php endif; ?>
		  	<hr />
		  	<a name="totals"></a>
		  	<div class="row expanded"> 		
				<div class="large-12 medium-12 small-12 columns">
					<h3 style="color:#005581;" class="center"><u>Your Prizes:</u></h3>
					<div class="row expanded">
						<div class="large-12 columns center">
							<h4 class="normal"><em>* Letter writers and data-entry points can be used for t-shirts and (1) PTO day.</em></h4>
							<h4 class="normal"><em>Callers are eligible for $10 rewards as well as up to (3) PTO days.</em></h4>
						</div>
						<div class="large-4 medium-4 small-12 columns center">
							<h3>5 Points</h3>
								<i class="fa fa-shirtsinbulk icon-full"></i><br /><br />
							<strong>Points towards T-shirt:</strong> <?php echo $total_points ?>
						</div>						
						<div class="large-4 medium-4 small-12 columns center">
							<h3>10 Points</h3>
								<i class="fas fa-dollar-sign icon-full"></i><br /><br />
		  					<strong>Points towards $10:</strong> <?php echo ($closed_points + $caller_points); ?><br><em>$10 for every ten points earned from <strong>pledged donations</strong> and <strong>telethon calling</strong>.</em>
						</div>
	  					<div class="large-4 medium-4 small-12 columns center">
							<h3>50 Points</h3>
								<i class="far fa-clock icon-full"></i><br /><br />
							<strong>Points towards 1 PTO Day:</strong> <?php echo ($total_points); ?><br />
							<?php if (($total_points) >= 50) : ?>
								<?php if (($letter_points + $data_entry_points) >= 50) : ?>
									<strong>Points towards 3 PTO Days:</strong> <?php echo (50 + $closed_points + $caller_points); ?><br />
								<?php else : ?>
									<strong>Points towards 3 PTO Days:</strong> <?php echo ($total_points); ?><br />
								<?php endif; ?>							
							<?php endif; ?>
						</div>	  					
					</div>
				</div>					
		  	</div>
		  	<?php if ($in_swat) : ?>
	<hr />
		  	<div class="row expanded">
		  		<div class="large-6 medium-6 small-12 columns center">
		  			<h3 style="color:#005581;"><u>SWAT Numbers:</u></h3>				
		  			<h2>Your SWAT Pledges: <strong><?php if ($campaign_swat_points) : echo $campaign_swat_points; else : echo '0'; endif; ?></strong></h2>
					<h2 class="goal-full">SWAT Team Total Pledges Secured: <strong><?php echo $swat_count; ?></strong></h2>
				</div>		  		
				<div class="large-6 medium-6 small-12 columns center">
					<h3 style="color:#005581;"><u>SWAT Incentives Earned:</u></h3>
					<h2 style="color:darkgreen;">$<?php if ($campaign_swat_points) : echo $campaign_swat_points_money;  else : echo '0'; endif; ?></h2>
					<strong>Incentives will be provided in early January on a standard Visa gift card (income is taxable).</strong>					
				</div>					
		  	</div>
	<hr />
			<?php endif; ?>
		  
				<div class="row expanded">
					<div class="large-6 small-12 columns">
						<?php echo do_shortcode('[gravityform id="156" title="false" description="false" ajax="true" tabindex="86"]'); ?>
					</div> <!-- large-6 small-12 columns -->
					<div class="large-6 small-12 columns">
						<?php echo do_shortcode('[gravityform id="162" title="false" description="false" ajax="true"]'); ?>
					</div> <!-- large-6 small-12 columns -->				
					<!-- Not Needed for Super Sunday. Uncomment when using this for the Letters Written Campaign - End -->
		  		</div> <!-- .row .expanded -->		
		  <hr />
		  		<?php if ( in_array( 'administrator', (array) $current_user->roles ) ) : ?>
		  		<div class="row expanded">
					<div class="large-6 small-12 columns">
						<h2>For telethon organizers only:</h2>
					</div>
		  		</div>	
				<div class="row expanded">					
					<div class="large-6 small-12 columns">
						<?php echo do_shortcode('[gravityform id="706" title="false" description="false" ajax="true"]'); ?>
					</div> <!-- large-6 small-12 columns -->
					<div class="large-6 small-12 columns">
						<?php echo do_shortcode('[gravityform id="707" title="false" description="false" ajax="true"]'); ?>
					</div> <!-- large-6 small-12 columns -->				
					<!-- Not Needed for Super Sunday. Uncomment when using this for the Letters Written Campaign - End -->
		  		</div> <!-- .row .expanded -->
		 	 	<?php endif; ?>
				<a href="/change-password/">Change Your Password</a> | <?php echo do_shortcode('[logout]') ?>
		  <?php else : ?>
          	<?php the_content(); ?>
          <?php endif; ?>	
      </div>
     
          <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
          <p><?php the_tags(); ?></p>
      
      <?php do_action( 'foundationpress_page_before_comments' ); ?>
      <?php comments_template(); ?>
      <?php do_action( 'foundationpress_page_after_comments' ); ?>
  </article>
<?php endwhile;?>
</div>

<?php do_action( 'foundationpress_after_content' ); ?>


<?php get_footer(); ?>