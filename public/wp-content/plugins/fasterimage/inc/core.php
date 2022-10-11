<?php

function fasterimage_load_plugin_textdomain() {
    load_plugin_textdomain( 'fasterimage', FALSE, '/fasterimage/lang/' );
}
add_action( 'plugins_loaded', 'fasterimage_load_plugin_textdomain' );


add_filter('wp_calculate_image_srcset', 'fasterimage_srcset_handle', 99999, 5);
function fasterimage_srcset_handle($sources, $size_array, $image_src, $image_meta, $attachment_id ) {
    $aNewSources = array();

    foreach($sources as $source) {
        $source['url'] = fasterimage_file_handle($source['url']);
        $aNewSources[] = $source;
    }

    return $aNewSources;
}

add_filter('wp_get_attachment_url'	, 'fasterimage_file_handle', 99999 );
add_filter('smilies_src', 'fasterimage_file_handle', 99999 );
function fasterimage_file_handle($sImageUrl) {

    $aFasterImageSupportedExtensions = array(
        'jpg','jpeg','gif','png'
    );

    if(!is_admin()) {
        $sEnabled = get_option('fasterimage_enabled');
        $sDomain = get_option('fasterimage_domain');
        $sChecked = get_option('fasterimage_account_valid');

        if ($sEnabled == '1' && strlen($sDomain) > 0 && $sChecked == '1') {
            //fasterImage is enabled and a domain is set

            //Allowed images extension check
            $bOkFormat = false;
            foreach($aFasterImageSupportedExtensions as $sFormat) {
                if(endsWith(strtolower($sImageUrl),'.'.$sFormat)) {
                    $bOkFormat = true;
                    break;
                }
            }

            if(!$bOkFormat) {
                //Not an allowed image
                return $sImageUrl;
            }

            $sSiteUrl = get_site_url();
            $iSiteUrlLength = strlen($sSiteUrl);

            $aUrlInfo = parse_url($sSiteUrl);

            $sNewSiteUrl = str_replace($aUrlInfo['host'], str_replace('.fasterimage.io','',$sDomain).".fasterimage.io", $sSiteUrl);

            if (strlen($sImageUrl) > $iSiteUrlLength && substr($sImageUrl, 0, $iSiteUrlLength) == $sSiteUrl) {
                return str_replace($sSiteUrl, $sNewSiteUrl, $sImageUrl);
            }

        }
    }

    return $sImageUrl;
}

add_filter( 'the_content', 'fasterimage_content_images', 99999 );
add_filter( 'widget_text', 'fasterimage_content_images', 99999 );
function fasterimage_content_images($sContent) {

    if ( !is_admin()) {

        $sEnabled = get_option('fasterimage_enabled');
        $sDomain = get_option('fasterimage_domain');
        $sChecked = get_option('fasterimage_account_valid');

        if ($sEnabled == '1' && strlen($sDomain) > 0 && $sChecked == '1') {
            //fasterImage is enabled and a domain is set

            $sSiteUrl = get_site_url();
            $aUrlInfo = parse_url($sSiteUrl);

            $sNewSiteUrl = str_replace($aUrlInfo['host'], str_replace('.fasterimage.io','',$sDomain).".fasterimage.io", $sSiteUrl);

            $sPattern = '/src=[\'"]'.str_replace('/','\/',str_replace('.','\.',$sSiteUrl)).'\/([abcdefghijklmnopqrstuvwxyz0123456789% ._~:\/?#@!$&\'()*+,;=\[\]-]+)\.(jpg|jpeg|gif|png)[\'"]/i';

            $sContent = preg_replace($sPattern,'src="'.$sNewSiteUrl.'/$1.$2"',$sContent);

        }

    }

    return $sContent;
}




/* ***** Utils ***** */
function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}

function removeFasterImageDomain($sImageUrl) {

    if(!is_admin()) {
        $sEnabled = get_option('fasterimage_enabled');
        $sDomain = get_option('fasterimage_domain');
        $sChecked = get_option('fasterimage_account_valid');

        if ($sEnabled == '1' && strlen($sDomain) > 0 && $sChecked == '1') {
            //fasterImage is enabled and a domain is set

            $sSiteUrl = get_site_url();

            $aUrlInfo = parse_url($sSiteUrl);

            $sNewSiteUrl = str_replace($aUrlInfo['host'], str_replace('.fasterimage.io','',$sDomain).".fasterimage.io", $sSiteUrl);
            $iNewSiteUrlLength = strlen($sNewSiteUrl);

            if (strlen($sImageUrl) > $iNewSiteUrlLength && substr($sImageUrl, 0, $iNewSiteUrlLength) == $sNewSiteUrl) {
                return str_replace($sNewSiteUrl, $sSiteUrl, $sImageUrl);
            }

        }
    }

    return $sImageUrl;
}

function formatOctets($size, $precision = 2)
{
    if($size == 0)
        return '0';

    $base = log($size, 1000);
    $suffixes = array('', 'ko', 'Mo', 'Go', 'To');

    return str_replace('.',',',round(pow(1000, $base - floor($base)), $precision)) . $suffixes[floor($base)];
}