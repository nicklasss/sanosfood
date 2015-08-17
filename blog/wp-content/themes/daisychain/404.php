<?php
/**
 * The 404 page (Not Found) template file.
 * @package DaisyChain
 * @since DaisyChain 1.0.0
*/
get_header(); ?>
    <div class="content-headline">
      <h1 class="entry-headline"><?php _e( 'Nothing Found', 'daisychain' ); ?></h1>
<?php daisychain_get_breadcrumb(); ?>
    </div>
    <div class="entry-content">
      <p><?php _e( 'Apologies, but no results were found for your request. Perhaps searching will help you to find a related content.', 'daisychain' ); ?></p>
<?php get_search_form(); ?>
    </div>  
  </div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>