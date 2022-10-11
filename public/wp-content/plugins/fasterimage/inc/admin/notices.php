<?php

//Admin notices
add_action('admin_notices', 'fasterimage_admin_notices');
function fasterimage_admin_notices() {
    if ($aNotices = get_option('fasterimage_admin_notices')) {
        foreach ($aNotices as $sNotice) {
            switch($sNotice) {
                case 'install':
                    ?>
                    <div class='updated'>
                        <p>
                            <strong><?php echo __('Thank you for installing fasterImage !','fasterimage'); ?></strong>
                            <br/>
                            <?php echo __('In order to enable optimization, please setup settings in menu ','fasterimage'); ?> <a href="<?php echo admin_url( 'options-general.php?page=fasterimage_settings'); ?>"></a><?php echo __('Settings > fasterImage','fasterimage'); ?>.</p>
                    </div>
                    <?php
                    break;
            }
        }
    }

    $sEnabled = get_option('fasterimage_enabled');
    $sValid = get_option('fasterimage_account_valid');
    if($sEnabled == '1' && $sValid == '0') {
        ?>
        <div class='error'>
            <p>
                <strong><?php echo __('fasterImage : API key error','fasterimage'); ?></strong>
                <br/>
                <?php echo __('The API key is not valid anymore, images won\'t be optimized !','fasterimage'); ?>
                <br/>
                <?php echo __('Please check your key on ','fasterimage'); ?>
                 <a href="<?php echo admin_url( 'options-general.php?page=fasterimage_settings&tab=fi_tab_settings'); ?>">R<?php echo __('Settings > fasterImage','fasterimage'); ?></a>.</p>
        </div>
        <?php
    }

}

add_action('admin_init', 'fasterimage_admin_notice_install_remove');
function fasterimage_admin_notice_install_remove() {
    global $current_user;
    $user_id = $current_user->ID;
    /* If user clicks to ignore the notice, add that to their user meta */
    if ( isset($_GET['page']) && $_GET['page'] == 'fasterimage-settings' ) {
        $aNotices =  get_option('fasterimage_admin_notices', array());
        $aNewNotices = array();
        foreach($aNotices as $sNotice) {
            if($sNotice != 'install') {
                $aNewNotices[] = $sNotice;
            }
        }
        update_option('fasterimage_admin_notices', $aNewNotices);
    }
}