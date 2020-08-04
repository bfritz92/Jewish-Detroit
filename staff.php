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
?>
<!--Markup for Expand/Collapse-->
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
				<img src="<?php echo $headshot; ?>" />
				<ul class="staff-grid--profile--info">
					<li class="name"><h5 class="blue"><?php echo $firstname; ?> <?php echo $lastname; ?></h5></li>
					<li class="title"><?php echo $title; ?></li>
					<li class="email"><?php echo $email; ?></li>
					<li class="phone"><?php echo $phone; ?></li>
				</ul>
			</div>
			<?php endwhile;	?>
		</div>
	</div>
</section>
<?php else : ?>
<!--	// no layouts found -->
<?php endif; ?>				