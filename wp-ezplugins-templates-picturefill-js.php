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
	
	  /**
	   * Using the BoilerStrap theme architecture? and its add_image_size()? And defining your picturefill stuff there? Then if so, use this :)
	   */
	  if (false){
	  
	    $obj_ais = new Class_WP_ezBoilerStrap_Add_Image_Size();
	    $arr_ais = $obj_ais->ezbs_add_image_size_args();
	
	    $arr_options_images = array();
	    foreach ( $arr_ais as $str_key => $arr_val ){
	      if ( isset($arr_val['picturefill']['active']) && isset($arr_val['name']) && isset($arr_val['picturefill']['bp']) ){
		    $arr_options_images[$str_key] = array(
		      'active' 		=> $arr_val['picturefill']['active'],
		      'name'		=> $arr_val['name'],
		      'w'			=> $arr_val['picturefill']['w'],
			  );
		  }
	    }
	    return  $arr_options_images;	
	  }
	 
	
	  $arr_options_images = array(
	  
	    'w600'		=> array(
		  'active'		=> true,
		  'name'		=> 'w600',
		  'w'			=> 'w',					// w = width. value 'w' will defaults to the image's set width, else specify your own int for the width. 
		  ),
		  
	    'w750'		=> array(
		  'active'		=> true,
		  'name'		=> 'w750',
		  'w'			=> 'w'
		  ),	

	    'w970'		=> array(
		  'active'		=> true,
		  'name'		=> 'w970',
		  'w'			=> 970					// the int here is just an example. there's no other reason for an int being use for this one.  
		  ),

	    'w1170o'	=> array(
		  'active'		=> true,
		  'name'		=> 'w1170o',
		  'w'			=> 'w'
		  ),	

	    'w1920'		=> array(
		  'active'		=> true,
		  'name'		=> 'w1920',
		  'w'			=> 'w'
		  ),		  
	  );
	  
	  return $arr_options_images;
	}
	
	/**
	 * TODO = finalize these settings
	 */ 
	public function options_media_query(){
	
	  $arr_options_mq = array(

	    'a'		=> '(min-width: 1500px) 100vw, (min-width: 1200px) 100vw, (min-width: 992px) 100vw, (min-width: 768px) 100vw, (min-width: 600px) 100vw, 100vw',
	  );
	  
	  return $arr_options_mq;
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
 * This bit below is an example of how you can use the static method: do_pf()
 *
 * Note: You can pass a third element in the array to specify the options_media_query() you wish to use for a particular (non the_content()) image.
 *
 
<code>

class_alias('Class_WP_ezPlugins_Templates_Picturefill_js', 'WPezPicturefill');

$x = array('<img width="1900" height="600" class="alignnone size-full wp-image-724" alt="astro-1900x600" src="http://wpez.dev/wp-content/uploads/2014/03/astro-1900x600.jpg">', 724, 'a');
echo WPezPicturefill::do_pf($x);

</code>
*/