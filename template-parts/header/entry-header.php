<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

$discussion = ! is_page() && twentynineteen_can_show_post_thumbnail() ? twentynineteen_get_discussion_data() : null; ?>
<?php // ACF Conditional Check on Header Image and Title 
$hide_image	= get_field('hide_image');
$hide_title	= get_field('hide_title');
?>
<?php if($hide_image) : ?>
<?php else : ?>
	<img class="individual-event--img" src="<?php the_post_thumbnail_url('full')?>">
<?php endif; ?>
<?php if($hide_title) : ?>
<?php else : ?>
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
<?php endif; ?>

<?php if ( ! is_page() ) : ?>
<div class="entry-meta">
	<?php // twentynineteen_posted_by(); ?>
	<?php // twentynineteen_posted_on(); ?>
	<span class="comment-count">
		<?php
		if ( ! empty( $discussion ) ) {
			twentynineteen_discussion_avatars_list( $discussion->authors );
		}
		?>
		<?php twentynineteen_comment_count(); ?>
	</span>
	<?php
	// Edit post link.
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'twentynineteen' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">' . twentynineteen_get_icon_svg( 'edit', 16 ),
			'</span>'
		);
	?>
	<br />
	<a href="javascript:history.go(-1)">&laquo; Click here to go back</a>
</div><!-- .meta-info -->
<?php endif; ?>
