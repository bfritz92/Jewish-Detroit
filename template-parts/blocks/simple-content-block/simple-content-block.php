<?php
/**
 * Simple Content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'simple-content-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'simple-content';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assing defaults.
$fpip = get_field('block_info_content');

?>
<section class="<?php the_field('section_css');?>">
	<div class="<?php the_field('panel_css');?>">
		<h2 class="<?php the_field('heading_css');?>"><?php the_field('heading');?></h2>
		<?php the_field('copy');?>
	</div>
	<div class="<?php the_field('picture_css');?>" alt="">
		<img srcset="<?php the_field('image');?>">      
	</div>
		
</section>	
<!-- front-page-intro #end -->
<?php
	// no layouts found
?>