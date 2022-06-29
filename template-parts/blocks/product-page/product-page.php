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
$product_name	 = get_field('product_name');
$product_title	 = get_the_title();
$product_price	 = get_field('product_price');
$description	 = get_field('product_description');
?>

<section class="<?php the_field('product_section_css');?>">
	<h1 class="<?php the_field('product_title_css');?>" style="margin:20px 0;"><?php echo $product_title; ?></h1>
	<section class="<?php the_field('image_section_css');?>">
		<div class="preview-image">
			<div id="preview-enlarged">
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
						$img_full = 'large';
						echo '<img src="'. wp_get_attachment_image_url( $image, $img_full ).'">';
						// increment counter so that no additional rows are output		
					$counter++;		
				// already did output of first, skip the rest    	
			  }

			  ?>
			</div>
			<!-- #preview-enlarged -->
			<?php if( have_rows('product_images') ): ?>
				<div id="thumbnail-container">
					<h6>Click to enlarge</h6>
				<?php while( have_rows('product_images') ): the_row(); 
					$image = get_sub_field('product_image');
					$img_full = 'full';
					$img_thumb = 'thumb'; 
					?>
					<!--<li style="list-style:none;">-->
						<!--<a href="<?php echo wp_get_attachment_image_url( $image, $img_full );?>">--><?php echo wp_get_attachment_image( $image, $img_thumb, "", ["class" => "thumbnail","alt"=>"some"] );?><!--</a>-->
					<!--</li>-->
				<?php endwhile; ?>
				</div>
				<!-- #thumbnail-container -->
				<!-- .preview-image -->
			<?php endif; ?>
	</section>
	<section class="<?php echo $description_css; ?>">
		<?php echo $description; ?>
		<div>
			<h2 class="<?php echo $price_css; ?> pb1">$<?php echo $product_price; ?></h3>
			<!--<a href="#buy" class="<?php echo $buy_header_css; ?>">Buy Now</a>		-->
		</div>
	</section>
</section>
<div class="order-product pt1"><a id="buy"></a>
	<hr />
	<h3 class="cyan">Order Form</h3>
	<?php echo do_shortcode('[gravityform id="873" title="false" description="false" ajax="true" tabindex="49" field_values="product_name='.$product_name.'&product_price='.$product_price.'"]'); ?>
</div>
<!-- single-product #end -->
<script>
$("#thumbnail-container img").click(function() {
	$("#thumbnail-container img").css("border", "1px solid #ccc");
    var src = $(this).attr("src");
    $("#preview-enlarged img").attr("src", src);
    $(this).css("border", "#fbb20f 2px solid");
    
});
</script>
<?php
	// no layouts found
?>