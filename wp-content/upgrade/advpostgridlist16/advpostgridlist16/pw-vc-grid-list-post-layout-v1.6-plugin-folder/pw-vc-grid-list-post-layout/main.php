<?php
/*
Plugin Name: PW Grid/List Post Layout For Visual Composer
Plugin URI: http://proword.net/Vc_Post_Layout/
Description: Build advance grid / list from posts, custom posts, pages and add any filtering options from custom taxonomies.
Version: 1.6
Author: Proword
Author URI: http://proword.net/
Text Domain: pw_vc_post_layout
Domain Path: /languages/
*/

	if(!defined( '__PW_POST_LAYOUT_TEXTDOMAN__' )){
			define( '__PW_POST_LAYOUT_TEXTDOMAN__', 'pw_vc_post_layout' );
	}
	define('PW_PS_PL_BASENAME_GRID',plugin_basename( __FILE__ ));
	define ('PW_PS_PL_NOTIC_GRID','<div class="updated"><p>'.__("The", __PW_POST_LAYOUT_TEXTDOMAN__ ).' <strong>'.__("PW Grid/List Post Layout for Visual Composer", __PW_POST_LAYOUT_TEXTDOMAN__ ).'</strong> '.__("plugin requires", __PW_POST_LAYOUT_TEXTDOMAN__ ).' <strong>'.__("Visual Composer", __PW_POST_LAYOUT_TEXTDOMAN__ ).'</strong> '.__("Plugin installed and activated", __PW_POST_LAYOUT_TEXTDOMAN__ ).'.</p></div>');


if (!class_exists('VC_PW_POST_LAYOUT_GRID_CLASS')) {
	class VC_PW_POST_LAYOUT_GRID_CLASS
	{
		function __construct()
		{
			add_action( 'after_setup_theme', array($this,'PW_PLUGIN_RUN' ));
			
		}
		function PW_PLUGIN_RUN()
		{
			//echo get_template_directory().WPB_VC_VERSION;
			if ( in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )
			{
				$required_vc = '4.2';
				if(defined('WPB_VC_VERSION')){
					if( version_compare( $required_vc, WPB_VC_VERSION, '<' )){
						require_once vc_path_dir('SHORTCODES_DIR', 'vc-posts-grid.php');
					}else
					{
						require_once dirname(__FILE__). '/../js_composer/composer/lib/shortcodes/posts_grid.php';
					}
					require_once 'main_class.php';
				}
			}else
			{
				$required_vc = '4.2';
				if(defined('WPB_VC_VERSION')){
					if( version_compare( $required_vc, WPB_VC_VERSION, '<' )){
						require_once get_template_directory().'/wpbakery/js_composer/include/classes/shortcodes/vc-posts-grid.php';
					}else
					{
						require_once get_template_directory().'/wpbakery/js_composer/composer/lib/shortcodes/posts_grid.php';
					}
					require_once 'main_class.php';
				}else
				{
					add_action( 'admin_notices', array($this,'pw_image_admin_notice_for_vc_activation'));
				}
			}
		}
		
		function pw_image_admin_notice_for_vc_activation()
		{
			echo PW_PS_PL_NOTIC_GRID;
		}
		
	}

	new VC_PW_POST_LAYOUT_GRID_CLASS;
}

