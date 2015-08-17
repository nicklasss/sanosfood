<?php
/**
 * The WooCommerce pages template file.
 * @package DaisyChain
 * @since DaisyChain 1.0.0
*/
get_header(); ?>
    <div class="content-headline">
      <h1 class="entry-headline"><?php if ( !is_product() ) { woocommerce_page_title(); } else { the_title(); } ?></h1>
<?php daisychain_get_breadcrumb(); ?>
    </div>
    <div class="entry-content">
<?php woocommerce_content(); ?>
    </div>  
  </div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>