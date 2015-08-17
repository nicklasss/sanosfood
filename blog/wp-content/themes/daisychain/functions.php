<?php
/**
 * DaisyChain functions and definitions.
 * @package DaisyChain
 * @since DaisyChain 1.0.0
*/

/**
 * DaisyChain theme variables.
 *  
*/    
$daisychain_themename = "DaisyChain";			//Theme Name
$daisychain_themever = "1.1.1";									//Theme version
$daisychain_shortname = "daisychain";							//Shortname 
$daisychain_manualurl = get_template_directory_uri() . '/docs/documentation.html';	//Manual Url
// Set path to DaisyChain Framework and theme specific functions
$daisychain_be_path = get_template_directory() . '/functions/be/';									//BackEnd Path
$daisychain_fe_path = get_template_directory() . '/functions/fe/';									//FrontEnd Path 
$daisychain_be_pathimages = get_template_directory_uri() . '/functions/be/images';		//BackEnd Path
$daisychain_fe_pathimages = get_template_directory_uri() . '';	//FrontEnd Path
//Include Framework [BE]  
require_once ($daisychain_be_path . 'fw-options.php');	 	 // Framework Init  
// Include Theme specific functionality [FE] 
require_once ($daisychain_fe_path . 'headerdata.php');		 // Include css and js
require_once ($daisychain_fe_path . 'library.php');	       // Include library, functions
require_once ($daisychain_fe_path . 'widget-posts-default.php');// Posts-Default Widget

/**
 * DaisyChain theme basic setup.
 *  
*/
function daisychain_setup() {
	// Makes DaisyChain available for translation.
	load_theme_textdomain( 'daisychain', get_template_directory() . '/languages' );
  // This theme styles the visual editor to resemble the theme style.
  add_editor_style( 'editor-style.css' );
	// Adds RSS feed links to <head> for posts and comments.  
	add_theme_support( 'automatic-feed-links' );
	// This theme supports custom background color and image.
	$defaults = array(
	'default-color' => '', 
  'default-image' => '',
	'wp-head-callback' => '_custom_background_cb',
	'admin-head-callback' => '',
	'admin-preview-callback' => '' );  
  add_theme_support( 'custom-background', $defaults );
	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 956, 9999 );
  // This theme uses a custom header background image.
  $args = array(
	'width' => 1012,
  'flex-width' => true,
  'flex-height' => true,
  'header-text' => false,
  'random-default' => true,);
  add_theme_support( 'custom-header', $args );
  add_theme_support( 'title-tag' );
  add_theme_support( 'woocommerce' );
  global $content_width;
  if ( ! isset( $content_width ) ) { $content_width = 628; }
}
add_action( 'after_setup_theme', 'daisychain_setup' );

/**
 * Enqueues scripts and styles for front-end.
 *
*/
function daisychain_scripts_styles() {
	global $wp_styles, $wp_scripts;
	// Adds JavaScript
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
    wp_enqueue_script( 'daisychain-placeholders', get_template_directory_uri() . '/js/placeholders.js', array(), '3.0.2', true );
    wp_enqueue_script( 'daisychain-scroll-to-top', get_template_directory_uri() . '/js/scroll-to-top.js', array( 'jquery' ), '1.0', true );
    if ( !is_page_template('template-landing-page.php') ) {
    wp_enqueue_script( 'daisychain-menubox', get_template_directory_uri() . '/js/menubox.js', array(), '1.0', true ); }
    wp_enqueue_script( 'daisychain-selectnav', get_template_directory_uri() . '/js/selectnav.js', array(), '0.1', true );
    wp_enqueue_script( 'daisychain-responsive', get_template_directory_uri() . '/js/responsive.js', array(), '1.0', true );
    wp_enqueue_script( 'daisychain-html5-ie', get_template_directory_uri() . '/js/html5.js', array(), '3.6', false );
    $wp_scripts->add_data( 'daisychain-html5-ie', 'conditional', 'lt IE 9' );
	// Loads the main stylesheet.
	  wp_enqueue_style( 'daisychain-style', get_stylesheet_uri() );
    wp_enqueue_style( 'daisychain-google-font-default', '//fonts.googleapis.com/css?family=Oswald&amp;subset=latin,latin-ext' );
    if ( class_exists( 'woocommerce' ) ) { wp_enqueue_style( 'daisychain-woocommerce-custom', get_template_directory_uri() . '/css/woocommerce-custom.css' ); }
}
add_action( 'wp_enqueue_scripts', 'daisychain_scripts_styles' );

/**
 * Backwards compatibility for older WordPress versions which do not support the Title Tag feature.
 *  
*/
if ( ! function_exists( '_wp_render_title_tag' ) ) {
function daisychain_wp_title( $title, $sep ) {
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	return $title;
}
add_filter( 'wp_title', 'daisychain_wp_title', 10, 2 );
}

