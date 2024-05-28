<?php
/**
 * diligent_technologies functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package diligent_technologies
 */
require_once get_template_directory() . '/inc/Walker-Nav-Menu.php';
require_once get_template_directory() . '/inc/custom-contact-form-widget.php';

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
function diligent_technologies_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on diligent_technologies, use a find and replace
		* to change 'diligent_technologies' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'diligent_technologies', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'diligent_technologies' ),
            'menu-2'=>esc_html__('Secondary','diligent_technologies')
		)
	);

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
			'diligent_technologies_custom_background_args',
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
add_action( 'after_setup_theme', 'diligent_technologies_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function diligent_technologies_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'diligent_technologies_content_width', 640 );
}
add_action( 'after_setup_theme', 'diligent_technologies_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function diligent_technologies_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'SideBar', 'diligent_technologies' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'diligent_technologies' ),
			'before_widget' => '<div class="card-body">',
			'after_widget'  => '</div>',
			'before_title'  => ' <h5 class="card-title">',
			'after_title'   => '</h5>',
		)
	);
}
add_action( 'widgets_init', 'diligent_technologies_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function diligent_technologies_scripts() {
    wp_enqueue_style('font-awesome-style', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), '6.4.2');
    wp_enqueue_style('bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), '6.5.3');
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), null);

        wp_enqueue_style('my-custom-style', get_stylesheet_directory_uri() . '/assets/css/style.css');

        wp_enqueue_style('my-custom-style', get_stylesheet_directory_uri() . '/assets/scss/theme_style/style.scss');



    wp_enqueue_style('diligent_technologies-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('diligent_technologies-style', 'rtl', 'replace');

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array(), '6.5.3', true);
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('diligent_technologies-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
    wp_enqueue_script('myswiper', get_template_directory_uri() . '/assets/js/myswiper.js', array(), null, true);
    wp_enqueue_script('gruntfile', get_template_directory_uri() . '/Gruntfile.js', array(), null, true);

    // Uncomment the following lines if you have comment functionality.
    // if (is_singular() && comments_open() && get_option('thread_comments')) {
    //     wp_enqueue_script('comment-reply');
    // }
}
add_action( 'wp_enqueue_scripts', 'diligent_technologies_scripts' );
// Register Custom Post Type
//function enqueue_homepage_styles() {
//    if (is_page_template('HomePage')) {
//        wp_enqueue_style('my-custom-style', get_stylesheet_directory_uri() . '/assets/css/style.css');
//    }
//}
//add_action('wp_enqueue_scripts', 'enqueue_homepage_styles');
function mytheme_enqueue_scripts() {
    if ( get_theme_mod( 'back_to_top_enable', false ) ) {
        wp_enqueue_script( 'back-to-top', get_template_directory_uri() . '/assets/js/back-to-top.js', array(), null, true );
    }
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_scripts' );


function my_custom_acf_block_register()
{
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'hero_block',
            'title'             => __('Hero'),
            'description'       => __('A custom hero_block block.'),
            'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/hero_block/hero.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('hero_block', 'quote'),
            'enqueue_style'     => get_stylesheet_directory_uri() . '/template-parts/blocks/hero_block/hero-block.scss',
            'lock'               => array(
                'remove' => false,)
         ));
        acf_register_block_type(array(
            'name'              => 'about_block',
            'title'             => __('About'),
            'description'       => __('A custom about_block block.'),
            'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/about_sec/about.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('hero_block', 'quote'),
            'enqueue_style'     => get_stylesheet_directory_uri() . '/template-parts/blocks/about_sec/about.scss',

        ));
        acf_register_block_type(array(
            'name'              => 'contact_block',
            'title'             => __('Contact'),
            'description'       => __('A custom contact block block.'),
            'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/contact_form/contact.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('hero_block', 'quote'),
            'enqueue_style'     => get_stylesheet_directory_uri() . '/template-parts/blocks/contact_form/contact.scss',

        ));
        acf_register_block_type(array(
            'name'              => 'testimonial_block',
            'title'             => __('Testimonial'),
            'description'       => __('A custom testimonial block block.'),
            'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/testimonial_block/testimonial.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('testimonial_block', 'quote'),
            'enqueue_style'     => get_stylesheet_directory_uri() . '/template-parts/blocks/testimonial_block/testimonial.scss',

        ));
        acf_register_block_type(array(
            'name'              => 'service_block',
            'title'             => __('Service'),
            'description'       => __('A custom service block.'),
            'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/service_block/service.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('service_block', 'quote'),
            'enqueue_style'     => get_stylesheet_directory_uri() . '/template-parts/blocks/service_block/service.scss',

        ));

        acf_register_block_type(array(
            'name'              => 'ourproject_block',
            'title'             => __('Our Project'),
            'description'       => __('A custom our project block'),
            'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/ourproject_block/ourproject.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('service_block', 'quote'),
            'enqueue_style'     => get_stylesheet_directory_uri() . '/template-parts/blocks/ourproject_block/ourproject.scss',

        ));
        acf_register_block_type(array(
            'name'              => 'ourteam_block',
            'title'             => __('Our Team'),
            'description'       => __('A custom our team block'),
            'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/ourteam_block/ourteam.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('ourteam_block', 'quote'),
            'enqueue_style'     => get_stylesheet_directory_uri() . '/template-parts/blocks/ourteam_block/ourteam.scss',

        ));
        acf_register_block_type(array(
            'name'              => 'author-info',
            'title'             => __('Author Infooo'),
            'description'       => __('A block to display author information.'),
            'render_template'   => '/template-parts/blocks/author-info/author-info.php',
            'category'          => 'layout',
            'icon'              => 'admin-users',
            'keywords'          => array( 'author', 'info' ),
            'supports'          => array(
                'align' => false,
                'mode' => false,
                'jsx' => true
            )
        ));
        acf_register_block( array(
            'name'            => 'hero2_block',
            'title'           => __( 'Hero block' ),
            'description'     => __( 'A custom hero block.' ),
            'render_template' => '/template-parts/blocks/hero-block/hero-block.php',
            'category'        => 'layout',
            'icon'            => 'admin-users',
            'keywords'        => array( 'hero', 'hero', '' ),
            'multiple'        => true,
            'mode'            => 'edit',
        ) );


        acf_register_block_type(array(
            'name'              => 'author-twitter',
            'title'             => __('Author Twitter'),
            'description'       => __('A block to display author\'s Twitter handle.'),
            'render_template'   => '/template-parts/blocks/author-twitter/author-twitter.php',
            'category'          => 'layout',
            'icon'              => 'twitter',
            'keywords'          => array( 'author', 'twitter' ),
            'parent'            => array('acf/author-info'),
            'supports'          => array(
                'align' => false,
                'mode' => false,
                'jsx' => true
            )
        ));
        acf_register_block_type(array(
            'name'              => 'button_block',
            'title'             => __('Button Block'),
            'description'       => __('A block to display Button Block handle.'),
            'render_template'   => '/template-parts/blocks/button_block/button.php',
            'category'          => 'layout',
            'icon'              => 'button',
            'keywords'          => array( 'button', 'twitter' ),

        ));

    }
}
function create_team_post_type() {
    register_post_type('team',
        array(
            'labels'      => array(
                'name'          => __('Teams'),
                'singular_name' => __('Team'),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array('title', 'editor', 'thumbnail'),
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_team_post_type');

add_action('acf/init', 'my_custom_acf_block_register');
function my_acf_save_post($post_id) {

    if (!isset($_POST['acf'])) {
        return;
    }


    if (get_post_type($post_id) !== 'your_custom_post_type') {
        return;
    }


    $team_image = get_field('team_image', $post_id);
    $team_name = get_field('team_name', $post_id);
    $team_designation = get_field('team_designation', $post_id);

    // Check if team_name is empty, don't proceed if it is
    if (empty($team_name)) {
        return;
    }


    $existing_team = get_page_by_title($team_name, OBJECT, 'team');
    if ($existing_team) {
        // Update existing team post
        $team_post_id = $existing_team->ID;
        $team_post = array(
            'ID' => $team_post_id,
            'post_title' => $team_name,
            'post_type' => 'team',
            'post_status' => 'publish',
        );
        wp_update_post($team_post);
    } else {
        // Create a new team post
        $team_post = array(
            'post_title' => $team_name,
            'post_type' => 'team',
            'post_status' => 'publish',
        );
        $team_post_id = wp_insert_post($team_post);
    }

    // Update ACF fields for the team post
    update_field('team_image', $team_image, $team_post_id);
    update_field('team_designation', $team_designation, $team_post_id);
}
add_action('acf/save_post', 'my_acf_save_post', 20);




function diligent_technologies_customizer_css() {
    $primary_color = get_field('primary_color', 'option') ?: '#007bff';
    $secondary_color = get_field('secondary_color', 'option') ?: '#6c757d';
    $header_bg_color = get_field('header_bg_color', 'option') ?: '#ffffff';
    $header_text_color = get_field('header_textcolor', 'option') ?: '#000000';
    $button_color = get_field('cta_button_color', 'option') ?: '#000000'; // Ensure you have this setting

    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_html($primary_color); ?>;
            --secondary-color: <?php echo esc_html($secondary_color); ?>;
            --header-bg-color: <?php echo esc_html($header_bg_color); ?>;
            --header-text-color: <?php echo esc_html('#' . ltrim($header_text_color, '#')); ?>;
            --button-color: <?php echo esc_html($button_color); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'diligent_technologies_customizer_css');

//function assetEnqueue($handle, $src, $deps = array(), $in_footer = false) {
//    wp_enqueue_script($handle, get_template_directory_uri() . $src, $deps, filemtime(get_template_directory() . $src), $in_footer);
//}
//
//function enqueue_block_assets() {
//    assetEnqueue('hero-block-style', '/template-parts/blocks/hero_block/hero-block.css', array(), false);
//    assetEnqueue('hero-block-script', '/template-parts/blocks/hero_block/hero-block.js', array('wp-blocks', 'wp-element', 'wp-editor'), true);
//}
//add_action('enqueue_block_editor_assets', 'enqueue_block_assets');
function register_custom_contact_form_widget() {
    register_widget('Custom_Contact_Form_Widget');
}
add_action('widgets_init', 'register_custom_contact_form_widget');
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
