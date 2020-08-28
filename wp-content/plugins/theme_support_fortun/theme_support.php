<?php
/*
Plugin Name: Theme Support
Plugin URI: http://themeforest.net/
Description: This plugin is compatible with this wordpress themes. 
Author: Muhibbur Rashid
Author URI: http://themebunch.com
Version: 1.0
Text Domain: BUNCH_NAME
*/
if( !defined( 'BUNCH_TH_ROOT' ) ) define('BUNCH_TH_ROOT', plugin_dir_path( __FILE__ ));
if( !defined( 'BUNCH_TH_URL' ) ) define( 'BUNCH_TH_URL', plugins_url( '', __FILE__ ) );
if( !defined( 'BUNCH_NAME' ) ) define( 'BUNCH_NAME', 'fortun' );
include_once( 'includes/loader.php' );
function fortun_bunch_widget_init2()
{
	global $wp_registered_sidebars;
	$theme_options = _WSH()->option();
	if( class_exists( 'Bunch_About_Us' ) )register_widget( 'Bunch_About_Us' );
	if( class_exists( 'Bunch_Services_Posts' ) )register_widget( 'Bunch_Services_Posts' );
	if( class_exists( 'Bunch_Latest_News' ) )register_widget( 'Bunch_Latest_News' );
	if( class_exists( 'Bunch_Contact_Us' ) )register_widget( 'Bunch_Contact_Us' );
	if( class_exists( 'Bunch_Recent_Posts' ) )register_widget( 'Bunch_Recent_Posts' );
	if( class_exists( 'Bunch_Flickr_Feed' ) )register_widget( 'Bunch_Flickr_Feed' );
	if( class_exists( 'Bunch_Brochure' ) )register_widget( 'Bunch_Brochure' );
	if( class_exists( 'Bunch_Business_Enquiry' ) )register_widget( 'Bunch_Business_Enquiry' );
	if( class_exists( 'Bunch_Support_Agents' ) )register_widget( 'Bunch_Support_Agents' );
	if( class_exists( 'Bunch_Services_pages' ) )register_widget( 'Bunch_Services_pages' );
}
add_action( 'widgets_init', 'fortun_bunch_widget_init2' );	