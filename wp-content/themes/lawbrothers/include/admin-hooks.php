<?php
new Admin_Hook();
class Admin_Hook{
	public function __construct(){
		add_action( 'admin_enqueue_scripts', array($this,'gross_romanick_admin_scripts') );
		add_action( 'widgets_init', array($this,'gross_romanick_sidebars') );
		add_action( 'init', array($this,'register_navs') );
	}
	public function gross_romanick_admin_scripts(){
		wp_register_style( 'admin_customcss', TEMPDIR . '/assets/admin/css/admin-style.css' );
	}
	public  function gross_romanick_sidebars() {
		$args = array(
			'name'          => __( 'Footerblock1', 'gross-romanick' ),
			'id'            => 'footerblock1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widgettitle">',
			'after_title'   => '</h6>',
		);
		register_sidebar($args);
		$args = array(
			'name'          => __( 'Footerblock2', 'gross-romanick' ),
			'id'            => 'footerblock2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widgettitle">',
			'after_title'   => '</h6>',
		);
		register_sidebar($args);
		$args = array(
			'name'          => __( 'Footerblock3', 'gross-romanick' ),
			'id'            => 'footerblock3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widgettitle">',
			'after_title'   => '</h6>',
		);
		register_sidebar($args);
		$args = array(
			'name'          => __( 'Footerblock4', 'gross-romanick' ),
			'id'            => 'footerblock4',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widgettitle">',
			'after_title'   => '</h6>',
		);
		register_sidebar($args);
		$args = array(
			'name'          => __( 'Footerblock5', 'gross-romanick' ),
			'id'            => 'footerblock5',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widgettitle">',
			'after_title'   => '</h6>',
		);
		register_sidebar($args);
		$args = array(
			'name'          => __( 'Copyright', 'gross-romanick' ),
			'id'            => 'copyright',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widgettitle">',
			'after_title'   => '</h6>',
		);
		register_sidebar($args);
	}
	public function register_navs() {
		$locations = array(
			'footer_menu' => __( 'Footer menu', 'gross-romanick' ),
			'social_links' => __( 'Social links', 'gross-romanick' ),
		);
		register_nav_menus( $locations );
	}
}
