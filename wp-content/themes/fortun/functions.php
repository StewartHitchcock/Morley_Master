<?php
add_action('after_setup_theme', 'fortun_bunch_theme_setup');
function fortun_bunch_theme_setup()
{
	global $wp_version;
	if(!defined('FORTUN_VERSION')) define('FORTUN_VERSION', '1.0');
	if( !defined( 'FORTUN_ROOT' ) ) define('FORTUN_ROOT', get_template_directory().'/');
	if( !defined( 'FORTUN_URL' ) ) define('FORTUN_URL', get_template_directory_uri().'/');	
	if( !defined( 'KC_LICENSE' ) ) define('KC_LICENSE', 'twrvqysv-51mw-zgsz-8scg-e03y-7cawas6y3vji');
	include_once get_template_directory() . '/includes/loader.php';
	
	
	load_theme_textdomain('fortun', get_template_directory() . '/languages');
	
	//ADD THUMBNAIL SUPPORT
	add_theme_support('post-thumbnails');
	add_theme_support('woocommerce');
	add_theme_support('automatic-feed-links'); //Enables post and comment RSS feed links to head.
	add_theme_support('widgets'); //Add widgets and sidebar support
	add_theme_support( "title-tag" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	/** Register wp_nav_menus */
	if(function_exists('register_nav_menu'))
	{
		register_nav_menus(
			array(
				/** Register Main Menu location header */
				'main_menu' => esc_html__('Main Menu', 'fortun'),
				'footer_menu' => esc_html__('Footer Menu', 'fortun'),
			)
		);
	}
	if ( ! isset( $content_width ) ) $content_width = 960;
	add_image_size( 'fortun_90x90', 90, 90, true ); // 'fortun_90x90 Latest News Widget'
	add_image_size( 'fortun_370x250', 370, 250, true ); // 'fortun_370x250 Why Choose'
	add_image_size( 'fortun_80x80', 80, 80, true ); // 'fortun_80x80 Our Testimonials'
	add_image_size( 'fortun_270x221', 270, 221, true ); // 'fortun_270x221 Latest Projects'
	add_image_size( 'fortun_370x200', 370, 200, true ); // 'fortun_370x200 Our Blog / Services Grid / Blog Grid'
	add_image_size( 'fortun_270x235', 270, 235, true ); // 'fortun_270x235 Our Team'
	add_image_size( 'fortun_85x85', 85, 85, true ); // 'fortun_85x85 Our Testimonials 2'
	add_image_size( 'fortun_360x220', 360, 220, true ); // 'fortun_360x220 Our Projects'
	add_image_size( 'fortun_770x420', 770, 420, true ); // 'fortun_770x420 Blog Archive / Blog Single'
	add_image_size( 'fortun_67x64', 67, 64, true ); // 'fortun_67x64 Support Support Agent'
	
}

function fortun_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'fortun' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'fortun' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'fortun' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'fortun' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'fortun' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'fortun' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'fortun' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'fortun' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'fortun' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'fortun_gutenberg_editor_palette_styles' );

