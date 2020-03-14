<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');
	
	// register_nav_menus(array('primary' => 'Primary Navigation'));

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
		/*wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );*/

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.min.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}	
	
	//jQuery
	if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
	function my_jquery_enqueue() {
		wp_deregister_script('jquery');
		wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js", false, null);
		wp_enqueue_script('jquery');
	}
	
	require_once('aq_resizer.php');
	
	// Add more buttons (font size select, superscript text, subscript text) to the rich text editor (TinyMCE) in WordPress
	// $buttons is a variable of type array that contains default TinyMCE buttons for a particular row.
	// I use array_unshift() to add the additional buttons in front of all the other buttons in the row. If you want to achieve the complete opposite, use array_push().
	function register_additional_button($buttons) {
	   array_unshift($buttons, 'fontsizeselect');
	   return $buttons;
	}
	// Assigns register_additional_button() to "mce_buttons_2" filter
	add_filter('mce_buttons_2', 'register_additional_button');
		
	// Add custom text sizes in the font size drop down list of the rich text editor (TinyMCE) in WordPress
	// $initArray is a variable of type array that contains all default TinyMCE parameters.
	// Value 'theme_advanced_font_sizes' needs to be added, if an overwrite to the default font sizes in the list, is needed.
	function customize_text_sizes($initArray){
	   $initArray['theme_advanced_font_sizes'] = "10px,11px,12px,13px,14px,15px,16px,17px,18px,19px,20px,21px,22px,23px,24px,26px,28px,30px,36px,40px,75px";
	   return $initArray;
	}
	// Assigns customize_text_sizes() to "tiny_mce_before_init" filter
	add_filter('tiny_mce_before_init', 'customize_text_sizes');
	
	//Hide admin bar from Front
	add_filter( 'show_admin_bar', '__return_false' );
	
	//Remueve caracteres extraños de archivos subidos
	add_filter('sanitize_file_name', 'sa_sanitize_spanish_chars', 10);
	function sa_sanitize_spanish_chars ($filename) {
		return remove_accents( $filename );
	}
	
	//Add Menu to theme
	function register_my_menu() {
		register_nav_menu('header-menu',__( 'Header' ));
	}
	add_action( 'init', 'register_my_menu' );
	
	//Replace logo WP in Login page
	function my_custom_login_logo() {
		echo '<style type="text/css">
	        h1 a { background-image:url('.get_bloginfo('template_url').'/images/logo.png) !important; width: 144px !important; height: 164px !important; background-size: 144px 164px !important; margin: 0 auto !important; }
	    </style>';
	}
	add_action('login_head', 'my_custom_login_logo');
	
	//Disable all the updates notifications regarding plugins, themes & WordPress completely
	function remove_core_updates(){
		global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
	}
	add_filter('pre_site_transient_update_core','remove_core_updates');
	add_filter('pre_site_transient_update_plugins','remove_core_updates');
	add_filter('pre_site_transient_update_themes','remove_core_updates');
	
	//Add class to link in wp_nav_menu
	function add_menuclass($ulclass) {
		return preg_replace('/<a /', '<a class="callPageTransition"', $ulclass);
	}
	add_filter('wp_nav_menu','add_menuclass');
	
	