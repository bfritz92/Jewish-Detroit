<?php
/**
 * Accordion Tabs Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'postgrid-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'postgrid';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assing defaults.
$fpip = get_field('block_postgrid');
$standalone = get_field('standalone_page'); 
?>
<!--Markup for Expand/Collapse-->
<?php if( in_array('yes', $standalone) ) : ?>
	<?php
		// check if the flexible content field has rows of data
		if( have_rows('block_postgrid') ):		
			 // loop through the rows of data
	?>
				<?php
					while ( have_rows('block_postgrid') ) : the_row();
					$post 			= get_sub_field('post_name');
					$post_id		= $post->ID;
					$title			= get_the_title( $post_id );
					$headshot 		= get_the_post_thumbnail_url($post_id); 
        			$full_name		= get_field( 'full_name', $post_id );				
					$occupation		= get_field( 'occupation', $post_id );	
					$favorites		= get_field( 'favorites', $post_id );	
					$favfood		= get_field( 'favfood', $post_id );	
					$dreamjob		= get_field( 'dreamjob', $post_id );	
					$favorite_show	= get_field( 'favorite_show', $post_id );	
					$summary		= get_field( 'summary', $post_id );	
					$count			= 0;
					$count++;						
				?>	
				<section class="directory-item">				
					<!-- Featured Image -->
					<a href="#fancyboxID-<?php echo $count ?>" class="fancybox-inline">
						<img class="directory-item--img" src="<?php echo $headshot; ?>" alt="<?php echo $headshot; ?>" />
					</a>
					<ul class="directory-item--info">
						<?php if ($full_name) : ?>
						<li class="directory-item--info--title"><h3><?php echo $full_name ?></p></li>
						<?php endif; ?>
					</ul>											
					<div style="display:none" class="fancybox-hidden"><div id="fancyboxID-<?php echo $count ?>" class="hentry" style="width:460px;max-width:100%;">
						<img class="directory-item--img" src="<?php echo $headshot; ?>" alt="<?php echo $headshot; ?>" />
						<ul class="directory-item--info">
							<?php if ($full_name) : ?>
							<li class="directory-item--info--title"><h3><?php echo $full_name ?></p></li>
							<?php endif; ?>
							<?php if ($occupation) : ?>
							<li class="directory-item--info--excerpt"><p><strong>Occupation and Employer:</strong> <span style="font-style: normal;"><?php echo $occupation ?></span></p></li>
							<?php endif; ?>
							<?php if ($favorites) : ?>
							<li class="directory-item--info--excerpt"><p><strong>Favorite Things to Do:</strong> <span style="font-style: normal;"><?php echo $favorites ?></span></p></li>
							<?php endif; ?>
							<?php if ($favfood) : ?>
							<li class="directory-item--info--excerpt"><p><strong>Favorite Food:</strong> <span style="font-style: normal;"><?php echo $favfood ?></span></p></li>
							<?php endif; ?>
							<?php if ($dreamjob) : ?>
							<li class="directory-item--info--excerpt"><p><strong>Dream Job:</strong> <span style="font-style: normal;"><?php echo $dreamjob ?></span></p></li>
							<?php endif; ?>
							<?php if ($favorite_show) : ?>
							<li class="directory-item--info--excerpt"><p><strong>Favorite Show:</strong> <span style="font-style: normal;"><?php echo $favorite_show ?></span></p></li>
							<?php endif; ?>
							<!-- Full Text -->	
							<?php if ($summary) : ?>
							<div id="<?php echo esc_attr($id); ?>" class="accordion-item <?php echo esc_attr($className); ?>">
								<div class="accordion-header">
									<h2>Read More</h2></div>
								<div class="accordion-body"><li class="directory-item--info--full-text"><p><?php echo $summary ?></p></li></div>
							</div>
							<?php endif; ?>								
						</ul>
					</div>
					</div>
				</section>
				<?php endwhile;	?>
	<?php endif; ?>	
<?php endif; ?>