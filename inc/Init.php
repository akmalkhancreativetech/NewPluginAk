<?php
/**
 * @package NewPluginAk
 */

 namespace Inc;

final class Init 
{
    /**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 */
    public static function get_services(){
        return [
            Pages\Dashboard::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
            Base\CustomPostTypeController::class,
            Base\CustomTaxonomyController::class,
            Base\WidgetController::class,
            Base\GalleryController::class,
            Base\TestimonialController::class,
            Base\TemplateController::class,
            Base\AuthController::class,
            Base\MembershipController::class,
            Base\ChatController::class
            
        ];
    }

    /**
	 * Loop through the classes, initialize them, 
	 * and call the register() method if it exists
	 * @return
	 */
    public static function register_services(){
        foreach(self::get_services() as $class){
            $service = self::instantiate($class);
            if(method_exists($service, 'register')){
                $service->register();
            }
        }
    }

    /**
	 * Initialize the class
	 * @param  class $class    class from the services array
	 * @return class instance  new instance of the class
	 */
    private static function instantiate($class){
        $service = new $class();
        return $service;
    }
}


// use Inc\Activate;
// use Inc\Deactivate;
// use Inc\Admin\AdminPages;

// if(!class_exists('NewPluginAk')){
// class NewPluginAk
// {
//     public $plugin;
//     function __construct()
//     {
//         $this->plugin = plugin_basename(__FILE__);
//     }
//     protected function create_post_type()
//     {
//         add_action('init', array($this, 'custom_post_type'));
//     }
//     function register(){
//         add_action('admin_enqueue_scripts', array($this, 'enqueue'));
//         add_action('admin_menu', array($this, 'add_admin_pages'));
//         add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
//     }
//     public function settings_link($links)
//     {
//         $settings_link = '<a href="admin.php?page=new_plugin">Settings</a>';
//         array_push($links, $settings_link);
//         return $links;
//     }
//     public function add_admin_pages()
//     {
//         add_menu_page( 'New Plugin Ak', 'New Plugin Ak', 'manage_options', 'new_plugin', array($this, 'admin_index') , 'dashicons-store', 110 );
//     }
//     public function admin_index()
//     {
//       require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
//     }
//     function activate()
//     {
//         // require_once plugin_dir_path(__FILE__) . 'inc/NewPluginAkActivate.php';
//         Activate::activate();
//     }
//     function deactivate()
//     {
//         // require_once plugin_dir_path(__FILE__) . 'inc/NewPluginAkDeactivate.php';
//         Deactivate::deactivate();
//     }
//     function enqueue(){
//         wp_enqueue_style('mypluginstyle', plugins_url('/assets/css/mystyle.css', __FILE__));
//         wp_enqueue_script('mypluginscript', plugins_url('/assets/js/myscript.js', __FILE__));
//     }
//     function custom_post_type()
//     {
//         register_post_type('book', ['public' => true, 'label' => 'Books']);
//     }
// }

//     $newPluginAk = new NewPluginAk();
//     $newPluginAk->register();

//     // activation
// register_activation_hook(__FILE__, array($newPluginAk, 'activate'));

// // deactivation
// register_deactivation_hook(__FILE__, array($newPluginAk, 'deactivate'));

// }
