<?php
/*
 * Plugin Name: WP ezPlugins Picturefill.js
 * Plugin URI: https://github.com/WPezPlugins/wp-ezplugins-templates-picturefill-js
 * Description: Extends WPezClasses Template: Picturefill js (for demo / customization purposes). 
 * Version: 0.5.0
 * Author: Mark Simchock
 * Author URI: http://chiefalchemist.com
 * License: MIT
*/

/*
 * == Change Log == 
 *
 * --- Fri 10 Oct 2014 - Ready!
 */
 
/**
 * Important
 * =========
 *
 * This plugin leans on a number of classes in the WP ezClasses framework (https://github.com/WPezClasses). While it can be used in production
 * "as is", it is essentially for demonstration purposes. It is presumed that you will use this plugin as a starting point for your own custom 
 * version; which will lean on WP ezClasses, of course. 
 *
 * For example, you might want a different set a presets / combinations for a particular project / client. With minimal effort you can create 
 * a custom plugin for that particular need.
 */
 
if ( ! class_exists('Class_WP_ezPlugins_Templates_Picturefill_js') ) {
  class Class_WP_ezPlugins_Templates_Picturefill_js extends Class_WP_ezClasses_Templates_Picturefill_js {
  
    private static $obj_static_instance = null;
  
  	public function options_images(){
	
	  $arr_options_images = array(
	  
	    'thumb'		=> array(
		  'active'		=> true,
		  'name'		=> 'thumbnail',
		  'bp'			=> 'w',					// bp = break point. 'w' will defaults to the image's set width, else specify your own bp int. 
		  ),
		  
	    'med'		=> array(
		  'active'		=> true,
		  'name'		=> 'medium',
		  'bp'			=> 'w'
		  ),	

	    'lrg'		=> array(
		  'active'		=> true,
		  'name'		=> 'large',
		  'bp'			=> 'w'
		  ),		  
	  );
	  
	  return $arr_options_images;
	}
	
	/**
	 * A slight bit of fakin' some static funk. 
	 */
	public static function do_pf( $arr_0_img_markup_1_id = ''){
	 
	   if ( ! is_array($arr_0_img_markup_1_id) ){
	     return $arr_0_img_markup_1_id;
	   }
	   
	   if ( self::$obj_static_instance === NULL ) {
	     self::$obj_static_instance = Class_WP_ezPlugins_Templates_Picturefill_js::ezc_get_instance();
       }
	   
	   return self::$obj_static_instance->insert_picturefill_args($arr_0_img_markup_1_id);	 
	 }		

  }
}

$obj_new_init_picturefill_js = Class_WP_ezPlugins_Templates_Picturefill_js::ezc_get_instance();

/**
 * This is an example of how you can use the static method: go_pf()
 *
 * Note: You can pass a third element in the array to specify the options_media_query() you wish to use for a particular (non the_content()) image.
 *
class_alias('Class_WP_ezPlugins_Templates_Picturefill_js', 'WPezPicturefill');

$x = array('<img width="1900" height="600" class="alignnone size-full wp-image-724" alt="astro-1900x600" src="http://wpez.dev/wp-content/uploads/2014/03/astro-1900x600.jpg">', 724, 'a');
echo WPezPicturefill::do_pf($x);

*/