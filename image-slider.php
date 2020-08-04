<?php
/**
 * Image Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'image-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = '';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assing defaults.
$fpip = get_field('block_image_slider');
?>
<!--Markup for Expand/Collapse-->
<?php
	// check if the flexible content field has rows of data
	if( have_rows('block_image_slider') ):
		$a = 1;
		$b = 1;
		$c = 1;
		 // loop through the rows of data
		while ( have_rows('block_image_slider') ) : the_row();
			$header = get_sub_field('header');
			$byline = get_sub_field('byline'); 
			$image = get_sub_field('image'); 
?>
	<section class="<?php echo $className ?>">
		<h2 class="title book pb1"><?php echo $header?></h2>
		<!-- ACF get-involved--copy -->
		<h5 class="dark-gray byline"><?php echo $byline?></h5>		
		<?php if( have_rows('image') ): ?>
			<div class="sponsor-grid">
			<?php while ( have_rows('image') ) : the_row(); ?>							
				<!--<a href="<?php the_sub_field('link'); ?>" class="carousel-cell depts--item" tabindex="0" target="_blank">-->
				<a href="<?php the_sub_field('link'); ?>" class="" target="_blank">
					<?php if(get_sub_field('image')) : ?>
						<img src="<?php the_sub_field('image'); ?>" loading="lazy">
					<?php endif; ?>
					<h4><?php the_sub_field('name'); ?></h4>
				</a>
			<?php endwhile; ?>				
			</div>
		<?php endif; ?>
		
	</section>		
<?php
	endwhile;
	else :
		// no layouts found
		endif;
?>