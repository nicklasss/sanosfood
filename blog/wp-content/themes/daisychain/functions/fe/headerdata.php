<?php
/**
 * Headerdata of Theme options.
 * @package DaisyChain
 * @since DaisyChain 1.0.0
*/  

// additional js and css
if(	!is_admin()){
function daisychain_fonts_include () {
global $daisychain_options_db;
// Google Fonts
$bodyfont = $daisychain_options_db['daisychain_body_google_fonts'];
$headingfont = $daisychain_options_db['daisychain_headings_google_fonts'];
$descriptionfont = $daisychain_options_db['daisychain_description_google_fonts'];
$headlinefont = $daisychain_options_db['daisychain_headline_google_fonts'];
$headlineboxfont = $daisychain_options_db['daisychain_headline_box_google_fonts'];
$postentryfont = $daisychain_options_db['daisychain_postentry_google_fonts'];
$sidebarfont = $daisychain_options_db['daisychain_sidebar_google_fonts'];
$menufont = $daisychain_options_db['daisychain_menu_google_fonts'];
$topmenufont = $daisychain_options_db['daisychain_top_menu_google_fonts'];

$fonturl = "//fonts.googleapis.com/css?family=";

$bodyfonturl = $fonturl.$bodyfont;
$headingfonturl = $fonturl.$headingfont;
$descriptionfonturl = $fonturl.$descriptionfont;
$headlinefonturl = $fonturl.$headlinefont;
$headlineboxfonturl = $fonturl.$headlineboxfont;
$postentryfonturl = $fonturl.$postentryfont;
$sidebarfonturl = $fonturl.$sidebarfont;
$menufonturl = $fonturl.$menufont;
$topmenufonturl = $fonturl.$topmenufont;
	// Google Fonts
     if ($bodyfont != 'default' && $bodyfont != ''){
      wp_enqueue_style('daisychain-google-font1', $bodyfonturl); 
		 }
     if ($headingfont != 'default' && $headingfont != ''){
      wp_enqueue_style('daisychain-google-font2', $headingfonturl);
		 }
     if ($descriptionfont != 'default' && $descriptionfont != ''){
      wp_enqueue_style('daisychain-google-font3', $descriptionfonturl);
		 }
     if ($headlinefont != 'default' && $headlinefont != ''){
      wp_enqueue_style('daisychain-google-font4', $headlinefonturl); 
		 }
     if ($postentryfont != 'default' && $postentryfont != ''){
      wp_enqueue_style('daisychain-google-font5', $postentryfonturl); 
		 }
     if ($sidebarfont != 'default' && $sidebarfont != ''){
      wp_enqueue_style('daisychain-google-font6', $sidebarfonturl);
		 }
     if ($menufont != 'default' && $menufont != ''){
      wp_enqueue_style('daisychain-google-font8', $menufonturl);
		 }
     if ($topmenufont != 'default' && $topmenufont != ''){
      wp_enqueue_style('daisychain-google-font9', $topmenufonturl);
		 }
     if ($headlineboxfont != 'default' && $headlineboxfont != ''){
      wp_enqueue_style('daisychain-google-font10', $headlineboxfonturl); 
		 }
}
add_action( 'wp_enqueue_scripts', 'daisychain_fonts_include' );
}

// additional js and css
function daisychain_css_include () {
global $daisychain_options_db;
		if ($daisychain_options_db['daisychain_css'] == 'Blue' ){
			wp_enqueue_style('daisychain-style-blue', get_template_directory_uri().'/css/blue.css');
		}

		if ($daisychain_options_db['daisychain_css'] == 'Sea-Green' ){
			wp_enqueue_style('daisychain-style-seagreen', get_template_directory_uri().'/css/seagreen.css');
		}
}
add_action( 'wp_enqueue_scripts', 'daisychain_css_include' );

// Background Pattern
function daisychain_display_background_pattern() {
global $daisychain_options_db;
    $display_background_pattern = $daisychain_options_db['daisychain_display_background_pattern']; 
		if ($display_background_pattern == 'Hide') { ?>
		<?php _e('html body { background-image: none; }', 'daisychain'); ?>
<?php } 
}

// Display sidebar
function daisychain_display_sidebar() {
global $daisychain_options_db;
    $display_sidebar = $daisychain_options_db['daisychain_display_sidebar']; 
		if ($display_sidebar == 'Hide') { ?>
		<?php _e('#wrapper #container #content { width: 956px; }', 'daisychain'); ?>
<?php } 
}

// Display header Search Form - header content width
function daisychain_display_search_form() {
global $daisychain_options_db;
    $display_search_form = $daisychain_options_db['daisychain_display_search_form']; 
		if ($display_search_form == 'Hide') { ?>
		<?php _e('#wrapper #header .header-content .site-title, #wrapper #header .header-content .site-description, #wrapper #header .header-content .header-logo { max-width: 100%; }', 'daisychain'); ?>
<?php } 
}

// Display Meta Box on posts - post entries styling
function daisychain_display_meta_post_entry() {
global $daisychain_options_db;
    $display_meta_post_entry = $daisychain_options_db['daisychain_display_meta_post']; 
		if ($display_meta_post_entry == 'Hide') { ?>
		<?php _e('#wrapper #main-content .post-entry .attachment-post-thumbnail { margin-bottom: 17px; } #wrapper #main-content .post-entry .post-entry-content { margin-bottom: -4px; }', 'daisychain'); ?>
<?php } 
}

