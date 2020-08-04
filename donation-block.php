<?php
/**
 * Donation Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'donation-block-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'donation-block';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assing defaults.
$donation_header = get_field('donation_header');
$donation_blurb = get_field('donation_blurb');
$background_image = get_field('donation_background') ?: 295;
?>
<section id="donation-panel" class="donation-panel">
	<div class="donation-panel--wrapper">
		<div class="donation-panel--wrapper-copy fade fade-in">
			<!-- ACF donation-title -->
			<h1 class="white"><?php echo $donation_header; ?></h1>
			<!-- ACF dontation-copy -->
			<h5 class="white"><?php echo $donation_blurb; ?></h5>
		</div>
		<div class="donation-panel--buttons fade fade-in">
			<?php echo do_shortcode( '[gravityform id=11 title=false description=false ajax=true]
' ); ?>
		</div>
	</div>
</section>	