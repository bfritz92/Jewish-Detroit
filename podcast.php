<?php
/**

 * Template Name: FedRadioDetroit
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
<!-- Splash -->
<section id="primary" class="content-area fedradiodetroit--splash">
    <?php the_post_thumbnail(); ?>
    <div class="fedradiodetroit--splash--background"></div>
    <div id="main" class="fedradiodetroit--intro">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
			?>

		</div>
</section>

<section class="fedradiodetroit--grid">


    <?php
		$args = array(
			'category_name'  	=> 'FedRadio', 
			'meta_key'			=> 'episode',
			'orderby'			=> 'meta_value',
			'order'				=> 'DESC',
				/*
			'order'			    => 'ASC',
			'orderby'		    => 'episode_number',*/									
			'posts_per_page'=> 12,
		);		
		$main_posts = new WP_Query( $args );
		$count = 0;
		if( $main_posts->have_posts() ):
			while( $main_posts->have_posts() ) : $main_posts->the_post(); ?>
				<div class="fedradiodetroit--episode">
                    <p class="fedradiodetroit--episode--date"><?php echo get_the_date(); ?></p>
                    <p class="fedradiodetroit--episode--number">Episode <?php the_field ('episode'); ?></p>	
					<a class="fedradiodetroit--episode--title" href="<?php the_permalink(); ?>"><h3 class=""><?php the_title(); ?></h3></a>
						
					<div class="fedradiodetroit--episode--description"><?php the_excerpt(); ?></div>
                    <a class="fedradiodetroit--episode--image" href="<?php the_permalink(); ?>"><picture class="" alt="">
                    <?php the_post_thumbnail('full'); ?></a>
                    </picture>
						
				</div>
			<?php endwhile; ?>			
		<?php endif;  ?>
	<?php wp_reset_query();?>	

