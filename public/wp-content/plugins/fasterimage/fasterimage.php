<?php
/*
Plugin Name: fasterImage
Plugin URI: http://fasterimage.io/optimiser-image/wordpress
Description: Optimisez vos images & accélérez votre site web !
Version: 2.5.2
Author: fasterImage
Author URI: https://fasterimage.io/?utm_source=wordpress&utm_medium=plugin&utm_campaign=extensions
License: GPLv2 or later
Text Domain: fasterimage
Domain Path: /lang
*/
define('FASTERIMAGE_VERSION','2.5.2');
define('FASTERIMAGE_API_URL','https://fasterimage.io/api/');
define('FASTERIMAGE_DEBUG',false);

global $wp_version;
global $sfasterImagePluginFile;
$sfasterImagePluginFile = __FILE__;

// Core plugin
include('inc/core.php');
include('inc/compatibility.php');
include('inc/api.php');

// Admin
include('inc/admin/notices.php');
include('inc/admin/check_account.php');
include('inc/admin/events.php');

// Admin pages
if(is_admin()) {
    include('inc/admin/pages.php');
    if ( class_exists( 'fasterImagePlugin' ) ) {
        new fasterImagePlugin;
    }
}
?>