// FONTS
// Body font
function daisychain_get_body_font() {
global $daisychain_options_db;
    $bodyfont = $daisychain_options_db['daisychain_body_google_fonts'];
    if ($bodyfont != 'default' && $bodyfont != '') { ?>
    <?php _e('html body, #wrapper blockquote, #wrapper q, #wrapper #container #comments .comment, #wrapper #container #comments .comment time, #wrapper #container #commentform .form-allowed-tags, #wrapper #container #commentform p, #wrapper input, #wrapper button, #wrapper select, #wrapper #content .breadcrumb-navigation, #wrapper #main-content .post-meta { font-family: "', 'daisychain'); ?><?php echo $bodyfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'daisychain'); ?>
<?php } 
}

// Site title font
function daisychain_get_headings_google_fonts() {
global $daisychain_options_db;
    $headingfont = $daisychain_options_db['daisychain_headings_google_fonts']; 
		if ($headingfont != 'default' && $headingfont != '') { ?>
		<?php _e('#wrapper #header .site-title { font-family: "', 'daisychain'); ?><?php echo $headingfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'daisychain'); ?>
<?php } 
}

// Site description font
function daisychain_get_description_font() {
global $daisychain_options_db;
    $descriptionfont = $daisychain_options_db['daisychain_description_google_fonts'];
    if ($descriptionfont != 'default' && $descriptionfont != '') { ?>
    <?php _e('#wrapper #header .site-description {font-family: "', 'daisychain'); ?><?php echo $descriptionfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'daisychain'); ?>
<?php } 
}

// Page/post headlines font
function daisychain_get_headlines_font() {
global $daisychain_options_db;
    $headlinefont = $daisychain_options_db['daisychain_headline_google_fonts'];
    if ($headlinefont != 'default' && $headlinefont != '') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper #container .navigation .section-heading { font-family: "', 'daisychain'); ?><?php echo $headlinefont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'daisychain'); ?>
<?php } 
}

// DaisyChain Posts Widgets headlines font
function daisychain_get_headline_box_google_fonts() {
global $daisychain_options_db;
    $headline_box_google_fonts = $daisychain_options_db['daisychain_headline_box_google_fonts']; 
		if ($headline_box_google_fonts != 'default' && $headline_box_google_fonts != '') { ?>
		<?php _e('#wrapper #container #main-content section .entry-headline { font-family: "', 'daisychain'); ?><?php echo $headline_box_google_fonts ?><?php _e('", Arial, Helvetica, sans-serif; }', 'daisychain'); ?>
<?php } 
}

// Post entry font
function daisychain_get_postentry_font() {
global $daisychain_options_db;
    $postentryfont = $daisychain_options_db['daisychain_postentry_google_fonts']; 
		if ($postentryfont != 'default' && $postentryfont != '') { ?>
		<?php _e('#wrapper #main-content .post-entry .post-entry-headline, #wrapper #main-content .slides li a, #wrapper #main-content .home-list-posts ul li a { font-family: "', 'daisychain'); ?><?php echo $postentryfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'daisychain'); ?>
<?php } 
}

// Sidebar and Footer widgets headlines font
function daisychain_get_sidebar_widget_font() {
global $daisychain_options_db;
    $sidebarfont = $daisychain_options_db['daisychain_sidebar_google_fonts'];
    if ($sidebarfont != 'default' && $sidebarfont != '') { ?>
		<?php _e('#wrapper #container #sidebar .sidebar-widget .sidebar-headline, #wrapper #wrapper-footer #footer .footer-widget .footer-headline { font-family: "', 'daisychain'); ?><?php echo $sidebarfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'daisychain'); ?>
<?php } 
}

// Main Header menu font
function daisychain_get_menu_font() {
global $daisychain_options_db;
    $menufont = $daisychain_options_db['daisychain_menu_google_fonts']; 
		if ($menufont != 'default' && $menufont != '') { ?>
		<?php _e('#wrapper #container .menu-box ul li a { font-family: "', 'daisychain'); ?><?php echo $menufont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'daisychain'); ?>
<?php } 
}

// Top Header menu font
function daisychain_get_top_menu_font() {
global $daisychain_options_db;
    $topmenufont = $daisychain_options_db['daisychain_top_menu_google_fonts']; 
		if ($topmenufont != 'default' && $topmenufont != '') { ?>
		<?php _e('#wrapper #top-navigation-wrapper .top-navigation ul li { font-family: "', 'daisychain'); ?><?php echo $topmenufont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'daisychain'); ?>
<?php } 
}

// User defined CSS.
function daisychain_get_own_css() {
global $daisychain_options_db;
    $own_css = $daisychain_options_db['daisychain_own_css']; 
		if ($own_css != '') { ?>
		<?php echo esc_attr($own_css); ?>
<?php } 
}

// Display custom CSS.
function daisychain_custom_styles() { ?>
<?php echo ("<style type='text/css'>"); ?>
<?php daisychain_get_own_css(); ?>
<?php daisychain_display_background_pattern(); ?>
<?php daisychain_display_sidebar(); ?>
<?php daisychain_display_search_form(); ?>
<?php daisychain_display_meta_post_entry(); ?>
<?php daisychain_get_body_font(); ?>
<?php daisychain_get_headings_google_fonts(); ?>
<?php daisychain_get_description_font(); ?>
<?php daisychain_get_headlines_font(); ?>
<?php daisychain_get_headline_box_google_fonts(); ?>
<?php daisychain_get_postentry_font(); ?>
<?php daisychain_get_sidebar_widget_font(); ?>
<?php daisychain_get_menu_font(); ?>
<?php daisychain_get_top_menu_font(); ?>
<?php echo ("</style>"); ?>
<?php
} 
add_action('wp_enqueue_scripts', 'daisychain_custom_styles');	?>