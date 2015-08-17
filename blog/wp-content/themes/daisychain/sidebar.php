<?php
/**
 * The sidebar template file.
 * @package DaisyChain
 * @since DaisyChain 1.0.0
*/
?>
<?php global $daisychain_options_db; ?>
<?php if ($daisychain_options_db['daisychain_display_sidebar'] != 'Hide') { ?>
<aside id="sidebar">
<?php if ( dynamic_sidebar( 'sidebar-1' ) ) : else : ?>
<?php endif; ?>
</aside> <!-- end of sidebar -->
<?php } ?>