<?php
include( dirname( dirname( __FILE__ ) ) . '/../lib/afp/admin-page-framework.php' );

if ( ! class_exists( 'fasterImage_AdminPageFramework' ) ) {
    return;
}


class fasterImagePlugin extends fasterImage_AdminPageFramework {

    public function setUp() {

        // Create the root menu
        $this->setRootMenuPage('Settings');

        // Add the sub menu item
        $this->addSubMenuItems(
            array(
                'title' => __('fasterImage','fasterimage'),        // page title
                'page_slug' => 'fasterimage_settings'
            )
        );

        $this->addInPageTabs(
            'fasterimage_settings',
            array(
                'tab_slug' => 'fi_tab_dashboard',
                'title' => __('Dashboard','fasterimage')
            ),
            array(
                'tab_slug' => 'fi_tab_settings',
                'title' => __('Settings','fasterimage')
            )
        );

        $this->setPageHeadingTabsVisibility( false );
        $this->setInPageTabTag( 'h2' );
        $this->setPageTitleVisibility( false );

        $this->enqueueStyle(
            plugins_url('fasterimage/src/css/admin.css','','',array('version' => FASTERIMAGE_VERSION))
        );

        $this->enqueueScript(
            plugins_url('fasterimage/src/js/admin.js','','',array('version' => FASTERIMAGE_VERSION))
        );

    }

    /* ***** FORMS ******* */

    public function validation_fasterImagePlugin($aInput, $aOldInput) {

        $bOk = true;

        $aErrors = array();

        if(isset($aInput['fasterimage_api_key'])) {
            $aInput['fasterimage_api_key'] = strtolower($aInput['fasterimage_api_key']);

            if(strlen($aInput['fasterimage_api_key']) == 0) {
                $aInput['fasterimage_enabled'] = "0";
                update_option('fasterimage_enabled', '0');
            }
            elseif($aOldInput['fasterimage_api_key'] != $aInput['fasterimage_api_key']) {
                $aData = fasterimage_api_getinfo($aInput['fasterimage_api_key']);
                if($aData === false || !is_array($aData)) {
                    $bOk = false;
                    $aErrors['fasterimage_api_key'] = __('An error occured during the API call. Please try again or contact support.','fasterimage');

                    $aInput['fasterimage_enabled'] = "0";
                    update_option('fasterimage_enabled', '0');
                }
                else {
                    if ($aData['status'] == "KO") {
                        $bOk = false;
                        $aErrors['fasterimage_api_key'] = __('This API key seems invalid. Please check your input or contact support if the problem persists.','fasterimage');

                        $aOldInput['fasterimage_enabled'] = "0";
                        $aInput['fasterimage_enabled'] = "0";
                        update_option('fasterimage_enabled', '0');
                    } else {
                        update_option('fasterimage_account_valid', '1');
                        update_option('fasterimage_enabled', '1');
                        update_option('fasterimage_account_valid_expiration', time());
                        update_option('fasterimage_domain',$aData['domain']);

                        $aInput['fasterimage_enabled'] = "1";
                    }
                }
            }
            else {

                $aData = fasterimage_api_getinfo($aInput['fasterimage_api_key']);
                if($aData === false || !is_array($aData) || $aData['status'] == "KO")  {
                    $bOk = false;
                    $aErrors['fasterimage_api_key'] = __('This API key seems invalid. Please check your input or contact support if the problem persists.','fasterimage');

                    $aInput['fasterimage_enabled'] = "0";
                    $aOldInput['fasterimage_enabled'] = "0";
                    update_option('fasterimage_enabled', '0');
                }
                else {
                    if($aInput['fasterimage_enabled'] == "0") {
                        update_option('fasterimage_enabled', '0');
                    }
                    else {
                        update_option('fasterimage_enabled', '1');
                    }
                }


            }
            /*if($aInput['fasterimage_api_key'] == "") {
                $bOk = false;
                $aErrors['fasterimage_api_key'] = 'Cette clé n\'est pas valide';
            }*/
        }

        if(!$bOk) {
            $this->setFieldErrors( $aErrors );
            $this->setSettingNotice( __('An error occured, please check your input and try again.','fasterimage') );
            return $aOldInput;
        }

        return $aInput;

    }

