<?php
/**
 * Internal Content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'internal-block-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'internal-block';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assing defaults.
$fpip = get_field('block_internal_content');
?>
<!--Markup for Expand/Collapse-->
<?php
	// check if the flexible content field has rows of data
	if( have_rows('block_internal_content') ):		
		 // loop through the rows of data
?>
	<section class="<?php the_field('css_slug',$post_id) . the_field('section_css'); ?>">
		<?php while ( have_rows('block_internal_content') ) : the_row(); ?>
			<div class="<?php the_sub_field('block_class');?>">
				<h2 class="<?php the_sub_field('header_class');?>"><?php the_sub_field('header');?></h2>
				<p class="<?php the_sub_field('copy_class');?>"><?php the_sub_field('copy');?></p>
				<a href="<?php the_sub_field('link');?>#" class="<?php the_sub_field('link_class');?>"><?php the_sub_field('link_text');?></a>
			</div>
		<?php endwhile; ?>
	</section>		
<?php endif; ?>				