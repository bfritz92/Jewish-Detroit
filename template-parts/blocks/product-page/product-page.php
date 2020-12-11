<?php
/**
 * Single Product Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'single-product-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'single-product';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assing defaults.
$img_section_css = get_field('img_section_css');
$section_css	 = get_field('product_section_css');
$description_css = get_field('product_description_css');
$price_css		 = get_field('product_price_css');
$buy_header_css	 = get_field('product_buy_header_css');
$product_name	 = get_the_title();
$product_price	 = get_field('product_price');
$description	 = get_field('product_description');
?>
<section class="<?php the_field('image_section_css');?>">
	<?php 
		$counter = 0;
		while (have_rows('product_images')) {
    		the_row();        
        	if ($counter) {
				// already did output of first, skip the rest
				continue;
			}
			// output first row here
			$image = get_sub_field('product_image');
			echo '<a href="'.$image.'"><img src="'.$image.'"></a>';
			// increment counter so that no additional rows are output		
		$counter++;		
    // already did output of first, skip the rest    	
  }
  
  ?>
	<?php if( have_rows('product_images') ): ?>
    <ul>
    <?php while( have_rows('product_images') ): the_row(); 
        $image = get_sub_field('product_image');
        ?>
        <li>
			<a href="<?php echo $image;?>"><img src="<?php echo $image;?>"></a>
        </li>
    <?php endwhile; ?>
    </ul>
<?php endif; ?>
</section>
<section class="<?php the_field('product_section_css');?>">
	<h1 class="<?php the_field('product_title_css');?>"><?php echo $product_name; ?></h1>
	<section class="<?php echo $description_css; ?>">
		<?php echo $description; ?>
		<div>
			<h2 class="<?php echo $price_css; ?>">$<?php echo $product_price; ?></h3>
			<a href="#buy" class="<?php echo $buy_header_css; ?>">Buy Now</a>		
		</div>
	</section>
</section>
<div class="order-product"><a id="buy"></a>
	<hr />
	<h3 class="cyan">Order Form</h3>
	<?php echo do_shortcode('[gravityform id="873" title="false" description="false" ajax="true" tabindex="49" field_values="product_name='.$product_name.'&product_price='.$product_price.'"]'); ?>
</div>
<!-- single-product #end -->
<?php
	// no layouts found
?>