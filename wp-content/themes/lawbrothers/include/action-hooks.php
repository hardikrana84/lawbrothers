<?php

new Action_Hooks();

class Action_Hooks{
	public function  __construct(){
		add_filter( 'body_class', array( $this,'hr_body_classes' ) );
		add_filter( 'wp_head', array( $this,'hr_pingback_header' ) );
	}
	public function hr_body_classes( $classes ){
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}
		return $classes;
	}
	public function hr_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}
}