/**
 * Register our menus.
 *
 */
function daisychain_register_my_menus() {
  register_nav_menus(
    array(
      'main-navigation' => __( 'Main Header Menu', 'daisychain' ),
      'top-navigation' => __( 'Top Header Menu', 'daisychain' )
    )
  );
}
add_action( 'after_setup_theme', 'daisychain_register_my_menus' );

/**
 * Register our sidebars and widgetized areas.
 *
*/
function daisychain_widgets_init() {
  register_sidebar( array(
		'name' => __( 'Right Sidebar', 'daisychain' ),
		'id' => 'sidebar-1',
		'description' => __( 'Right sidebar which appears on all posts and pages.', 'daisychain' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => ' <p class="sidebar-headline"><span class="sidebar-headline-text">',
		'after_title' => '</span></p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer left widget area', 'daisychain' ),
		'id' => 'sidebar-2',
		'description' => __( 'Left column with widgets in footer.', 'daisychain' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline"><span class="footer-headline-text">',
		'after_title' => '</span></p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer middle widget area', 'daisychain' ),
		'id' => 'sidebar-3',
		'description' => __( 'Middle column with widgets in footer.', 'daisychain' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline"><span class="footer-headline-text">',
		'after_title' => '</span></p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer right widget area', 'daisychain' ),
		'id' => 'sidebar-4',
		'description' => __( 'Right column with widgets in footer.', 'daisychain' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline"><span class="footer-headline-text">',
		'after_title' => '</span></p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer notices', 'daisychain' ),
		'id' => 'sidebar-5',
		'description' => __( 'The line for copyright and other notices below the footer widget areas. Insert here one Text widget. The "Title" field at this widget should stay empty.', 'daisychain' ),
		'before_widget' => '<div class="footer-signature"><div class="footer-signature-content">',
		'after_widget' => '</div></div>',
		'before_title' => '',
		'after_title' => '',
	) );
  register_sidebar( array(
		'name' => __( 'Latest Posts Homepage widget area', 'daisychain' ),
		'id' => 'sidebar-6',
		'description' => __( 'The area for any DaisyChain Posts Widgets, which displays latest posts from a specific category below the default Latest Posts area.', 'daisychain' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}
add_action( 'widgets_init', 'daisychain_widgets_init' );

/**
 * Post excerpt settings.
 *
*/
function daisychain_custom_excerpt_length( $length ) {
return 40;
}
add_filter( 'excerpt_length', 'daisychain_custom_excerpt_length', 20 );
function daisychain_new_excerpt_more( $more ) {
global $post;
return '...<br /><a class="read-more-button" href="'. esc_url( get_permalink($post->ID) ) . '">' . __( 'Read more', 'daisychain' ) . '</a>';}
add_filter( 'excerpt_more', 'daisychain_new_excerpt_more' );

if ( ! function_exists( 'daisychain_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
*/
function daisychain_content_nav( $html_id ) {
	global $wp_query;
	$html_id = esc_attr( $html_id );
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div id="<?php echo $html_id; ?>" class="navigation" role="navigation">
    <div class="navigation-inner">
			<h2 class="navigation-headline section-heading"><?php _e( 'Post navigation', 'daisychain' ); ?></h2>
      <div class="nav-wrapper">
			 <p class="navigation-links">
<?php $big = 999999999;
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
  'prev_text' => __( '&larr; Previous', 'daisychain' ),
	'next_text' => __( 'Next &rarr;', 'daisychain' ),
	'total' => $wp_query->max_num_pages,
	'add_args' => false
) );
?>
        </p>
      </div>
		</div>
    </div>
	<?php endif;
}
endif;

/**
 * Displays navigation to next/previous posts on single posts pages.
 *
*/
function daisychain_prev_next($nav_id) { ?>
<?php $daisychain_previous_post = get_adjacent_post( false, "", true );
$daisychain_next_post = get_adjacent_post( false, "", false ); ?>
<div id="<?php echo $nav_id; ?>" class="navigation" role="navigation">
	<div class="nav-wrapper">
<?php if ( !empty($daisychain_previous_post) ) { ?>
  <p class="nav-previous"><a href="<?php echo esc_url(get_permalink($daisychain_previous_post->ID)); ?>" title="<?php echo esc_attr($daisychain_previous_post->post_title); ?>"><?php _e( '&larr; Previous post', 'daisychain' ); ?></a></p>
<?php } if ( !empty($daisychain_next_post) ) { ?>
	<p class="nav-next"><a href="<?php echo esc_url(get_permalink($daisychain_next_post->ID)); ?>" title="<?php echo esc_attr($daisychain_next_post->post_title); ?>"><?php _e( 'Next post &rarr;', 'daisychain' ); ?></a></p>
<?php } ?>
   </div>
</div>
<?php } 

if ( ! function_exists( 'daisychain_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
*/
function daisychain_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'daisychain' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'daisychain' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<span><b class="fn">%1$s</b> %2$s</span>',
						get_comment_author_link(),
						( $comment->user_id === $post->post_author ) ? '<span>' . __( '(Post author)', 'daisychain' ) . '</span>' : ''
					);
					printf( '<time datetime="%2$s">%3$s</time>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						// translators: 1: date, 2: time
						sprintf( __( '%1$s at %2$s', 'daisychain' ), get_comment_date(''), get_comment_time() )
					);
				?>
			</div><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'daisychain' ); ?></p>
			<?php endif; ?>

			<div class="comment-content comment">
				<?php comment_text(); ?>
			 <div class="reply">
			   <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'daisychain' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
			   <?php edit_comment_link( __( 'Edit', 'daisychain' ), '<p class="edit-link">', '</p>' ); ?>
			</div><!-- .comment-content -->
		</div><!-- #comment-## -->
	<?php
		break;
	endswitch;
}
endif;

/**
 * Function for adding custom classes to the menu objects.
 *
*/
add_filter( 'wp_nav_menu_objects', 'daisychain_filter_menu_class', 10, 2 );
function daisychain_filter_menu_class( $objects, $args ) {

    $ids        = array();
    $parent_ids = array();
    $top_ids    = array();
    foreach ( $objects as $i => $object ) {

        if ( 0 == $object->menu_item_parent ) {
            $top_ids[$i] = $object;
            continue;
        }
 
        if ( ! in_array( $object->menu_item_parent, $ids ) ) {
            $objects[$i]->classes[] = 'first-menu-item';
            $ids[]          = $object->menu_item_parent;
        }
 
        if ( in_array( 'first-menu-item', $object->classes ) )
            continue;
 
        $parent_ids[$i] = $object->menu_item_parent;
    }
 
    $sanitized_parent_ids = array_unique( array_reverse( $parent_ids, true ) );
 
    foreach ( $sanitized_parent_ids as $i => $id )
        $objects[$i]->classes[] = 'last-menu-item';
 
    return $objects; 
}

/**
 * Function for rendering CSS3 features in IE.
 *
*/
add_filter( 'wp_head' , 'daisychain_pie' );
function daisychain_pie() { ?>
<!--[if IE]>
<style type="text/css" media="screen">
#main-content-inner, .menu-box {
        behavior: url("<?php echo get_template_directory_uri() . '/css/pie/PIE.php'; ?>");
        zoom: 1;
}
</style>
<![endif]-->
<?php }

/**
 * Include the TGM_Plugin_Activation class.
 *  
*/
if ( current_user_can ( 'install_plugins' ) ) {
require_once get_template_directory() . '/class-tgm-plugin-activation.php'; 
add_action( 'tgmpa_register', 'daisychain_my_theme_register_required_plugins' );

function daisychain_my_theme_register_required_plugins() {

$plugins = array(
		array(
			'name'     => 'Breadcrumb NavXT',
			'slug'     => 'breadcrumb-navxt',
			'required' => false,
		),
); 
 
$config = array(
		'domain'       => 'daisychain',
    'menu'         => 'install-my-theme-plugins',
		'strings'    	 => array(
		'page_title'             => __( 'Install Recommended Plugins', 'daisychain' ),
		'menu_title'             => __( 'Install Plugins', 'daisychain' ),
		'instructions_install'   => __( 'The %1$s plugin is required for this theme. Click on the big blue button below to install and activate %1$s.', 'daisychain' ),
		'instructions_activate'  => __( 'The %1$s is installed but currently inactive. Please go to the <a href="%2$s">plugin administration page</a> page to activate it.', 'daisychain' ),
		'button'                 => __( 'Install %s Now', 'daisychain' ),
		'installing'             => __( 'Installing Plugin: %s', 'daisychain' ),
		'oops'                   => __( 'Something went wrong with the plugin API.', 'daisychain' ), // */
		'notice_can_install'     => __( 'This theme requires the %1$s plugin. <a href="%2$s"><strong>Click here to begin the installation process</strong></a>. You may be asked for FTP credentials based on your server setup.', 'daisychain' ),
		'notice_cannot_install'  => __( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'daisychain' ),
		'notice_can_activate'    => __( 'This theme requires the %1$s plugin. That plugin is currently inactive, so please go to the <a href="%2$s">plugin administration page</a> to activate it.', 'daisychain' ),
		'notice_cannot_activate' => __( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'daisychain' ),
		'return'                 => __( 'Return to Recommended Plugins Installer', 'daisychain' ),
),
); 
daisychain_tgmpa( $plugins, $config ); 
}}

/**
 * WooCommerce custom template modifications.
 *  
*/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
function daisychain_woocommerce_modifications() {
  remove_action ( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 ); 
}  
add_action ( 'init', 'daisychain_woocommerce_modifications' );
add_filter ( 'woocommerce_show_page_title', '__return_false' );
} ?>