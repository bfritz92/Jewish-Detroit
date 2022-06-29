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
	global $post;
    $post_slug = $post->post_name;
	$user_directory = get_field('user_directory');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! twentynineteen_can_show_post_thumbnail() ) : ?>
		<header class="entry-header">
			<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
		</header>
	<?php endif; ?>
	<div class="entry-content">		
		<?php the_content(); ?>
		<?php			
			if ($user_directory) :		
				$args = array(
					'meta_query' => array(
						array(
							'key' => 'department', // name of custom field
							'value' => $post_slug, // matches exaclty "123", not just 123. This prevents a match for "1234"
							'compare' => 'LIKE',							
						)
					),
					'orderby' => 'meta_value', 
					'meta_key' => 'order'
				);		
				$user_query = new WP_User_Query( $args );
				if( !empty( $user_query->get_results() ) ):
					foreach( $user_query->get_results() as $user) : ?>
						<?php
							$first_name = get_field('first_name', 'user_'. $user->id);
							$last_name = get_field('last_name', 'user_'. $user->id);
							$full_name = $first_name . ' ' . $last_name;
							$headshot = get_field('headshot', 'user_'. $user->id);
							$position_title = get_field('title', 'user_'. $user->id);
							$excerpt = get_field('excerpt', 'user_'. $user->id);
							$full_text = get_field('full_text', 'user_'. $user->id);
						?>
						<section class="directory-item">

							<!-- Featured Image -->
							<?php if ($headshot) : ?>
								<img class="directory-item--img" src="<?php echo $headshot['url']; ?>" alt="<?php echo $headshot['alt']; ?>" />
							<?php endif; ?>
							<ul class="directory-item--info">
								<!-- Name -->	
								<li class="directory-item--info--name"><h2><?php echo $full_name; ?></h2></li>

								<!-- Position Title -->	
								<?php if ($position_title) : ?>
									<li class="directory-item--info--title"><h3 class="dark-gray"><?php echo $position_title ?></h3></li>
								<?php endif; ?>

								<!-- Excerpt -->	
								<?php if ($excerpt) : ?>
									<li class="directory-item--info--excerpt"><p><?php echo $excerpt ?></p></li>
								<?php endif; ?>

								<!-- Full Text -->	
								<?php if ($full_text) : ?>
									<li class="directory-item--info--full-text"><p><?php echo $full_text ?></p></li>
								<?php endif; ?>		

								<!-- Post Content -->	
								<?php if (the_content()) : ?>
									<li class="directory-item--info--content"><p class="purple bold"><?php the_content(); ?></p></li>
								<?php endif; ?>
							</ul>
						</section>
					<?php endforeach; ?>			
			<?php endif; ?>
			<?php wp_reset_query();?>
		<?php else : ?>
			<?php
				// - Not Paginating - $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;			
				$args = array(
					'post_type'  	=> 'directory', 
					'category_name'  => $post_slug,
					'orderby'		=> 'title',
					'order'			=> 'ASC',					 
					'posts_per_page'=> 65,
					// - Not Paginating - 'paged' => $paged
				);		
				$main_posts = new WP_Query( $args );
				$count = 0;
				if( $main_posts->have_posts() ):
					while( $main_posts->have_posts() ) : $main_posts->the_post(); ?>
						<!-- Featured Image -->	
						<section class="directory-item">
							<a class="directory-item--img" href="<?php the_field('url'); ?>"><?php the_post_thumbnail('full'); ?></a>
							<ul class="directory-item--info">
							<!-- Post Title -->		
								<li><h4><a class="purple-link" href="<?php the_field('url'); ?>"><?php the_title(); ?></a></h4></li>
								<!-- Post Content -->	
								<?php if (the_content()) : ?>
									<li><p class="purple bold"><?php the_content(); ?></p></li>
								<?php endif; ?>
							</ul>
						</section>
					<?php endwhile; ?>			
			<?php endif;  ?>
			<?php wp_reset_query();?>
		<?php endif; ?>
		
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
