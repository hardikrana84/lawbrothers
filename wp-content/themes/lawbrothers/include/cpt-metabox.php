<?php
add_action('add_meta_boxes', 'meta_boxes_init');
add_action('save_post', 'save_fields_all');
add_action('admin_footer', 'media_fields');

function meta_boxes_init() {
    add_meta_box('video_meta', __('Extra Fields', 'text-domain'), 'video_meta_box_callback', array('video'), 'advanced', 'default');
    add_meta_box('our-team', __('Extra Fields', 'text-domain'), 'ourteam_sociallinks', array('our-team'), 'advanced', 'default');
}

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
    $phonenumber = get_post_meta($post->ID, 'phonenumber', true);
    $facebook_url = get_post_meta($post->ID, 'facebook_url', true);
    $twitter_url = get_post_meta($post->ID, 'twitter_url', true);
    $linkedin_url = get_post_meta($post->ID, 'linkedin_url', true);
    echo '<table class="form-table"><tbody>';
    echo '<tr><td>Designation</td><td><input style="width: 70%"  id="designation" name="designation" type="text" value="' . $designation . '"></td></tr>';
    echo '<tr><td>Email ID</td><td><input style="width: 70%"  id="emailid" name="emailid" type="text" value="' . $emailid . '"></td></tr>';
    echo '<tr><td>Phone</td><td><input style="width: 70%"  id="phonenumber" name="phonenumber" type="text" value="' . $phonenumber . '"></td></tr>';
    echo '<tr><td>Facebook</td><td><input style="width: 70%"  id="facebook_url" name="facebook_url" type="text" value="' . $facebook_url . '"></td></tr>';
    echo '<tr><td>Twitter</td><td><input style="width: 70%" id="twitter_url" name="twitter_url" type="text" value="' . $twitter_url . '"></td></tr>';
    echo '<tr><td>Linked In</td><td><input style="width: 70%"  id="linkedin_url" name="linkedin_url" type="text" value="' . $linkedin_url . '"></td></tr>';
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
        update_post_meta($post_id, 'phonenumber', $_POST['phonenumber']);
        update_post_meta($post_id, 'facebook_url', $_POST['facebook_url']);
        update_post_meta($post_id, 'twitter_url', $_POST['twitter_url']);
        update_post_meta($post_id, 'linkedin_url', $_POST['linkedin_url']);
    }
}

function media_fields() {
    ?><script>
            jQuery(document).ready(function ($) {
                if (typeof wp.media !== 'undefined') {
                    var _custom_media = true,
                            _orig_send_attachment = wp.media.editor.send.attachment;
                    jQuery(document).on('click', '.media', function () {
                        var send_attachment_bkp = wp.media.editor.send.attachment;
                        var button = $(this);
                        var id = button.attr('id').replace('_button', '');
                        _custom_media = true;
                        wp.media.editor.send.attachment = function (props, attachment) {
                            if (_custom_media) {
                                $('input#' + id).val(attachment.url);
                                $('.dp').html('<img width="96" height="96" src="' + attachment.url + '"/>');
                                $('.cover_preview').html('<img  src="' + attachment.url + '"/>');
                            } else {
                                return _orig_send_attachment.apply(this, [props, attachment]);
                            }
                            ;
                        }
                        wp.media.editor.open(button);
                        return false;
                    });
                }
            });
    </script><?php
}