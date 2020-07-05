<?php
/**
 * @package NewPluginAk
 */

 namespace Inc\Base;


use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

 class WidgetController extends BaseController
 {
    public $settings;
    public $callbacks;
    public $subpages = array();

    public function register()
    {
        if(!$this->activated('media_widget')) return;
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->setSubpages();
        $this->settings->addSubpages($this->subpages)->register();
    }

    public function setSubpages() 
    {
      $this->subpages = array(
        array(
          'parent_slug' => 'new_plugin_ak', 
          'page_title' => 'Custom Widgets', 
          'menu_title' => 'Media Widgets', 
          'capability' => 'manage_options', 
          'menu_slug' => 'new_plugin_ak_widgets', 
          'callback' => array($this->callbacks, 'adminWidgets')
        )
      );
    }
 }