<?php
/**
 * @package NewPluginAk
 */

 namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
 {
     public function adminDashboard()
     {
         return require_once("$this->plugin_path/templates/admin.php");
     }

     public function adminCpt()
     {
         return require_once("$this->plugin_path/templates/cpt.php");
     }

     public function adminTaxonomies()
     {
         return require_once("$this->plugin_path/templates/taxonomies.php");
     }

     public function adminWidgets()
     {
         return require_once("$this->plugin_path/templates/widgets.php");
     }

    //  public function NewPluginAkOptionsGroup($input)
    //  {
    //      return $input;
    //  }

    //  public function NewPluginAkAdminSection()
    //  {
    //      echo 'test sections!';
    //  }

     public function NewPluginAkTextExample()
     {
        $value = esc_attr( get_option( 'text_example' ) );
		echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here!">';
     }

     public function NewPluginAkFirstName()
	{
		$value = esc_attr( get_option( 'first_name' ) );
		echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write your First Name">';
	}
 }