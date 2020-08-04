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
}
// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
   add_action('acf/init', 'register_acf_block_types');
}

?>