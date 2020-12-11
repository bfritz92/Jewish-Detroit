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
					$link			= get_the_permalink( $post_id );	
					$headshot 		= get_the_post_thumbnail_url($post_id); 
        			$full_name		= get_field( 'full_name', $post_id );	
					$position		= get_field( 'position', $post_id );
					$occupation		= get_field( 'occupation', $post_id );	
					$favorites		= get_field( 'favorites', $post_id );	
					$favfood		= get_field( 'favfood', $post_id );	
					$dreamjob		= get_field( 'dreamjob', $post_id );	
					$favorite_show	= get_field( 'favorite_show', $post_id );	
					$summary		= get_field( 'summary', $post_id );	
					$count			= 0;
					$count++;						
				?>	
				<section class="post-grid--item">
					<?php if( in_array('yes', $standalone) ) : ?>
					<!-- Featured Image -->
					<a href="<?php echo $link ?>">
						<img class="post-grid--item--img" src="<?php echo $headshot; ?>" alt="<?php echo $headshot; ?>" />
					</a>					
					<?php else : ?>
					<!-- Featured Image -->
					<a href="#fancyboxID-<?php echo $post_id ?>" class="fancybox-inline">
						<img class="post-grid--item--img" src="<?php echo $headshot; ?>" alt="<?php echo $headshot; ?>" />
					</a>
					<?php endif; ?>
					<ul class="post-grid--item--info">
						<?php if ($full_name) : ?>
							<li class="post-grid--item--info--title">
								<h3>
									<?php if( in_array('yes', $standalone) ) : ?>
									<a href="<?php echo $link ?>"><?php echo $full_name ?></a>
									<?php else : ?>
										<?php echo $full_name ?>
									<?php endif; ?>
									<?php if ($position) : ?>
										<br /><span class="cyan" style="font-size:0.875em;"><?php echo $position ?></span>
									<?php endif; ?>										
								</h3>
							</li>
						<?php endif; ?>																
					</ul>											
					<div style="display:none" class="fancybox-hidden"><div id="fancyboxID-<?php echo $post_id ?>" class="hentry">
						<img class="post-grid--item--img" src="<?php echo $headshot; ?>" alt="<?php echo $headshot; ?>" />
						<ul class="post-grid--item--info">
							<?php if ($full_name) : ?>
							<li class="post-grid--item--title"><h3><?php echo $full_name ?></h3></li>
							<?php endif; ?>
							<?php if ($position) : ?>
							<li class="post-grid--item--excerpt"><h3><?php echo $position ?></h3></li>
							<?php endif; ?>
							<?php if ($occupation) : ?>
							<li class="post-grid--item--excerpt"><p><strong>Occupation and Employer:</strong> <span style="font-style: normal;"><?php echo $occupation ?></span></p></li>
							<?php endif; ?>
							<?php if ($summary) : ?>
							<li class="post-grid--item--title"><p><?php echo $summary ?></p></li>
							<?php endif; ?>
							<?php if ($favorites) : ?>
							<li class="post-grid--item--excerpt"><p><strong>Favorite Things to Do:</strong> <span style="font-style: normal;"><?php echo $favorites ?></span></p></li>
							<?php endif; ?>
							<?php if ($favfood) : ?>
							<li class="post-grid--item--excerpt"><p><strong>Favorite Food:</strong> <span style="font-style: normal;"><?php echo $favfood ?></span></p></li>
							<?php endif; ?>
							<?php if ($dreamjob) : ?>
							<li class="post-grid--item--excerpt"><p><strong>Dream Job:</strong> <span style="font-style: normal;"><?php echo $dreamjob ?></span></p></li>
							<?php endif; ?>
							<?php if ($favorite_show) : ?>
							<li class="post-grid--item--excerpt"><p><strong>Favorite Show:</strong> <span style="font-style: normal;"><?php echo $favorite_show ?></span></p></li>
							<?php endif; ?>
							<!-- Full Text -->								
						</ul>
					</div>
					</div>
				</section>
				<?php endwhile;	?>
<?php endif; ?>