<!--
    <div class="fedradiodetroit--episode">
        <p class="fedradiodetroit--episode--date">Dec. 5th, 2019</p>
        <p class="fedradiodetroit--episode--number">Episode <?php the_field ('episode'); ?></p>
        <h2 class="fedradiodetroit--episode--title">Scott Kaufman</h2>
        <p class="fedradiodetroit--episode--description">FedRadioDetroit’s first guest is none other than former Federation CEO Scott Kaufman. Scott shares his journey into Jewish leadership, reflects on his decade long run as CEO and what he hopes to accomplish in this next chapter of his personal and professional story.</p>
        <picture class="fedradiodetroit--episode--image" alt="">
            <source srcset="<?php echo wp_get_attachment_image_srcset( 41706) ?>">
            <img src="<?php echo wp_get_attachment_image_url( 41706, 'thumbnail' ) ?>">
        </picture>
    </div>
    <div class="fedradiodetroit--episode">
        <p class="fedradiodetroit--episode--date">Jan. 7th, 2020</p>
        <p class="fedradiodetroit--episode--number">Episode 2</p>
        <h2 class="fedradiodetroit--episode--title">Lorem Ipsum Dolor</h2>
        <p class="fedradiodetroit--episode--description">Curabitur aliquam volutpat purus, vitae placerat nulla. Mauris aliquam faucibus orci nec elementum. Nunc egestas dignissim pulvinar. Ut vel semper magna, vel efficitur lacus.</p>
        <picture class="fedradiodetroit--episode--image" alt="">
            <source srcset="<?php echo wp_get_attachment_image_srcset( 41892) ?>">
            <img src="<?php echo wp_get_attachment_image_url( 41892, 'thumbnail' ) ?>">
        </picture>
    </div>
    <div class="fedradiodetroit--episode">
        <p class="fedradiodetroit--episode--date">Dec. 5th, 2020</p>
        <p class="fedradiodetroit--episode--number">Episode 3</p>
        <h2 class="fedradiodetroit--episode--title">Sit Amet</h2>
        <p class="fedradiodetroit--episode--description">Aliquam nec venenatis nisi. Aliquam metus sapien, hendrerit sed massa eget, porta interdum risus. Maecenas ut neque at enim porta hendrerit. Integer blandit suscipit mi ut convallis.</p>
        <picture class="fedradiodetroit--episode--image" alt="">
            <source srcset="<?php echo wp_get_attachment_image_srcset( 41891) ?>">
            <img src="<?php echo wp_get_attachment_image_url( 41891, 'small' ) ?>">
        </picture>
    </div>
    <div class="fedradiodetroit--episode">
        <p class="fedradiodetroit--episode--date">Dec. 5th, 2020</p>
        <p class="fedradiodetroit--episode--number">Episode 4</p>
        <h2 class="fedradiodetroit--episode--title">Consectetur Adipiscing Elit</h2>
        <p class="fedradiodetroit--episode--description">Aliquam nec venenatis nisi. Aliquam metus sapien, hendrerit sed massa eget, porta interdum risus. Maecenas ut neque at enim porta hendrerit. Integer blandit suscipit mi ut convallis.</p>
        <picture class="fedradiodetroit--episode--image" alt="">
            <source srcset="<?php echo wp_get_attachment_image_srcset( 41890) ?>">
            <img src="<?php echo wp_get_attachment_image_url( 41890, 'small' ) ?>">
        </picture>
    </div>
    <div class="fedradiodetroit--episode">
        <p class="fedradiodetroit--episode--date">Dec. 5th, 2020</p>
        <p class="fedradiodetroit--episode--number">Episode 5</p>
        <h2 class="fedradiodetroit--episode--title">Aenean pharetra est</h2>
        <p class="fedradiodetroit--episode--description">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque mollis blandit pharetra. Aliquam dictum orci interdum ornare condimentum. Sed tempus vestibulum tincidunt. Pellentesque laoreet orci dui, a viverra diam dictum a. </p>
        <picture class="fedradiodetroit--episode--image" alt="">
            <source srcset="<?php echo wp_get_attachment_image_srcset( 41889) ?>">
            <img src="<?php echo wp_get_attachment_image_url( 41889, 'small' ) ?>">
        </picture>
    </div>
    <div class="fedradiodetroit--episode">
        <p class="fedradiodetroit--episode--date">Dec. 5th, 2020</p>
        <p class="fedradiodetroit--episode--number">Episode 6</p>
        <h2 class="fedradiodetroit--episode--title">Viverra ex Gravida</h2>
        <p class="fedradiodetroit--episode--description">Suspendisse felis ligula, dapibus eu euismod eget, ultricies sed lorem. Aliquam dolor nisl, condimentum vitae est nec, molestie hendrerit sapien. Etiam vitae nisl ac eros ultrices dignissim vel eget sapien. Quisque consectetur nisl vel lacus viverra faucibus.</p>
        <picture class="fedradiodetroit--episode--image" alt="">
            <source srcset="<?php echo wp_get_attachment_image_srcset( 41970) ?>">
            <img src="<?php echo wp_get_attachment_image_url( 41970, 'small' ) ?>">
        </picture>
    </div>
    <div class="fedradiodetroit--episode">
        <p class="fedradiodetroit--episode--date">Dec. 5th, 2020</p>
        <p class="fedradiodetroit--episode--number">Episode 7</p>
        <h2 class="fedradiodetroit--episode--title">Ut Pretium Erat</h2>
        <p class="fedradiodetroit--episode--description">Nam fermentum, mi et aliquam luctus, dolor orci scelerisque ante, id dignissim metus augue sit amet turpis. Donec at massa ac diam vulputate mattis volutpat at felis. Ut fringilla lacinia turpis, ac consectetur felis luctus et.</p>
        <picture class="fedradiodetroit--episode--image" alt="">
            <source srcset="<?php echo wp_get_attachment_image_srcset( 41899) ?>">
            <img src="<?php echo wp_get_attachment_image_url( 41899, 'small' ) ?>">
        </picture>
    </div>
    <div class="fedradiodetroit--episode">
        <p class="fedradiodetroit--episode--date">Dec. 5th, 2020</p>
        <p class="fedradiodetroit--episode--number">Episode 8</p>
        <h2 class="fedradiodetroit--episode--title">Tincidunt Maecenas Iaculis</h2>
        <p class="fedradiodetroit--episode--description">Nullam non purus in odio gravida auctor quis eget libero. Curabitur facilisis, justo at sagittis consequat, mauris risus gravida lorem, ut tempor urna risus et augue. Donec vel nunc consequat, tincidunt mi at, euismod nisl. </p>
        <picture class="fedradiodetroit--episode--image" alt="">
            <source srcset="<?php echo wp_get_attachment_image_srcset( 41900) ?>">
            <img src="<?php echo wp_get_attachment_image_url( 41900, 'small' ) ?>">
        </picture>
    </div>
    <div class="fedradiodetroit--episode">
        <p class="fedradiodetroit--episode--date">Dec. 5th, 2020</p>
        <p class="fedradiodetroit--episode--number">Episode 9</p>
        <h2 class="fedradiodetroit--episode--title">Felis Libero Vel</h2>
        <p class="fedradiodetroit--episode--description">Donec feugiat, nibh vel ullamcorper rutrum, ligula justo efficitur magna, eget ultrices sem magna non orci. Sed pellentesque posuere iaculis. Ut nec ligula venenatis, ultricies ipsum rutrum, interdum odio. Ut malesuada ex quis libero malesuada, auctor molestie turpis vehicula.</p>
        <picture class="fedradiodetroit--episode--image" alt="">
            <source srcset="<?php echo wp_get_attachment_image_srcset( 41925) ?>">
            <img src="<?php echo wp_get_attachment_image_url( 41925, 'small' ) ?>">
        </picture>
    </div>
    
</section>
        -->




<?php
get_footer();
