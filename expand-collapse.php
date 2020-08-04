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
$id = 'expand-collapse-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'expand-collapse';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assing defaults.
$headline = get_field('headline');
$subhead = get_field('subhead');
$background_image = get_field('ec_background-image') ?: 295;
$qa = get_field('block_expand_collapse');
?>
<?php if ( is_front_page() ) : ?>
	<section id="ways-to-give" class="ways-to-give grid">
		<div class="ways-to-give--copy fade fade-in">
			<!-- ACF ways-to-give--heading -->
			<h1 class="white book"><?php echo $headline; ?></h1>
			<!-- ACF ways-to-give--copy -->
			<h5 class="white bold"><?php echo $subhead; ?></h5>
		</div>
		<div class="ways-to-give--blocks fade fade-in">
			<div class="accordion">
<?php else : ?>
	<h3><?php echo $headline; ?></h3>
	<h5 class="white bold"><?php echo $subhead; ?></h5>
	<div class="accordion">				
<?php endif; ?>		
<!--Markup for Expand/Collapse-->
		<?php
			// check if the flexible content field has rows of data
			if( have_rows('block_expand_collapse') ):
				 // loop through the rows of data
				while ( have_rows('block_expand_collapse') ) : the_row();
				$link = get_sub_field('ec_link');
				$link_text = get_sub_field('ec_link_text') ?: 'Learn More';
			?>
			<div id="<?php echo esc_attr($id); ?>" class="accordion-item <?php echo esc_attr($className); ?>">
			<!--<div class="accordion-header">-->
			<div class="accordion-title--collapse" style="width:90%; float:left; background-color: rgba(255, 255, 255, 0.8);padding: 25px 15px;transition: background-color 0.2s ease-out 0.3s, color 0.2s ease-out 0s;">
				<!--<h2>-->
					<?php if ($link) : ?>
						<a href="<?php echo $link; ?>">
							<?php the_sub_field('ec_header');?>
						</a>
					<?php else : ?>
						<?php the_sub_field('ec_header');?>
					<?php endif; ?>
				<!--</h2>-->
			</div>
			<div class="accordion-header" style="width:10%; float:right;">
					<button style="padding:0; background:none; border:0;vertical-align: middle;">+</button>
			</div>	
				
			<div class="accordion-body">
				<p><?php the_sub_field('ec_body');?></p>
				<?php if ($link) : ?>
				<a href="<?php echo $link; ?>" class="button button-small button-blue">
					<?php if ($link_text) : ?>
						<?php echo $link_text; ?>
					<?php endif; ?>
				</a>
			<?php endif; ?>
			</div>
		</div>
		<?php
			endwhile;
			else :
				// no layouts found
				endif;
		?>
	
<?php if ( is_front_page() ) : ?>
		</div>		
	</div>
</section>
<?php else : ?>
	</div>			
<?php endif; ?>	