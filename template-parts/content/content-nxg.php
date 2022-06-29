<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<div class="events-list--item">	
	<a class="events-list--item--image" href="<?php echo esc_url( tribe_get_event_link() ); ?>">
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
		<img class="" src="<?php echo $image[0]; ?>">
	</a>		
	<ul class="events-list--item--info">
		<a class="events-list--item--image" href="<?php echo esc_url( tribe_get_event_link() ); ?>">
			<li class="department">NEXTGen Detroit Presents:</li>
			<li class="title"><h2><?php the_title() ?></h2></li>
			<li class="time"><?php echo tribe_get_start_date(null, false, 'g:i a'); ?></li>
			<li class="date"><?php echo tribe_get_start_date( $post->ID, false, 'l' ); ?>, <?php echo tribe_get_start_date( $post->ID, false, 'F' ); ?> <?php echo tribe_get_start_date( $post->ID, false, 'j' ); ?></li>
			<li class="location"><?php echo tribe_get_address( $venue_id ); ?>,<?php echo tribe_get_city( $venue_id ); ?> </li>
			<li class="description"><?php echo get_the_excerpt(); ?></li>
		</a>
		<li class="register"><a class="events-list--item--image" href="<?php echo esc_url( tribe_get_event_link() ); ?>"></a><a class="gray-link" href="<?php echo esc_url( tribe_get_event_link() ); ?>">Register <i class="fas fa-angle-double-right" aria-hidden="true"></i></a></li>
	</ul>
</div>
