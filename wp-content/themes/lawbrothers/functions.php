<?php
/**
 * lawbrothers functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lawbrothers
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
function lawbrothers_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on lawbrothers, use a find and replace
		* to change 'lawbrothers' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'lawbrothers', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'lawbrothers' ),
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
			'lawbrothers_custom_background_args',
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
add_action( 'after_setup_theme', 'lawbrothers_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lawbrothers_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lawbrothers_content_width', 640 );
}
add_action( 'after_setup_theme', 'lawbrothers_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lawbrothers_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'lawbrothers' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'lawbrothers' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'lawbrothers_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lawbrothers_scripts() {
	wp_enqueue_style( 'lawbrothers-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'lawbrothers-style', 'rtl', 'replace' );

	wp_enqueue_script( 'lawbrothers-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.5.1.slim.min.js', microtime() );
	wp_enqueue_script( 'magnific', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', microtime() );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', microtime());
	wp_enqueue_script( 'slick-animation', get_template_directory_uri() . '/assets/js/slick-animation.js', microtime());
	wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', microtime() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(), '');
	wp_enqueue_style('line-awesome', get_template_directory_uri() . '/assets/css/line-awesome.min.css', array(), '');
	wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '');
	wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), '');
	wp_enqueue_style('animated', get_template_directory_uri() . '/assets/css/animate.css', array(), '');
	wp_enqueue_style('custom', get_template_directory_uri() . '/assets/css/custom.css', array(), microtime());
	wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '');
}
add_action( 'wp_enqueue_scripts', 'lawbrothers_scripts' );

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




// Remove Update
function remove_core_updates(){
	global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
	}
	add_filter('pre_site_transient_update_core','remove_core_updates');
	add_filter('pre_site_transient_update_plugins','remove_core_updates');
	add_filter('pre_site_transient_update_themes','remove_core_updates');


// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}

// Add class same as page name
add_filter('body_class', 'my_class_names');

function my_class_names($classes) {
    global $post;
    // add 'post_name' to the $classes array 
    $classes[] = $post->post_name;
    // return the $classes array
    return $classes;
}

add_filter( 'body_class', 'dc_parent_body_class' );
function dc_parent_body_class( $classes ) {
    	if( is_page() ) { 
			$parents = get_post_ancestors( get_the_ID() );
			$id = ($parents) ? $parents[0]: get_the_ID();
		if ($id) {
			global $post; 
			$post = get_post($parents[0]); 
			$slug = $post->post_name;
			$classes[] = $slug.'-parent';
			/*if($id==425){
				$classes[] = $slug.'-parent';
			}else{
				$classes[] = 'top-parent-' . $id;
			}*/
		} else {
			$classes[] = 'top-parent-' . get_the_ID();
		}
	}
 
	return $classes;
}


