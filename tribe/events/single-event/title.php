<?php
/**
 * Single Event Title Template Part
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/single-event/title.php
 *
 * See more documentation about our Blocks Editor templating system.
 *
 * @link {INSERT_ARTCILE_LINK_HERE}
 *
 * @version 4.7.2
 *
 */
?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
<div style="position:relative;">
	<img class="individual-event--img" src="<?php echo $image[0]; ?>">
	<?php if ( get_field( 'sold_out' ) == "yes" ): ?>
		<div class="ribbon <?php echo get_field( 'sold_out_color'); ?> ribbon-top-right"><span><?php echo get_field( 'sold_out_lang'); ?></span></div>
	<?php endif; ?>
</div>
<h5 class="individual-event--department"><?php echo strip_tags(tribe_get_event_taxonomy($event_id, 'before=&sep= and &after')); ?> 
<?php if (tribe_get_event_taxonomy($event_id)) : ?>
<?php if (strpos(tribe_get_event_taxonomy($event_id), ' and ') !== false) :
    echo 'Present';
	else :
	echo 'Presents';
endif; ?><?php endif; ?>
</h5>
<?php the_title( '<h1 class="individual-event--title baskerville">', '</h1>' );
