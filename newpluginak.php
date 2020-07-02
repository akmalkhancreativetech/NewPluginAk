<?php
/**
 * @package NewPluginAk
 */
/*
Plugin Name: NewPluginAk
Description: New Plugin Ak learning.
Version: 1.0.0
License: GPLv2 or later
*/
defined('ABSPATH') or exit;
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}


function activate_newpluginak(){
    Inc\Base\Activate::activate();
}

function deactivate_newpluginak(){
    Inc\Base\Deactivate::deactivate();   
}

register_activation_hook(__FILE__, 'activate_newpluginak');
register_deactivation_hook(__FILE__, 'deactivate_newpluginak');

if(class_exists('Inc\\Init')){
    Inc\Init::register_services();
}