function fortun_bunch_widget_init()
{
	global $wp_registered_sidebars;
	$theme_options = _WSH()->option();

	register_sidebar(array(
	  'name' => esc_html__( 'Default Sidebar', 'fortun' ),
	  'id' => 'default-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'fortun' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="inner-title"><h4>',
	  'after_title' => '</h4></div>'
	));
	register_sidebar(array(
	  'name' => esc_html__( 'Footer Sidebar', 'fortun' ),
	  'id' => 'footer-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown in Footer Area.', 'fortun' ),
	  'before_widget'=>'<div class="footer-column col-md-3 col-sm-3 col-xs-12"><div id="%1$s"  class="footer-widget %2$s">',
	  'after_widget'=>'</div></div>',
	  'before_title' => '<h3>',
	  'after_title' => '</h3>'
	));
	
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'fortun' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'fortun' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="inner-title"><h4>',
	  'after_title' => '</h4></div>'
	));
	if( !is_object( _WSH() )  )  return;
	$sidebars = fortun_set(fortun_set( $theme_options, 'dynamic_sidebar' ) , 'dynamic_sidebar' ); 
	foreach( array_filter((array)$sidebars) as $sidebar)
	{
		if(fortun_set($sidebar , 'topcopy')) continue ;
		
		$name = fortun_set( $sidebar, 'sidebar_name' );
		
		if( ! $name ) continue;
		$slug = fortun_bunch_slug( $name ) ;
		
		register_sidebar( array(
			'name' => $name,
			'id' =>  sanitize_title( $slug ) ,
			'before_widget' => '<div id="%1$s" class="service-sidebar widget %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		) );		
	}
	
	update_option('wp_registered_sidebars' , $wp_registered_sidebars) ;
}
add_action( 'widgets_init', 'fortun_bunch_widget_init' );
// Update items in cart via AJAX
function fortun_load_head_scripts() {
	$options = _WSH()->option();
    if ( !is_admin() ) {
		$protocol = is_ssl() ? 'https://' : 'http://';
		if(fortun_set($options, 'map_api_key')){
		$map_path = '?key='.fortun_set($options, 'map_api_key');
		wp_enqueue_script( 'map_api', ''.$protocol.'maps.google.com/maps/api/js'.$map_path, array(), false, false );
		wp_enqueue_script( 'gmap', get_template_directory_uri().'/js/gmap.js', array(), false, false );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'fortun_load_head_scripts' );
//global variables
function fortun_bunch_global_variable() {
    global $wp_query;
}

function fortun_enqueue_scripts() {
	$theme_options = _WSH()->option();
	$maincolor = str_replace( '#', '' , fortun_set( $theme_options, 'main_color_scheme', '#48c7ec' ) );
    //styles
	wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap-select', get_template_directory_uri() . '/css/bootstrap-select.min.css' );
	wp_enqueue_style( 'bootstrap-touchspin', get_template_directory_uri() . '/css/jquery.bootstrap-touchspin.css' );
	wp_enqueue_style( 'gui', 'http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css' );
	wp_enqueue_style( 'fontawesom', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/css/flaticon.css' );
	wp_enqueue_style( 'icomoon', get_template_directory_uri() . '/css/icomoon.css' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
	wp_enqueue_style( 'jquery-bxslider', get_template_directory_uri() . '/css/jquery.bxslider.css' );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css' );
	wp_enqueue_style( 'polyglot-language-switcher', get_template_directory_uri() . '/css/polyglot-language-switcher.css' );
	wp_enqueue_style( 'animate-min', get_template_directory_uri() . '/css/animate.min.css' );
	wp_enqueue_style( 'nouislider', get_template_directory_uri() . '/css/nouislider.css' );
	wp_enqueue_style( 'nouislider.pips', get_template_directory_uri() . '/css/nouislider.pips.css' );
	wp_enqueue_style( 'menuzord', get_template_directory_uri() . '/css/menuzord.css' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css' );
	wp_enqueue_style( 'fortun_main-style', get_stylesheet_uri() );
	wp_enqueue_style( 'fortun_custom-style', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'fortun-gutenberg', get_template_directory_uri() . '/css/gutenberg.css' );
	wp_enqueue_style( 'fortun_responsive', get_template_directory_uri() . '/css/responsive.css' );
	if(class_exists('woocommerce')) wp_enqueue_style( 'fortun_woocommerce', get_template_directory_uri() . '/css/woocommerce.css' );
	wp_enqueue_style( 'fortun-main-color', get_template_directory_uri() . '/css/color.php?main_color='.$maincolor );
	wp_enqueue_style( 'fortun-color-panel', get_template_directory_uri() . '/css/color-panel.css' );
	
	
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'gui_script', 'http://code.jquery.com/ui/1.11.4/jquery-ui.js', array(), false, true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), false, true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/js/owl.carousel.min.js', array(), false, true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/js/wow.js', array(), false, true );
	wp_enqueue_script( 'jquery-mixitup', get_template_directory_uri().'/js/jquery.mixitup.min.js', array(), false, true );
	wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri().'/js/jquery.fitvids.js', array(), false, true );
	wp_enqueue_script( 'bootstrap-select', get_template_directory_uri().'/js/bootstrap-select.min.js', array(), false, true );
	wp_enqueue_script( 'menuzord', get_template_directory_uri().'/js/menuzord.js', array(), false, true );
	wp_enqueue_script( 'fancybox.pack', get_template_directory_uri().'/js/jquery.fancybox.pack.js', array(), false, true );
	wp_enqueue_script( 'jquery-polyglot', get_template_directory_uri().'/js/jquery.polyglot.language.switcher.js', array(), false, true );
	wp_enqueue_script( 'nouislider', get_template_directory_uri().'/js/nouislider.js', array(), false, true );
	wp_enqueue_script( 'bootstrap-touchspin', get_template_directory_uri().'/js/jquery.bootstrap-touchspin.js', array(), false, true );
	wp_enqueue_script( 'SmoothScroll', get_template_directory_uri().'/js/SmoothScroll.js', array(), false, true );
	wp_enqueue_script( 'jquery-appear', get_template_directory_uri().'/js/jquery.appear.js', array(), false, true );
	wp_enqueue_script( 'jquery-countTo', get_template_directory_uri().'/js/jquery.countTo.js', array(), false, true );
	wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri().'/js/jquery.flexslider.js', array(), false, true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri().'/js/jquery.magnific-popup.min.js', array(), false, true );
	wp_enqueue_script( 'isotope', get_template_directory_uri().'/js/isotope.js', array(), false, true );
	wp_enqueue_script( 'imagezoom', get_template_directory_uri().'/js/imagezoom.js', array(), false, true );
	wp_enqueue_script( 'jflickrfeed', get_template_directory_uri().'/js/jflickrfeed.min.js', array(), false, true );
	wp_enqueue_script( 'default-map', get_template_directory_uri().'/js/default-map.js', array(), false, true );
	wp_enqueue_script( 'fortun_main_script', get_template_directory_uri().'/js/custom.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
	
}
add_action( 'wp_enqueue_scripts', 'fortun_enqueue_scripts' );

/*-------------------------------------------------------------*/
function fortun_theme_slug_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $poppins = _x( 'on', 'Poppins font: on or off', 'fortun' );
	$hind = _x( 'on', 'Hind font: on or off', 'fortun' );
	$opensans = _x( 'on', 'OpenSans font: on or off', 'fortun' );
 
    if ( 'off' !== $poppins || 'off' !== $hind || 'off' !== $opensans ) {
        $font_families = array();
 
        if ( 'off' !== $poppins ) {
            $font_families[] = 'Poppins:400,500,600,700';
        }
		
		if ( 'off' !== $opensans ) {
            $font_families[] = 'Open+Sans:300,400,600,700';
        }
		
		if ( 'off' !== $hind ) {
            $font_families[] = 'Hind:300,400,500,600,700';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}
function fortun_theme_slug_scripts_styles() {
    wp_enqueue_style( 'fortun-theme-slug-fonts', fortun_theme_slug_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'fortun_theme_slug_scripts_styles' );
/*---------------------------------------------------------------------*/
function fortun_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'fortun_add_editor_styles' );
/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */ 
function fortun_woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'fortun_jk_related_products_args' );
  function fortun_jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 3; // arranged in 2 columns
	return $args;
}