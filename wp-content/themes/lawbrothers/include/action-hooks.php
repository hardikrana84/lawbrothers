<?php

new Action_Hooks();

class Action_Hooks{
	public function  __construct(){
		add_filter( 'body_class', array( $this,'gross-romanick_body_classes' ) );
		add_filter( 'wp_head', array( $this,'gross-romanick_pingback_header' ) );
	}
	public function gross-romanick_body_classes( $classes ){
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}
		return $classes;
	}
	public function gross-romanick_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}
}