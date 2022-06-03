<?php
new Create_Shortcodes();
class Create_Shortcodes{
	public function __construct(){
		add_shortcode('home-slider' , array( $this,'homeslider_shortcode' ) );
		add_shortcode('allourservices' , array( $this,'ourservices_shortcode' ) );
		add_shortcode('ourteam', array($this, 'ourteam_shortcode'));
		add_shortcode('featuredvideo', array($this, 'featuredvideo_shortcode'));
		add_shortcode('video-categories-list', array($this, 'video_categories_list_shortcode'));
		add_shortcode('articles', array($this, 'article_shortcode'));
		add_shortcode('articles-categories-list', array($this, 'article_categories_list_shortcode'));
	}
	public function homeslider_shortcode($atts){
		$atts = shortcode_atts( array('limit' => 8,),$atts);
		$limit = $atts['limit'];
		$args = array(
			'post_type'      => 'homeslider',
			'posts_per_page' => $limit,
			'post_status'    => 'publish'
		);
		$slider = new WP_Query($args);
		$slider_output = '';
		if( $slider->have_posts() ){
			$slider_output .= '<div class="mainslider">';
			while ( $slider->have_posts() ) {
				$slider->the_post();
				$title = get_the_title();
				//$desc  = wp_trim_words( get_the_excerpt(), 40, '...' );
				$editor = get_the_content();
				$image = get_the_post_thumbnail_url(get_the_ID(),'full');
				$slider_output .= '<div class="banneritem" data-title="'.$title.'">
					<div class="banner-img">
					<img src="'.$image.'" alt=""/>
					</div>
					<div class="bannerinfo">
						<div class="description">'.$editor.'</div>
					</div>
				</div>';
			}
			$slider_output .= '</div>';
		}
		return $slider_output;
	}
	public function ourservices_shortcode($atts){
		$atts = shortcode_atts( array('limit' => 8,),$atts);
		$limit = $atts['limit'];
		$args = array(
			'post_type'      => 'our-services',
			'posts_per_page' => $limit,
			'post_status'    => 'publish'
		);
		$slider = new WP_Query($args);
		$slider_output = '';
		if( $slider->have_posts() ){
			$slider_output .= '<div class="home-services">';
			while ( $slider->have_posts() ) {
				$slider->the_post();
				$title = get_the_title();
				$link = get_the_permalink();
				$desc  = wp_trim_words( get_the_excerpt(), 40, '...' );
				$editor = get_the_content();
				$excerpt = get_the_excerpt();
				$image = get_the_post_thumbnail_url(get_the_ID(),'full');
				$slider_output .= '
					<div class="card">
					<div class="icon"><img src="'.$image.'" alt=""/> </div>
					<div class="card-body">
					<h3><a href="' . $link . '">'.$title.'</a></h3>
					<p class="short-desc">'.$excerpt.' </p>
					<a href="' . $link . '" class="btn btn-outline-primary">Learn More</a>
					</div>
					</div>';
			}
			$slider_output .= '</div>';
		}
		return $slider_output;
	}
	public function ourteam_shortcode($atts){
		$atts = shortcode_atts( array('limit' => 8,),$atts);
		$limit = $atts['limit'];
		$args = array(
			'post_type'      => 'our-team',
			'posts_per_page' => $limit,
			'post_status'    => 'publish'
		);
		$slider = new WP_Query($args);
		$slider_output = '';
		if( $slider->have_posts() ){
			$slider_output .= '<div class="ourteamrow"><div class="ourteamslider">';
			while ( $slider->have_posts() ) {
				$slider->the_post();
				$title = get_the_title();
				$link = get_the_permalink();
				$post_id = get_the_id();
				$designation = get_post_meta($post_id, 'designation', true);
				$emailid = get_post_meta($post_id, 'emailid', true);
				$phonenumber = get_post_meta($post_id, 'phonenumber', true);
				$facebook_url = get_post_meta($post_id, 'facebook_url', true);
				$twitter_url = get_post_meta($post_id, 'twitter_url', true);
				$linkedin_url = get_post_meta($post_id, 'linkedin_url', true);
				$desc  = wp_trim_words( get_the_excerpt(), 40, '...' );
				$editor = get_the_content();
				$excerpt = get_the_excerpt();
				$excerpt_meta= !empty($excerpt)? "<p>$excerpt</p>":'';
				$date = get_the_date();
				// echo '<pre>';
				// print_r( $postmeta1 );
				// echo '</pre>';
				// $image = get_the_post_thumbnail_url(get_the_ID(),'full');
				$image = get_the_post_thumbnail(get_the_ID(), 'full');
				$slider_output .= '<div class="card">
					<div class="card-img">
						<a href="' . $link . '">' .$image. '</a>
					</div>
					<div class="card-body">
						<h2><strong>'.$designation.'</strong> '.$title.'</h2>
						'.$excerpt_meta.'
						<div class="profileinfo">
							<p><a href="mailto:' . $emailid . '"><span><i class="far fa-envelope"></i></span> : '.$emailid.'</a></p>
							<p><a href="tel:'.$phonenumber.'"><span><i class="fas fa-phone-volume"></i></span> : '.$phonenumber.'</a></p>
						</div>
						<a href="' . $link . '" class="btn btn-outline-primary viewfullbio">View full bio</a>
						<div class="sociallinks">
							<a href="'.$facebook_url.'" target="_blank"><i class="fab fa-facebook-f"></i></a>
							<a href="'.$twitter_url.'" target="_blank"><i class="fab fa-twitter"></i></a>
							<a href="'.$linkedin_url.'" target="_blank"><i class="fab fa-linkedin"></i></a>
						</div>
					</div>
				</div>';
			}
			$slider_output .= '</div></div>';
		}
		return $slider_output;
	}

