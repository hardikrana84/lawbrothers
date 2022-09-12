<?php
add_action('add_meta_boxes', 'meta_boxes_init');
add_action('save_post', 'save_fields_all');
add_action('admin_footer', 'media_fields');

function meta_boxes_init() {
    // add_meta_box('banner_meta', __('Banner Fields', 'text-domain'), 'banner_meta_box', array('page','post','our-services'), 'advanced', 'default');
    add_meta_box('video_meta', __('Extra Fields', 'text-domain'), 'video_meta_box_callback', array('video'), 'advanced', 'default');
    add_meta_box('our-team', __('Extra Fields', 'text-domain'), 'ourteam_sociallinks', array('our-team'), 'advanced', 'default');
    add_meta_box('publications', __('Publications Extra Fields', 'text-domain'), 'home_publications', array('publications'), 'advanced', 'default');
    add_meta_box('media', __('Media Extra Fields', 'text-domain'), 'home_media', array('media'), 'advanced', 'default');
    add_meta_box('knowledge-hub', __('Publications Extra Fields', 'text-domain'), 'knowledge_hub_meta', array('knowledge-hub'), 'advanced', 'default');
    add_meta_box('location', __('Extra Fields', 'text-domain'), 'location', array('location'), 'advanced', 'default');
}


// function banner_meta_box() {
//     global $post;
//     wp_nonce_field('metafield_data', 'metafield_nonce');
//     $page_heading = get_post_meta($post->ID, 'page_heading', true);
//     $page_sub_heading = get_post_meta($post->ID, 'page_sub_heading', true);
//     $feature_image2 = get_post_meta($post->ID, 'feature_image2', true);


//     echo '<table class="form-table"><tbody>';
//     echo '<tr><td>Title</td><td><input style="width: 70%"  id="page_heading" name="page_heading" type="text" value="' . $page_heading . '"></td></tr>';
//     echo '<tr><td>Sub Title</td><td><input style="width: 70%"  id="page_sub_heading" name="page_sub_heading" type="text" value="' . $page_sub_heading . '"></td></tr>';
//     echo '<tr><td>Image</td><td><p>
//     <div class="form-field1 doc-wrap featuredImg">
//             <input width="500" type="text" name="feature_image2" value="'.$feature_image2.'">
//             <span class="dashicons dashicons-upload upload_img_btn"></span>';
//     echo '<div class="innerImg">';
//     if( !empty($feature_image2) ){
//         echo '<img src="'.$feature_image2.'" style="width:auto; max-width:200px;"/>';
//     }
//     echo '</div>';
//     echo '</div>';
//     echo '</p></td></tr>';
//     echo '</tbody></table>';
// }

function video_meta_box_callback() {
    global $post;
    wp_nonce_field('metafield_data', 'metafield_nonce');
    $video_url = get_post_meta($post->ID, 'video_url', true);


    echo '<table class="form-table"><tbody>';
    echo '<tr><td>Youtube Video URL</td><td><input  id="cover_photo" name="video_url" type="text" value="' . $video_url . '"></td></tr>';
    echo '</tbody></table>';
}

function ourteam_sociallinks() {
    global $post;
    wp_nonce_field('metafield_data', 'metafield_nonce');
    $designation = get_post_meta($post->ID, 'designation', true);
    $emailid = get_post_meta($post->ID, 'emailid', true);
    $memberlocation = get_post_meta($post->ID, 'memberlocation', true);
    $phonenumber = get_post_meta($post->ID, 'phonenumber', true);
    $facebook_url = get_post_meta($post->ID, 'facebook_url', true);
    $twitter_url = get_post_meta($post->ID, 'twitter_url', true);
    $linkedin_url = get_post_meta($post->ID, 'linkedin_url', true);
    $instagram_url = get_post_meta($post->ID, 'instagram_url', true);
    $youtube_url = get_post_meta($post->ID, 'youtube_url', true);
    echo '<table class="form-table"><tbody>';
    echo '<tr><td>Designation</td><td><input style="width: 70%"  id="designation" name="designation" type="text" value="' . $designation . '"></td></tr>';
    echo '<tr><td>Email ID</td><td><input style="width: 70%"  id="emailid" name="emailid" type="text" value="' . $emailid . '"></td></tr>';
    echo '<tr><td>Location</td><td><input style="width: 70%"  id="memberlocation" name="memberlocation" type="text" value="' . $memberlocation . '"></td></tr>';
    echo '<tr><td>Phone</td><td><input style="width: 70%"  id="phonenumber" name="phonenumber" type="text" value="' . $phonenumber . '"></td></tr>';
    echo '<tr><td>Facebook</td><td><input style="width: 70%"  id="facebook_url" name="facebook_url" type="text" value="' . $facebook_url . '"></td></tr>';
    echo '<tr><td>Twitter</td><td><input style="width: 70%" id="twitter_url" name="twitter_url" type="text" value="' . $twitter_url . '"></td></tr>';
    echo '<tr><td>Instagram</td><td><input style="width: 70%" id="instagram_url" name="instagram_url" type="text" value="' . $instagram_url . '"></td></tr>';
    echo '<tr><td>Linked In</td><td><input style="width: 70%"  id="linkedin_url" name="linkedin_url" type="text" value="' . $linkedin_url . '"></td></tr>';
    echo '<tr><td>Youtube</td><td><input style="width: 70%"  id="youtube_url" name="youtube_url" type="text" value="' . $youtube_url . '"></td></tr>';
    echo '</tbody></table>';
}

