<?php
/**
 * Template Name: Individual Podcast Episode
 * Template Post Type: post
 */


get_header(); ?>

<section class="articles-top grid-x grid-padding-x mt-0">
	<div class="cell small-12 article-container article-header pb-3">

		
			<h2 class="purple title centered pb-1 pt-2"><?php the_title(); ?></h2>
			<p class="centered charcoal bold">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				</div>							
				<?php endwhile; else: ?>
				<p>Sorry, no posts matched your criteria.</p>
				<?php endif; ?>
			</p>
		</div>
		
</section> 
<div class="cell small-12 pb-2 pt-1 podcast-episode">
 
	<a class="spreaker-player" href="http://www.speaker.com/episode/<?php the_field ('podcast_embed'); ?>" data-resource="episode_id=<?php the_field ('podcast_embed'); ?>" data-width="100%" data-height="200px" data-theme="light" data-playlist="false" data-playlist-continuous="false" data-autoplay="false" data-live-autoplay="false" data-chapters-image="true" data-episode-image-position="right" data-hide-logo="false" data-hide-likes="false" data-hide-comments="false" data-hide-sharing="false" data-hide-download="true">Listen to "<?php the_title(); ?>"</a>
		</div>

	<section class="front-page-videos pt-2 pb-2">
		<div class="grid-x grid-padding-x grid-margin-x contained">
			<h3 class="purple border-bottom mb-1">Related Podcasts</h3>
		</div>
		<div class="grid-x grid-padding-x grid-margin-x contained">
			<?php
			// $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args = array(
    			'category_name'  	=> 'podcast', 
				// 'post_parent'	=> $post->ID,
				'order'			=> 'ASC',
				'orderby'		=> 'title', // meta_value = custom field URL: https://www.advancedcustomfields.com/resources/query-posts-custom-fields/
				/* 'meta_key'		=> 'last_name',	// meta_key = Use only if ordering by meta_value */											
				'posts_per_page'=> 3,
    			'post__not_in'           => array(get_the_ID())
        		// 'paged' => $paged
			);		
			$main_posts = new WP_Query( $args );
			$count = 0;
			if( $main_posts->have_posts() ):
				while( $main_posts->have_posts() ) : $main_posts->the_post(); ?>
					<div class="cell small-12 medium-4">
						<div class="border-purple mt-1 pl-1">
							<h4><a class="purple-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<span class="charcoal"><?php the_excerpt(); ?></span>
						</div>
					</div>
				<?php endwhile; ?>
				<?php /* if (function_exists("pagination")) {
          			pagination($main_posts->max_num_pages);
      			} */ ?>
			<?php endif;  ?>
			<?php wp_reset_query();?>
			
		</div>
		
	</section>
	<?php
		$args = array(
    		'post_type'  	=> 'factpanel', 
			'orderby'		=> 'rand',
			'posts_per_page'=> 1,
		);		
		$main_posts = new WP_Query( $args );
		$count = 0;
		if( $main_posts->have_posts() ):
			while( $main_posts->have_posts() ) : $main_posts->the_post(); ?>
				<section class="info-panel-1 <?php the_field ('css_class'); ?>" style="background-image:url('<?php the_post_thumbnail_url( 'full' ); ?>')">
					<div class="grid-x align-center contained">
						<div class="cell small-10 medium-8 large-6">
							<h4 class="white border-white pl-1"><?php the_title(); ?></h4>
							<br>
							<a class="yellow-link source" href="<?php the_field ('source_url'); ?>"><h4><?php the_field ('source_name'); ?></h4></a>
						</div>
					</div>
				</section>
			<?php endwhile; ?>			
		<?php endif;  ?>
	<?php wp_reset_query();?>	
<?php get_footer(); ?>