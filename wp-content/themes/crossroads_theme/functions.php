<?php
/**
 * crossroads_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package crossroads_theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function crossroads_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on crossroads_theme, use a find and replace
		* to change 'crossroads_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'crossroads_theme', get_template_directory() . '/languages' );

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
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'crossroads_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'crossroads_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function crossroads_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'crossroads_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'crossroads_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function crossroads_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'crossroads_theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'crossroads_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'crossroads_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function crossroads_theme_scripts() {
	wp_enqueue_style( 'crossroads_theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'crossroads_theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'crossroads_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'crossroads_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load CSS.
 */
function crossroads_enqueue_styles() {
	wp_enqueue_style('plugins-css', get_template_directory_uri() . '/assets/css/plugins.css');
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/css/swiper.css');
    wp_enqueue_style('critical-css', get_template_directory_uri() . '/assets/css/critical.css');
    wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_style('custom-mobile.css', get_template_directory_uri() . '/assets/css/style-mobile.css');

}
add_action('wp_enqueue_scripts', 'crossroads_enqueue_styles');
/**
 * Load JS.
 */
function crossroads_enqueue_scripts() {
    wp_enqueue_script('jquery');

    wp_enqueue_script('plugins-js', get_template_directory_uri() . '/assets/js/plugins.js', ['jquery'], null, true);
	wp_enqueue_script('designesia-js', get_template_directory_uri() . '/assets/js/designesia.min.js', ['jquery', 'plugins-js'], null, true);
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper.js', ['jquery'], null, true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', ['jquery', 'designesia-js'], null, true);
}
add_action('wp_enqueue_scripts', 'crossroads_enqueue_scripts');
/**
 * Font Awesome
 */
function crossroads_enqueue_fontawesome() {
  wp_enqueue_style(
    'font-awesome',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css',
    [],
    '6.0.0'
  );
}
add_action('wp_enqueue_scripts', 'crossroads_enqueue_fontawesome');
/**
 * Config
 */
if (function_exists('acf_add_options_page')) {
  acf_add_options_page([
    'page_title' => 'Website Settings',
    'menu_title' => 'Website Settings',
    'menu_slug'  => 'site-settings',
    'capability' => 'edit_posts',
    'redirect'   => false
  ]);
}
/**
 * header menu
 */
function crossroads_register_menus() {
  register_nav_menus([
    'main_menu'   => 'Main Menu',
    'footer_menu' => 'Footer Menu'
  ]);
}
add_action('after_setup_theme', 'crossroads_register_menus');

/**
 * add a class to all subpages
 */
function add_custom_body_class($classes) {
  if (!is_front_page() && !is_home()) {
    $classes[] = 'subpage';
  }
  return $classes;
}
add_filter('body_class', 'add_custom_body_class');
/**
 * regiter hierarchical categories
 */

function register_service_category_taxonomy() {
register_taxonomy('service-category', 'service', [
  'label' => 'Service Categories',
  'hierarchical' => true,
  'rewrite' => ['slug' => 'services'], // this is key
  'public' => true,
  'show_in_rest' => true,
]);
}
add_action('init', 'register_service_category_taxonomy');
/**
 * register services post type
 */
function register_services_post_type() {
    $labels = array(
        'name'                  => 'Services',
        'singular_name'         => 'Service',
        'menu_name'             => 'Services',
        'name_admin_bar'        => 'Service',
        'archives'              => 'Service Archives',
        'attributes'            => 'Service Attributes',
        'parent_item_colon'     => 'Parent Service:',
        'all_items'             => 'All Services',
        'add_new_item'          => 'Add New Service',
        'add_new'               => 'Add New',
        'new_item'              => 'New Service',
        'edit_item'             => 'Edit Service',
        'update_item'           => 'Update Service',
        'view_item'             => 'View Service',
        'view_items'            => 'View Services',
        'search_items'          => 'Search Services',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into service',
        'uploaded_to_this_item' => 'Uploaded to this service',
        'items_list'            => 'Services list',
        'items_list_navigation' => 'Services list navigation',
        'filter_items_list'     => 'Filter services list',
    );

    $args = array(
        'label'                 => 'Service',
        'description'           => 'Custom Post Type for services offered',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'taxonomies'            => array('service-category'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'rewrite'               => array('slug' => 'services', 'with_front' => false),
        'show_in_rest'          => true,
    );

    register_post_type('service', $args);
}
add_action('init', 'register_services_post_type');

function register_team_member_post_type() {
    $labels = array(
        'name'               => 'Team Members',
        'singular_name'      => 'Team Member',
        'menu_name'          => 'Our Team',
        'name_admin_bar'     => 'Team Member',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Team Member',
        'new_item'           => 'New Team Member',
        'edit_item'          => 'Edit Team Member',
        'view_item'          => 'View Team Member',
        'all_items'          => 'All Team Members',
        'search_items'       => 'Search Team Members',
        'not_found'          => 'No team members found.',
        'not_found_in_trash' => 'No team members in trash.',
    );

    $args = array(
        'label'               => 'Team Members',
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'team'),
        'show_in_rest'        => true,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-groups',
    );

    register_post_type('team_member', $args);
}
add_action('init', 'register_team_member_post_type');
