<?php
global $sfasterImagePluginFile;
//Activation / Deactivation
register_activation_hook($sfasterImagePluginFile, 'fasterimage_activation');
function fasterimage_activation() {
    if(get_option('fasterimage_enabled') === false) {
        update_option('fasterimage_enabled', '0');
    }
    update_option('fasterimage_account_valid', '0');
    update_option('fasterimage_account_valid_expiration', time() - (60 * 60 * 24 * 2));

    $aNotices =  get_option('fasterimage_admin_notices', array());
    $aNotices[] = "install";
    update_option('fasterimage_admin_notices', $aNotices);

    //update_option('fasterimage_domain',str_replace(array('http://','https://'),'',get_site_url()).".fasterimage.io");
}

/*register_deactivation_hook($sfasterImagePluginFile, 'fasterimage_deactivation');
function fasterimage_deactivation() {
}*/