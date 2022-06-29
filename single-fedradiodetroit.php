<?php
/**
 * Template Name: Individual FedRadioDetroit Episode
 * Template Post Type: post
 */


get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="fedradio--intro">
    <div class="fedradio--intro--episode-number">
        <h4 class=""><?php the_field ('episode'); ?></h4>
        <?php echo get_the_date(); ?>
    </div>
    <h2 class="fedradio--intro--title"><?php the_title(); ?></h2>
    <h3 class="fedradio--intro--subtitle"><?php the_field ('subtitle'); ?></h3>
</section> 


<section class="fedradio--content">
<?php the_post_thumbnail(); ?>
<!--SPREAKER PLAYER-->
<a class="spreaker-player" href="http://www.speaker.com/episode/<?php the_field ('podcast_embed'); ?>" data-resource="episode_id=<?php the_field ('podcast_embed'); ?>" data-width="100%" data-height="200px" data-theme="light" data-playlist="false" data-playlist-continuous="false" data-autoplay="false" data-live-autoplay="false" data-chapters-image="true" data-episode-image-position="right" data-hide-logo="false" data-hide-likes="false" data-hide-comments="false" data-hide-sharing="false" data-hide-download="true">Listen to "<?php the_title(); ?>"</a>

<div class="">
	
		<?php the_content(); ?>
	</div>							
	
	
</div>

</section>	
<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>		
<?php
get_footer();
?>