<?php
/**
 * @package NewPluginAk
 */
namespace Inc\Base;
class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();

        if (get_option('new_plugin_ak')) {
            return;
        }
        $default = array();
        update_option('new_plugin_ak', $default);
    }
}