// Add Breadcrumb
function get_breadcrumb() {
    echo '<a href="'.home_url().'">Home</a>';
    if (is_category() || is_single()) {
        echo " <i class='las la-angle-right'></i> <span>";
        the_category(' &bull; ');
            if (is_single()) {
                echo "<span>";
				the_title();
				echo " </span> ";
            }
    } elseif (is_page()) {
        echo " <i class='las la-angle-right'></i> <span>";
        echo the_title();
		echo " </span> ";
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

add_shortcode( 'header-infobox', 'header_infobox_shortcode_cb' );
function header_infobox_shortcode_cb(){
	global $post;
	$page_id = $post->ID;
	$page_id = ( !empty($page_id) && is_numeric($page_id) ? $page_id : get_the_ID() );
	$page_heading = get_post_meta( $page_id ,'page_heading' ,true );
	$page_sub_heading = get_post_meta( $page_id ,'page_sub_heading' ,true );
	$page_banner = get_the_post_thumbnail( $page_id, 'full');
	$output = '';
	if( !is_front_page() ){
		$output .= '
				<h1 class="entry-title">'.$page_heading.'</h1>
				<p class="subheading">'.$page_sub_heading.'</p>';
		$output .= '';
	}
	return $output;
}

add_action( 'add_meta_boxes', 'header_infobox_register_meta_boxes' );
function header_infobox_register_meta_boxes(){
	global $post;
	$post_type = $post->post_type;
	if( $post_type ==  'our-services' ){
		$pos = 'side';
		$heading = 'Banner content and slider images';
	}else{
		$pos = 'side';
		$heading = 'Banner Fields';
	}
	add_meta_box( 'header-infobox', $heading,'header_infobox_meta_cb',array('page','post','our-services'),$pos);
}
function header_infobox_meta_cb($page){
	wp_nonce_field('save_post', 'save_page_metabox_cb');
	$page_heading = get_post_meta( $page->ID ,'page_heading' ,true );
	$page_sub_heading = get_post_meta( $page->ID ,'page_sub_heading' ,true );
	$feature_image2 = get_post_meta( $page->ID ,'feature_image2' ,true );
	if( $page->post_type == 'page' || $page->post_type == 'post' || $page->post_type == 'our-services'){
		echo '<p>
			<label>Heading</label>
			<input type="text" name="page_heading" value="'.$page_heading.'">
		</p>';
	}
	if( $page->post_type == 'page' || $page->post_type == 'post' || $page->post_type == 'our-services' ){
		echo '<p>
			<label>Sub Heading</label>
			<textarea style="width: 100%;margin-top: 5px;height: 70px;" name="page_sub_heading">'.$page_sub_heading.'</textarea>
		</p>';
	}
	if( $page->post_type == 'page' || $page->post_type == 'post' || $page->post_type == 'our-services' ){
		echo '<p>
			<label>Hover Image</label>
			<div class="form-field1 doc-wrap featuredImg">
					<input width="500" type="text" name="feature_image2" value="'.$feature_image2.'">
					<span class="dashicons dashicons-upload upload_img_btn"></span>';
			echo '<div class="innerImg">';
			if( !empty($feature_image2) ){
				echo '<img src="'.$feature_image2.'"/>';
			}
			echo '</div>';
		echo '</div>';
		echo '</p>';
	}
}
add_action( 'save_post', 'save_page_metabox_cb' );
function save_page_metabox_cb($page_id){
	if (!isset($_POST['save_page_metabox_cb'])) {
        return $post_id;
    }

    $nonce = $_POST['save_page_metabox_cb'];
    if (!wp_verify_nonce($nonce, 'save_post')) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
	$page_heading = $_POST['page_heading'];
	$page_sub_heading = $_POST['page_sub_heading'];
	$feature_image2 = $_POST['feature_image2'];
	$post_type = get_post_type( $page_id );
	if( $post_type == 'page' || $post_type == 'post' || $post_type == 'our-services' ){
		update_post_meta( $page_id ,'page_heading' , $page_heading );
		update_post_meta( $page_id ,'page_sub_heading' , $page_sub_heading );
		update_post_meta( $page_id ,'feature_image2' , $feature_image2 );
	}
}

add_action( 'admin_footer', 'admin_footer_script' );
function admin_footer_script(){
	?>
<style type="text/css">
.featuredImg input[type="text"] {
    width: 60%;
}

.featuredImg img {
    width: 200px;
    height: auto;
}
</style>
<script type="text/javascript">
jQuery('body').on("click", ".upload_img_btn", function(e) {
    e.preventDefault();
    var btnClicked = jQuery(this);
    var custom_uploader = wp.media({
            title: 'Select Image',
            button: {
                text: 'Upload Image'
            },
            multiple: false
        })
        .on('select', function() {
            var selection = custom_uploader.state().get('selection');
            selection.map(function(attachment) {
                attachment = attachment.toJSON();
                var current = btnClicked.closest('div.doc-wrap');
                var element = btnClicked.closest('div.doc-wrap').find('input[type="text"]');
                element.val(attachment.url);
                if (jQuery('.innerImg').has('img').length) {
                    jQuery('.innerImg img').attr('src', attachment.url);
                } else {
                    jQuery('.innerImg').html('<img src="' + attachment.url + '"/>');
                }

            });
        })
        .open();
});
</script>
<?php
}



require get_template_directory() . '/include/constants.php';
require get_template_directory() . '/include/action-hooks.php';
require get_template_directory() . '/include/admin-hooks.php';
require get_template_directory() . '/include/cpt-register.php';
require get_template_directory() . '/include/cpt-metabox.php';
require get_template_directory() . '/include/create-shortcodes.php';
require get_template_directory() . '/include/custom-functions.php';
//require get_template_directory() . '/include/theme-option.php';