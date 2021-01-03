<?php
if ( ! defined( 'ABSPATH' ) )
	exit;
	
add_action( 'admin_init', 'xyz_ihs_tinymce_button' );

function xyz_ihs_tinymce_button() {
	if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
		
		if ( get_user_option('rich_editing') == 'true') {
			
			add_filter( 'mce_buttons', 'xyz_ihs_register_tinymce_button' );
			add_filter( 'mce_external_plugins', 'xyz_ihs_add_tinymce_button' );
		}
	}
}

function xyz_ihs_register_tinymce_button( $buttons ) {
	
	$buttonName = 'xyz_ihs_snippet_selector';
	
	array_push( $buttons, $buttonName);
	return $buttons;
}

function xyz_ihs_add_tinymce_button( $plugin_array ) {
	$plugin_array['xyz_ihs_buttons'] = get_site_url() . '/index.php?wp_ihs=editor_plugin_js';
	return $plugin_array;
}

	
/*if(!class_exists('XYZ_Insert_Html_TinyMCESelector')):

class XYZ_Insert_Html_TinyMCESelector{
	var $buttonName = 'xyz_ihs_snippet_selector';
	function addSelector(){
		// Don't bother doing this stuff if the current user lacks permissions
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;
	 
	   // Add only in Rich Editor mode
	    if ( get_user_option('rich_editing') == 'true') {
	      add_filter('mce_external_plugins', array($this, 'registerTmcePlugin'));
	      //you can use the filters mce_buttons_2, mce_buttons_3 and mce_buttons_4 
	      //to add your button to other toolbars of your tinymce
	      add_filter('mce_buttons', array($this, 'registerButton'));
	    }
	}
	
	function registerButton($buttons){
		array_push($buttons, "separator", $this->buttonName);
		return $buttons;
	}
	
	function registerTmcePlugin($plugin_array){
		$plugin_array[$this->buttonName] =get_site_url() . '/index.php?wp_ihs=editor_plugin_js';
		if ( get_user_option('rich_editing') == 'true') 
		 	//var_dump($plugin_array);
		return $plugin_array;
	}
}

endif;

if(!isset($shortcodesXYZEH)){
	$shortcodesXYZEH = new XYZ_Insert_Html_TinyMCESelector();
	add_action('admin_head', array($shortcodesXYZEH, 'addSelector'));
}*/
?>