    /* ***** HEADER ****** */

    public function content_top_fasterImagePlugin($sContent) {

        $aNotices =  get_option('fasterimage_admin_notices', array());
        foreach ($aNotices as $key => $value) {
            if ("install" === $value) {
                unset($aNotices[$key]);
            }
        }
        update_option('fasterimage_admin_notices', $aNotices);

        $sTitle = '<div class="header"><a href="http://fasterimage.io/?utm_source=wordpress&utm_medium=plugin&utm_campaign=header" target="_blank"><img src="http://fasterimage.io.fasterimage.io/img/logo.png" /></a>
                <h1>'.__('Optimize your images & Speed up your website !','fasterimage').'</h1>
                <em>'.__('WordPress plugin','fasterimage').' - '.__('version','fasterimage').' '.FASTERIMAGE_VERSION.'</em>
                <div class="aide">
                <a href="https://twitter.com/fasterimage" class="twitter-follow-button" data-show-count="false">'.__('Follow','fasterimage').' @fasterimage</a>';

        $sTitle .= "<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";

        $sTitle .= '<br/><a class="link-subscribe" href="http://fasterimage.io/contact?utm_source=wordpress&utm_medium=plugin&utm_campaign=footer" target="_blank">'.__('Help / Support','fasterimage').'</a><br/><a class="link-subscribe" href="mailto:contact@fasterimage.io" target="_blank">contact@fasterimage.io</a>';
        $sTitle .= '</div>';

        $sTitle .= '</div>';

        return $sTitle.$sContent;
    }

    /*public function content_fasterimage_settings( $sContent) {
        return $sContent. ' <h3>ccc</h3><p>ccc</p>';
    }*/

    /* ****** DASHBOARD ******* */

