<?php

new Action_Hooks();

class Action_Hooks{
	public function  __construct(){
		add_filter( 'body_class', array( $this,'hr_body_classes' ) );
		add_filter( 'wp_head', array( $this,'hr_pingback_header' ) );
		add_action('wp_footer', array($this, 'governor_popup_cb'));
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

	public function governor_popup_cb() {
        echo '<div class="modal fade boardofgovernorspopup" id="GurnaniModal" role="dialog" aria-hidden="false">
				 <div class="modal-dialog">
					<div class="modal-content">
						<button type="button" class="close" data-dismiss="modal">x</button>
						<div class="modal-body">
							<div class="memberimg">
								<img id="memberimg" class="fleft imgmargin" src="" alt="Member Photo">
							</div>
							<div class="memberinfo">
								<div class="modal-title"><h4 id="membertitle"></h4><br>
									<span>(<b id="memberdesignation"></b>)</span><p id="governorpos"></p>
								</div>
								<div id="memberdesc"></div>
							</div>
						</div>
					</div>
				 </div>
  				</div>';
    }
}