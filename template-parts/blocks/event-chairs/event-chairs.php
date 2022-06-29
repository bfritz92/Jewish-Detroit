<?php
/**
 * Event Chairs Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'event-chair-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'event-chair';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assing defaults.
$fpip = get_field('event_co_chairs');
?>
<div class="individual-event--details--leadership <?php echo $className ?>">
<?php if( have_rows('event_co_chairs') ): ?>
	<ul>
		<li><h4 class="blue baskerville">Event Co-Chairs</h4></li>
	<?php
		while ( have_rows('event_co_chairs') ) : the_row();
			$co_chair_name = get_sub_field('co_chair_name');
	?>	
			<li><?php echo $co_chair_name ?></li>
		<?php endwhile;	?>
	</ul>
<?php endif; ?>			
<?php
	// check if the flexible content field has rows of data
	if( have_rows('event_chairs') ):		
	 // loop through the rows of data
?>
	<ul>
		<li><h4 class="blue baskerville">Event Chairs</h4></li>
	<?php
		while ( have_rows('event_chairs') ) : the_row();
			$co_chair_name = get_sub_field('chair_names');
	?>	
			<li><?php echo $co_chair_name ?></li>
		<?php endwhile;	?>
	</ul>
<?php endif; ?>	
<?php
	// check if the flexible content field has rows of data
	if( have_rows('event_committee') ):		
	 // loop through the rows of data
?>
	<ul>
		<li><h4 class="blue baskerville">Event Committee</h4></li>
	<?php
		while ( have_rows('event_committee') ) : the_row();
			$co_chair_name = get_sub_field('event_committee_name');
	?>	
			<li><?php echo $co_chair_name ?></li>
		<?php endwhile;	?>
	</ul>	
</div>	
<?php endif; ?>