    public function content_fasterimage_settings_fi_tab_dashboard( $sContent) {
        $sApiKey = fasterImagePlugin::getOption('fasterImagePlugin','fasterimage_api_key');

        if(!isset($_GET['tab']) || $_GET['tab'] != 'fi_tab_dashboard') {
            return "<div class=\"text-center\"><br/>".__('Loading dashboard','fasterimage')." ...</div><script>document.location.href = '".get_site_url()."/wp-admin/options-general.php?page=fasterimage_settings&tab=fi_tab_dashboard'; </script>";
        }
        else {
            if($sApiKey === null || $sApiKey == '') {
                $sHtml = '<h3 class="text-center">'.__('Thanks for using the fasterImage plugin !','fasterimage').'</h3>';

                $sHtml .= '<table class="login">';
                $sHtml .= '<tr><td class="text-center border-right"><strong>'.__('You don\'t have an account yet ?','fasterimage').'</strong><a class="link-subscribe" href="http://fasterimage.io/?utm_source=wordpress&utm_medium=plugin&utm_campaign=settings" target="_blank">'.__('Create an account','fasterimage').'</a>';
                $sHtml .= ' '.__('to optimize your images and use','fasterimage').' <pre>' . str_replace(array('http://', 'https://'), '', get_site_url()) . '</pre> '.__('as domain name during setup','fasterimage').'  </td>';
                $sHtml .= '<td class="text-center"><strong>'.__('You already have an account,','fasterimage').'</strong>'.__('enter the API key provided for your domain name :','fasterimage').' <div id="api_key_form"></div></td></tr>';
                $sHtml .= '</table>';
            }
            else {

                $aData = fasterimage_api_getinfo();

                /*if($aData === false || !is_array($aData)) {
                    echo "Erreur de connexion";
                }
                else {*/
                if($aData['status'] == "KO") {


                    $sHtml = '<table class="login">';
                    $sHtml .= '<tr><td class="text-center"><strong>'.__('Invalid API key','fasterimage').'</strong> '.__('It seems that your API key has been updated or is not valid anymore.','fasterimage').'';
                    $sHtml .= ''.__('Please check your API key in the','fasterimage').' <a href="'.get_site_url().'/wp-admin/options-general.php?page=fasterimage_settings&tab=fi_tab_settings">'.__('settings of fasterImage','fasterimage').'</a>';
                    $sHtml .= '</td></tr></table>';

                }
                else {
                    update_option('fasterimage_account_valid', '1');
                    update_option('fasterimage_account_valid_expiration', time());

                    $sHtml = '<table class="dashboard"><tr>';

                    $sEnabled = get_option('fasterimage_enabled');
                    $sDomain = get_option('fasterimage_domain');
                    $sChecked = get_option('fasterimage_account_valid');

                    $sFileOk = ($sEnabled == '1' && strlen($sDomain) > 0 && $sChecked == '1') ? 'ok' : 'ko';

                    $sHtml .= '<td><img src="'.plugins_url('fasterimage/src/img/'.$sFileOk.'.png').'" /><strong>'.__('Optimization','fasterimage').' '.($sEnabled == '1' && strlen($sDomain) > 0 && $sChecked == '1' ? __('enabled','fasterimage') : __('disabled','fasterimage')).'</strong><a href="'.get_site_url().'/wp-admin/options-general.php?page=fasterimage_settings&tab=fi_tab_settings">'.__('Settings','fasterimage').'</a></td>';

                    $sHtml .= '<td><b>'.$aData['nb_images'].'</b><strong>'.__('Optimized images','fasterimage').'</strong><a href="https://fasterimage.io/compte?utm_source=wordpress&utm_medium=plugin&utm_campaign=settings" target="_blank">'.__('More stats','fasterimage').'</a></td>';

                    $iBP = $aData['bp_economisee'];

                    $sFact = "";
                    if($iBP > 0) {
                        switch (rand(0, 2)) {
                            case 0:
                                $iNbSecondes3G = $iBP / 93750;
                                $secondes = floor((($iNbSecondes3G % 86400) % 3600) % 60);
                                $minutes = floor((($iNbSecondes3G % 86400) % 3600) / 60);
                                $hours = floor(($iNbSecondes3G % 86400) / 3600);
                                $days = floor($iNbSecondes3G / 86400);
                                $sDuree3G = ($days > 0 ? sprintf(_n('%s day','%s days',$days,'fasterimage'),$days) . ', ' : '')
                                    . ($hours > 0 ?  sprintf(_n('%s hour','%s hours',$hours,'fasterimage'),$hours). ' ' : '')
                                    . ($minutes > 0 ? sprintf(_n('%s minute','%s minutes',$minutes,'fasterimage'),$minutes). ' '.__('and','fasterimage').' ' : '' )
                                    . sprintf(_n('%s second','%s seconds',$secondes,'fasterimage'),$secondes);
                                $sFact = __('That\'s','fasterimage').' ' . $sDuree3G . ' '.__('of downloading in 3G !','fasterimage');
                                break;
                            case 1:
                                $iNbDisquettes = round($iBP / 1440000);
                                $sFact = __('That\'s','fasterimage').' ' . sprintf(_n('%s 3,5" disk','%s 3,5" disk',$iNbDisquettes,'fasterimage'),$iNbDisquettes).' !';
                                break;
                            case 2:
                                if($iBP < 7500000000 ) {
                                    $iRatioWikipedia = $iBP / 7500000000 * 100;
                                    $iRatioWikipedia = round($iRatioWikipedia);
                                    $sFact = __('That\'s','fasterimage'). ' ' .sprintf(__('%s%% of french Wikipedia volume','fasterimage'),$iRatioWikipedia).' !';
                                }
                                else {
                                    $iRatioWikipedia = $iBP / 7500000000;
                                    $iRatioWikipedia = round($iRatioWikipedia,2);
                                    $sFact = __('That\'s','fasterimage'). ' ' .sprintf(__('%s times the french Wikipedia volume','fasterimage'),str_replace('.',',',$iRatioWikipedia)).' !';
                                }


                                break;
                        }
                    }


                    $sHtml .= '<td><b>'.formatOctets($aData['bp_economisee']).'</b><strong>'.__('Saved bandwith','fasterimage').'</strong><span>'.$sFact.'</span></td>';

                    $sHtml .= '<td><strong><b>'.formatOctets($aData['quota_utilisation']).'</b>/ '.formatOctets($aData['quota_max']).'</strong><strong>'.__('Used quota','fasterimage').'</strong><a href="http://fasterimage.io/compte/plans?utm_source=wordpress&utm_medium=plugin&utm_campaign=settings" target="_blank">'.__('Increase this limit', 'fasterimage').'</a></td>';

                    $sHtml .= '</tr></table>';

                    $sDomain = get_option('fasterimage_domain');
                    $sHtml .= '<div class="text-center info-html">';
                    $sHtml .= '<em>'.__('Images of your website handled by WordPress are automatically optimized.','fasterimage').'</em><br/><br/>';
                    $sHtml .= __('If you would like to manually add an image (in your theme for example) you can use this syntax :','fasterimage');
                    $sHtml .= '<pre>&lt;img src="<strong>http://'.$sDomain.'.fasterimage.io/'.__('directory','fasterimage').'/image.png</strong>" alt="'.__('My optimized image','fasterimage').'" /></pre>';
                    $sHtml .= __('or in a CSS :','fasterimage');
                    $sHtml .= '<pre>background-image:url(<strong>http://'.$sDomain.'.fasterimage.io/dossier/image.png</strong>);</pre>';
                    $sHtml .= '('.__('Think about changing','fasterimage').' <pre style="display:inline;">http://</pre> '.__('in','fasterimage').' <pre style="display:inline;">https://</pre> '.__('if you are using HTTPS','fasterimage').')';
                    $sHtml .= '</div>';

                }
                //}
            }

            return $sHtml.$sContent;
        }
    }