function location() {
    global $post;
    wp_nonce_field('metafield_data', 'metafield_nonce');
    $phonenumber = get_post_meta($post->ID, 'phonenumber', true);
    echo '<table class="form-table"><tbody>';
    echo '<tr><td>Phone</td><td><input style="width: 70%"  id="phonenumber" name="phonenumber" type="text" value="' . $phonenumber . '"></td></tr>';
    echo '</tbody></table>';
}    

function home_publications() {
    global $post;
    wp_nonce_field('metafield_data', 'metafield_nonce');
    $publication_url = get_post_meta($post->ID, 'publication_url', true);
    echo '<table class="form-table"><tbody>';
    echo '<tr><td>Publication URL</td><td><input style="width: 70%"  id="publication_url" name="publication_url" type="text" value="' . $publication_url . '"></td></tr>';
    echo '</tbody></table>';
}

function home_media() {
    global $post;
    wp_nonce_field('metafield_data', 'metafield_nonce');
    $media_url = get_post_meta($post->ID, 'media_url', true);
    echo '<table class="form-table"><tbody>';
    echo '<tr><td>Media URL</td><td><input style="width: 70%"  id="media_url" name="media_url" type="text" value="' . $media_url . '"></td></tr>';
    echo '</tbody></table>';
}

function knowledge_hub_meta() {
    global $post;
    wp_nonce_field('metafield_data', 'metafield_nonce');
    $pdf_url = get_post_meta($post->ID, 'pdf_url', true);
    $pdf_preview = !empty($pdf_url) ? "<img src='$pdf_url' style='width:50%'>" : '';
    echo '<table class="form-table"><tbody>';
    echo '<tr>';
    echo '<th>PDF</th>';
    echo '<td><input style="width: 70%" id="pdf_url" name="pdf_url" type="text" value="' . $pdf_url . '"> <input style="width: 19%" class="media" id="pdf_url_button" name="pdf_url_button" type="button" value="Upload" /><div class="cover_preview">' . $pdf_preview . '</div></td>';
    echo '</tr>';
    echo '</tbody></table>';

}

function save_fields_all($post_id) {
	
    if (!isset($_POST['metafield_nonce'])) {
        return $post_id;
    }

    $nonce = $_POST['metafield_nonce'];
    if (!wp_verify_nonce($nonce, 'metafield_data')) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    $post_type = get_post_type($post_id);
	// if( $post_type == 'page' || $post_type == 'post' || $post_type == 'our-services' ){
	// 	update_post_meta( $page_id ,'page_heading' , $page_heading );
	// 	update_post_meta( $page_id ,'page_sub_heading' , $page_sub_heading );
	// 	update_post_meta( $page_id ,'feature_image2' , $feature_image2 );
	// }

    if ($post_type == 'video') {
        update_post_meta($post_id, 'video_url', $_POST['video_url']);
        $videoId = parse_youtube_video_id_from_url($_POST['video_url']);
        if ($videoId) {
            $consult = brsfl_yt_api($videoId);
            if ($consult) {
                $youtube['yt_time'] = $consult['yt_time'];
                $youtube['yt_thumb'] = $consult['yt_thumb'];
                update_post_meta($post_id, 'youtube', $youtube);
            }
        }
    }

    if ($post_type == 'our-team') {
        update_post_meta($post_id, 'designation', $_POST['designation']);
        update_post_meta($post_id, 'emailid', $_POST['emailid']);
        update_post_meta($post_id, 'memberlocation', $_POST['memberlocation']);
        update_post_meta($post_id, 'phonenumber', $_POST['phonenumber']);
        update_post_meta($post_id, 'facebook_url', $_POST['facebook_url']);
        update_post_meta($post_id, 'twitter_url', $_POST['twitter_url']);
        update_post_meta($post_id, 'instagram_url', $_POST['instagram_url']);
        update_post_meta($post_id, 'linkedin_url', $_POST['linkedin_url']);
        update_post_meta($post_id, 'youtube_url', $_POST['youtube_url']);
    }

    if ($post_type == 'publications') {
        update_post_meta($post_id, 'publication_url', $_POST['publication_url']);
    }

    if ($post_type == 'media') {
        update_post_meta($post_id, 'media_url', $_POST['media_url']);
    }
    if ($post_type == 'knowledge-hub') {
        update_post_meta($post_id, 'pdf_url', $_POST['pdf_url']);
    }
    if ($post_type == 'location') {
        update_post_meta($post_id, 'phonenumber', $_POST['phonenumber']);
    }
}

function media_fields() {
    ?><script>
jQuery(document).ready(function($) {
    if (typeof wp.media !== 'undefined') {
        var _custom_media = true,
            _orig_send_attachment = wp.media.editor.send.attachment;

        jQuery(document).on('click', '.media', function() {
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var button = $(this);
            var id = button.attr('id').replace('_button', '');
            _custom_media = true;
            wp.media.editor.send.attachment = function(props, attachment) {
                if (_custom_media) {
                    $('input#' + id).val(attachment.url);
                    $('.dp').html('<img width="96" height="96" src="' + attachment.url + '"/>');
                    $('.cover_preview').html('<img  src="' + attachment.url + '"/>');
                } else {
                    return _orig_send_attachment.apply(this, [props, attachment]);
                };
            }
            wp.media.editor.open(button);
            return false;
        });
    }
});
</script><?php
}