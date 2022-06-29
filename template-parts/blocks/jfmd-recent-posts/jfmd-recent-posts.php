<?php
/**
 * Recent Posts with Excerpt Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'recent-posts-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'recent-posts';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
/* Let's get our Advanced Custom Fields - Begin */
$category = get_field('category'); 
$order = get_field('order');
$orderby = get_field('orderby');
//$post_type = get_field('post_type'); -- We will need to manually enter those in if needed.
/* Let's get our Advanced Custom Fields - End */
$posts_per_page = get_field('posts_per_page');
$args = array(
   // 'post_type' 		=> $post_type,
	'post_status'		=> 'publish',
	'posts_per_page' 	=> $posts_per_page,
	'cat'      			=> $category,
    'order'    			=> $order,
	'orderby'    		=> $orderby,
	'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
);
query_posts( $args );
?>
<!--Markup for Recent Posts -->
<section class="<?php echo $className ?>">
<?php 
	$loop = new WP_Query( $args ); 
?>

<?php 
	if ( $loop->have_posts() ):
		while ( $loop->have_posts() ) : $loop->the_post(); 
?>
			<section class="latest-post mt2">
				<a href="<?php echo esc_url(get_permalink()); ?>"><?php echo the_title()?></a>
				<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" class="wp-block-latest-posts__post-date"><?php echo esc_html( get_the_date( '' ) );?></time>
				<?php echo get_the_excerpt(); ?>
				<?php // - We will need to add an if/else if we need to include featured images ?>
			</section>
<?php
		endwhile;
?>
</section>
<div class="navigation">
  <div class="alignleft"><?php previous_posts_link('&laquo; Previous') ?></div>
  <div class="alignright"><?php next_posts_link('More &raquo;') ?></div>
</div>
<?php
    	wp_reset_query(); 
	endif;
?>