	public function featuredvideo_shortcode($atts){
		$atts = shortcode_atts( array('limit' => -1,),$atts);
		$limit = $atts['limit'];
		$args = array(
			'post_type'      => 'video',
			'posts_per_page' => $limit,
			'post_status'    => 'publish'
		);
		$slider = new WP_Query($args);
		$slider_output = '';
		if( $slider->have_posts() ){
			$slider_output .= '<div class=""><ul>';
			while ( $slider->have_posts() ) {
				$slider->the_post();
				$title = get_the_title();
				$link = get_the_permalink();
				$editor = get_the_content();
				$excerpt = get_the_excerpt();
				$date = get_the_date();
				// echo '<pre>';
				// print_r( $postmeta1 );
				// echo '</pre>';
				// $image = get_the_post_thumbnail_url(get_the_ID(),'full');
				$image = get_the_post_thumbnail(get_the_ID(), 'full');
				$slider_output .= '<li><a href="' . $link . '">'.$title.'</a></li>';
			}
			$slider_output .= '</ul></div>';
		}
		return $slider_output;
	}

	public function video_categories_list_shortcode($atts) {
        $atts = shortcode_atts(array('limit' => -1,'category'=>''), $atts);
        $limit = $atts['limit'];
        $category=$atts['category'];
        $args = array(
            'post_type' => 'video',
            'posts_per_page' => $limit,
            'post_status' => 'publish',
            'orderby' => 'menu_order',
            'order' => 'ASC',
        );
        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'video-category',
                    'field' => 'slug',
                    'terms' => $category,
                ),
            );
        }
        $slider = new WP_Query($args);
        $output = '';
        if ($slider->have_posts()) {
            $output .= '<div class="video-category">';
            while ($slider->have_posts()) {
                $slider->the_post();
				$link = get_the_permalink();
                $title = get_the_title();
                //$content=get_the_content();
				$post_id = get_the_ID();
                $title = get_the_title();
				$link = get_the_permalink();
                $desc = get_the_content();
                $excerpt = get_the_excerpt();
                //$youtubeMeta = get_post_meta($post_id, 'youtube', true);
                $youtubeUrl = get_post_meta($post_id, 'video_url', true);
                $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                if (!$image) {
                    $image = get_template_directory_uri() . '/images/image-notavailable.jpg';
                }
                if (!$image) {
                    $image = $youtubeMeta['yt_thumb'];
                }
                $output .= '<div class="videoblock">' . '
					<div class="videoimg">
						<a data-fancybox href="' . $youtubeUrl . '" target="_blank"><img src="' . $image . '" /></a>
					</div>
					<div class="videinfo">
						<h6><a data-fancybox href="' . $link . '">' . $title . '</a></h6>   
					</div>
				</div>';
            }
            $output .= '</div>';
        }
        return $output;
    }

	public function article_shortcode($atts){
		$atts = shortcode_atts( array('limit' => -1,),$atts);
		$limit = $atts['limit'];
		$args = array(
			'post_type'      => 'article',
			'posts_per_page' => $limit,
			'post_status'    => 'publish'
		);
		$slider = new WP_Query($args);
		$slider_output = '';
		if( $slider->have_posts() ){
			$slider_output .= '<div class=""><ul>';
			while ( $slider->have_posts() ) {
				$slider->the_post();
				$title = get_the_title();
				$link = get_the_permalink();
				$editor = get_the_content();
				$excerpt = get_the_excerpt();
				$date = get_the_date();
				// echo '<pre>';
				// print_r( $postmeta1 );
				// echo '</pre>';
				// $image = get_the_post_thumbnail_url(get_the_ID(),'full');
				$image = get_the_post_thumbnail(get_the_ID(), 'full');
				$slider_output .= '<li><a href="' . $link . '">'.$title.'</a></li>';
			}
			$slider_output .= '</ul></div>';
		}
		return $slider_output;
	}

	public function article_categories_list_shortcode($atts) {
        $atts = shortcode_atts(array('limit' => -1,'category'=>''), $atts);
        $limit = $atts['limit'];
        $category=$atts['category'];
        $args = array(
            'post_type' => 'article',
            'posts_per_page' => $limit,
            'post_status' => 'publish',
            'orderby' => 'menu_order',
            'order' => 'ASC',
        );
        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'article-category',
                    'field' => 'slug',
                    'terms' => $category,
                ),
            );
        }
        $slider = new WP_Query($args);
        $output = '';
        if ($slider->have_posts()) {
            $output .= '<div class="article-category"><ul>';
            while ($slider->have_posts()) {
                $slider->the_post();
				$link = get_the_permalink();
                $title = get_the_title();
                //$content=get_the_content();
                $id = get_the_ID();
                $output .= '<li><a href="' . $link . '">'.$title.'</a></li>';
            }
            $output .= '</ul></div>';
        }
        return $output;
    }
}