<?php
/**
 * @package NewPluginAk
 */

namespace Inc\Pages;


use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

class Dashboard extends BaseController
 {

    public $settings;
    public $callbacks;
    public $callbacks_mngr;
    public $pages = array();
    // public $subpages = array();

    public function register()
    {
      $this->settings = new SettingsApi();
      $this->callbacks = new AdminCallbacks();
      $this->callbacks_mngr = new ManagerCallbacks();
      $this->setPages();
      // $this->setSubpages();
      $this->setSettings();
      $this->setSections();
      $this->setFields();

      $this->settings->addPages($this->pages)->withSubpage('Dashboard')->register();
    }

    public function setPages()
    {
      $this->pages = array(
        array(
          'page_title' => 'New Plugin Ak', 
          'menu_title' => 'New Plugin', 
          'capability' => 'manage_options', 
          'menu_slug' => 'new_plugin_ak', 
          'callback' => array($this->callbacks, 'adminDashboard'), 
          'icon_url' => 'dashicons-store', 
          'position' => 110
        )
      );
    }

    // public function setSubpages()
    // {
    //   $this->subpages = array(
    //     array(
    //       'parent_slug' => 'new_plugin_ak', 
    //       'page_title' => 'Custom Post Types', 
    //       'menu_title' => 'CPT', 
    //       'capability' => 'manage_options', 
    //       'menu_slug' => 'new_plugin_ak_cpt', 
    //       'callback' => array($this->callbacks, 'adminCpt')
    //     ),
    //     array(
    //       'parent_slug' => 'new_plugin_ak', 
    //       'page_title' => 'Custom Taxonomies', 
    //       'menu_title' => 'Taxonomies', 
    //       'capability' => 'manage_options', 
    //       'menu_slug' => 'new_plugin_ak_taxonomies', 
    //       'callback' => array($this->callbacks, 'adminTaxonomies')
    //     ),
    //     array(
    //       'parent_slug' => 'new_plugin_ak', 
    //       'page_title' => 'Custom Widgets', 
    //       'menu_title' => 'Widgets', 
    //       'capability' => 'manage_options', 
    //       'menu_slug' => 'new_plugin_ak_widgets', 
    //       'callback' => array($this->callbacks, 'adminWidgets')
    //     )
    //   );
    // }

  public function setSettings()
	{
		$args = array(
      array(
            'option_group' => 'new_plugin_ak_settings',
            'option_name' => 'new_plugin_ak',
            'callback' => array( $this->callbacks_mngr, 'checkboxSanitize' )
          )
    );
		$this->settings->setSettings( $args );
  }
  
  public function setSections()
	{
		$args = array(
			array(
				'id' => 'new_plugin_ak_index',
				'title' => 'Settings Manager',
        'callback' => array( $this->callbacks_mngr, 'adminSectionManager' ),
        'page' => 'new_plugin_ak'
			)
		);

		$this->settings->setSections( $args );
  }
  
  public function setFields()
	{
    $args = array();
    foreach($this->mangers as $key => $value)
    {
      $args[] = array(
          'id' => $key,
          'title' => $value,
          'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
          'page' => 'new_plugin_ak',
          'section' => 'new_plugin_ak_index',
          'args' => array(
              'option_name' => 'new_plugin_ak',
              'label_for' => $key,
              'class' => 'ui-toggle'
          )
        );
    }

		$this->settings->setFields( $args );
	}
 }
 