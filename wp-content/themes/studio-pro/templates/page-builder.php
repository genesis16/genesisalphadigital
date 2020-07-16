<?php
/**
 * Studio Pro
 *
 * Template Name: Page Builder
 *
 * @package   SeoThemes\StudioPro
 * @link      https://seothemes.com/themes/studio-pro
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Remove default page header.
remove_action( 'genesis_before_content_sidebar_wrap', 'studio_hero_section' );

// Remove before footer widget area.
remove_action( 'genesis_before_footer_wrap', 'studio_before_footer_widget_area', 0 );

// Get site-header.
get_header();

// Custom loop, remove all hooks except entry content.
if ( have_posts() ) :
	the_post();
	do_action( 'genesis_entry_content' );
endif;

// Get site-footer.
get_footer();
