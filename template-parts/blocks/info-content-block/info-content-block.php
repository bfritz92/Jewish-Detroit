<?php
/**
 * Expand/Collapse Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'info-content-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'info-content';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assing defaults.
$fpip = get_field('block_info_content');
?>
<!--Markup for Expand/Collapse-->
<?php
	// check if the flexible content field has rows of data
	if( have_rows('block_info_content') ):
		$a = 1;
		$b = 1;
		$c = 1;
?>	
	<?php if ( is_front_page() ) : ?> 
		<section id="info-block" class="info-block">			
	<?php endif; ?>			
	<!-- front-page-intro #begin -->
	<?php // loop through the rows of data
		while ( have_rows('block_info_content') ) : the_row();
		$heading = get_sub_field('heading'); 
		$copy = get_sub_field('copy'); 
		$link_text = get_sub_field('link_text'); 
		$link = get_sub_field('link'); 
		$image = get_sub_field('image');
	?>	
		<section class="<?php the_sub_field('section_css');?> fade fade-in">
			<div>
				<div class="<?php the_sub_field('panel_css');?> fade fade-in" style="order: <?php echo $intro_panel_order?>;">
					<h2 class=" <?php the_sub_field('heading_css');?>"><?php the_sub_field('heading');?></h2>
					<p class="<?php the_sub_field('copy_css');?>"><?php the_sub_field('copy');?></p>
					<?php if ( get_sub_field('link_text')) :  ?>
						<a href="<?php the_sub_field('link');?>" class="gray-link"><?php the_sub_field('link_text');?></a>
					<?php endif; ?>
				</div>
					<?php if ( get_sub_field('image')) :  ?>
					<img src="<?php echo $image?>">
					<?php the_sub_field('image');?>
				<?php endif; ?>
			</div>
			
		</section>	
					
	<?php
		endwhile;
		?>
	<?php if ( is_front_page() ) : ?>			
		</section>
	
				
	<?php endif; ?>
	<!-- front-page-intro #end -->
	<?php
		else :
			// no layouts found
		endif;
?>
				
	
