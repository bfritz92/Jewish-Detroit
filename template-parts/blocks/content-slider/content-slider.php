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
$id = 'content-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'content-slider';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assing defaults.
$fpip = get_field('block_content_slider');
?>
<!--Markup for Expand/Collapse-->
<?php
	// check if the flexible content field has rows of data
	if( have_rows('block_content_slider') ):
		$a = 1;
		$b = 1;
		$c = 1;
		 // loop through the rows of data
		while ( have_rows('block_content_slider') ) : the_row();
		$header = get_sub_field('header');
		$byline = get_sub_field('byline'); 
		$posts = get_sub_field('post_object'); 
		$users = get_sub_field('users'); 
	?>
	<section id="depts" class="depts fade">
		<h1 class="dark-gray book"><?php echo $header?></h1>
		<!-- ACF get-involved--copy -->
		<h5 class="dark-gray byline"><?php echo $byline?></h5>		
		<?php if($posts) : ?>
			<div class="carousel fade" data-flickity='{ "wrapAround": true }'>
				<?php foreach( $posts as $post): ?>
				<a href="<?php echo get_permalink( $post->ID ); ?>" class="carousel-cell depts--item" tabindex="0">
		  				<img class="carousel-cell--img" src="<?php the_field('slider_image', $post->ID); ?>" />
							
						<div class="depts--item--title carousel-cell--title">
								<h5 class="blue"><?php echo get_the_title( $post->ID ); ?></h5>
						</div>	
				</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</section>		
<?php
	endwhile;
	else :
		// no layouts found
		endif;
?>
