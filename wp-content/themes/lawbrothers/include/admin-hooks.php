<?php
new Admin_Hook();
class Admin_Hook{
	public function __construct(){
		add_action( 'admin_enqueue_scripts', array($this,'hr_admin_scripts') );
		add_action( 'widgets_init', array($this,'hr_sidebars') );
		add_action( 'init', array($this,'register_navs') );
	}
	public function hr_admin_scripts(){
		wp_register_style( 'admin_customcss', TEMPDIR . '/assets/admin/css/admin-style.css' );
	}
	public  function hr_sidebars() {
		$args = array(
			'name'          => __( 'Footerblock1', 'hr-theme' ),
			'id'            => 'footerblock1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widgettitle">',
			'after_title'   => '</h5>',
		);
		register_sidebar($args);
		$args = array(
			'name'          => __( 'Footerblock2', 'hr-theme' ),
			'id'            => 'footerblock2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widgettitle">',
			'after_title'   => '</h5>',
		);
		register_sidebar($args);
		$args = array(
			'name'          => __( 'Footerblock3', 'hr-theme' ),
			'id'            => 'footerblock3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widgettitle">',
			'after_title'   => '</h5>',
		);
		register_sidebar($args);
		$args = array(
			'name'          => __( 'Footerblock4', 'hr-theme' ),
			'id'            => 'footerblock4',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widgettitle">',
			'after_title'   => '</h5>',
		);
		register_sidebar($args);
		$args = array(
			'name'          => __( 'Copyright', 'hr-theme' ),
			'id'            => 'copyright',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widgettitle">',
			'after_title'   => '</h5>',
		);
		register_sidebar($args);
		$args = array(
			'name'          => __( 'Services', 'hr-theme' ),
			'id'            => 'services',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		);
		register_sidebar($args);
	}
	public function register_navs() {
		$locations = array(
			'footer_menu' => __( 'Footer menu', 'hr-theme' ),
			'social_links' => __( 'Social links', 'hr-theme' ),
		);
		register_nav_menus( $locations );
	}
}