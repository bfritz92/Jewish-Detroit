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
					$email			= get_field( 'email', $post_id );
					$facebook		= get_field( 'facebook', $post_id );
					$instagram		= get_field( 'instagram', $post_id );
					$instagram_cln	= preg_replace('/[^A-Za-z0-9\-]/', '', $instagram); // Removes special chars.
					$occupation		= get_field( 'occupation', $post_id );	
					$favorites		= get_field( 'favorites', $post_id );	
					$favfood		= get_field( 'favfood', $post_id );	
					$dreamjob		= get_field( 'dreamjob', $post_id );	
					$favorite_show	= get_field( 'favorite_show', $post_id );
					$vacationing	= get_field( 'vacationing', $post_id );
					$best_hidden_gem = get_field( 'best_hidden_gem', $post_id );
					$meal			= get_field( 'meal', $post_id );
					$summary		= get_field( 'summary', $post_id );	
					$count			= 0;
					$count++;						
				?>	
				<?php if ($headshot) : ?>
					<section class="post-grid--item">
				<?php else : ?>
					<section>
				<?php endif ?>
					<?php if( in_array('yes', $standalone) ) : ?>
					<!-- Featured Image -->
					<?php if ($headshot) : ?>
					<a href="<?php echo $link ?>">
						<img class="post-grid--item--img" src="<?php echo $headshot; ?>" alt="<?php echo $headshot; ?>" />
					</a>
					<?php endif; ?>
					<?php else : ?>
					<?php if ($headshot) : ?>
					<!-- Featured Image -->
					<a href="#fancyboxID-<?php echo $post_id ?>" class="fancybox-inline">
						<img class="post-grid--item--img" src="<?php echo $headshot; ?>" alt="<?php echo $headshot; ?>" />
					</a>
					<?php endif; ?>
					<?php endif; ?>
					<ul class="post-grid--item--info">
						<?php if ($full_name) : ?>
							<li class="post-grid--item--info--title">
								<h3>
									<?php if( in_array('yes', $standalone) ) : ?>
										<?php if ($headshot) : ?>
											<a href="<?php echo $link ?>"><?php echo $full_name ?></a>
										<?php else : ?>
											<h3><a href="<?php echo $link ?>"><?php echo $full_name ?></a></h3>
										<?php endif; ?>
									<?php else : ?>
										<?php if ($headshot) : ?>
											<?php echo $full_name ?>
										<?php else : ?>
											<h3><?php echo $full_name ?></h3>
										<?php endif; ?>
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
							<?php if ($email || $facebook || $instagram) : ?>
								<li class="post-grid--item--excerpt">
									<?php if ($email) : ?>
										<a href="mailto:<?php echo $email ?>" target="_blank"><i class="fas fa-envelope-square" aria-hidden="true"></i></a>
									<?php endif; ?>
									<?php if ($facebook) : ?>
										<a href="https://<?php echo $facebook ?>" target="_blank"><i class="fab fa-facebook-square" aria-hidden="true"></i></a>
									<?php endif; ?>
									<?php if ($instagram) : ?>
										<a href="https://instagram.com/<?php echo $instagram_cln ?>" target="_blank"><i class="fab fa-instagram-square" aria-hidden="true"></i></a>
									<?php endif; ?>
								</li>
							<?php endif; ?>
							<?php if ($position) : ?>
							<li class="post-grid--item--excerpt"><h3><?php echo $position ?></h3></li>
							<?php endif; ?>
							<?php if ($occupation) : ?>
							<li class="post-grid--item--excerpt"><p><strong>Occupation and Employer:</strong> <span style="font-style: normal;"><?php echo $occupation ?></span></p></li>
							<?php endif; ?>
							<?php if ($best_hidden_gem) : ?>
							<li class="post-grid--item--excerpt"><p><strong>What’s the best hidden gem in metro Detroit (it doesn’t have to be a restaurant)?</strong> <span style="font-style: normal;"><?php echo $best_hidden_gem ?></span></p></li>
							<?php endif; ?>
							<?php if ($vacationing) : ?>
							<li class="post-grid--item--excerpt"><p><strong>Where do you dream of vacationing post-COVID?</strong> <span style="font-style: normal;"><?php echo $vacationing ?></span></p></li>
							<?php endif; ?>
							<?php if ($meal) : ?>
							<li class="post-grid--item--excerpt"><p><strong>What’s your all-time favorite meal? </strong> <span style="font-style: normal;"><?php echo $meal ?></span></p></li>
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