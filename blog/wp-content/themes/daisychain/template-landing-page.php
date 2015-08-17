<?php
/**
 * Template Name: Landing Page
 * The template file for displaying a landing page without the menus, right sidebar and footer widget areas.
 * @package DaisyChain
 * @since DaisyChain 1.0.0
*/
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="content-headline">
      <h1 class="entry-headline"><?php the_title(); ?></h1>
    </div>
<?php daisychain_get_display_image_page(); ?>
    <div class="entry-content">
<?php the_content(); ?>
<?php edit_post_link( __( 'Edit', 'daisychain' ), '<p>', '</p>' ); ?>
<?php endwhile; endif; ?>
    </div>  
  </div> <!-- end of content -->
<?php get_footer(); ?>