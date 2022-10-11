<?php
global $wp_version;

add_action('init','fasterimage_init_check_account');
function fasterimage_init_check_account($bForceCheck = false) {
    $sChecked = get_option('fasterimage_account_valid');

    $iExpiration = get_option('fasterimage_account_valid_expiration');

    if($bForceCheck || $sChecked === false || $iExpiration === false || time() - $iExpiration > 60 * 60 * 24) { // One day expiration
        //Check the account
        $sEnabled = get_option('fasterimage_enabled');
        if($sEnabled == '1') {
            $aOptions = get_option('fasterImagePlugin');
            if(is_array($aOptions) && isset($aOptions['fasterimage_api_key'])) {
                $aData = fasterimage_api_getinfo($aOptions['fasterimage_api_key']);
                if($aData === false || !is_array($aData)) {
                    update_option('fasterimage_account_valid_expiration', time());
                }
                else {
                    if ($aData['status'] == "KO") {
                        update_option('fasterimage_account_valid', '0');
                        update_option('fasterimage_account_valid_expiration', time());
                        return false;
                    } else {
                        update_option('fasterimage_account_valid', '1');
                        update_option('fasterimage_account_valid_expiration', time());
                        update_option('fasterimage_domain',$aData['domain']);
                        return true;
                    }
                }
            }
            else {
                $sDomain = get_option('fasterimage_domain');

                if ($sDomain != '') {

                    $aArgs = array(
                        'timeout' => 10,
                        'user-agent'  => 'WordPress' . $wp_version . '/fasterImage'. FASTERIMAGE_VERSION .'; ' . get_bloginfo( 'url' )
                    );
                    $aResponse = wp_remote_get( 'https://fasterimage.io/api/checkdomain/'.$sDomain, $aArgs );
                    if(is_array($aResponse)) {
                        if($aResponse['body'] == 'OK') {
                            update_option('fasterimage_account_valid', '1');
                            update_option('fasterimage_account_valid_expiration', time());
                            return true;
                        }
                        else {
                            update_option('fasterimage_account_valid', '0');
                            update_option('fasterimage_account_valid_expiration', time());
                            return false;
                        }
                    }
                    else {
                        update_option('fasterimage_account_valid', '0');
                        update_option('fasterimage_account_valid_expiration', time());
                        return false;
                    }
                }
            }
        }
        update_option('fasterimage_account_valid_expiration', time());
        return false;
    }
    else {
        //Check still valid
        if($sChecked == '1') {
            return true;
        }
        else {
            return false;
        }
    }
}