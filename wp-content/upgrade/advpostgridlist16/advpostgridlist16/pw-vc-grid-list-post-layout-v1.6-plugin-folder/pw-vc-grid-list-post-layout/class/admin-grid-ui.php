<?php
$vc_layout_sub_controls = array(
  array( 'link_post', __( 'Link to post', __PW_POST_LAYOUT_TEXTDOMAN__  ) ),
  array( 'no_link', __( 'No link', __PW_POST_LAYOUT_TEXTDOMAN__  ) ),
  array( 'link_image', __( 'Link to bigger image', __PW_POST_LAYOUT_TEXTDOMAN__  ) )
);

vc_map( array(
            "name" => __("PW Grid", __PW_POST_LAYOUT_TEXTDOMAN__ ),
            "description" => __("Grid Post Layout", __PW_POST_LAYOUT_TEXTDOMAN__ ),
            "base" => "pw_vc_grid",
            "class" => "",
            "controls" => "full",
            "icon" => PW_PS_PL_URL_GRID.'/assets/images/icons/grid.png',
            "category" => __('PW Post Layout', __PW_POST_LAYOUT_TEXTDOMAN__ ),
            //'admin_enqueue_js' => array(plugins_url('vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
           // 'admin_enqueue_css' => array(plugins_url('/assets/css/icon-styles.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
							array(
								"type" => "textfield",
								
								"class" => "",
								"heading" => __("Title", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_title",
								"value" => '',
								"description" => __("Enter Title.", __PW_POST_LAYOUT_TEXTDOMAN__ )
							),
							array(
								'type' => 'loop',
								'heading' => __( 'Your Query', __PW_POST_LAYOUT_TEXTDOMAN__  ),
								'param_name' => 'pw_query',
								'settings' => array(
								  'size' => array( 'hidden' => false, 'value' => 10 ),
								  'order_by' => array( 'value' => 'date' ),
								),
								'description' => __( 'Create WordPress loop, to populate content from your site.', __PW_POST_LAYOUT_TEXTDOMAN__  )
							),

													
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("Link Target",__PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_link_target",
								"value" =>array( __( 'Same window', __PW_POST_LAYOUT_TEXTDOMAN__  ) => '_self', __( 'New window', __PW_POST_LAYOUT_TEXTDOMAN__  ) => "_blank"),
								"description" => __("Choose link target", __PW_POST_LAYOUT_TEXTDOMAN__ )
							),						
							
							
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("Grid Type",__PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_grid_type",
								"value" =>array(
									__("Standard Grid (Fix row)",__PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-standard-grid",
									__("Advanced Grid (Mixitup)",__PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-mixitup-grid",
									__("Masonry Grid",__PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-masonry-grid"
									),
								"description" => __("Choose Grid Type", __PW_POST_LAYOUT_TEXTDOMAN__ ),
							),
							
							array(
								"type" => "taxonomy",
								
								"class" => "",
								"heading" => __("Add Filter",__PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_taxonomy",
								"value" =>'',
								"description" => __("Choose Taxonomy Type for Use in Grid Filter. If there is no item, Please choose post type in Build Query.", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
										'element' => 'pw_grid_type',
										'value' => array( 'pl-mixitup-grid' )
								),
							),	
							
							/*GRID */
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("Desktop Columns Count" , __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_grid_desktop_columns_count",
								"value" =>array(
									__("1 Column", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-col-md-12",
									__("2 Columns", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-col-md-6",
									__("3 Columns", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-col-md-4",
									__("4 Columns", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-col-md-3"
									),
								"description" => __("Choose Desktop(PC Mode) Columns Count", __PW_POST_LAYOUT_TEXTDOMAN__ ),
							),
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("Tablet Columns Count" , __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_grid_tablet_columns_count",
								"value" =>array(
									__("1 Column", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-col-sm-12",
									__("2 Columns", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-col-sm-6",
									__("3 Columns", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-col-sm-4",
									__("4 Columns", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-col-sm-3"
									),
								"description" => __("Choose Tablet Columns Count", __PW_POST_LAYOUT_TEXTDOMAN__ ),
							),
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("Mobile Columns Count" ,__PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_grid_mobile_columns_count",
								"value" =>array(
									__("1 Column", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-col-xs-12",
									__("2 Columns", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-col-xs-6",
									__("3 Columns", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-col-xs-4",
									__("4 Columns", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-col-xs-3"
									),
								"description" => __("Choose Mobile Columns Count", __PW_POST_LAYOUT_TEXTDOMAN__),
							),
							/* GRID */
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("Grid Skin",__PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_skin_type",
								"value" =>array(
									__("Skin One", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-gridskin-one",
									__("Skin Two", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-gridskin-two"
									),
								"description" => __("Choose Grid Skin", __PW_POST_LAYOUT_TEXTDOMAN__ ),
							),
							
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("Grid Effect",__PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_grid_skin_effect",
								"value" =>array(
									__("Effect One", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-gst-effect-1",
									__("Effect Two", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-gst-effect-2",
									__("Effect Three", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-gst-effect-3",
									__("Effect Four", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-gst-effect-4"
									),
								"description" => __("Choose Grid Effect", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
										'element' => 'pw_skin_type',
										'value' => array( 'pl-gridskin-two' )
								),								
							),
							
							/* LIST GRID */
							
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("Page Navigation" , __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_grid_page_navigation",
								"value" =>array(
										__( 'No Pagination', __PW_POST_LAYOUT_TEXTDOMAN__  ) => 'no_thing' ,	
										__( 'Show "Show More" Button', __PW_POST_LAYOUT_TEXTDOMAN__  ) => 'show_more_btn' ,	
										__( 'Infinite Scroll', __PW_POST_LAYOUT_TEXTDOMAN__  ) => 'infinite_scroll' ,
										__( 'Show Page Number', __PW_POST_LAYOUT_TEXTDOMAN__  ) => 'show_page_number' 	
								),		
								"description" => __("Choose Page Navigation Type", __PW_POST_LAYOUT_TEXTDOMAN__),
							),
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("Page Number Style" , __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_grid_page_number_style",
								"value" =>array(
										__( 'Style 1', __PW_POST_LAYOUT_TEXTDOMAN__  ) => 'pl-paging-style1' ,	
										__( 'Style 2', __PW_POST_LAYOUT_TEXTDOMAN__  ) => 'pl-paging-style2' 
								),		
								"description" => __("Choose Page Number Style", __PW_POST_LAYOUT_TEXTDOMAN__),
								'dependency' => array(
										'element' => 'pw_grid_page_navigation',
										'value' => array( 'show_page_number' )
								),
							),
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("Default Display Type",__PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_grid_display_type",
								"value" =>array(
									__("Grid (With Switch to List)",__PW_POST_LAYOUT_TEXTDOMAN__ )=>"grid",
									__("List (With Switch to Grid)",__PW_POST_LAYOUT_TEXTDOMAN__ )=>"list",
									),
								"description" => __("Choose Default Display Type", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
										'element' => 'pw_grid_type',
										'value' => array( 'pl-mixitup-grid' )
								),
							),
							array(
								'type' => 'checkbox',
								'heading' => __( 'Show Filter', __PW_POST_LAYOUT_TEXTDOMAN__  ),
								'param_name' => 'pw_grid_filter_by',
								'description' => __( 'Enables Filter Bar.', __PW_POST_LAYOUT_TEXTDOMAN__  ),
							  	'value' => array( __( 'Yes, please', __PW_POST_LAYOUT_TEXTDOMAN__  ) => 'yes' ),
								'dependency' => array(
										'element' => 'pw_grid_type',
										'value' => array( 'pl-mixitup-grid' )
								),
							),
							array(
								'type' => 'checkbox',
								'heading' => __( 'Show Order By', __PW_POST_LAYOUT_TEXTDOMAN__  ),
								'param_name' => 'pw_grid_order_by',
								'description' => __( 'Enables order By.', __PW_POST_LAYOUT_TEXTDOMAN__  ),
							  	'value' => array( __( 'Yes, please', __PW_POST_LAYOUT_TEXTDOMAN__  ) => 'yes' ),
								'dependency' => array(
										'element' => 'pw_grid_type',
										'value' => array( 'pl-mixitup-grid')
								),
							),
							array(
								'type' => 'checkbox',
								'heading' => __( 'Hide Switch Mode Icon', __PW_POST_LAYOUT_TEXTDOMAN__  ),
								'param_name' => 'pw_grid_switch_icon',
								'description' => __( 'Hide icon for switch Grid to List or List to Grid.', __PW_POST_LAYOUT_TEXTDOMAN__  ),
							  	'value' => array( __( 'Yes, please', __PW_POST_LAYOUT_TEXTDOMAN__  ) => 'yes' ),
								'dependency' => array(
										'element' => 'pw_grid_type',
										'value' => array( 'pl-mixitup-grid')
								),
							),
							
							/* TEXT */
							array(
							  'type' => 'sorted_list',
							  'heading' => __( 'Teaser layout', __PW_POST_LAYOUT_TEXTDOMAN__  ),
							  'param_name' => 'pw_teasr_layout_img',
							  'description' => __( 'Control teasers look. Enable blocks and place them in desired order. Note: This setting can be overrriden on post to post basis.', __PW_POST_LAYOUT_TEXTDOMAN__  ),
							  'value' => 'title,image,text',
							  'options' => array(
								  array( 'image', __( 'Thumbnail', __PW_POST_LAYOUT_TEXTDOMAN__  ), $vc_layout_sub_controls ),
								  array( 'title', __( 'Title', __PW_POST_LAYOUT_TEXTDOMAN__  ), $vc_layout_sub_controls ),
								  array( 'text', __( 'Text', __PW_POST_LAYOUT_TEXTDOMAN__  ), array(
									  array( 'excerpt', __( 'Teaser/Excerpt', __PW_POST_LAYOUT_TEXTDOMAN__  ) ),
									  array( 'text', __( 'Full content', __PW_POST_LAYOUT_TEXTDOMAN__  ) )
								  ) ),
								  array( 'link', __( 'Read more link', __PW_POST_LAYOUT_TEXTDOMAN__  ) )
							  ),
								'dependency' => array(
										'element' => 'pw_skin_type',
										'value' => array( 'pl-gridskin-one' )
								),
						 	),
							array(
								"type" => "pw_number",
								
								"class" => "",
								"heading" => __("Excerpt/Content Length", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_excerpt_length",
								"value" => '',
								"suffix" =>"",
								"min"=>"0",
								"description" => __("Enter Excerpt/Content length", __PW_POST_LAYOUT_TEXTDOMAN__ ),
							),
							array(
								'type' => 'textfield',
								'heading' => __( 'Thumbnail size', __PW_POST_LAYOUT_TEXTDOMAN__  ),
								'param_name' => 'pw_image_thumb_size',
								'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', __PW_POST_LAYOUT_TEXTDOMAN__  ),
							),
							array(
								"type" => "textfield",
								
								"class" => "",
								"heading" => __("Date Format", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_date_format",
								"value" => '',
								"description" => __("Enter Date Format.Show More Info <a href='http://codex.wordpress.org/Formatting_Date_and_Time' target='_new'>Here</a>", __PW_POST_LAYOUT_TEXTDOMAN__ ),
							),
							
							
							/*  'vertical_carousel','horizontal_carousel','grid','list','boxes','image' */
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("Image Effect", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_image_effect",
								"value" =>array(
									__("None", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"none",
									__("Zoom In", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"zoomin-eff",
									__("Zoom Out", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"zoomout-eff",
									__("Rotate Right", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"roundright-eff"
									),
								"description" => __("Choose image effect", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
									'element' => 'pw_skin_type',
									'value' => array( 'pl-gridskin-one' )
								),	
							),
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("Icon Effect", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_icon_effect",
								"value" =>array(
									__("None", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"none",
									__("Dropdown", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-dropup",
									__("DropUp", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-dropdown",
									__("Scale" , __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-scale-eff"
									),
								"description" => __("Choose icon effect", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
									'element' => 'pw_skin_type',
									'value' => array( 'pl-gridskin-one' )
								),	
							),
							
							array(
								'type' => 'checkbox',
								'heading' => __( 'Hide Author', __PW_POST_LAYOUT_TEXTDOMAN__  ),
								'param_name' => 'pw_grid_author',
								'description' => __( 'Hide post author.', __PW_POST_LAYOUT_TEXTDOMAN__  ),
							  	'value' => array( __( 'Yes, please', __PW_POST_LAYOUT_TEXTDOMAN__  ) => 'yes' ),
								'dependency' => array(
										'element' => 'pw_grid_type',
										'value' => array( 'pl-mixitup-grid' )
								),	
							),
							array(
								'type' => 'checkbox',
								'heading' => __( 'Hide meta', __PW_POST_LAYOUT_TEXTDOMAN__  ),
								'param_name' => 'pw_grid_tags',
								'description' => __( 'Hide Tags/Categorise/Taxonomies.', __PW_POST_LAYOUT_TEXTDOMAN__  ),
							  	'value' => array( __( 'Yes, please', __PW_POST_LAYOUT_TEXTDOMAN__  ) => 'yes' ),
								'dependency' => array(
									'element' => 'pw_skin_type',
									'value' => array( 'pl-gridskin-one' )
								),	
							),
							array(
								'type' => 'checkbox',
								'heading' => __( 'Hide comment(s) No', __PW_POST_LAYOUT_TEXTDOMAN__  ),
								'param_name' => 'pw_grid_show_num_comment',
								'description' => __( 'Hide number of comments', __PW_POST_LAYOUT_TEXTDOMAN__  ),
							  	'value' => array( __( 'Yes, please', __PW_POST_LAYOUT_TEXTDOMAN__  ) => 'yes' ),
								'dependency' => array(
									'element' => 'pw_skin_type',
									'value' => array( 'pl-gridskin-one' )
								),	
							),
							
							array(
								"type" => "pw_number",
								
								"class" => "",
								"heading" => __("Item Border Top Size", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_border_top_size",
								"value" => '',
								"suffix" =>"",
								"min"=>"0",
								"description" => __("Enter Border Top Size for item", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
									'element' => 'pw_skin_type',
									'value' => array( 'pl-gridskin-one' )
								),									
							),
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("Item Border Top Type", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_border_top_type",
								"value" =>array(
									__("Solid", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"solid",
									__("Dashed", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"dashed",
									__("Dotted", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"dotted",
									__("Double" ,__PW_POST_LAYOUT_TEXTDOMAN__ )=>"double"
									),
								"description" => __("Choose Border Top Type for item", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
									'element' => 'pw_skin_type',
									'value' => array( 'pl-gridskin-one' )
								),
							),
							array(
								"type" => "colorpicker",
								
								"class" => "",
								"heading" => __("Item Border Top Color", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_border_top_color",
								"value" => '',
								"description" => __("Choose Border Top Color.Leave blank to ignore", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
										'element' => 'pw_skin_type',
										'value' => array( 'pl-gridskin-one' )
								),								
							),	
							array(
								"type" => "pw_number",
								
								"class" => "",
								"heading" => __("Item Border Right Size", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_border_right_size",
								"value" => '',
								"suffix" =>"",
								"min"=>"0",
								"description" => __("Enter Border Right Size for item", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
									'element' => 'pw_skin_type',
									'value' => array( 'pl-gridskin-one' )
								),									
							),
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("Item Border Right Type", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_border_right_type",
								"value" =>array(
									__("Solid", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"solid",
									__("Dashed", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"dashed",
									__("Dotted", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"dotted",
									__("Double", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"double"
									),
								"description" => __("Choose Border Right Type for item", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
									'element' => 'pw_skin_type',
									'value' => array( 'pl-gridskin-one' )
								),
							),
							array(
								"type" => "colorpicker",
								
								"class" => "",
								"heading" => __("Item Border Right Color", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_border_right_color",
								"value" => '',
								"description" => __("Choose Border Right Color.Leave blank to ignore", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
										'element' => 'pw_skin_type',
										'value' => array( 'pl-gridskin-one' )
								),								
							),	
							array(
								"type" => "pw_number",
								
								"class" => "",
								"heading" => __("Item Border Bottom Size", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_border_bottom_size",
								"value" => '',
								"suffix" =>"",
								"min"=>"0",
								"description" => __("Enter Border Bottom Size for item", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
										'element' => 'pw_skin_type',
										'value' => array( 'pl-gridskin-one' )
								),									
							),
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("Item Border Bottom Type", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_border_bottom_type",
								"value" =>array(
									__("Solid", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"solid",
									__("Dashed", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"dashed",
									__("Dotted" , __PW_POST_LAYOUT_TEXTDOMAN__ )=>"dotted",
									__("Double", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"double"
									),
								"description" => __("Choose Bottom Top Typ for item", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
									'element' => 'pw_skin_type',
									'value' => array( 'pl-gridskin-one' )
								),
							),
							array(
								"type" => "colorpicker",
								
								"class" => "",
								"heading" => __("Item Border Bottom Color", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_border_bottom_color",
								"value" => '',
								"description" => __("Choose Border Bottom Color.Leave blank to ignore", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
									'element' => 'pw_skin_type',
									'value' => array( 'pl-gridskin-one' )
								),								
							),	
							array(
								"type" => "pw_number",
								
								"class" => "",
								"heading" => __("Item Border Left Size", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_border_left_size",
								"value" => '',
								"suffix" =>"",
								"min"=>"0",
								"description" => __("Enter Border Left Size for item", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
									'element' => 'pw_skin_type',
									'value' => array( 'pl-gridskin-one' )
								),									
							),
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("Item Border Left Type", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_border_left_type",
								"value" =>array(
									__("Solid", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"solid",
									__("Dashed", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"dashed",
									__("Dotted", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"dotted",
									__("Double" ,__PW_POST_LAYOUT_TEXTDOMAN__ )=>"double"
									),
								"description" => __("Choose Border Left Type for item", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
									'element' => 'pw_skin_type',
									'value' => array( 'pl-gridskin-one' )
								),
							),
							array(
								"type" => "colorpicker",
								
								"class" => "",
								"heading" => __("Border Left Color", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_border_left_color",
								"value" => '',
								"description" => __("Choose Border Left Color.Leave blank to ignore", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
										'element' => 'pw_skin_type',
										'value' => array( 'pl-gridskin-one' )
								),								
							),	
							array(
								"type" => "colorpicker",
								
								"class" => "",
								"heading" => __("Backgroud Color", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_back_color",
								"value" => '',
								"description" => __("Choose Background Color.Leave blank to ignore", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
									'element' => 'pw_skin_type',
									'value' => array( 'pl-gridskin-one' )
								),	
							
							),
							/*array(
								"type" => "colorpicker",
								
								"class" => "",
								"heading" => __("Item Background Color", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_item_back_color",
								"value" => '',
								"description" => __("Choose Item Background Color.Leave blank to ignore", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								
							),		*/	
							
							
							array(
								"type" => "colorpicker",
								
								"class" => "",
								"heading" => __("Link Color", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_link_color",
								"value" => '',
								"description" => __("Choose Link Color.Leave blank to ignore", __PW_POST_LAYOUT_TEXTDOMAN__ ),
															
							),	
							array(
								"type" => "colorpicker",
								
								"class" => "",
								"heading" => __("Link Hover Color", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_link_hover_color",
								"value" => '',
								"description" => __("Choose Link Hover Color.Leave blank to ignore", __PW_POST_LAYOUT_TEXTDOMAN__ ),
												
							),	
							array(
								"type" => "colorpicker",
								
								"class" => "",
								"heading" => __("Meta Color", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_meta_color",
								"value" => '',
								"description" => __("Choose Meta Color.Leave blank to ignore", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
									'element' => 'pw_skin_type',
									'value' => array( 'pl-gridskin-one' )
								),								
							),	
							array(
								"type" => "colorpicker",
								
								"class" => "",
								"heading" => __("Excerpt Color", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_excerpt_color",
								"value" => '',
								"description" => __("Choose Excerpt Color.Leave blank to ignore", __PW_POST_LAYOUT_TEXTDOMAN__ ),
															
							),	
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("Read More Type", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_readmore_type",
								"value" =>array(
									__("Type 1", __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-permalink",
									__("Type 2" , __PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-permalink-t2"
									),
								"description" => __("Choose Read More Type", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
									'element' => 'pw_skin_type',
									'value' => array( 'pl-gridskin-one' )
								),	
							),

						)
			) );
?>