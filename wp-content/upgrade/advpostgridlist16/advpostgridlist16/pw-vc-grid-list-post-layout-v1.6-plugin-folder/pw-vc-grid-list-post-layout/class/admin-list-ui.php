<?php
$vc_layout_sub_controls = array(
  array( 'link_post', __( 'Link to post', __PW_POST_LAYOUT_TEXTDOMAN__  ) ),
  array( 'no_link', __( 'No link', __PW_POST_LAYOUT_TEXTDOMAN__  ) ),
  array( 'link_image', __( 'Link to bigger image', __PW_POST_LAYOUT_TEXTDOMAN__  ) )
);

vc_map( array(
            "name" => __("PW List", __PW_POST_LAYOUT_TEXTDOMAN__ ),
            "description" => __("list Post Layout", __PW_POST_LAYOUT_TEXTDOMAN__ ),
            "base" => "pw_vc_list",
            "class" => "",
            "controls" => "full",
            "icon" => PW_PS_PL_URL_GRID.'/assets/images/icons/list.png',
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
							
							/* List */
							array(
								"type" => "dropdown",
								
								"class" => "",
								"heading" => __("List Type",__PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_list_type",
								"value" =>array(
									__("Medium Image",__PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-list-t1",
									__("Large Image",__PW_POST_LAYOUT_TEXTDOMAN__ )=>"pl-list-t2"
									),
								"description" => __("Choose List Type", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								'dependency' => array(
									'element' => 'pw_post_layout',
									'value' => array( 'list' )
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
							),
							array(
								"type" => "colorpicker",
								
								"class" => "",
								"heading" => __("Item Border Top Color", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_border_top_color",
								"value" => '',
								"description" => __("Choose Border Top Color.Leave blank to ignore", __PW_POST_LAYOUT_TEXTDOMAN__ ),
						
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

							),
							array(
								"type" => "colorpicker",
								
								"class" => "",
								"heading" => __("Item Border Right Color", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_border_right_color",
								"value" => '',
								"description" => __("Choose Border Right Color.Leave blank to ignore", __PW_POST_LAYOUT_TEXTDOMAN__ ),
							
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

							),
							array(
								"type" => "colorpicker",
								
								"class" => "",
								"heading" => __("Item Border Bottom Color", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_border_bottom_color",
								"value" => '',
								"description" => __("Choose Border Bottom Color.Leave blank to ignore", __PW_POST_LAYOUT_TEXTDOMAN__ ),
							
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

							),
							array(
								"type" => "colorpicker",
								
								"class" => "",
								"heading" => __("Border Left Color", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_border_left_color",
								"value" => '',
								"description" => __("Choose Border Left Color.Leave blank to ignore", __PW_POST_LAYOUT_TEXTDOMAN__ ),
							
							),	
							
							array(
								"type" => "colorpicker",
								
								"class" => "",
								"heading" => __("Backgroud Color", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								"param_name" => "pw_back_color",
								"value" => '',
								"description" => __("Choose Background Color.Leave blank to ignore", __PW_POST_LAYOUT_TEXTDOMAN__ ),
								
							),

								
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

							),

						)
			) );
?>