<?php
/**
 * The footer template file.
 * @package DaisyChain
 * @since DaisyChain 1.0.0
*/
?>
   <div class="line-bottom"></div>
  </div> <!-- end of main-content-inner -->
  </div> <!-- end of main-content -->
  </div> <!-- end of container -->
  <footer id="wrapper-footer">
<?php if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-4' ) ) { ?>
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
    <div id="footer">
      <div class="footer-widget-area footer-widget-area-1">
<?php dynamic_sidebar( 'sidebar-2' ); ?>
      </div>    
      <div class="footer-widget-area footer-widget-area-2">
<?php dynamic_sidebar( 'sidebar-3' ); ?>
      </div>   
      <div class="footer-widget-area footer-widget-area-3">
<?php dynamic_sidebar( 'sidebar-4' ); ?>
      </div>
    </div>
<?php }} ?>
<?php if ( dynamic_sidebar( 'sidebar-5' ) ) : else : ?>
<?php endif; ?>
  </footer>  <!-- end of wrapper-footer -->
<?php wp_footer(); ?>        
</body>
</html>