    public function load_fasterimage_settings_fi_tab_dashboard( $oAdminPage) {
        $sApiKey = fasterImagePlugin::getOption('fasterImagePlugin','fasterimage_api_key');

        if($sApiKey === null || $sApiKey == '') {
            $this->addSettingFields(
                array(    // Single text field
                    'field_id' => 'fasterimage_api_key',
                    'type' => 'text',
                    'title' => 'Clé API',
                    'description' => __('You can find your key on :','fasterimage').'<br/><a href="https://fasterimage.io/compte/domaines" target="_blank">\''.__('My account','fasterimage').'\' &raquo; \''.__('Domain names','fasterimage').'\'</a> ',
                ),
                array( // Submit button
                    'field_id' => 'submit_button',
                    'type' => 'submit',
                )
            );
        }

    }

    /* ******* SETTINGS ******** */

    public function content_fasterimage_settings_fi_tab_settings( $sContent) {

        $sHtml = "";

        /*$sDomain = get_option('fasterimage_domain');
        if(strlen($sDomain) > 0) {
            $sHtml .= "";
        }*/

        if(FASTERIMAGE_DEBUG) {

            $sValid = get_option('fasterimage_account_valid');
            $sValidTime = get_option('fasterimage_account_valid_expiration');
            $sDomain = get_option('fasterimage_domain');
            $sEnabled = get_option('fasterimage_enabled');

            $sHtml .= "<h3>DEBUG :</h3>";
            $sHtml .= "<br/>Valid : ".$sValid;
            $sHtml .= "<br/>Valid time : ".$sValidTime;
            $sHtml .= "<br/>Domain : ".$sDomain;
            $sHtml .= "<br/>Enabled : ".$sEnabled;
            if(get_option('fasterImagePlugin') !== false) {
                $sHtml .= "<br/>Plugin options : ".print_r(get_option('fasterImagePlugin'),true);
            }
            else {
                $sHtml .= "<br/>Plugin options : -";
            }

        }

        return $sContent. $sHtml;
    }

    public function load_fasterimage_settings_fi_tab_settings( $oAdminPage) {
        $this->addSettingFields(
            array(    // Single text field
                'field_id' => 'fasterimage_enabled',
                'type' => 'checkbox',
                'title' => __('Enable the plugin','fasterimage'),
                'description' => __('Check this box to enable image optimization','fasterimage')
            ),
            array(    // Single text field
                'field_id' => 'fasterimage_api_key',
                'type' => 'text',
                'title' => __('API key','fasterimage'),
                'description' => __('Available in :','fasterimage').'<br/><a href="https://fasterimage.io/compte/domaines" target="_blank">\''.__('My account','fasterimage').'\' &raquo; \''.__('Domain names','fasterimage').'\'</a> ',
            ),
            array( // Submit button
                'field_id' => 'submit_button',
                'type' => 'submit',
                'value' => __('Save','fasterimage')
            )
        );

    }
}