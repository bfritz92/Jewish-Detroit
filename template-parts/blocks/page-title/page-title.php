<?php
/**
 * Page Title Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'page-title-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'page-title';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assing defaults.
$page_title	 = get_the_title();
$h_type = get_field('h_type');
$class	 = get_field('class');
?>
<<?php echo $h_type;?> class="<?php echo $class; ?>"><?php echo $page_title; ?></<?php echo $h_type;?>>
<?php
	// no layouts found
?>