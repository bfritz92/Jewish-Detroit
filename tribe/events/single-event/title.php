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
<img class="individual-event--img" src="<?php echo $image[0]; ?>">
<h5 class="individual-event--department"><?php echo strip_tags(tribe_get_event_taxonomy($event_id, 'before=&sep= and &after')); ?> Presents</h5>
<?php the_title( '<h1 class="individual-event--title baskerville">', '</h1>' );
