<?php
/**
 * JFMD ACF Custom Block functionality
 *
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0.0
 */

/**
 * Prevent switching to Twenty Nineteen on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Twenty Nineteen 1.0.0
 */

function register_acf_block_types() {
   // register a testimonial block.
	acf_register_block_type(array(
      'name'              => 'expand-collapse',
      'title'             => __('Expand/Collapse'),
      'description'       => __('A custom expand/collapse block.'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/expand-collapse/expand-collapse.php',
      'category'          => 'common',
      'icon'              => 'heart',
	  'mode'			  => 'edit',
      'keywords'          => array( 'expand', 'collapse' )
   ));
	acf_register_block_type(array(
      'name'              => 'front-page-intro-panel',
      'title'             => __('Front Page Intro Panel'),
      'description'       => __('A front page panel block.'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/front-page-intro-panel/front-page-intro-panel.php',
      'category'          => 'common',
      'icon'              => 'admin-comments',
	  'mode'			  => 'edit',
      'keywords'          => array( 'intro', 'panel', 'front' )
   ));
	acf_register_block_type(array(
      'name'              => 'info-content',
      'title'             => __('Information Content Block'),
      'description'       => __('A content block with a heading and WYSIWYG Editor.'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/info-content-block/info-content-block.php',
      'category'          => 'common',
      'icon'              => 'admin-comments',
	  'mode'			  => 'edit',
      'keywords'          => array( 'emergency', 'content', 'info' )
   ));
	acf_register_block_type(array(
      'name'              => 'content-slider',
      'title'             => __('Content Slider'),
      'description'       => __('A content slider block.'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/content-slider/content-slider.php',
      'category'          => 'common',
      'icon'              => 'admin-comments',
	  'mode'			  => 'edit',
      'keywords'          => array( 'content', 'slider' )
   ));
	acf_register_block_type(array(
      'name'              => 'simple-content-block',
      'title'             => __('Simple Content Block'),
      'description'       => __('A simple content block.'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/simple-content-block/simple-content-block.php',
      'category'          => 'common',
      'icon'              => 'admin-comments',
	  'mode'			  => 'edit',
      'keywords'          => array( 'content', 'simple' )
   ));	
	acf_register_block_type(array(
      'name'              => 'accordion-tabs',
      'title'             => __('Accordion Tabs'),
      'description'       => __('An accordion tab block.'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/accordion-tabs/accordion-tabs.php',
      'category'          => 'common',
      'icon'              => 'portfolio',
	  'mode'			  => 'edit',
      'keywords'          => array( 'accordion', 'tabs' )
   ));	
	acf_register_block_type(array(
      'name'              => 'donation-block',
      'title'             => __('Donation Block'),
      'description'       => __('A mini-donation block.'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/donation-block/donation-block.php',
      'category'          => 'common',
      'icon'              => 'heart',
	  'mode'			  => 'edit',
      'keywords'          => array( 'donation', 'donate' )
   ));
	acf_register_block_type(array(
      'name'              => 'internal-block',
      'title'             => __('Internal Content Block'),
      'description'       => __('An internal content block.'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/internal-block/internal-block.php',
      'category'          => 'common',
      'icon'              => 'media-text',
	  'mode'			  => 'edit',
      'keywords'          => array( 'internal', 'content' )
   ));	
	acf_register_block_type(array(
      'name'              => 'staff',
      'title'             => __('Staff'),
      'description'       => __('A custom staff block.'),
      'render_template'   => 'template-parts/blocks/staff/staff.php',
      'category'          => 'common',
      'icon'              => 'admin-users',
	  'mode'			  => 'edit',
      'keywords'          => array( 'staff', 'staff' )
   ));
	acf_register_block_type(array(
      'name'              => 'postgrid',
      'title'             => __('Post Grid'),
      'description'       => __('A custom block displaying Custom Posts in Grid.'),
      'render_template'   => 'template-parts/blocks/post-grid/post-grid.php',
      'category'          => 'common',
      'icon'              => 'admin-users',
	  'mode'			  => 'edit',
      'keywords'          => array( 'post', 'post' )
   ));	
	acf_register_block_type(array(
      'name'              => 'showacf',
      'title'             => __('Show ACF Custom Fields'),
      'description'       => __('A custom block showing ACF Fields in Body'),
      'render_template'   => 'template-parts/blocks/showacf/showacf.php',
      'category'          => 'common',
      'icon'              => 'admin-users',
	  'mode'			  => 'edit',
      'keywords'          => array( 'acf', 'custom' )
   ));	
	acf_register_block_type(array(
      'name'              => 'event-chairs',
      'title'             => __('Event Chairs'),
      'description'       => __('An event chair block for events.'),
      'render_template'   => 'template-parts/blocks/event-chairs/event-chairs.php',
      'category'          => 'common',
      'icon'              => 'admin-users',
	  'mode'			  => 'edit',
	  'align' 			  => array( 'left', 'right', 'full' ),
      'keywords'          => array( 'chairs', 'events' )
   ));
	acf_register_block_type(array(
      'name'              => 'image-slider',
      'title'             => __('Image Slider'),
      'description'       => __('An image slider block.'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/image-slider/image-slider.php',
      'category'          => 'common',
      'icon'              => 'heart',
	  'mode'			  => 'edit',
      'keywords'          => array( 'image', 'slider' )
   ));
	acf_register_block_type(array(
      'name'              => 'section-open',
      'title'             => __('Section Open'),
      'description'       => __('A block to open a section.'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/section-open/section-open.php',
      'category'          => 'common',
      'icon'              => 'heart',
	  'mode'			  => 'edit',
      'keywords'          => array( 'section', 'open' )
   ));
	acf_register_block_type(array(
      'name'              => 'section-close',
      'title'             => __('Section Close'),
      'description'       => __('A block to close a section.'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/section-close/section-close.php',
      'category'          => 'common',
      'icon'              => 'heart',
	  'mode'			  => 'edit',
      'keywords'          => array( 'section', 'close' )
   ));
	acf_register_block_type(array(
      'name'              => 'jfmd-recent-posts',
      'title'             => __('JFMD Recent Posts'),
      'description'       => __('A recent posts block with excerpt'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/jfmd-recent-posts/jfmd-recent-posts.php',
      'category'          => 'common',
      'icon'              => 'format-aside',
	  'mode'			  => 'edit',
      'keywords'          => array( 'recent', 'posts' )
   ));	
	acf_register_block_type(array(
      'name'              => 'staff-campaign-totals',
      'title'             => __('Staff Campaign Total'),
      'description'       => __('A block with overall dollar amount collected and individual totals'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/staff-campaign-totals/staff-campaign-totals.php',
      'category'          => 'common',
      'icon'              => 'megaphone',
	  'mode'			  => 'edit',
      'keywords'          => array( 'staff', 'campaign', 'totals' )
   ));
	acf_register_block_type(array(
      'name'              => 'staff-campaign-prizes',
      'title'             => __('Staff Campaign Prizes'),
      'description'       => __('A block with that tracks prizes for individuals in the Staff Campaign'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/staff-campaign-prizes/staff-campaign-prizes.php',
      'category'          => 'common',
      'icon'              => 'buddicons-groups',
	  'mode'			  => 'edit',
      'keywords'          => array( 'staff', 'campaign', 'prizes' )
   ));
	acf_register_block_type(array(
      'name'              => 'product-page',
      'title'             => __('Single Product Block'),
      'description'       => __('A product block to go within a WordPress page.'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/product-page/product-page.php',
      'category'          => 'common',
      'icon'              => 'cart',
	  'mode'			  => 'edit',
      'keywords'          => array( 'product', 'shop', 'commerce' )
   ));
	acf_register_block_type(array(
      'name'              => 'page-title',
      'title'             => __('Page Title Block'),
      'description'       => __('A block to show the page title wherever you want in a page.'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/page-title/page-title.php',
      'category'          => 'common',
      'icon'              => 'megaphone',
	  'mode'			  => 'edit',
      'keywords'          => array( 'page', 'title' )
   ));
	acf_register_block_type(array(
      'name'              => 'mission-info',
      'title'             => __('Mission Info Block'),
      'description'       => __('A block that contains mission name, dates and costs'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/mission-info/mission-info.php',
      'category'          => 'common',
      'icon'              => 'portfolio',
	  'mode'			  => 'edit',
      'keywords'          => array( 'mission' )
   ));	
}
// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
   add_action('acf/init', 'register_acf_block_types');
}

?>