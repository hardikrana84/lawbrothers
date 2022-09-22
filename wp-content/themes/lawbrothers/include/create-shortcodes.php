<?php
new Create_Shortcodes();
class Create_Shortcodes{
	public function __construct(){
		add_shortcode('home-slider' , array( $this,'homeslider_shortcode' ) );
		add_shortcode('ourteam', array($this, 'ourteam_shortcode'));
		add_shortcode('allourservices' , array( $this,'ourservices_shortcode' ) );
		add_shortcode('home-publications', array($this, 'home_publications_shortcode'));
		add_shortcode('home-media', array($this, 'home_media_shortcode'));
		add_shortcode('featuredvideo', array($this, 'featuredvideo_shortcode'));
		add_shortcode('video-categories-list', array($this, 'video_categories_list_shortcode'));
		add_shortcode('articles', array($this, 'article_shortcode'));
		add_shortcode('articles-categories-list', array($this, 'article_categories_list_shortcode'));
		add_shortcode('knowledge-hub', array($this, 'knowledge_hub_shortcode'));
		add_shortcode('knowledge-hub-categories-list', array($this, 'knowledge_hub_categories_list_shortcode'));
		add_shortcode('clientslider', array($this, 'clientslider_shortcode'));
		add_shortcode('alllocation', array($this, 'location_shortcode'));
	}
	public function homeslider_shortcode($atts){
		$atts = shortcode_atts( array('limit' => 8,),$atts);
		$limit = $atts['limit'];
		$args = array(
			'post_type'      => 'homeslider',
			'orderby' => 'menu_order',
            'order' => 'ASC',
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

	public function ourteam_shortcode($atts){
		if (is_front_page()){
			$atts = shortcode_atts( array('limit' => 8,),$atts);
		}else{
			$atts = shortcode_atts( array('limit' => -1,),$atts);
		}
		$atts = shortcode_atts( array('limit' => -1,),$atts);
		$limit = $atts['limit'];
		$args = array(
			'post_type'      => 'our-team',
			'orderby' => 'menu_order',
            'order' => 'ASC',
			'posts_per_page' => $limit,
			'post_status'    => 'publish'
		);
		$slider = new WP_Query($args);
		$slider_output = '';
		if( $slider->have_posts() ){
			if (is_page('our-team')){
				$slider_output .= '<div class="ourteamrow"><div class="ourteamwithoutslider">';
			}else{
				$slider_output .= '<div class="ourteamrow"><div class="ourteamslider">';
			}
			while ( $slider->have_posts() ) {
				$slider->the_post();
				$title = get_the_title();
				$link = get_the_permalink();
				$post_id = get_the_id();
				$designation = get_post_meta($post_id, 'designation', true);
				$emailid = get_post_meta($post_id, 'emailid', true);
				$memberlocation = get_post_meta($post_id, 'memberlocation', true);
				$phonenumber = get_post_meta($post_id, 'phonenumber', true);
				$facebook_url = get_post_meta($post_id, 'facebook_url', true);
				$twitter_url = get_post_meta($post_id, 'twitter_url', true);
				$instagram_url = get_post_meta($post_id, 'instagram_url', true);
				$linkedin_url = get_post_meta($post_id, 'linkedin_url', true);
				$youtube_url = get_post_meta($post_id, 'youtube_url', true);
				//$desc  = wp_trim_words( get_the_excerpt(), 100, '...' );
				$desc  = get_the_excerpt();
				$editor = get_the_content();
				$excerpt = get_the_excerpt();
				$excerpt_meta= !empty($excerpt)? "<p>$excerpt</p>":'';
				$date = get_the_date();
				// echo '<pre>';
				// print_r( $postmeta1 );
				// echo '</pre>';
				$imageurl = get_the_post_thumbnail_url(get_the_ID(),'full');
				$image = get_the_post_thumbnail(get_the_ID(), 'full');
				// $slider_output .= '<div class="card" data-title="' . $title . '" data-designation="' . $designation . '" data-desc="' . $desc . '" data-image="' . $imageurl . '" >
				$slider_output .= '<div class="card">
					<div class="card-img">
						<a href="' . $link . '">' .$image. '</a>
					</div>
					<div class="card-body">
						<h5> '.$title.' <span>'.$designation.'</span></h5>
						<div class="profileinfo" style="display:none;">
							<p><a href="mailto:' . $emailid . '"><span><i class="far fa-envelope"></i></span> : '.$emailid.'</a></p>
							<p><a href="tel:'.$phonenumber.'"><span><i class="fas fa-phone-volume"></i></span> : '.$phonenumber.'</a></p>
							<a href="' . $link . '" class="btn btn-outline-primary viewfullbio">View full bio</a>
						</div>
						
						<div class="sociallinks">
						    <a href="'.$youtube_url.'" target="_blank"><i class="fab fa-youtube"></i></a>
							<a href="'.$facebook_url.'" target="_blank"><i class="fab fa-facebook-f"></i></a>
							<a href="'.$linkedin_url.'" target="_blank"><i class="fab fa-linkedin"></i></a>
							<a href="'.$twitter_url.'" target="_blank"><i class="fab fa-twitter"></i></a>
							<a href="'.$instagram_url.'" target="_blank"><i class="fab fa-instagram"></i></a>
						</div>
						<div class="cardinfo">
						'.$desc.'
						</div>
						<!--  <a class="myBtn" href="javascript:void;">Read More</a> popup work -->
						<a class="teambtn" href="' . $link . '">Read More</a>

					</div>
				</div>';
			}
			$slider_output .= '</div></div>';
		}
		return $slider_output;
	}

	public function ourservices_shortcode($atts){
		if (is_front_page()){
			$atts = shortcode_atts( array('limit' => 8,),$atts);
		}else{
			$atts = shortcode_atts( array('limit' => -1,),$atts);
		}

		$limit = $atts['limit'];
		$args = array(
			'post_type'      => 'our-services',
			'orderby' => 'menu_order',
            'order' => 'ASC',
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
				$page_heading = get_post_meta( get_the_ID() ,'page_heading' ,true );
				$page_sub_heading = get_post_meta( get_the_ID() ,'page_sub_heading' ,true );
				$feature_image2 = get_post_meta( get_the_ID() ,'feature_image2' ,true );
				$slider_output .= '
					<div class="card">
					<div class="icon"><img src="'.$feature_image2.'" alt=""/> </div>
					<div class="card-body">
					<h3><a href="' . $link . '">'.$title.'</a></h3>
					<p class="short-desc">'.$page_sub_heading.' </p>
					<a href="' . $link . '" class="btn link">Read More</a>
					</div>
					</div>';
			}
			$slider_output .= '</div>';
		}
		return $slider_output;
	}

	public function home_publications_shortcode($atts){
		$atts = shortcode_atts( array('limit' => 8,),$atts);
		$limit = $atts['limit'];
		$args = array(
			'post_type'      => 'publications',
			'orderby' => 'menu_order',
            'order' => 'ASC',
			'posts_per_page' => $limit,
			'post_status'    => 'publish'
		);
		$slider = new WP_Query($args);
		$slider_output = '';
		if( $slider->have_posts() ){
			$slider_output .= '<div class="publicationrow"><div class="publication-slider">';
			while ( $slider->have_posts() ) {
				$slider->the_post();
				$title = get_the_title();
				$link = get_the_permalink();
				$post_id = get_the_id();
				$publication_url = get_post_meta($post_id, 'publication_url', true);
				$excerpt_meta= !empty($excerpt)? "<p>$excerpt</p>":'';
				$date = get_the_date();
				// echo '<pre>';
				// print_r( $postmeta1 );
				// echo '</pre>';
				// $image = get_the_post_thumbnail_url(get_the_ID(),'full');
				$image = get_the_post_thumbnail(get_the_ID(), 'full');
				$slider_output .= '<div class="card">
					<h6>'. $title .'</h6>
					<div class="card-img">
						<a href="' . $publication_url . '">' .$image. '</a>
					</div>
					<div class="card-body">
						<a href="' . $publication_url . '" class="btn knowmore">Know More</a>
					</div>
				</div>';
			}
			$slider_output .= '</div></div>';
		}
		return $slider_output;
	}

	public function home_media_shortcode($atts){
		$atts = shortcode_atts( array('limit' => 8,),$atts);
		$limit = $atts['limit'];
		$args = array(
			'post_type'      => 'media',
			'orderby' => 'menu_order',
            'order' => 'ASC',
			'posts_per_page' => $limit,
			'post_status'    => 'publish'
		);
		$slider = new WP_Query($args);
		$slider_output = '';
		if( $slider->have_posts() ){
			$slider_output .= '<div class="mediarow"><div class="media-slider">';
			while ( $slider->have_posts() ) {
				$slider->the_post();
				$title = get_the_title();
				$link = get_the_permalink();
				$post_id = get_the_id();
				$media_url = get_post_meta($post_id, 'media_url', true);
				$excerpt_meta= !empty($excerpt)? "<p>$excerpt</p>":'';
				$date = get_the_date();
				// echo '<pre>';
				// print_r( $postmeta1 );
				// echo '</pre>';
				// $image = get_the_post_thumbnail_url(get_the_ID(),'full');
				$image = get_the_post_thumbnail(get_the_ID(), 'full');
				$slider_output .= '<div class="card">
					<div class="card-img">
						<a href="' . $media_url . '">' .$image. '</a>
					</div>
					<div class="card-body">
						<a href="' . $media_url . '" class="btn knowmore">Know More</a>
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
			'orderby' => 'menu_order',
            'order' => 'ASC',
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
			'orderby' => 'menu_order',
            'order' => 'ASC',
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

	public function knowledge_hub_shortcode($atts){
		$atts = shortcode_atts( array('limit' => -1,),$atts);
		$limit = $atts['limit'];
		$args = array(
			'post_type'      => 'knowledge-hub',
			'orderby' => 'menu_order',
            'order' => 'ASC',
			'posts_per_page' => $limit,
			'post_status'    => 'publish'
		);
		$slider = new WP_Query($args);
		$slider_output = '';
		if( $slider->have_posts() ){
			$slider_output .= '<div class="knowledgerow">';
			while ( $slider->have_posts() ) {
				$slider->the_post();
				$title = get_the_title();
				$link = get_the_permalink();
				$post_id = get_the_id();
				$pdf_url = get_post_meta($post_id, 'pdf_url', true);
				$excerpt_meta= !empty($excerpt)? "<p>$excerpt</p>":'';
				$date = get_the_date();
				// echo '<pre>';
				// print_r( $postmeta1 );
				// echo '</pre>';
				// $image = get_the_post_thumbnail_url(get_the_ID(),'full');
				$image = get_the_post_thumbnail(get_the_ID(), 'full');
				$slider_output .= '<div class="card">
					<h6>'. $title .'</h6>
					<div class="card-img">
						<a href="' . $pdf_url . '">' .$image. '</a>
					</div>
					<div class="card-body">
						<a href="' . $pdf_url . '" class="btn knowmore">Know More</a>
					</div>
				</div>';
			}
			$slider_output .= '</div>';
		}
		return $slider_output;
	}

	public function knowledge_hub_categories_list_shortcode($atts) {
        $atts = shortcode_atts(array('limit' => -1,'category'=>''), $atts);
        $limit = $atts['limit'];
        $category=$atts['category'];
        $args = array(
            'post_type' => 'knowledge-hub',
            'posts_per_page' => $limit,
            'post_status' => 'publish',
            'orderby' => 'menu_order',
            'order' => 'ASC',
        );
        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'knowledge-hub-category',
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


	public function clientslider_shortcode($atts){
		$atts = shortcode_atts( array('limit' => -1,),$atts);
		$limit = $atts['limit'];
		$args = array(
			'post_type'      => 'clients',
			'orderby' => 'menu_order',
            'order' => 'ASC',
			'posts_per_page' => $limit,
			'post_status'    => 'publish'
		);
		$slider = new WP_Query($args);
		$slider_output = '';
		if( $slider->have_posts() ){
			$slider_output .= '
			<div class="client-slider">';
			while ( $slider->have_posts() ) {
				$slider->the_post();
				$title = get_the_title();
				//$desc  = wp_trim_words( get_the_content(), 40, '...' );
				$image = get_the_post_thumbnail_url(get_the_ID(),'full');
				$slider_output .= '<div class="partnerblock">
					<img src="'.$image.'" alt=""/>
				</div>';
			}
			$slider_output .= '</div>';
		}
		return $slider_output;
	}

	public function location_shortcode($atts){
		$atts = shortcode_atts( array('limit' => -1,),$atts);
		$limit = $atts['limit'];
		$args = array(
			'post_type'      => 'location',
			'orderby' => 'menu_order',
            'order' => 'ASC',
			'posts_per_page' => $limit,
			'post_status'    => 'publish'
		);
		$slider = new WP_Query($args);
		$slider_output = '';
		if( $slider->have_posts() ){
			$slider_output .= '<div class="locationrow">';
			while ( $slider->have_posts() ) {
				$slider->the_post();
				$title = get_the_title();
				$link = get_the_permalink();
				$post_id = get_the_id();
				$desc  = get_the_excerpt();
				$editor = get_the_content();
				$phonenumber = get_post_meta($post_id, 'phonenumber', true);
				$direction = get_post_meta($post_id, 'direction', true);;
				$excerpt_meta= !empty($excerpt)? "<p>$excerpt</p>":'';
				$date = get_the_date();
				$slider_output .= '<div class="location-info">
										<h5>'.$title.'</h5> 
										<p>'.$editor.'</p>
										<a href="'.$direction.'" target="_blank"><i class="fa fa-map-marker" aria-hidden="true"> </i> Get Direction </a>
								    </div>';
			}
			$slider_output .= '</div>';
		}
		return $slider_output;
	}
}