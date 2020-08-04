<?php
/**
 * Template Name: Individual FedRadioDetroit Episode 1
 * Template Post Type: post
 */


get_header(); ?>

<section class="fedradio--intro">
    <div class="fedradio--intro--episode-number">
        <span class="">Episode <?php the_field ('episode'); ?> | </span>
        <?php echo get_the_date(); ?>
        <a class="white-link" href="http://www.jewishdetroit.org/podcast">Back to FedRadioDetroit</a>
    </div>
    <h1 class="fedradio--intro--title"><?php the_title(); ?></h1>
    <h2 class="fedradio--intro--subtitle"><?php the_field ('subtitle'); ?></h2>
</section> 


<section class="fedradio--content">

<?php the_post_thumbnail('full'); ?>



<div class="">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	</div>							
	<?php endwhile; else: ?>
	<p>Sorry, no posts matched your criteria.</p>
    <?php endif; ?>
    <!--SPREAKER PLAYER-->
<a class="spreaker-player" href="http://www.speaker.com/episode/<?php the_field ('podcast_embed'); ?>" data-resource="episode_id=<?php the_field ('podcast_embed'); ?>" data-width="100%" data-height="200px" data-theme="light" data-playlist="false" data-playlist-continuous="false" data-autoplay="false" data-live-autoplay="false" data-chapters-image="true" data-episode-image-position="right" data-hide-logo="false" data-hide-likes="false" data-hide-comments="false" data-hide-sharing="false" data-hide-download="true">Listen to "<?php the_title(); ?>"</a>

</div>

</section>	
        

<?php
get_footer();
?>