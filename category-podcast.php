<?php
/**
 * Template Name: Podcast Episode
 * Template Post Type: podcast
 */

get_header(); ?>
<div class="content">
	<section id="about-top" class="purple-bg podcast">
		<div class="grid-x grid-margin-x grid-padding-x contained">
			<div class="cell small-12 medium-6 podcast--img">
			<picture class="about-page--section--img" alt="">
				<source srcset="<?php echo wp_get_attachment_image_srcset( 2848) ?>">
					<img src="<?php echo wp_get_attachment_image_url( 2848, 'large' ) ?>">
			</picture>
			</div>
			<div class="cell small-12 medium-6 ">
				<h1 class="yellow pb-1">Podcast Episodes</h1>
				<div class="border-yellow pl-1">
					<p class="white bold mb-2">Join Todd Krieger, Senior Planning Director at the Jewish Federation, as he and guests explore the reasons for youth mental illness and provide tools for young people and their families struggling to achieve mental wellness.</p>
				</div>
				<div class="podcast--subscribe">
					<a href="https://podcasts.apple.com/us/podcast/the-we-need-to-talk-podcast/id1469235425?uo=4"><img class="podcast--subscribe-button" src="https://wn2t.org/wp-content/uploads/2019/05/US_UK_Apple_Podcasts_Listen_Badge_RGB.svg"></a>
					<a href="https://www.google.com/podcasts?feed=aHR0cHM6Ly93d3cuc3ByZWFrZXIuY29tL3Nob3cvMzUyMzYxMi9lcGlzb2Rlcy9mZWVk"><img src="https://wn2t.org/wp-content/uploads/2019/05/google-play-badge.png"></a>
				</div>
			</div>
			
			</div>
		</div>
	</section>

    <section class="pt-2 contained podcast-list">
		<?php
			$args = array(
				'category_name'  	=> 'Podcast', 
				'order'			=> 'ASC',
				'orderby'		=> 'title',									
				'posts_per_page'=> 12,
			);		
			$main_posts = new WP_Query( $args );
			$count = 0;
			if( $main_posts->have_posts() ):
				while( $main_posts->have_posts() ) : $main_posts->the_post(); ?>
					<div class="podcast-episode-listing mb-2">
						
						<a href="<?php the_permalink(); ?>" ><h3 class="bold purple"><?php the_title(); ?></h3></a>
						
							<span class="charcoal mt-1"><?php the_excerpt(); ?></span>
							
							<a href="<?php the_permalink(); ?>" class="button btn-purple bold text-right" style="margin-bottom:0;">Listen</a>
							
						
					</div>
				<?php endwhile; ?>			
			<?php endif;  ?>
		<?php wp_reset_query();?>	
    </section>

	<section id="podcast-about" class="podcast--about contained grid-x grid-padding-x grid-margin-x pt-1 pb-2">
		<div class="cell small-12 medium-6">
		<h3 class="deep-purple">Julie Fisher</h3>
		<p class="border-purple pl-1">Julie Fisher is the author or The Resiliency Puzzle, founder of The Social U, the former director of BBFA, a nonprofit parenting education organization, a seasoned educator and a sought-after keynote speaker. She gives tons of presentations every year on a wide range of topics to parents, students, school staff, administrators and community members. From Managing Digital Footprints, Internet and Social Media Safety to the Keys to Increase Resiliency in Kids and more, Julie is a recognized authority within parenting and education circles on 21st century student and parenting issues.  </p>
		</div>
		<div class="cell small-12 medium-6">
		<h3 class="deep-purple">Todd Krieger</h3>
		<p class="border-purple pl-1">Todd Krieger earned a B.A. in Political Science from the University of Michigan and a Juris Doctor and Master of Science degree in Mass Communication from Boston University. Todd spent 12 years in public relations and marketing conducting campaigns for organizations such as Microsoft, Quicken Loans and others in the technology, healthcare, automotive and real estate sectors. In 2013 Todd joined the Jewish Federation of Metropolitan Detroit where he is currently the Senior Director of Planning and Agency Relations. In this role, Todd manages Federation’s annual allocations process, is the liaison to the organization’s 17 constituent agencies, runs Federation’s measurement program and overseas all planning activities and special projects, including leading We Need to Talk – Federation’s youth mental health initiative.
		</p>
		</div>
	</section>
</div>
<?php get_footer(); ?>