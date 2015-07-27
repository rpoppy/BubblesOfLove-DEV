<?php
	

	define ('PW_PS_PL_URL_GRID',plugins_url('', __FILE__));
	
	define ('PW_PS_PL_VER_NOTIC_GRID','<div class="updated"><p>'.__("The", __PW_POST_LAYOUT_TEXTDOMAN__ ).' <strong>'.__("PW Box Post Layout for Visual Composer", __PW_POST_LAYOUT_TEXTDOMAN__ ).'</strong> '.__("plugin requires", __PW_POST_LAYOUT_TEXTDOMAN__ ).' <strong>'.__("Visual Composer", __PW_POST_LAYOUT_TEXTDOMAN__ ).'</strong> '.__("version 4.6.0 or greater", __PW_POST_LAYOUT_TEXTDOMAN__ ).'.</p></div>');

	if (!class_exists('VC_PW_POST_LAYOUT_GRID')) {
		
		class VC_PW_POST_LAYOUT_GRID extends WPBakeryShortCode {
			
			public function __construct() {			
				register_activation_hook( __FILE__ , array( $this, 'on_activation' ) );
				register_deactivation_hook( __FILE__ , array(  $this, 'on_deactivation' ) );
				$this->includes();
				add_filter( 'plugin_action_links_' . PW_PS_PL_BASENAME_GRID, array( $this, 'action_links_woo_tabs' ) );
				add_action( 'wp_enqueue_scripts', array( $this, 'pw_register_css_js' ) );
				add_action( 'plugins_loaded', array( $this, 'loadTextDomain' ) );
			
			}
			

			function includes()
			{
				$required_vc = '3.6';
				if(defined('WPB_VC_VERSION')){
					if( version_compare( $required_vc, WPB_VC_VERSION, '>' )){
						add_action( 'admin_notices', array($this, 'pw_admin_notice_for_version'));
					}else
					{
						//require_once vc_path_dir('SHORTCODES_DIR', 'vc-posts-grid.php');
					}
				} 
				
				include_once( 'class/calss.php' );
				include_once( 'inc/function.php' );
				
				include_once( 'class/frontend-grid-ui.php' );
				include_once( 'class/frontend-list-ui.php' );
								
			}
			public function loadTextDomain() {
				load_plugin_textdomain( __PW_POST_LAYOUT_TEXTDOMAN__ , false, basename( dirname( __FILE__ ) ) . '/languages/' );
			}
				
			function pw_admin_notice_for_version()
			{
				echo PW_PS_PL_VER_NOTIC_GRID;	
			}
					
			public function action_links_woo_tabs( $links ) {
				return array_merge( array(
					'<a target="_blank" href="' . esc_url( apply_filters( 'woocommerce_docs_url', 'http://proword.net/Vc_Post_Layout/documentation/Grid_Post_Layout/', __PW_POST_LAYOUT_TEXTDOMAN__ ) ) . '">' . __( 'Docs', __PW_POST_LAYOUT_TEXTDOMAN__ ) . '</a>',
		
				), $links );
			}	
				
			public function pw_register_css_js(){
				wp_enqueue_style('pw-pl-fontawesome-style',     PW_PS_PL_URL_GRID . '/css/fontawesome/font-awesome.css', array() , null);
				wp_enqueue_style('pw-pl-framework-style',     PW_PS_PL_URL_GRID . '/css/framework/bootstrap.css', array() , null);
				wp_enqueue_style('pw-pl-layouts-style',       PW_PS_PL_URL_GRID . '/css/layouts/layouts.css', array() , null);
				wp_enqueue_style('pw-pl-grid-responsive-style',        PW_PS_PL_URL_GRID . '/css/responsive.css', array() , null);
				wp_enqueue_style('pw-pl-lightbox-style',       PW_PS_PL_URL_GRID . '/css/lightbox/lightbox.css', array() , null);
				wp_enqueue_style('pw-pl-mixitup-style',       PW_PS_PL_URL_GRID . '/css/mixitup/mixed.css', array() , null);

				//SCRIPTS	
				wp_enqueue_script('jquery');
				wp_enqueue_script( 'pw-pl-masonry-script',       PW_PS_PL_URL_GRID . '/js/masonry/masonry.js', array( 'jquery' ));
				wp_enqueue_script( 'pw-pl-lightbox-script',        PW_PS_PL_URL_GRID . '/js/lightbox/lightbox-2.6.min.js', array( 'jquery' ));
				wp_enqueue_script( 'pw-pl-mixitup-script',        PW_PS_PL_URL_GRID . '/js/mixitup/jquery.mixitup.js', array( 'jquery' ));
				wp_enqueue_script( 'pw-pl-custom-script',        PW_PS_PL_URL_GRID . '/js/custom.js', array( 'jquery' ));

			}
			
			
			public function on_deactivation(){
			}			

			public function on_activation() {
			}			
		}
	}	
	new VC_PW_POST_LAYOUT_GRID;

?>