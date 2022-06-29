<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>
<?php 
    $show_header = get_field( "show_header" );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php /*
	<?php if ( $show_header ) : ?>
	<header class="entry-header">
		<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
	</header>
	
	<?php endif; ?>
    */ ?>
	<div class="entry-content">
	    <?php if ( $show_header ) : ?>
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
        <?php endif; ?>
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentynineteen' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'twentynineteen' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
