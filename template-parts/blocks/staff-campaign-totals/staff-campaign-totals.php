<?php
/**
 * Staff Campaign Point Totals Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'staff-campaign-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'staff-campaign';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
	/* Let's get our Additional Variables - Begin */
	global $current_user; get_currentuserinfo();
	global $wpdb;
	setlocale(LC_MONETARY, 'en_US');
	$user_ID = get_current_user_id();
	$staff_name = $current_user->display_name;
	$campaign_total	= $wpdb->get_var( "SELECT SUM(meta_value) FROM ".$wpdb->prefix."gf_entry_meta WHERE form_id = 156 AND meta_key = 7" );
	$submission_count = do_shortcode( '[gravityforms action="entry_count" id="156"]');	 
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
	/* Let's get our Additional Variables - End */
	/* Let's get our Advanced Custom Fields - Begin */
	$prizeclass 	= get_field('prizeclass'); 
	$showpoints		= get_field('showpoints');
	$showgifts		= get_field('showgifts');
	$showletters	= get_field('showletters');
	$showcalling	= get_field('showcalling');
	$showdataentry	= get_field('showdataentry');
	$letter_explain	= get_field('letterexplain');
	$calling_explain	= get_field('callingexplain');
	$dataentry_explain	= get_field('dataentryexplain');
	/* Let's get our Advanced Custom Fields - End */
?>
<!--Markup for Recent Posts -->
<section class="<?php echo $className ?>">
	<h2>Hi <?php echo $current_user->first_name; ?>!</h2>
	<p class="tiny">You have <strong><?php echo $total_points ?></strong> points.</p>
	<p class="center">So far this year, we've raised</p>
	<h3 class="center"><?php echo money_format('%(n',$campaign_total) . "\n"; ?></h3>
	<section class="<?php echo $prizeclass ?>">
		<?php if ($showpoints) : ?><h3 class="camp_subhead">Your Points</h3><?php endif; ?>
		<?php if ($showgifts) : ?>
			<section class="camp_title"><h4>Gifts Closed</h4></section><section class="camp_points"><h4><?php echo $closed_points; ?></h4></section>
		<?php endif; ?>
		<?php if ($showletters) : ?>
				<section class="camp_title"><h4>Letters Written</h4></section><section class="camp_points"><h4><?php echo $letter_points; ?></h4></section>
		<?php endif; ?>
		<?php if ($showcalling) : ?>
			<section class="camp_title"><h4>Telethon Calling</h4></section><section class="camp_points"><h4><?php echo $caller_points; ?></h4></section>
		<?php endif; ?>	
		<?php if ($showdataentry) : ?>
			<section class="camp_title"><h4>Data Entry</h4></section><section class="camp_points"><h4><?php echo $data_entry_points; ?></h4></section>
		<?php endif; ?>
		<h5><?php echo $letter_explain; ?></h5>
		<h5><?php echo $calling_explain; ?></h5>
		<h5><?php echo $dataentry_explain; ?></h5>
	</section>		
	<?php if ($in_swat) : ?>
		<section class="<?php echo $prizeclass ?>">
			<h3 class="camp_subhead">SWAT Numbers</h3>			
			<section class="camp_title"><h4>Your SWAT Pledges</h4></section><section class="camp_points"><h4><?php if ($campaign_swat_points) : echo $campaign_swat_points; else : echo '0'; endif; ?></h4></section>
			<section class="camp_title"><h4>SWAT Team Total Pledges Secured</h4></section><section class="camp_points"><h4><?php echo $swat_count; ?></h4></section>
			<section class="camp_title"><h4>SWAT Incentives Earned</h4></section><section class="camp_points"><h4>$<?php if ($campaign_swat_points) : echo $campaign_swat_points_money;  else : echo '0'; endif; ?></h4></section>
			<h5>Incentives will be provided in early January on a standard Visa gift card (income is taxable).</h5>					
		</section>
	<?php endif; ?>
</section>