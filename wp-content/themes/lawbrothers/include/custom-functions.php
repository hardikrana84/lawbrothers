<?php

function parse_youtube_video_id_from_url($video_url) {
    $video_id = '';
    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_url, $match)) {
        $video_id = $match[1];
    }
    return $video_id;
}

function brsfl_yt_api($video_id) {
    $youtube_api_key = 'AIzaSyCFZZLnuWEE889E8-h5mpyv1z44Zx4HwLU';

    $api_url = 'https://www.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id=' . $video_id . '&key=' . $youtube_api_key;

    $youtube = json_decode(file_get_contents($api_url));
    // Full response: https://gist.github.com/e5a8cda8141b10711ad2
    if (isset($youtube->items[0])) {
        $item = $youtube->items[0];
        $return['yt_time'] = covtime($item->contentDetails->duration);
        $return['yt_thumb'] = isset($item->snippet->thumbnails->standard->url)?$item->snippet->thumbnails->standard->url:(isset($item->snippet->thumbnails->medium->url)?$item->snippet->thumbnails->medium->url:$item->snippet->thumbnails->default->url);

        return $return;
    }
    return false;
}

function covtime($yt) {
    $yt = str_replace(['P', 'T'], '', $yt);
    foreach (['D', 'H', 'M', 'S'] as $a) {
        $pos = strpos($yt, $a);
        if ($pos !== false)
            ${$a} = substr($yt, 0, $pos);
        else {
            ${$a} = 0;
            continue;
        }
        $yt = substr($yt, $pos + 1);
    }
    if ($D > 0) {
        $M = str_pad($M, 2, '0', STR_PAD_LEFT);
        $S = str_pad($S, 2, '0', STR_PAD_LEFT);
        return ($H + (24 * $D)) . ":$M:$S"; // add days to hours
    } elseif ($H > 0) {
        $M = str_pad($M, 2, '0', STR_PAD_LEFT);
        $S = str_pad($S, 2, '0', STR_PAD_LEFT);
        return "$H:$M:$S";
    } else {
        $S = str_pad($S, 2, '0', STR_PAD_LEFT);
        return "$M:$S";
    }
}



