<?php 
/**
 * Library of Theme options functions.
 * @package DaisyChain
 * @since DaisyChain 1.0.0
*/

// Display Breadcrumb navigation
function daisychain_get_breadcrumb() { 
global $daisychain_options_db;
		if ($daisychain_options_db['daisychain_display_breadcrumb'] != 'Hide') { ?>
<?php if (function_exists( 'bcn_display' ) && !is_front_page()){ _e('<p class="breadcrumb-navigation">', 'daisychain'); ?><?php bcn_display(); ?><?php _e('</p>', 'daisychain');} ?>
<?php } 
} 

// Display featured images on single posts
function daisychain_get_display_image_post() { 
global $daisychain_options_db;
		if ($daisychain_options_db['daisychain_display_image_post'] == '' || $daisychain_options_db['daisychain_display_image_post'] == 'Display') { ?>
<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
<?php } 
}

// Display featured images on pages
function daisychain_get_display_image_page() { 
global $daisychain_options_db;
		if ($daisychain_options_db['daisychain_display_image_page'] == '' || $daisychain_options_db['daisychain_display_image_page'] == 'Display') { ?>
<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
<?php } 
} ?>