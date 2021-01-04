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
$id = 'showacf-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'showacf';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assing defaults.
$fpip = get_field('block_showacf');
?>
<!--Markup for Expand/Collapse-->
<?php 
$post_id = get_the_ID();
$fields = get_field_objects($post_id);

if( $fields ): ?>
	<?php foreach( $fields as $name ): ?>
		<?php if ($name['value']) : ?>
		<p class="hide-<?php echo $name['ID'] ?>"><strong><?php echo $name['label']; ?>:</strong> <?php echo $name['value']; ?></p>
		<?php endif; ?>
  	<?php endforeach; ?>   
<?php endif; ?>