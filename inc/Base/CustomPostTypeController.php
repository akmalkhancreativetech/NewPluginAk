<?php
/**
 * @package NewPluginAk
 */

 namespace Inc\Base;


use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

 class CustomPostTypeController extends BaseController
 {
    public $settings;
    public $callbacks;
    public $subpages = array();

    public function register()
    {
        if (! $this->activated('cpt_manager')) return;
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->setSubpages();
        $this->settings->addSubpages($this->subpages)->register();
        add_action('init', array($this, 'activate'));
    }

    public function setSubpages() 
    {
      $this->subpages = array(
        array(
          'parent_slug' => 'new_plugin_ak', 
          'page_title' => 'Custom Post Types', 
          'menu_title' => 'CPT Manager', 
          'capability' => 'manage_options', 
          'menu_slug' => 'new_plugin_ak_cpt', 
          'callback' => array($this->callbacks, 'adminCpt')
        )
      );
    }


    public function activate()
    {
        register_post_type('new_plugin_product',
            array(
                'labels' => array(
                    'name' => 'Products',
                    'singular_name' => 'Product'
                ),
                'public' => true,
                'has_archive' => true
            )
        );
    }

 }