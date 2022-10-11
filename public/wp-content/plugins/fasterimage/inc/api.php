<?php

function fasterimage_api_getinfo($sApiKey = false) {
    global $wp_version;
    if($sApiKey === false) {
        $aOptions = get_option('fasterImagePlugin');

        if(isset($aOptions['fasterimage_api_key']) && strlen($aOptions['fasterimage_api_key']) > 0 ) {
            $sApiKey = $aOptions['fasterimage_api_key'];
        }
    }
    if(strlen($sApiKey) > 0) {
        $aArgs = array(
            'timeout' => 10,
            'user-agent' => 'WordPress' . $wp_version . '/fasterImage' . FASTERIMAGE_VERSION . '; ' . get_bloginfo('url'),
            'headers' => array(
                'Authorization' => $sApiKey
            )
        );

        $aResponse = wp_remote_get(FASTERIMAGE_API_URL . 'domain/info', $aArgs);
        if (is_array($aResponse) && isset($aResponse['body'])) {
            return json_decode($aResponse['body'], true);
        }
    }


    return false;
}