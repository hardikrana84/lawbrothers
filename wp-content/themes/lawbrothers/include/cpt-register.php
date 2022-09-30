<?php
new Cpt_Register();
class Cpt_Register{
	public function __construct(){
		add_action( 'init', array( $this, 'home_slider_cpt' ) );
		add_action( 'init', array( $this, 'our_team_cpt' ) );
		add_action( 'init', array( $this, 'our_services_cpt' ) );
		add_action( 'init', array( $this, 'our_clients' ) );
		add_action( 'init', array( $this, 'publications_cpt' ) );
		add_action( 'init', array( $this, 'create_event_cpt'));
		add_action( 'init', array( $this, 'all_media' ) );
		// add_action( 'init', array( $this, 'create_testimonials_cpt' ) );
		// add_action( 'init', array($this, 'featured_video_cpt'));
		add_action( 'init', array($this, 'queryoftheday'));
		// add_action( 'init', array( $this, 'knowledge_hub' ) );
		add_action( 'init', array( $this, 'location_cpt' ) );
	}
	function home_slider_cpt(){
		$labels = array(
			'name' => __( 'Home Slider', 'Post Type General Name', 'text_domain' ),
			'singular_name' => __( 'Home Slide', 'Post Type Singular Name', 'text_domain' ),
			'menu_name' => __( 'Home Slider', 'text_domain' ),
			'name_admin_bar' => __( 'Home Slider', 'text_domain' ),
			'archives' => __( 'Home Slide Archives', 'text_domain' ),
			'attributes' => __( 'Home Slide Attributes', 'text_domain' ),
			'parent_item_colon' => __( 'Parent Home Slide:', 'text_domain' ),
			'all_items' => __( 'All Home Slide', 'text_domain' ),
			'add_new_item' => __( 'Add New Home Slide', 'text_domain' ),
			'add_new' => __( 'Add New', 'text_domain' ),
			'new_item' => __( 'New Home Slide', 'text_domain' ),
			'edit_item' => __( 'Edit Home Slide', 'text_domain' ),
			'update_item' => __( 'Update Home Slide', 'text_domain' ),
			'view_item' => __( 'View Home Slide', 'text_domain' ),
			'view_items' => __( 'View Home Slide', 'text_domain' ),
			'search_items' => __( 'Search Home Slide', 'text_domain' ),
			'not_found' => __( 'Not found', 'text_domain' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'text_domain' ),
			'featured_image' => __( 'Home Slide Image', 'text_domain' ),
			'set_featured_image' => __( 'Set Home Slide image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove Home Slide image', 'text_domain' ),
			'use_featured_image' => __( 'Use as Home Slide image', 'text_domain' ),
			'insert_into_item' => __( 'Insert into Home Slide', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Home Slide', 'text_domain' ),
			'items_list' => __( 'Home Slide list', 'text_domain' ),
			'items_list_navigation' => __( 'Home Slide list navigation', 'text_domain' ),
			'filter_items_list' => __( 'Filter Home Slide list', 'text_domain' ),
		);
		$args = array(
			'label' => __( 'Home Slide', 'text_domain' ),
			'description' => __( 'Home Slide Custom Post type', 'text_domain'),
			'labels' => $labels,
			'menu_icon' => 'dashicons-slides',
			'supports' => array('title', 'thumbnail', 'editor', 'page-attributes'),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => false,
			'hierarchical' => false,
			'exclude_from_search' => false,
			'show_in_rest' => true,
			'publicly_queryable' => true,
			'capability_type' => 'post',
		);
		register_post_type( 'homeslider', $args );
	}
	function our_team_cpt() {

		$labels = array(
			'name'                  => _x( 'Our Teams', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Our Team', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Our Team', 'text_domain' ),
			'name_admin_bar'        => __( 'Our Teams', 'text_domain' ),
			'archives'              => __( 'Our Teams Archives', 'text_domain' ),
			'attributes'            => __( 'Our Teams Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'All Items', 'text_domain' ),
			'add_new_item'          => __( 'Add New Item', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Item', 'text_domain' ),
			'edit_item'             => __( 'Edit Item', 'text_domain' ),
			'update_item'           => __( 'Update Item', 'text_domain' ),
			'view_item'             => __( 'View Item', 'text_domain' ),
			'view_items'            => __( 'View Items', 'text_domain' ),
			'search_items'          => __( 'Search Item', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Our Team', 'text_domain' ),
			'description'           => __( 'Post Type Description', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'excerpt', 'thumbnail', 'editor', 'page-attributes'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 6,
			'menu_icon'             => 'dashicons-businessman',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type( 'our-team', $args );

	}
	function our_services_cpt(){
		$labels = array(
			'name' => __( 'Our Services', 'Post Type General Name', 'text_domain' ),
			'singular_name' => __( 'Our Service', 'Post Type Singular Name', 'text_domain' ),
			'menu_name' => __( 'Our Services', 'text_domain' ),
			'name_admin_bar' => __( 'Our Services', 'text_domain' ),
			'archives' => __( 'Our Services Archives', 'text_domain' ),
			'attributes' => __( 'Our Services Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'All Items', 'text_domain' ),
			'add_new_item'          => __( 'Add New Item', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Item', 'text_domain' ),
			'edit_item'             => __( 'Edit Item', 'text_domain' ),
			'update_item'           => __( 'Update Item', 'text_domain' ),
			'view_item'             => __( 'View Item', 'text_domain' ),
			'view_items'            => __( 'View Items', 'text_domain' ),
			'search_items'          => __( 'Search Item', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label' => __( 'Our Services', 'text_domain' ),
			'description' => __( 'Our Services Custom Post type', 'text_domain' ),
			'labels' => $labels,
			'menu_icon' => 'dashicons-megaphone',
			'supports' => array('title', 'thumbnail', 'editor', 'page-attributes' ),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 7,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => false,
			'hierarchical' => false,
			'exclude_from_search' => false,
			'show_in_rest' => true,
			'publicly_queryable' => true,
			'capability_type' => 'post',

		);
		register_post_type( 'our-services', $args );
	}
	function our_clients(){
		$labels = array(
			'name' => __( 'Clients', 'Post Type General Name', 'text_domain' ),
			'singular_name' => __( 'Client', 'Post Type Singular Name', 'text_domain' ),
			'menu_name' => __( 'Clients', 'text_domain' ),
			'name_admin_bar' => __( 'Clients', 'text_domain' ),
			'archives' => __( 'Client Archives', 'text_domain' ),
			'attributes' => __( 'Client Attributes', 'text_domain' ),
			'parent_item_colon' => __( 'Parent Client:', 'text_domain' ),
			'all_items' => __( 'All Client', 'text_domain' ),
			'add_new_item' => __( 'Add New Client', 'text_domain' ),
			'add_new' => __( 'Add New', 'text_domain' ),
			'new_item' => __( 'New Client', 'text_domain' ),
			'edit_item' => __( 'Edit Client', 'text_domain' ),
			'update_item' => __( 'Update Client', 'text_domain' ),
			'view_item' => __( 'View Client', 'text_domain' ),
			'view_items' => __( 'View Client', 'text_domain' ),
			'search_items' => __( 'Search Client', 'text_domain' ),
			'not_found' => __( 'Not found', 'text_domain' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'text_domain' ),
			'featured_image' => __( 'Client Image', 'text_domain' ),
			'set_featured_image' => __( 'Set Client image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove Client image', 'text_domain' ),
			'use_featured_image' => __( 'Use as Client image', 'text_domain' ),
			'insert_into_item' => __( 'Insert into Client', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Client', 'text_domain' ),
			'items_list' => __( 'Client list', 'text_domain' ),
			'items_list_navigation' => __( 'Client list navigation', 'text_domain' ),
			'filter_items_list' => __( 'Filter Client list', 'text_domain' ),
		);
		$args = array(
			'label' => __( 'Client', 'text_domain' ),
			'description' => __( 'Client Custom Post type', 'text_domain' ),
			'labels' => $labels,
			'menu_icon' => 'dashicons-format-image',
			'supports' => array('title', 'thumbnail', 'page-attributes' ),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 8,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => false,
			'hierarchical' => false,
			'exclude_from_search' => false,
			'show_in_rest' => true,
			'publicly_queryable' => true,
			'capability_type' => 'post',
		);
		register_post_type( 'clients', $args );
	}
	function publications_cpt() {
		$labels = array(
			'name'                  => _x( 'Publications', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Publication', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Publication', 'text_domain' ),
			'name_admin_bar'        => __( 'Publications', 'text_domain' ),
			'archives'              => __( 'Publications Archives', 'text_domain' ),
			'attributes'            => __( 'Publications Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'All Items', 'text_domain' ),
			'add_new_item'          => __( 'Add New Item', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Item', 'text_domain' ),
			'edit_item'             => __( 'Edit Item', 'text_domain' ),
			'update_item'           => __( 'Update Item', 'text_domain' ),
			'view_item'             => __( 'View Item', 'text_domain' ),
			'view_items'            => __( 'View Items', 'text_domain' ),
			'search_items'          => __( 'Search Item', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Publication', 'text_domain' ),
			'description'           => __( 'Post Type Description', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail', 'page-attributes'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 6,
			'menu_icon'             => 'dashicons-book',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type( 'publications', $args );

	}
	function create_event_cpt() {
		$labels = array(
			'name'                  => _x( 'Events', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Event', 'text_domain' ),
			'name_admin_bar'        => __( 'Events', 'text_domain' ),
			'archives'              => __( 'Events Archives', 'text_domain' ),
			'attributes'            => __( 'Events Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'All Items', 'text_domain' ),
			'add_new_item'          => __( 'Add New Item', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Item', 'text_domain' ),
			'edit_item'             => __( 'Edit Item', 'text_domain' ),
			'update_item'           => __( 'Update Item', 'text_domain' ),
			'view_item'             => __( 'View Item', 'text_domain' ),
			'view_items'            => __( 'View Items', 'text_domain' ),
			'search_items'          => __( 'Search Item', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Event', 'text_domain' ),
			'description'           => __( 'Post Type Description', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'excerpt', 'thumbnail', 'page-attributes'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 6,
			'menu_icon'             => 'dashicons-book',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type( 'events', $args );

	}



	function all_media() {
		$labels = array(
			'name'                  => _x( 'Media', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'The Media', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'The Media', 'text_domain' ),
			'name_admin_bar'        => __( 'Media', 'text_domain' ),
			'archives'              => __( 'Media Archives', 'text_domain' ),
			'attributes'            => __( 'Media Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'All Items', 'text_domain' ),
			'add_new_item'          => __( 'Add New Item', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Item', 'text_domain' ),
			'edit_item'             => __( 'Edit Item', 'text_domain' ),
			'update_item'           => __( 'Update Item', 'text_domain' ),
			'view_item'             => __( 'View Item', 'text_domain' ),
			'view_items'            => __( 'View Items', 'text_domain' ),
			'search_items'          => __( 'Search Item', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Media', 'text_domain' ),
			'description'           => __( 'Post Type Description', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail', 'page-attributes'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 6,
			'menu_icon'             => 'dashicons-media-text',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type( 'media', $args );

	}
	// function create_testimonials_cpt(){
	// 	$labels = array(
	// 		'name' => __( 'Testimonials', 'Post Type General Name', 'text_domain' ),
	// 		'singular_name' => __( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
	// 		'menu_name' => __( 'Testimonials', 'text_domain' ),
	// 		'name_admin_bar' => __( 'Testimonials', 'text_domain' ),
	// 		'archives' => __( 'Testimonial Archives', 'text_domain' ),
	// 		'attributes' => __( 'Testimonial Attributes', 'text_domain' ),
	// 		'parent_item_colon' => __( 'Parent Testimonial:', 'text_domain' ),
	// 		'all_items' => __( 'All Testimonial', 'text_domain' ),
	// 		'add_new_item' => __( 'Add New Testimonial', 'text_domain' ),
	// 		'add_new' => __( 'Add New', 'text_domain' ),
	// 		'new_item' => __( 'New Testimonial', 'text_domain' ),
	// 		'edit_item' => __( 'Edit Testimonial', 'text_domain' ),
	// 		'update_item' => __( 'Update Testimonial', 'text_domain' ),
	// 		'view_item' => __( 'View Testimonial', 'text_domain' ),
	// 		'view_items' => __( 'View Testimonial', 'text_domain' ),
	// 		'search_items' => __( 'Search Testimonial', 'text_domain' ),
	// 		'not_found' => __( 'Not found', 'text_domain' ),
	// 		'not_found_in_trash' => __( 'Not found in Trash', 'text_domain' ),
	// 		'featured_image' => __( 'Testimonial Image', 'text_domain' ),
	// 		'set_featured_image' => __( 'Set Testimonial image', 'text_domain' ),
	// 		'remove_featured_image' => __( 'Remove Testimonial image', 'text_domain' ),
	// 		'use_featured_image' => __( 'Use as Testimonial image', 'text_domain' ),
	// 		'insert_into_item' => __( 'Insert into Testimonial', 'text_domain' ),
	// 		'uploaded_to_this_item' => __( 'Uploaded to this Testimonial', 'text_domain' ),
	// 		'items_list' => __( 'Testimonial list', 'text_domain' ),
	// 		'items_list_navigation' => __( 'Testimonial list navigation', 'text_domain' ),
	// 		'filter_items_list' => __( 'Filter Testimonial list', 'text_domain' ),
	// 	);
	// 	$args = array(
	// 		'label' => __( 'Testimonial', 'text_domain' ),
	// 		'description' => __( 'Testimonial Custom Post type', 'text_domain' ),
	// 		'labels' => $labels,
	// 		'menu_icon' => 'dashicons-testimonial',
	// 		'supports' => array('title', 'excerpt', 'thumbnail', 'editor', 'page-attributes' ),
	// 		'public' => true,
	// 		'show_ui' => true,
	// 		'show_in_menu' => true,
	// 		'menu_position' => 9,
	// 		'show_in_admin_bar' => true,
	// 		'show_in_nav_menus' => true,
	// 		'can_export' => true,
	// 		'has_archive' => false,
	// 		'hierarchical' => false,
	// 		'exclude_from_search' => false,
	// 		'show_in_rest' => true,
	// 		'publicly_queryable' => true,
	// 		'capability_type' => 'post',
	// 	);
	// 	register_post_type( 'testimonials', $args );
	// }

	// function featured_video_cpt() {
	// 	$labels = array(
	// 		'name' => __('Video', 'Post Type General Name', 'text_domain'),
	// 		'singular_name' => __('Video', 'Post Type Singular Name', 'text_domain'),
	// 		'menu_name' => __('Video', 'text_domain'),
	// 	);
	// 	$args = array(
	// 		'label' => __('Video', 'text_domain'),
	// 		'description' => __('Video Custom Post type', 'text_domain'),
	// 		'labels' => $labels,
	// 		'menu_icon' => 'dashicons-video-alt3',
	// 		'supports' => array('title', 'excerpt', 'thumbnail', 'editor', 'page-attributes'),
	// 		'public' => true,
	// 		'show_ui' => true,
	// 		'show_in_menu' => true,
	// 		'menu_position' => 5,
	// 		'show_in_admin_bar' => true,
	// 		'show_in_nav_menus' => true,
	// 		'can_export' => true,
	// 		'has_archive' => false,
	// 		'hierarchical' => false,
	// 		'exclude_from_search' => false,
	// 		'show_in_rest' => true,
	// 		'publicly_queryable' => true,
	// 		'capability_type' => 'post',
	// 	);

	// 	register_post_type('video', $args);
	// 	$labels = array(
	// 		'name' => _x('Categories', 'taxonomy general name', 'text_domain'),
	// 		'singular_name' => _x('Categories', 'taxonomy singular name', 'text_domain'),
	// 	);
	// 	$args = array(
	// 		'labels' => $labels,
	// 		'description' => __('Video Category', 'text_domain'),
	// 		'hierarchical' => true,
	// 		'public' => true,
	// 		'publicly_queryable' => true,
	// 		'show_ui' => true,
	// 		'show_in_menu' => true,
	// 		'show_in_nav_menus' => true,
	// 		'show_in_rest' => false,
	// 		'show_tagcloud' => true,
	// 		'show_in_quick_edit' => true,
	// 		'show_admin_column' => true,
	// 		'map_meta_cap' => true,
	// 	);
	// 	register_taxonomy('video-category', array('video'), $args);
	// }

	function queryoftheday() {
		$labels = array(
			'name' => __('Query of the days', 'Post Type General Name', 'text_domain'),
			'singular_name' => __('Query of the day', 'Post Type Singular Name', 'text_domain'),
			'menu_name' => __('Query of the day', 'text_domain'),
		);
		$args = array(
			'label' => __('Query of the day', 'text_domain'),
			'description' => __('Query of the day Custom Post type', 'text_domain'),
			'labels' => $labels,
			'menu_icon' => 'dashicons-welcome-write-blog',
			'supports' => array('title', 'editor', 'page-attributes'),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 10,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => true,
			// 'rewrite' => array('slug' => 'about-gca/associated-districts'),
			'hierarchical' => false,
			'exclude_from_search' => false,
			'show_in_rest' => true,
			'publicly_queryable' => true,
			'capability_type' => 'post',
		);

		register_post_type('queryoftheday', $args);
	}

	// function knowledge_hub() {
	// 	$labels = array(
	// 		'name' => __('Knowledge-Hubs', 'Post Type General Name', 'text_domain'),
	// 		'singular_name' => __('Knowledge-Hub', 'Post Type Singular Name', 'text_domain'),
	// 		'menu_name' => __('Knowledge-Hub', 'text_domain'),
	// 	);
	// 	$args = array(
	// 		'label' => __('Knowledge-Hub', 'text_domain'),
	// 		'description' => __('Knowledge-Hub Custom Post type', 'text_domain'),
	// 		'labels' => $labels,
	// 		'menu_icon' => 'dashicons-welcome-write-blog',
	// 		'supports' => array('title', 'excerpt', 'thumbnail', 'page-attributes'),
	// 		'public' => true,
	// 		'show_ui' => true,
	// 		'show_in_menu' => true,
	// 		'menu_position' => 10,
	// 		'show_in_admin_bar' => true,
	// 		'show_in_nav_menus' => true,
	// 		'can_export' => true,
	// 		'has_archive' => true,
	// 		// 'rewrite' => array('slug' => 'about-gca/associated-districts'),
	// 		'hierarchical' => false,
	// 		'exclude_from_search' => false,
	// 		'show_in_rest' => true,
	// 		'publicly_queryable' => true,
	// 		'capability_type' => 'post',
	// 	);

	// 	register_post_type('knowledge-hub', $args);
	// 	$labels = array(
	// 		'name' => _x('Categories', 'taxonomy general name', 'text_domain'),
	// 		'singular_name' => _x('Categories', 'taxonomy singular name', 'text_domain'),
	// 	);
	// 	$args = array(
	// 		'labels' => $labels,
	// 		'description' => __('Knowledge-Hub Category', 'text_domain'),
	// 		'hierarchical' => true,
	// 		'public' => true,
	// 		'publicly_queryable' => true,
	// 		'show_ui' => true,
	// 		'show_in_menu' => true,
	// 		'show_in_nav_menus' => true,
	// 		'show_in_rest' => false,
	// 		'show_tagcloud' => true,
	// 		'show_in_quick_edit' => true,
	// 		'show_admin_column' => true,
	// 		'map_meta_cap' => true,
	// 	);
	// 	register_taxonomy('knowledge-hub-category', array('knowledge-hub'), $args);
	// }

	function location_cpt() {

		$labels = array(
			'name'                  => _x( 'Location', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Location', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Location', 'text_domain' ),
			'name_admin_bar'        => __( 'Location', 'text_domain' ),
			'archives'              => __( 'Location Archives', 'text_domain' ),
			'attributes'            => __( 'Location Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'All Items', 'text_domain' ),
			'add_new_item'          => __( 'Add New Item', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Item', 'text_domain' ),
			'edit_item'             => __( 'Edit Item', 'text_domain' ),
			'update_item'           => __( 'Update Item', 'text_domain' ),
			'view_item'             => __( 'View Item', 'text_domain' ),
			'view_items'            => __( 'View Items', 'text_domain' ),
			'search_items'          => __( 'Search Item', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Location', 'text_domain' ),
			'description'           => __( 'Post Type Description', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'excerpt', 'editor', 'page-attributes'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 6,
			'menu_icon'             => 'dashicons-businessman',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type( 'location', $args );

	}


}