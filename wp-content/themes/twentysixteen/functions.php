<?php
/**
 * demo Product functions and definitions
 *yogisukumar.mails@gmail.com
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage demo Product
 * @since demo Product
 */

/**
 * demo Product only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentysixteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own twentysixteen_setup() function to override in a child theme.
 *
 * @since demo Product
 */
function twentysixteen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/demo Product
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'demo Product' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'Demo Product' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since demo Product
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'Demo Product' ),
		'social'  => __( 'Social Links Menu', 'Demo Product' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'twentysixteen_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since demo Product1.0
 */
function twentysixteen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );
}
add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since demo Product1.0
 */
function twentysixteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentysixteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'twentysixteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'twentysixteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentysixteen_widgets_init' );

if ( ! function_exists( 'twentysixteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own twentysixteen_fonts_url() function to override in a child theme.
 *
 * @since demo Product1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentysixteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since demo Product1.0
 */
function twentysixteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since demo Product1.0
 */
function twentysixteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentysixteen-fonts', twentysixteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'twentysixteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'twentysixteen-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160816', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentysixteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160816' );
	}

	wp_enqueue_script( 'twentysixteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160816', true );

	wp_localize_script( 'twentysixteen-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'twentysixteen' ),
		'collapse' => __( 'collapse child menu', 'twentysixteen' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'twentysixteen_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since demo Product1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'twentysixteen_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since demo Product1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since demo Product1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 840 <= $width ) {
		$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
	}

	if ( 'page' === get_post_type() ) {
		if ( 840 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	} else {
		if ( 840 > $width && 600 <= $width ) {
			$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		} elseif ( 600 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since demo Product1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function twentysixteen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		} else {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
		}
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since demo Product1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentysixteen_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list'; 

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args' );


/* ****************************************************************************************
*
Extra code  Mathivanan 
*
 * Custom template tags for this theme.
 *
 * @since templaes
 *
 *******************************************************************************************
 */



// add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
// function jk_dequeue_styles( $enqueue_styles ) {
//     unset( $enqueue_styles['woocommerce-general'] );    // Remove the gloss
//     unset( $enqueue_styles['woocommerce-layout'] );     // Remove the layout
//     unset( $enqueue_styles['woocommerce-smallscreen'] );    // Remove the smallscreen optimisation
//     return $enqueue_styles;
// }
// // Or just remove them all in one line
// add_filter( 'woocommerce_enqueue_styles', '__return_false' );
// add_action( 'after_setup_theme', 'woocommerce_support' );
// function woocommerce_support() {
//     add_theme_support( 'woocommerce' );
// }




require get_parent_theme_file_path( '/inc/additional_functions.php' );

/**
* Implement Site Settings
*/
require get_parent_theme_file_path( '/inc/site_settings.php' );


/*  Custome post type 
 Quotation custome post */

add_action( 'init', 'create_quotation_post_type' );
function create_quotation_post_type() {
  register_post_type( 'quotation',
    array(
      'labels' => array(
        'name' => __( 'Quotation' ),
        'singular_name' => __( 'Quotation' )
      ),
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'taxonomies' => array('category'),
        'supports' => array('title','editor','thumbnail')
    )
  );
}

/*  Custome post type 
 Assessments custome post */

add_action( 'init', 'create_assessments_post_type' );
function create_assessments_post_type() {
  register_post_type( 'assessments',
    array(
      'labels' => array(
        'name' => __( 'Assessments' ),
        'singular_name' => __( 'Assessments' )
      ),
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'taxonomies' => array('category'),
        'supports' => array('title','editor','thumbnail')
    )
  );
}

/* Add Meta box */

function home_get_meta_box( $meta_boxes ) {
	$prefix = 'home-';

	$meta_boxes[] = array(
		'id' => 'fourth_section',
		'title' => esc_html__( 'Fourth section', 'metabox-online-generator' ),
		'post_types' => array( 'assessments' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => true,
		'fields' => array(
			array(
				'id' => $prefix . 'heading',
				'type' => 'text',
				'name' => esc_html__( 'Heading', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'description',
				'name' => esc_html__( 'description', 'metabox-online-generator' ),
				'type' => 'wysiwyg',
			),
			array(
				'id' => $prefix . 'image_advanced_3',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Image Advanced', 'metabox-online-generator' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'home_get_meta_box' );
/*------------------------*/

/* Custome post type 
 Treatements custome post 
 */

add_action( 'init', 'create_treatements_post_type' );
function create_treatements_post_type()
 {
  register_post_type( 'treatements',
    array(
      'labels' => array(
        'name' => __( 'Treatements' ),
        'singular_name' => __( 'Treatements' )
      ),
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'taxonomies' => array('category'),
        'supports' => array('title','editor','thumbnail')
    )
  );
}

/*-----------------------*/

add_action( 'init', 'work_register' );   

function work_register() {   

    $labels = array( 
        'name' => _x('Work', 'post type general name'), 
        'singular_name' => _x('Work Item', 'post type singular name'), 
        'add_new' => _x('Add New', 'work item'), 
        'add_new_item' => __('Add New Work Item'), 
        'edit_item' => __('Edit Work Item'), 
        'new_item' => __('New Work Item'), 

        'view_item' => __('View Work Item'), 
        'search_items' => __('Search Work'), 
        'not_found' => __('Nothing found'), 
        'not_found_in_trash' => __('Nothing found in Trash'), 
        'parent_item_colon' => '' 
    );   

    $args = array( 
        'labels' => $labels, 
        'public' => true, 
        'publicly_queryable' => true, 
        'show_ui' => true, 
        'query_var' => true, 
         
        'menu_icon' => get_stylesheet_directory_uri() . '/', 
        'rewrite' => array( 'slug' => 'work', 'with_front'=> false ), 
        'capability_type' => 'post', 
        'hierarchical' => true,
        'has_archive' => true,  
        'menu_position' => null, 
        'supports' => array('title','editor','thumbnail') 
        //'supports'     => array( 'comments', 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions', 'page-attributes' ),
    );   

    register_post_type( 'work' , $args ); 

    register_taxonomy( 'categories', array('work'), array(
        'hierarchical' => true, 
        'label' => 'Categories', 
        'singular_label' => 'Category', 
        'rewrite' => array( 'slug' => 'categories', 'with_front'=> false )
        )
    );

    register_taxonomy_for_object_type( 'categories', 'work' ); // Better be safe than sorry
}

add_shortcode('someshortocode', 'someshortocode_callback');
function someshortocode_callback( $atts = array(), $content = null ) {

    $output = "Echo!!!";
    return $output;

}


/* Overwrite plugin function 2018 */

add_filter('get_public_descriptions', 'theme_get_public_descriptions_filter');

 function theme_get_public_descriptions_filter ($context, $rule_uids)
    {
        $descriptions = array();

        $rule_uids = (array) $rule_uids;

        // Check if at least one rule uid is set
        if (!empty($rule_uids) && is_array($rule_uids)) {

            // Get rules by uids
            $rules = RP_WCDPD_Rules::get($context, array('uids' => $rule_uids), true);

            // Iterate over applicable rules and append their public descriptions
            foreach ($rules as $rule) {
                if (isset($rule['public_note']) && !RightPress_Helper::is_empty($rule['public_note'])) {
                  
                    $descriptions [$rule['uid']]= $rule['public_note'];
                }
            }
        }

        return !empty($descriptions) ? $descriptions : null;
    }



/* Custome Menu option for apperance  in Admin */


function wpb_custom_new_menu() {
  register_nav_menu('my-custom-menu',__( 'Custom Menu 4' ));
}
add_action( 'init', 'wpb_custom_new_menu' );

/* Custome widget area */

function custom_sidebars1() {
 
    $args = array(
        'id'            => 'custom_sidebar5',
        'name'          => __( 'Custom Widget Area 5', 'text_domain' ),
        'description'   => __( 'A custom widget area 5', 'text_domain' ),
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
    );
    register_sidebar( $args );
 
}
add_action( 'widgets_init', 'custom_sidebars1' );


/* Remove welcome panel in wordpress */

remove_action('welcome_panel', 'wp_welcome_panel');


//declare WC support
function aventurine_child_wc_support() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'aventurine_child_wc_support' );

/* Admin panel Extra menu */

// add_action( 'admin_menu', 'extra_post_info_menu' );

// function extra_post_info_menu(){

//   $page_title = 'WordPress Extra Post Info';
//   $menu_title = 'Extra Post Info';
//   $capability = 'manage_options';
//   $menu_slug  = 'extra-post-info';
//   $function   = 'extra_post_info_page';
//   $icon_url   = 'dashicons-media-code';
//   $position   = 4;

//   add_menu_page( $page_title,
//                  $menu_title, 
//                  $capability, 
//                  $menu_slug, 
//                  $function, 
//                  $icon_url, 
//                  $position );
// }

/* logme message functions */

function log_me($message) {
    if (WP_DEBUG === true) {
        if (is_array($message) || is_object($message)) {
            error_log(print_r($message, true));
        } else {
            error_log($message);
        }
    }
}

// CUSTOM ADMIN MENU LINK FOR ALL SETTINGS
   // function all_settings_link() {
   //  add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
   // }
   // add_action('admin_menu', 'all_settings_link');


/* Admin Menu Remove functions */
//    function remove_menus()
// {
//     global $menu;
//     global $current_user;
//     get_currentuserinfo();

//     if($current_user->user_login =! '0')
//     {
//         $restricted = array(__('Posts'),
//                             __('Media'),
//                             __('Links'),
//                             __('Pages'),
//                             __('Comments'),
//                             __('Appearance'),
//                             __('Plugins'),
//                             __('Users'),
//                             __('Tools'),
//                             __('Settings')
//         );
//         end ($menu);
//         while (prev($menu)){
//             $value = explode(' ',$menu[key($menu)][0]);
//             if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
//         }// end while

//     }// end if
// }
// add_action('admin_menu', 'remove_menus');

// shortcode in widgets
// if ( !is_admin() ){
//     add_filter('widget_text', 'do_shortcode', 11);
// }


/**Change the "Howdy" message to "Welcome" **/

add_filter('gettext', 'change_howdy', 10, 3);

function change_howdy($translated, $text, $domain) {

    if (!is_admin() || 'default' != $domain)
        return $translated;

    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'Welcome to ', $translated);

    return $translated;
}

/*Themed custom loop using shortcodes*/

// add_shortcode('query', 'shortcode_query');

// function shortcode_query($atts, $content){
//   extract(shortcode_atts(array( // a few default values
//    'posts_per_page' => '10',
//    'caller_get_posts' => 1,
//    'post__not_in' => get_option('sticky_posts'),
//   ), $atts));

//   global $post;

//   $posts = new WP_Query($atts);
//   $output = '';
//   if ($posts->have_posts())
//     while ($posts->have_posts()):
//       $posts->the_post();

//       // these arguments will be available from inside $content
//       $parameters = array(
//         'PERMALINK' => get_permalink(),
//         'TITLE' => get_the_title(),
//         'CONTENT' => get_the_content(),
//         'COMMENT_COUNT' => $post->comment_count,
//         'CATEGORIES' => get_the_category_list(', '),
//         // add here more...
//       );

//       $finds = $replaces = array();
//       foreach($parameters as $find => $replace):
//         $finds[] = '{'.$find.'}';
//         $replaces[] = $replace;
//       endforeach;
//       $output .= str_replace($finds, $replaces, $content);

//     endwhile;
//   else
//     return; // no posts found

//   wp_reset_query();
//   return html_entity_decode($output);
// }

// fetch details 

// [query post_type=page posts_per_page=5]
// Listing some pages:    
// <h5>{TITLE}</h5>
// <div>{CONTENT}</div>
// <p><a href="{PERMALINK}">{COMMENT_COUNT} comments</a></p>
// [/query]

/* Extending Auto Logout Period */

// function keep_me_logged_in_for_1_year( $expirein ) {
//    return 31556926; // 1 year in seconds
// }
// add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_1_year' );

// Add Google Analytics Tracking Code
// function add_google_analytics() {
// ?>
<script type="text/javascript">
//     var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
//     document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
// </script>
 <script type="text/javascript">
//     try {
//         var pageTracker = _gat._getTracker("UA-XXXXXXX-X");
//         pageTracker._trackPageview();
//     } catch(err) {}</script>
 <?php
// }

// add_action('wp_footer', 'add_google_analytics');

//----------------------------------

// Add auto-update/plugin-installer on you localhost

// define ('FS_METHOD', 'direct');

// Put this in your wp-config.php.
//----------------------------------------


/*-----------------------------------------------------------------------------------*/
/*  Custom logos Admin login
/*---------------------- -------------------------------------------------------------*/

function custom_admin_logo() {
    echo '
        <style type="text/css">
            #header-logo { background-image: url('.get_bloginfo('template_directory').'/path/to/images/admin-logo.png) !important; }
        </style>
    ';
}
add_action('admin_head', 'custom_admin_logo');

function custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/path/to/images/login-logo.png) !important; }
    </style>';
}
add_action('login_head', 'custom_login_logo');

/* Remove version */

function wpb_remove_version() {
return '';
}
add_filter('the_generator', 'wpb_remove_version');

/* Hide Login Errors in WordPress */
function no_wordpress_errors(){
  return 'Something is wrong!';
}
add_filter( 'login_errors', 'no_wordpress_errors' );