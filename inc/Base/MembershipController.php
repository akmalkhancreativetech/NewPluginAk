<?php
/**
 * @package NewPluginAk
 */

 namespace Inc\Base;


use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

 class MembershipController extends BaseController
 {
    public $settings;
    public $callbacks;
    public $subpages = array();

    public function register()
    {
      if (! $this->activated('membership_manager')) return;
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
          'page_title' => 'Membership Manager', 
          'menu_title' => 'Membership Manager', 
          'capability' => 'manage_options', 
          'menu_slug' => 'new_plugin_ak_membership', 
          'callback' => array($this->callbacks, 'adminMembership')
        )
      );
    }
 }