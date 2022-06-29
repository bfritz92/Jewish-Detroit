<?php
/**
 * Mission Info Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'mission-info-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'mission-info';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
	/* Let's get our Additional Variables - Begin */
	global $current_user; get_currentuserinfo();	
	$user_ID = get_current_user_id();
	$staff_name = $current_user->first_name;	
	/* Let's get our Advanced Custom Fields - End */
?>
<!--Markup for Recent Posts -->
<section class="<?php echo $className ?> limit-900">
	<h2 class="center blue">Welcome Back <?php echo $staff_name; ?>!</h2>
	<?php 
		if( have_rows('mission_info') ):
	?>
	<div id="<?php echo esc_attr($id); ?>" class="accordion-item <?php echo esc_attr($className); ?>">
	<div class="accordion-header">
		<h2>Mission Information</h2>
	</div>
	<?php
			echo '<div class="accordion-body"><ul>';
			while( have_rows('mission_info') ) : the_row();
				$mission_label = get_sub_field('mission_label');
				$mission_value = get_sub_field('mission_value');
				echo '<ul><li class="mission-label">' . $mission_label . ' </li>';
				echo '<li class="mission-value">' . $mission_value . '</li></ul>';
			endwhile;
			'</ul></div></div>';
		else :			
		endif;
	?>
</section>