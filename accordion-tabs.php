<?php
/**
 * Accordion Tabs Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'accordion-tabs-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'accordion-tabs';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assing defaults.
$fpip = get_field('block_accordion_tabs');
?>
<!--Markup for Expand/Collapse-->
<?php
	// check if the flexible content field has rows of data
	if( have_rows('block_accordion_tabs') ):		
		 // loop through the rows of data
?>
<?php /*
<?php $have_image = get_field('have_image'); ?>
<?php if ($have_image) : ?>
	<section id="content" class="accordion-tabs fade pt-2 <?php echo $className ?>">
<?php else : ?>
	<section id="content" class="accordion-tabs fade pt-2 narrow <?php echo $className ?>">
<?php endif;?>
	<h2 class="accordion-tabs--title book mb1 mt1 baskerville"><?php the_field('accordion_header',$post_id); ?></h2>
	<article class="tabbed-content tabs-side">
		<nav class="tabs">
			<ul class="tabs-nav">
				<?php
					$a = 1;
					while ( have_rows('block_accordion_tabs') ) : the_row();
					$header = get_sub_field('header');
					$byline = get_sub_field('byline'); 
					$body = get_sub_field('body'); 
					$link = get_sub_field('link');
					
				?>	
				<!--ACF  tab--title -->
				<?php if ($a == 1) : ?>
					<li><a href="#side_tab<?php echo $a++; ?>" class="active"><?php the_sub_field('header');?></a></li>
				<?php else : ?>
					<li><a href="#side_tab<?php echo $a++; ?>" class=""><?php the_sub_field('header');?></a></li>
				<?php endif; ?>
				<?php
				endwhile;
				?>
			</ul>
		 </nav>
				<?php
					$b = 1;
					while ( have_rows('block_accordion_tabs') ) : the_row();
					$header = get_sub_field('header');
					$byline = get_sub_field('byline'); 
					$body = get_sub_field('body'); 
					$link = get_sub_field('link');
					$image = get_sub_field('image');
				?>
					<?php if ($b == 1) : ?>
				  		<section id="side_tab<?php echo $b++; ?>" class="item active" data-title="<?php the_sub_field('header');?>">
					<?php else : ?>
						<section id="side_tab<?php echo $b++; ?>" class="item" data-title="<?php the_sub_field('header');?>">	
					<?php endif; ?>							
					<div class="item-content">
						<div>
							<!--ACF START tab-copy -->
							<h3 class="mt0"><?php the_sub_field('header');?></h3>
							<?php the_sub_field('body');?>						
							<!--ACF END tab-copy -->
						</div>
						<?php if ($image) : ?>
							<img src="<?php echo $image; ?>">		
						<?php endif; ?>	
					</div>
					
				  </section>
				<?php
				endwhile;
				?>
*/ ?>
	<?php else : ?>
	<!--	// no layouts found -->
	<?php endif; ?>				

			
	</article>	
</section>
<div class="limit-1200">
<h1 class="accordion-tabs--headline blue mt1 mb1">Find Your Place at Federation</h1>
</div>
<section class="accordion-tabs limit-1200">


<ul data-tabs class="accordion-tabs--nav">
	<li><a data-tabby-default href="#pound-for-pound">Pound for Pound Mens Group</a></li>
	<li><a href="#real-estate">Real Estate Group</a></li>
	<li><a href="#maimonides">Maimonides Society of Physicians</a></li>
	<li><a href="#debut">Debut</a></li>
	<li><a href="#attorneys">Attorneys Group</a></li>
</ul>


<div id="pound-for-pound" class="accordion-tabs--item">
	<h2>Pound for Pound Mens Group</h2>
		<p>Connect with other Gen X men from across the Detroit Jewish community for unique networking and social events. A great way to meet new people, hang out with old friends and stay connected to the important work Federation is doing to keep our community strong.</p>
		<h4>Chairs: Geoff Kretchmer, Jim Ketai and Adam Cohen</h4>
		<h4>Recent Programs:</h4>
		<ul>
			<li>Arn Tellem (Detroit Pistons Vice Chairman) at John Varvatos Detroit</li>
			<li>Whiskey & Wisdom with Rabbi Josh Bennett & Rabbi Mike Moskowitz</li>
			<li>Detroit Axe Boys Night Out</li>
			<li>Mitch Albom at the DAC</li>
			<li>StockX’s Josh Luber at the Lisa Spindler Gallery</li>
			<li>Summer Social at Two James Spirits</li>
		</ul>
</div>

<div id="real-estate" class="accordion-tabs--item">
	<h2>Real Estate Group</h2>
	<p>Engage with other area Jewish real estate professionals to network, visit new and interesting Detroit sites/developments, hear from inspiring speakers and keep up to date on the role the Jewish Federation plays in building a better world and Detroit Jewish community.</p>
	<h4>Chair: Todd Sachse</h4>
	<h4>Recent Progams:</h4>
	<ul>
		<li>Kickoff with Bill Taubman at the home of Karen & Todd Sachse</li>
		<li>City Modern Hard Hat Tour & Reception at The Scott</li>
		<li>Shinola Hotel Tours & Bedrock Detroit Panel Discussion</li>
	</ul>
</div>

<div id="maimonides" class="accordion-tabs--item">
	<h2>Maimonides Society of Physicians</h2>
	<p>Our Maimonides Society connects physicians to one another, to the community and to Jewish philanthropy. You’ll join your colleagues for both social and educational events, leadership training, and overseas mission experiences for you and your spouse.</p>
	<h4>Chairs: Bill Goldstein & Lou Sobol</h4>
	
	<h4>Recent Progams:</h4>
	<ul>
		<li>Private evening at the Detroit Institute of Arts</li>
		<li>Cooking Night at Specialties Showroom</li>
		<li>Detroit Pistons Box Seats</li>
		<li>Summer Social at Bistro Joe’s</li>
		<li>An evening with Dr. Ofer Merin (Sharey Zedek Hospital Director in Jerusalem & IDF’s Chief of Field Hospitals)</li>
		<li>History Distilled at Two James Spirits</li>
		<li>Missions to Cuba, Morocco and Israel</li>
		<li>Annual Formal Lecture – featuring a nationally recognized medical speaker that attracts the broad community and offers CME credits for physicians.</li>
		<li>Forman Leadership Program – a yearlong program that cultivates the next generation of Maimonides Society leaders and culminates in a mission to Israel (Chairs: Ilana & Zachary Liss)</li>

	</ul>
</div>
<div id="debut" class="accordion-tabs--item">
	<h2>Debut</h2>
	<p>This series of quick sessions introduces women to the programs Jewish Federation, Women’s Philanthropy and the Detroit Jewish community have to offer. You’ll gain an understanding of our community to see what areas energize you the most to get involved.</p>
</div>
<div id="attorneys" class="accordion-tabs--item">
	<h2>Attorneys</h2>
	<p>Coming soon! Federation is pleased to announce plans to form a new affinity group for legal professionals. Open to attorneys and law students, this group will offer many learning and networking opportunities, including Continuing Legal Education courses exploring legal topics through a Jewish lens.</p>
</div>
</section>