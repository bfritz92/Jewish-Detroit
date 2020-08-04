<?php
/**
 * Staff Campaign Prizes Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'staff-prizes-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'staff-prizes';
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
	$money_points = $closed_points + $caller_points;
	if (($letter_points + $data_entry_points) >= 50) :
		$pto_points = (50 + $closed_points + $caller_points);
	else :
		$pto_points = $total_points;
	endif;							
	/* Let's get our Additional Variables - End */
	/* Let's get our Advanced Custom Fields - Begin */
	$prizeclass 		= get_field('prizeclass'); 
	$showprizes			= get_field('showprizes');
	$prizetitleone		= get_field('prizetitleone');
	$prizetitletwo		= get_field('prizetitletwo');
	$prizetitlethree	= get_field('prizetitlethree');
	$goalprizeone		= get_field('goalprizeone');
	$goalprizetwo		= get_field('goalprizetwo');
	$goalprizethree		= get_field('goalprizethree');
	$prizes_explain		= get_field('prizes_explain');
	/* Let's get our Advanced Custom Fields - End */
?>
<!--Markup for Recent Posts -->
<section class="<?php echo $className ?>">
	<section class="<?php echo $prizeclass ?>">
		<?php if ($showprizes) : ?><h3 class="camp_subhead">Your Prizes</h3><?php endif; ?>
		<?php if ($prizetitleone) : ?>
			<section class="camp_title"><h4><?php echo $prizetitleone; ?></h4></section><section class="camp_points"><h4><?php echo $total_points ?>/<?php echo $goalprizeone ?></h4></section>
		<?php endif; ?>
		<?php if ($prizetitletwo) : ?>
				<section class="camp_title"><h4><?php echo $prizetitletwo; ?></h4></section><section class="camp_points"><h4><?php echo $money_points ?>/<?php echo $goalprizetwo ?></h4></section>
		<?php endif; ?>
		<?php if ($prizetitlethree) : ?>
			<section class="camp_title"><h4><?php echo $prizetitlethree; ?></h4></section><section class="camp_points"><h4><?php echo $pto_points ?>/<?php echo $goalprizethree ?></h4></section>
		<?php endif; ?>	
		<h5><?php echo $prizes_explain; ?></h5>
	</section>		
</section>