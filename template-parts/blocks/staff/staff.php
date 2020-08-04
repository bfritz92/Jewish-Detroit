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
$id = 'staff-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'staff';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assing defaults.
$fpip = get_field('block_staff');
$standalone = get_field('standalone_page'); 
?>
<!--Markup for Expand/Collapse-->
<?php if( in_array('yes', $standalone) ) : ?>
	<?php
		// check if the flexible content field has rows of data
		if( have_rows('block_staff') ):		
			 // loop through the rows of data
	?>
				<?php
					while ( have_rows('block_staff') ) : the_row();
					$user 		= get_sub_field('staff_name');
					$user_id	= $user['ID'];
					$firstname 	= $user['user_firstname'];
					$lastname 	= $user['user_lastname'];
					$email		= $user['user_email'];
					$headshot	= get_field('headshot', "user_{$user_id}");
					$title		= get_field('title', "user_{$user_id}");
					$phone		= get_field('phone_number', "user_{$user_id}");
					$excerpt 	= get_field('excerpt', "user_{$user_id}");
					$full_text 	= get_field('full_text', "user_{$user_id}");
				?>	
				<section class="directory-item">
					<!-- Featured Image -->
					<img class="directory-item--img" src="<?php echo $headshot['url']; ?>" alt="<?php echo $headshot['alt']; ?>" />
					<ul class="directory-item--info">
						<!-- Name -->	
						<li class="directory-item--info--name"><h2><?php echo $firstname; ?> <?php echo $lastname; ?></h2></li>
						<!-- Position Title -->	
						<?php if ($title) : ?>
						<li class="directory-item--info--title"><h3 class="dark-gray"><?php echo $title ?></h3></li>
						<?php endif; ?>
						<!-- Excerpt -->	
						<?php if ($excerpt) : ?>
							<li class="directory-item--info--excerpt"><p><?php echo $excerpt ?></p></li>
						<?php endif; ?>
						<!-- Full Text -->	
						<?php if ($full_text) : ?>
						<div id="<?php echo esc_attr($id); ?>" class="accordion-item <?php echo esc_attr($className); ?>">
							<div class="accordion-header">
								<h2>Read More</h2></div>
							<div class="accordion-body"><li class="directory-item--info--full-text"><p><?php echo $full_text ?></p></li></div>
						</div>
						<?php endif; ?>								
					</ul>
				</section>
				<?php endwhile;	?>
	<?php endif; ?>	
<?php else : ?>	
	<?php
		// check if the flexible content field has rows of data
		if( have_rows('block_staff') ):		
			 // loop through the rows of data
	?>
	<section id="staff" class="grid">
		<div class="staff-panel">
			<h2 class="staff-grid--intro blue fade"><?php the_field('staff_header',$post_id); ?></h2>
			<div class="staff-grid">
				<?php
					while ( have_rows('block_staff') ) : the_row();
					$user 		= get_sub_field('staff_name');
					$user_id	= $user['ID'];
					$firstname 	= $user['user_firstname'];
					$lastname 	= $user['user_lastname'];
					$email		= $user['user_email'];
					$headshot	= get_field('headshot', "user_{$user_id}");
					$title		= get_field('title', "user_{$user_id}");
					$phone		= get_field('phone_number', "user_{$user_id}");
				?>		
				<div class="staff-grid--profile fade">
					<img src="<?php echo $headshot['url']; ?>" />
					<ul class="staff-grid--profile--info">
						<li class="name"><h5 class="blue"><?php echo $firstname; ?> <?php echo $lastname; ?></h5></li>
						<li class="title"><?php echo $title; ?></li>
						<li class="email"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
						<li class="phone"><?php echo $phone; ?></li>
					</ul>
				</div>
				<?php endwhile;	?>
			</div>

		</div>
	</section>

	<?php endif; ?>	
<?php endif; ?>