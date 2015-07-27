<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


if (!class_exists('VC_PW_grid')) {
	class VC_PW_grid extends WPBakeryShortCode_VC_Posts_Grid {
		public $pw_title,
				$pw_query,
				$pw_grid_type,
				
				$pw_border_top_size,
				$pw_border_top_type,
				$pw_border_top_color,
				
				$pw_border_right_size,
				$pw_border_right_type,
				$pw_border_right_color,
				
				$pw_border_bottom_size,
				$pw_border_bottom_type,
				$pw_border_bottom_color,
				
				$pw_border_left_size,
				$pw_border_left_type,
				$pw_border_left_color,

				
				$pw_back_color,
				$pw_item_back_color,
				
				
				$pw_link_color,
				$pw_link_hover_color,
				$pw_meta_color,
				$pw_excerpt_color,
				$pw_readmore_type,
				
				$pw_link_target,
				$pw_post_layout,
				$pw_grid_desktop_columns_count,
				$pw_grid_tablet_columns_count,
				$pw_grid_mobile_columns_count,
				$pw_skin_type,
				$pw_grid_skin_effect,
				$pw_grid_page_navigation,
				$pw_grid_page_number_style,
				$pw_grid_filter_by,
				$pw_grid_order_by,
				$pw_grid_switch_icon,
				$pw_teasr_layout_img,
				$pw_image_thumb_size,
				$pw_excerpt_length,
				$pw_image_effect,
				$pw_icon_effect,
				$pw_date_format,
				$pw_taxonomy,
				$pw_grid_display_type,
				$pw_box_ids;
				
		function __construct(
						$pw_title,
						$pw_query,
						$pw_grid_display_type,
						$pw_grid_type,
						
						
						$pw_border_top_size,
						$pw_border_top_type,
						$pw_border_top_color,
						
						$pw_border_right_size,
						$pw_border_right_type,
						$pw_border_right_color,
						
						$pw_border_bottom_size,
						$pw_border_bottom_type,
						$pw_border_bottom_color,
						
						$pw_border_left_size,
						$pw_border_left_type,
						$pw_border_left_color,

						$pw_back_color,
						$pw_item_back_color,
						
						
						$pw_link_color,
						$pw_link_hover_color,
						$pw_meta_color,
						$pw_excerpt_color,
						$pw_readmore_type,
						
						$pw_link_target,
						$pw_post_layout,
						$pw_grid_desktop_columns_count,
						$pw_grid_tablet_columns_count,
						$pw_grid_mobile_columns_count,
						$pw_skin_type,
						$pw_grid_skin_effect,
						$pw_grid_page_navigation,
						$pw_grid_page_number_style,
						$pw_grid_filter_by,
						$pw_grid_order_by,
						$pw_grid_switch_icon,
						$pw_teasr_layout_img,
						$pw_image_thumb_size,
						$pw_excerpt_length,
						$pw_image_effect,
						$pw_icon_effect,
						$pw_date_format,
						$pw_taxonomy
						) {
			
			$this->pw_title=$pw_title;
			$this->pw_query=$pw_query;
			$this->pw_grid_type=$pw_grid_type;
			//My Variables
			$this->pw_border_top_size = $pw_border_top_size;
			$this->pw_border_top_type = $pw_border_top_type;
			$this->pw_border_top_color = $pw_border_top_color;
			
			$this->pw_border_right_size = $pw_border_right_size;
			$this->pw_border_right_type = $pw_border_right_type;
			$this->pw_border_right_color = $pw_border_right_color;
			
			$this->pw_border_bottom_size = $pw_border_bottom_size;
			$this->pw_border_bottom_type = $pw_border_bottom_type;
			$this->pw_border_bottom_color = $pw_border_bottom_color;
			
			$this->pw_border_left_size = $pw_border_left_size;
			$this->pw_border_left_type = $pw_border_left_type;
			$this->pw_border_left_color = $pw_border_left_color;
			
			$this->pw_back_color = $pw_back_color;
			$this->pw_item_back_color = $pw_item_back_color;
			
			$this->pw_link_color = $pw_link_color;
			$this->pw_link_hover_color = $pw_link_hover_color;
			$this->pw_meta_color = $pw_meta_color;
			$this->pw_excerpt_color = $pw_excerpt_color;
			$this->pw_readmore_type = $pw_readmore_type;
			
			$this->pw_grid_desktop_columns_count=$pw_grid_desktop_columns_count;
			$this->pw_grid_tablet_columns_count=$pw_grid_tablet_columns_count;
			$this->pw_grid_mobile_columns_count=$pw_grid_mobile_columns_count;
			$this->pw_skin_type=$pw_skin_type;
			$this->pw_grid_skin_effect=$pw_grid_skin_effect;
			$this->pw_link_target=$pw_link_target;
			$this->pw_post_layout=$pw_post_layout;
			$this->pw_grid_page_navigation=$pw_grid_page_navigation;
			$this->pw_grid_page_number_style=$pw_grid_page_number_style;
			$this->pw_grid_filter_by=$pw_grid_filter_by;
			$this->pw_grid_order_by=$pw_grid_order_by;
			$this->pw_grid_switch_icon=$pw_grid_switch_icon;
			$this->pw_teasr_layout_img=$pw_teasr_layout_img;
			$this->pw_image_thumb_size=$pw_image_thumb_size;
			$this->pw_excerpt_length=$pw_excerpt_length;
			$this->pw_image_effect=$pw_image_effect;
			$this->pw_icon_effect=$pw_icon_effect;
			$this->pw_date_format=$pw_date_format;
			$this->pw_taxonomy=$pw_taxonomy;
			$this->pw_grid_display_type=$pw_grid_display_type;
			
			
			$this->vars=get_defined_vars();
			//print_r($arr);
			
			
			$this->pw_front_end();
			
			$this->pl_grid_custom_color();
			
			$this->pl_list_custom_color();
				
		}
		
		function pw_front_end()
		{
			global $VCExtendAddonClass_GRID,$output;
			
			$loop=$this->pw_query;
			$grid_link = $grid_layout_mode = $title = $filter= '';
			$posts = array();
			if(empty($loop)) return;
			$this->getLoop($loop);
			$my_query = $this->query;
			$args = $this->loop_args;
			
			$paged = 1;
			$query=$this->pw_query;
			$query=explode('|',$query);
			
			$query_posts_per_page=10;
			$query_post_type='post';
			$query_meta_key='';
			$query_orderby='date';
			$query_order='ASC';
			
			$query_by_id='';
			$query_by_id_not_in='';
			$query_by_id_in='';
			
			$query_categories='';
			$query_cat_not_in='';
			$query_cat_in='';
		
			$query_tags='';
			$query_tags_in='';
			$query_tags_not_in='';
			
			$query_author='';
			$query_author_in='';
			$query_author_not_in='';
			
			$query_tax_query='';
			
			
			
			
			foreach($query as $query_part)
			{
				$q_part=explode(':',$query_part);
				switch($q_part[0])
				{
					case 'post_type':
						$query_post_type=explode(',',$q_part[1]);
					break;
					
					case 'size':
						$query_posts_per_page=($q_part[1]=='All' ? -1:$q_part[1]);
					break;
					
					case 'order_by':
						
						$query_meta_key='';
						$query_orderby='';
						
						$public_orders_array=array('id','date','author','title','modified','rand','comment_count','menu_order');
						if(in_array($q_part[1],$public_orders_array))
						{
							$query_orderby=$q_part[1];
						}else
						{
							$query_meta_key=$q_part[1];
							$query_orderby='meta_value_num';
						}
						
					break;
					
					case 'order':
						$query_order=$q_part[1];
					break;
					
					case 'by_id':
						$query_by_id=explode(',',$q_part[1]);
						$query_by_id_not_in=array();
						$query_by_id_in=array();
						foreach($query_by_id as $ids)
						{
							if($ids<0)
							{
								$query_by_id_not_in[]=$ids;
							}else
							{
								$query_by_id_in[]=$ids;
							}
						}
					break;
					
					case 'categories':
						$query_categories=explode(',',$q_part[1]);
						$query_cat_not_in=array();
						$query_cat_in=array();
						foreach($query_categories as $cat)
						{
							if($cat<0)
							{
								$query_cat_not_in[]=$cat;
							}else
							{
								$query_cat_in[]=$cat;
							}
						}
					break;
					
					case 'tags':
						$query_tags=explode(',',$q_part[1]);
						$query_tags_not_in=array();
						$query_tags_in=array();
						foreach($query_tags as $tags)
						{
							if($tags<0)
							{
								$query_tags_not_in[]=$tags;
							}else
							{
								$query_tags_in[]=$tags;
							}
						}
					break;
					
					case 'authors':
						$query_author=explode(',',$q_part[1]);
						$query_author_not_in=array();
						$query_author_in=array();
						foreach($query_author as $author)
						{
							if($tags<0)
							{
								$query_author_not_in[]=$author;
							}else
							{
								$query_author_in[]=$author;
							}
						}
						
					break;

					case 'tax_query':
						$all_tax=get_object_taxonomies( $query_post_type );

						$tax_query=array();
						$query_tax_query=array('relation' => 'AND');
						foreach ( $all_tax as $tax ) {
							$values=$tax;
							$query_taxs_in=array();
							$query_taxs_not_in=array();
							
							$query_taxs=explode(',',$q_part[1]);
							foreach($query_taxs as $taxs)
							{
								if($taxs<0)
								{
									$query_taxs_not_in[]=$taxs;
								}else
								{
									$query_taxs_in[]=$taxs;
								}
							}

							if(count($query_taxs_not_in)>0)
							{
								$query_tax_query[]=array(
									'taxonomy' => $tax,
									'field'    => 'id',
									'terms'    => $query_taxs_not_in,
									'operator' => 'NOT IN',
								);
							}else if(count($query_taxs_in)>0)
							{
								$query_tax_query[]=array(
									'taxonomy' => $tax,
									'field'    => 'id',
									'terms'    => $query_taxs_in,
									'operator' => 'IN',
								);
							}
							
							
							
							
							break;
						}	
						
						
						/*$query_tax_query=array(
							'relation' => 'AND',
							$tax_query,
						);*/
						//die(print_r($query_tax_query));
					break;
				}
			}
					//tax_query:5|by_id:1060
			$query_final=array('post_type' => $query_post_type,
						'post_status'=>'publish',
						'posts_per_page'=>$query_posts_per_page,
						'meta_key' => $query_meta_key,
						'orderby' => $query_orderby,
						'order' => $query_order,
						'paged'=>$paged,
						
						'post__in'=>$query_by_id_in,
						'post__not_in'=>$query_by_id_not_in,
						
						'category__in'=>$query_cat_in,
						'category__not_in'=>$query_cat_not_in,
						
						'tag__in'=>$query_tags_in,
						'tag__not_in'=>$query_tags_not_in,
						
						'author__in'=>$query_author_in,
						'author__not_in'=>$query_author_not_in,
						
						'tax_query'=>$query_tax_query
					 );
			
			//die(print_r($query_final));
			$my_query = new WP_Query($query_final);	
			
			
			$img_id=array();
			$img_counter = 0;
			$output = '<div style="display:none"><img src="'.PW_PS_PL_URL_GRID.'/assets/images/loader.gif" /></div>';
			$post_counter = 0;
			$this->pw_grid_id =$this->pw_list_id = $rand_id = rand(6000,7000);
			$output .= '<h2 class="pl-itemtitle">'.$this->pw_title.'</h2>';
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			
			if ($this->pw_grid_type=='pl-standard-grid' || $this->pw_grid_type=='pl-mixitup-grid'){
				
				
				/////////////MIXITUP MODE --- GRID FILTER AND ORDER///////////////
				$order_by=$order_value='';
				$filters=array();
				$z_index = 9999;
				if($this->pw_grid_type=='pl-mixitup-grid' && ($this->pw_grid_filter_by=='yes' || $this->pw_grid_order_by=='yes' || $this->pw_grid_switch_icon=='no'))
				{
					$output='
						<div class="property_grid pl-grid-controls" id="Filters_'.$this->pw_grid_id.'">';
						if($this->pw_grid_filter_by=='yes')
						{	
							$taxs=explode(',',$this->pw_taxonomy);
							
							if(is_array($taxs) && count($taxs)>1)
							{
								foreach($taxs as $tax)
								{
									
									
									$taxonomy=get_taxonomy($tax);
									
									$filters[]=$tax;
									
									$z_index -= 1 ;
									$output.='
									<div class="pl-drop_down wf" style="z-index:'.$z_index.';">
										<span class="pl-anim150">'.__($taxonomy->label,'gt_fa').'</span>
										<ul class="pl-anim250">
											<li class="active" data-filter="all" data-dimension="grid_filter_'.$tax.'">All</li>
											';
												$terms = get_terms($tax,'hide_empty=1'); 
												foreach ($terms as $term){
											
													$output.='<li  data-dimension="grid_filter_'.$tax.'" data-filter="'.strtolower($term->slug).'" >'.$term->name.'</li>';
												} 
										$output.='
										</ul>
									</div>';
								}
							}else if( $this->pw_taxonomy != '' )
							{
								
								$tax=get_taxonomy( $this->pw_taxonomy );
								
								$filters[]=$this->pw_taxonomy;
								
								$output.='
								<div class="pl-drop_down wf">
									<span class="pl-anim150">'.__($tax->label,'gt_fa').'</span>
									<ul class="pl-anim250">
										<li class="active" data-filter="all" data-dimension="grid_filter_'.$this->pw_taxonomy.'">All</li>
										';
											$terms = get_terms($this->pw_taxonomy,'hide_empty=1'); 
											foreach ($terms as $term){
										
											$output.='<li  data-dimension="grid_filter_'.$this->pw_taxonomy.'" data-filter="'.strtolower($term->slug).'" >'.$term->name.'</li>';
										} 
									$output.='
									</ul>
								</div>';
							}
						}
						
						if($this->pw_grid_order_by=='yes')
						{
							$query_output=$this->pw_query;
							$query_output=explode('|',$query_output);
							$order_by='date';
							$order='ASC';
							
							foreach($query_output as $query_fields)
							{
								$order_field=explode(':',$query_fields);
								if($order_field[0]=='order_by')
									$order_by=$order_field[1];
								if($order_field[0]=='order')
									$order=$order_field[1];	
							}
							
							$output .= '
							<div class="pl-meta">
								<div class="meta-title">'.ucwords ( str_replace('_',' ',$order_by) ).'</div>
							
								<span title="Sort Ascending" class="sort-'.$order_by.'-'.$this->pw_grid_id.' pl-anim150 desc '.(strtolower($order)=='desc' ? "active":"").' " data-sort="data-'.$order_by.'-'.$this->pw_grid_id.'" data-order="asc"></span>
								<span title="Sort Descending" class="sort-'.$order_by.'-'.$this->pw_grid_id.' pl-anim150 asc '.(strtolower($order)=='asc' ? "active":"").'" data-sort="data-'.$order_by.'-'.$this->pw_grid_id.'" data-order="desc"></span>
							</div>';
						}
						if($this->pw_grid_switch_icon=='no')
						{
							$output.='<div class="view-type-cnt">
									
									<div title="'.__('Grid View','gt_wpml').'" class="pw_view_type_'.$this->pw_grid_id.' view-btn pl-gridview '.($this->pw_grid_display_type=='grid' ? "active":"").' " data-viewtype="grid" id="grid_view" ><i class="fa fa-th-large"></i></div>
									<div title="'.__('List View','gt_wpml').'" class="pw_view_type_'.$this->pw_grid_id.' view-btn pl-listview '.($this->pw_grid_display_type=='list' ? "active":"").'" data-viewtype="list" id="list_view" ><i class="fa fa-th-list"></i></div>
								</div>';
						}
					$output .= '</div>';
				
				
					
						 
				
					$output .= '<div class="grid pl-gridlayout '.$this->pw_skin_type .' ' .$this->pw_grid_type .' pl_grid_id_'.$this->pw_grid_id.' " id="Grid_'.$this->pw_grid_id.'" >';
				}
				else if($this->pw_grid_type=='pl-standard-grid')
				{
					$output .= '<div class="pl-gridlayout '.$this->pw_skin_type .' ' .$this->pw_grid_type .' pl_grid_id_'.$this->pw_grid_id.'" id="Grid_'.$this->pw_grid_id.'" >';
				}
				/////////////END FILTER AND ORDER//////////////

				while ( $my_query->have_posts() ) {
					$my_query->the_post(); // Get post from query
					$post = new stdClass(); // Creating post object.
					$post->id = get_the_ID();
					$post->link = get_permalink($post->id);
					$img_id[]=get_post_meta( $post->id , '_thumbnail_id' ,true );
					
					$post_thumbnail = wpb_getImageBySize(array( 'post_id' => $post->id, 'thumb_size' => $this->pw_image_thumb_size ));
					$current_img_large = $post_thumbnail['thumbnail'];
					$current_img_full = wp_get_attachment_image_src( $img_id[$img_counter++] , 'full' );
					
					$post_type = get_post_type( $post->id );
					$post_taxonomies = get_object_taxonomies($post_type);
					$tax_counter = 0;
					/////////////FILTER AND ORDER PARAM//////
					$data_filter='';
					if($this->pw_grid_type=='pl-mixitup-grid' && $this->pw_grid_filter_by=='yes')
					{
						$taxs=explode(',',$this->pw_taxonomy);
						if(is_array($taxs) && count($taxs)>1)
						{
							foreach($taxs as $tax)
							{
								$data_filters=wp_get_post_terms($post->id, $tax, array("fields" => "slugs"));
								$data_filter.=implode(' ',$data_filters).' ';
							}
						}else if($this->pw_taxonomy!='')
						{
							$data_filter=wp_get_post_terms($post->id, $this->pw_taxonomy, array("fields" => "slugs"));
							$data_filter=implode(' ',$data_filter);
						}
					}
					
					if($this->pw_grid_type=='pl-mixitup-grid' && $this->pw_grid_order_by=='yes')
					{
						$public_orders_array=array('id','date','author','title','modified','rand','comment_count','menu_order');
						if(in_array($order_by,$public_orders_array))
						{
							switch($order_by)
							{
								case 'id':
									$order_value=get_the_id();
								break;
								
								case 'date':
									$order_value=get_the_date('Y/m/d');
								break;
								
								case 'author':
									$order_value=get_the_author();
								break;
								
								case 'title':
									$order_value=get_the_title();
								break;
								
								case 'modified':
									$order_value=get_the_modified_date('Y/m/d');
								break;
								
								case 'rand':
									$order_value=rand(0,1000);
								break;
								
								case 'comment_count':
									$order_value=wp_count_comments($post->id);
									$order_value=$order_value->total_comments ;
								break;
								
								case 'menu_order':
									$thispost = get_post($post->id);
									$order_value=$thispost->menu_order;
								break;
							}
						}
						else
							$order_value=get_post_meta($post->id, $order_by , true);
					}
					/////////////END FILTER PARAM///////////
					
					
					if ($this->pw_skin_type=='pl-gridskin-one'){
						
						/////////////MIXITUP MODE OR GENERAL MODE///////////////
						if($this->pw_grid_type=='pl-mixitup-grid' && ($this->pw_grid_filter_by=='yes' || $this->pw_grid_order_by=='yes' || $this->pw_grid_switch_icon=='no'))
						{
							$output .= '<div  class=" mix '.$data_filter.' mix_all ' .$this->pw_grid_desktop_columns_count.' ' . $this->pw_grid_tablet_columns_count . ' ' . $this->pw_grid_mobile_columns_count .' pl-col" data-'.$order_by.'-'.$this->pw_grid_id.'="'.$order_value.'" >';
						}else if($this->pw_grid_type=='pl-standard-grid')
						{
							$output .= '<div  class="' .$this->pw_grid_desktop_columns_count.' ' . $this->pw_grid_tablet_columns_count . ' ' . $this->pw_grid_mobile_columns_count .' pl-col">';
						}
						////////////////////////////////////////////
						
						
						$post_orders = explode(',',$this->pw_teasr_layout_img);
							foreach ( $post_orders as $order ){
								$order_type = explode('|',$order);
								switch ($order_type[0]){
								case 'image':
											$output .= '<div class="pl-itemcnt">
													<div class="pl-thumbcnt '. $this->pw_image_effect .'">
														'.$current_img_large.'
														<div class="pl-overally fadein-eff">
															<a href="'. $current_img_full[0] .'" class="pl-zoom-icon pl-not-alone '. $this->pw_icon_effect.' example-image" data-lightbox="image-set"></a>
															<a href="'. $post->link .'" class="pl-link-icon pl-not-alone '. $this->pw_icon_effect .'" target="'. $this->pw_link_target  .'" ></a>
														</div><!-- pl-overally -->
													</div><!-- pl-thumbcnt -->
												</div><!--pl-itemcnt -->';
											 break;
								case 'title':
											$output .= '<div class="pl-detailcnt">
														<h4 class="pl-title left-txt"><span class="pl-date">'. get_the_date($this->pw_date_format).'</span><a href="'. $post->link .'">'. get_the_title().'</a></h4>
													</div>
												 <div class="pl-detailcnt">';
												$output .= pw_get_post_meta($post->id , $post_taxonomies);	
												$output .= '</div>';
											break;
								case 'text':
											$output .= '<div class="pl-detailcnt">
														<p class="pl-text left-txt">'. $VCExtendAddonClass_GRID->excerpt(get_the_excerpt(),$this->pw_excerpt_length).'</p>
														<div class="pl-postcomment"><a href="'. get_comments_link() .'"><i class="fa fa-comments"></i>'.get_comments_number( '0', '1', '% responses' ).'</a></div>
												  </div>';
											break;
								case 'link':
											$output .= '<div class="pl-detailcnt">
														<a class="'.$this->pw_readmore_type.'" href="'. $post->link .'" target="'. $this->pw_link_target .'" >'.__('Read More',__PW_POST_LAYOUT_TEXTDOMAN__ ).'<i class="fa fa-angle-right"></i></a>
												  </div>';
											break;
								}//end switch
							}//end foreach
					   $output .=  '</div><!--col -->';
					}//end if
					else if ($this->pw_skin_type=='pl-gridskin-two'){
						/////////////MIXITUP MODE OR GENERAL MODE///////////////
						if($this->pw_grid_type=='pl-mixitup-grid' && ($this->pw_grid_filter_by=='yes' || $this->pw_grid_order_by=='yes' || $this->pw_grid_switch_icon=='no'))
						{
						
						$output .= '
							<div class="mix '.$data_filter.' mix_all '.$this->pw_grid_desktop_columns_count. ' ' . $this->pw_grid_tablet_columns_count . ' ' . $this->pw_grid_mobile_columns_count .' pl-col" data-'.$order_by.'-'.$this->pw_grid_id.'="'.$order_value.'" >';
						}else if($this->pw_grid_type=='pl-standard-grid')
						{
							$output .= '
							<div class="'.$this->pw_grid_desktop_columns_count. ' ' . $this->pw_grid_tablet_columns_count . ' ' . $this->pw_grid_mobile_columns_count .' pl-col">';
						}
						////////////////////////////////////////
						
									$output.=' <div class="pl-view '.$this->pw_grid_skin_effect.'">
										'.$current_img_large.'
										<div class="pl-mask">
											<h4><a href="'. $post->link .'">'. get_the_title().'</a></h4>
											<p>'. $VCExtendAddonClass_GRID->excerpt(get_the_excerpt(),$this->pw_excerpt_length).'</p>
											<a class="pl-permalink" href="'. $post->link .'" target="'. $this->pw_link_target  .'" >'.__('Read More',__PW_POST_LAYOUT_TEXTDOMAN__ ).'<i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
							</div><!--col -->
							';
					}//end elseif
				}
				$output .= '</div>';
				wp_reset_query();

			}//end if Standard
			else if ($this->pw_grid_type=='pl-masonry-grid')
			{
				$output .= '<div class="pl-gridlayout '.$this->pw_skin_type .' ' .$this->pw_grid_type .' pl_grid_id_'.$this->pw_grid_id.'"  id="Grid_'.$this->pw_grid_id.'">';
				while ( $my_query->have_posts() ) {
					$my_query->the_post(); // Get post from query
					$post = new stdClass(); // Creating post object.
					$post->id = get_the_ID();
					$post->link = get_permalink($post->id);
					$img_id[]=get_post_meta( $post->id , '_thumbnail_id' ,true );
					
					$post_thumbnail = wpb_getImageBySize(array( 'post_id' => $post->id, 'thumb_size' => $this->pw_image_thumb_size ));
					$current_img_large = $post_thumbnail['thumbnail'];
					$current_img_full = wp_get_attachment_image_src( $img_id[$img_counter++] , 'full' );
					
					$post_type = get_post_type( $post->id );
					$post_taxonomies = get_object_taxonomies($post_type);
					$tax_counter = 0;
					
					
					if ($this->pw_skin_type=='pl-gridskin-one')
					{	
						$output .= '<div class="' .$this->pw_grid_desktop_columns_count.' ' . $this->pw_grid_tablet_columns_count . ' ' . $this->pw_grid_mobile_columns_count .' pl-col" >';
						$post_orders = explode(',',$this->pw_teasr_layout_img);
							foreach ( $post_orders as $order ){
								$order_type = explode('|',$order);
								switch ($order_type[0]){
								case 'image':
											$output .= '<div class="pl-itemcnt">
													<div class="pl-thumbcnt '. $this->pw_image_effect .'">
														'.$current_img_large.'
														<div class="pl-overally fadein-eff">
															<a href="'. $current_img_full[0] .'" class="pl-zoom-icon pl-not-alone '. $this->pw_icon_effect.' example-image" data-lightbox="image-set"></a>
															<a href="'. $post->link .'" class="pl-link-icon pl-not-alone '. $this->pw_icon_effect .'" target="'. $this->pw_link_target  .'" ></a>
														</div><!-- pl-overally -->
													</div><!-- pl-thumbcnt -->
												</div><!--pl-itemcnt -->';
											 break;
								case 'title':
											$output .= '<div class="pl-detailcnt">
														<h4 class="pl-title left-txt"><span class="pl-date">'. get_the_date($this->pw_date_format).'</span><a href="'. $post->link .'">'. get_the_title().'</a></h4>
													</div>
												 <div class="pl-detailcnt">';
												$output .= pw_get_post_meta($post->id , $post_taxonomies);	
												$output .= '</div>';
											break;
								case 'text':
											$output .= '<div class="pl-detailcnt">
														<p class="pl-text left-txt">'. $VCExtendAddonClass_GRID->excerpt(get_the_excerpt(),$this->pw_excerpt_length).'</p>
														<div class="pl-postcomment"><a href="'. get_comments_link() .'"><i class="fa fa-comments"></i>'.get_comments_number( '0', '1', '% responses' ).'</a></div>
												  </div>';
											break;
								case 'link':
											$output .= '<div class="pl-detailcnt">
														<a class="pl-permalink" href="'. $post->link .'" target="'. $this->pw_link_target  .'" >'.__('Read More',__PW_POST_LAYOUT_TEXTDOMAN__ ).'<i class="fa fa-arrow-circle-right"></i></a>
												  </div>';
											break;
								}//end switch
							}//end foreach
					   $output .=  '</div><!--col -->';
					}//end if
					else if ($this->pw_skin_type=='pl-gridskin-two')
					{
						$output .= '
							<div class="'.$this->pw_grid_desktop_columns_count. ' ' . $this->pw_grid_tablet_columns_count . ' ' . $this->pw_grid_mobile_columns_count .' pl-col" >
									<div class="pl-view '.$this->pw_grid_skin_effect.'">
										'.$current_img_large.'
										<div class="pl-mask">
											<h4><a href="'. $post->link .'">'. get_the_title().'</a></h4>
											<p>'. $VCExtendAddonClass_GRID->excerpt(get_the_excerpt(),$this->pw_excerpt_length).'</p>
											<a class="pl-permalink" href="'. $post->link .'" target="'. $this->pw_link_target  .'" >'.__('Read More',__PW_POST_LAYOUT_TEXTDOMAN__ ).'<i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
							</div><!--col -->
							';
					}//end elseif
				}
				$output .= '</div>';
				wp_reset_query();

			}//emd if masonry	
			
			/////////////CONTROL FIELDS FORM//////////////
			$all_page_number=$my_query->max_num_pages;
			$view_type='grid';
			
			$fields='';
			$arr=$this->vars;
			
			foreach($arr as $key => $value)
			{
				$fields.='<input type="hidden" name="'.$key.'" value="'.$value.'" id="'.$key.'_'.$this->pw_grid_id.'"/>';
			}
			
			$output.='
					<form id="pw_pl_form_load_more_'.$this->pw_grid_id.'">
					
						'.$fields.'
						<input type="hidden" name="_wpnonce " value="'.rand(0,100000).'"/>
						<input type="hidden" name="query" value="'.$this->pw_query.'"/>
						<input type="hidden" name="paged" value="'.$paged.'" id="pw_paged_'.$this->pw_grid_id.'"/>
						<input type="hidden" name="view_type" value="'.$view_type.'" id="pw_view_type_'.$this->pw_grid_id.'"/>
						<input type="hidden" name="total_paged" value="'.$all_page_number.'" id="pw_total_paged_'.$this->pw_grid_id.'"/>
						<input type="hidden" name="pw_action_type" value="" id="pw_pl_action_type_'.$this->pw_grid_id.'"/>
						<input type="hidden" name="pw_mixitup_grid_id" value="'.$this->pw_grid_id.'" id="pw_grid_id_'.$this->pw_grid_id.'"/>
					</form>';
			
			if($this->pw_grid_page_navigation=='show_more_btn' && $all_page_number>1)
			{
				$output.='		
					<div class="clear"></div><div rel="3" class="pl-loadmorecnt loadmore_id_'.$this->pw_grid_id.'">
						<a href="page/'.$paged.'/" class="pw_pl_load_more_'.$this->pw_grid_id.' load-more-link">'.__('SHOW MORE','gt_wpml').'</a>
					</div>';
					
			}else if($this->pw_grid_page_navigation=='show_page_number' && $all_page_number>1)
			{
			
				$output.=$this->pagination($all_page_number,4,'pl-pagination-link-'.$this->pw_grid_id);
			}
			///////////////////////////
			
			
			//////////////CUSTOM JS/////////////////////
			$loading='<div class="pl-grid-loading"><img src="'.PW_PS_PL_URL_GRID.'/assets/images/loader.gif" /></div>';
			
			/////////////MIXITUP MODE OR GENERAL MODE///////////////
			if($this->pw_grid_type=='pl-mixitup-grid' && ($this->pw_grid_filter_by=='yes' || $this->pw_grid_order_by=='yes' || $this->pw_grid_switch_icon=='no'))
			{
				$query_order=(strtolower($query_order)=='desc' ? "asc":"desc");
			
				$output.="
					<script type='text/javascript'>
						jQuery(document).ready(function() {";
							if($this->pw_grid_type=='pl-mixitup-grid' && ($this->pw_grid_order_by=='yes'))
							{
								$output.="jQuery('#Grid_".$this->pw_grid_id."').mixitup({sortSelector:'.sort-".$order_by."-".$this->pw_grid_id."'});";
							}else
							{
								$output.="jQuery('#Grid_".$this->pw_grid_id."').mixitup();";
							}
							
							$output.="
							
							var filters = jQuery('#Filters_".$this->pw_grid_id."').find('li'),
							dimensions = {
							";	
							foreach($filters as $grid_filter)
							{
								$output.="grid_filter_".$grid_filter.": 'all',";
							}
							
							$output.="	
							};
							
							filters.on('click',function(){
							
								var t = jQuery(this),
									dimension = t.attr('data-dimension'),
									filter = t.attr('data-filter'),
									filterString = dimensions[dimension];
								if(filter == 'all'){
									if(!t.hasClass('active')){
										t.addClass('active').siblings().removeClass('active');
										filterString = 'all';	
									} else {
										// Uncheck
										t.removeClass('active');
										// Emtpy string
										filterString = '';
									}
								} else {
									t.siblings('[data-filter=\"all\"]').removeClass('active');
									filterString = filterString.replace('all','');
									if(!t.hasClass('active')){
										// Check checkbox
										t.addClass('active');
										// Append filter to string
										filterString = filterString == '' ? filter : filterString+' '+filter;
									} else {
										// Uncheck
										t.removeClass('active');
										// Remove filter and preceeding space from string with RegEx
										
										/*var re = new RegExp('(\\s|^)'+filter);
										filterString = filterString.replace(re,'');*/
										
										filterString = filterString.replace(filter.trim(),'');
									};
								};
								
								// Set demension with filterString
								dimensions[dimension] = filterString;
								
								// We now have two strings containing the filter arguments for each dimension:	
								";
								$i=1;
								foreach($filters as $grid_filter)
								{
									$output.="console.info('dimension ".$i++.": '+dimensions.grid_filter_".$grid_filter.");";
								}
								$output.="
								
	
								jQuery('#Grid_".$this->pw_grid_id."').mixitup('filter',[";
									foreach($filters as $grid_filter)
									{
										$output.="dimensions.grid_filter_".$grid_filter.",";
									}
								$output.="]);
							
							});";
							
							if($this->pw_grid_display_type=='list')
							{
								$output.="
								//event.preventDefault(event);
	
								jQuery('#pw_pl_action_type_".$this->pw_grid_id."').val('swap_view_type');
								jQuery('#pw_view_type_".$this->pw_grid_id."').val('list');
								
								jQuery('#Grid_".$this->pw_grid_id."').removeClass('pl-gridlayout').addClass('pl-listlayout');
								
								jQuery(this).siblings('.active').removeClass('active');
								jQuery(this).addClass('active');
								
								jQuery('#Grid_".$this->pw_grid_id."').html('".$loading."');
								var params=jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').serialize();
								jQuery.ajax ({
									type: 'POST',
									url: '".admin_url( 'admin-ajax.php' )."',
									data:  params+'&action=pw_pl_grid_list_swap',
									success: function(response) {

										jQuery('#Grid_".$this->pw_grid_id."').html(response);
										
										jQuery('#Filters_".$this->pw_grid_id." .pl-anim250 li').removeClass('active');
										jQuery('#Filters_".$this->pw_grid_id." .pl-anim250').each(function(i, obj) {
											jQuery(this).children().eq(0).addClass('active');
										});
	
										//jQuery('#Grid_".$this->pw_grid_id."').mixitup('sort','random');				
										jQuery('#Grid_".$this->pw_grid_id."').mixitup('remix');";
										if($this->pw_grid_type=='pl-mixitup-grid' && ($this->pw_grid_order_by=='yes'))
										{
											$output.="jQuery('#Grid_".$this->pw_grid_id."').mixitup();";
											$output.="jQuery('#Grid_".$this->pw_grid_id."').mixitup('multimix',{
																filter: 'all',
																sortSelector:'.sort-".$order_by."-".$this->pw_grid_id."',
																sort: 'data-".$order_by."-".$this->pw_grid_id."',
																order: '".strtolower($query_order)."',
																});";
										}else
										{
											$output.="jQuery('#Grid_".$this->pw_grid_id."').mixitup();";
										}
										$output.="
									}
								});
							";
							}
							
							$output.="jQuery( '.pw_view_type_".$this->pw_grid_id."' ).click(function(event) {
								event.preventDefault(event);
	
								jQuery('#pw_pl_action_type_".$this->pw_grid_id."').val('swap_view_type');
								jQuery('#pw_view_type_".$this->pw_grid_id."').val(jQuery(this).attr('data-viewtype'));
								
								if(jQuery(this).attr('data-viewtype')=='list')
								{
									jQuery('#Grid_".$this->pw_grid_id."').removeClass('pl-gridlayout').addClass('pl-listlayout');
								}else
								{
									jQuery('#Grid_".$this->pw_grid_id."').removeClass('pl-listlayout').addClass('pl-gridlayout');
								}
								
								jQuery(this).siblings('.active').removeClass('active');
								jQuery(this).addClass('active');
								
								jQuery('#Grid_".$this->pw_grid_id."').html('".$loading."');
								var params=jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').serialize();
								jQuery.ajax ({
									type: 'POST',
									url: '".admin_url( 'admin-ajax.php' )."',
									data:  params+'&action=pw_pl_grid_list_swap',
									success: function(response) {
										jQuery('#Grid_".$this->pw_grid_id."').html(response);
										
										jQuery('#Filters_".$this->pw_grid_id." .pl-anim250 li').removeClass('active');
										jQuery('#Filters_".$this->pw_grid_id." .pl-anim250').each(function(i, obj) {
											jQuery(this).children().eq(0).addClass('active');
										});
	
										//jQuery('#Grid_".$this->pw_grid_id."').mixitup('sort','random');				
										jQuery('#Grid_".$this->pw_grid_id."').mixitup('remix');";
										if($this->pw_grid_type=='pl-mixitup-grid' && ($this->pw_grid_order_by=='yes'))
										{
											$output.="jQuery('#Grid_".$this->pw_grid_id."').mixitup('multimix',{
																filter: 'all',
																sortSelector:'.sort-".$order_by."-".$this->pw_grid_id."',
																sort: 'data-".$order_by."-".$this->pw_grid_id."',
																order: '".strtolower($query_order)."',
																});";
										}else
										{
											$output.="jQuery('#Grid_".$this->pw_grid_id."').mixitup();";
										}
										
									$output.="							
										
									}
								});
							});
							
						});	
					</script>";
			}
			
			if($this->pw_grid_type=='pl-masonry-grid')
			{
				$loading='<div class="pl-grid-loading-masonry" style="position: absolute;top: 100%;"><img src="'.PW_PS_PL_URL_GRID.'/assets/images/loader.gif" /></div>';
				$output .="<script type='text/javascript'>
						jQuery(document).ready(function() {
							var container = jQuery('.pl-masonry-grid');
							setTimeout(function(){
								var container = jQuery('.pl-masonry-grid');
								jQuery('.pl-masonry-grid').masonry({});
							},2000);
							
							jQuery(window).resize(function () {
								container.masonry({
								  itemSelector: '.pl-col',
								  isAnimated: true
								})
	
								//alert('hi');
							});
						});	
					</script>";
			}
				
			if($this->pw_grid_page_navigation=='show_page_number' && $all_page_number>1)
			{
				$output.="
				<script type='text/javascript'>
					jQuery(document).ready(function() {
						
						jQuery( '.pl-pagination-link-".$this->pw_grid_id."' ).click(function(event) {
							event.preventDefault(event);
							jQuery('html, body').animate({
								scrollTop: jQuery('#Grid_".$this->pw_grid_id."').offset().top-100
							}, 2000);
							jQuery('#pw_pl_action_type_".$this->pw_grid_id."').val('show_page_number');
							
							var num=jQuery( this ).attr('id');					
							jQuery('#pw_paged_".$this->pw_grid_id."').val(jQuery( this ).attr('id'));
							jQuery('#pw_pl_allpage_".$this->pw_grid_id."').html('Pages '+jQuery( this ).attr('id')+' of ".$all_page_number."');
							
							jQuery(this).siblings('.pl-currentpage').removeClass('pl-currentpage').addClass('inactive');
							jQuery(this).addClass('pl-currentpage');
							jQuery(this).removeClass('inactive');
							
							
							jQuery('#Grid_".$this->pw_grid_id."').html('".$loading."');
							var params=jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').serialize();
							jQuery.ajax ({
								type: 'POST',
								url: '".admin_url( 'admin-ajax.php' )."',
								data:  params+'&action=pw_pl_grid_list_swap',
								success: function(response) {
									jQuery('.pl-grid-loading').remove();
									jQuery('.pl-grid-loading-masonry').remove();";
									
									
									if($this->pw_grid_type=='pl-mixitup-grid' && ($this->pw_grid_filter_by=='yes' || $this->pw_grid_order_by=='yes' || $this->pw_grid_switch_icon=='no'))
									{
										$output.="
										jQuery('#Grid_".$this->pw_grid_id."').html(response);
										jQuery('#Filters_".$this->pw_grid_id." .pl-anim250 li').removeClass('active');
										jQuery('#Filters_".$this->pw_grid_id." .pl-anim250').each(function(i, obj) {
											jQuery(this).children().eq(0).addClass('active');
										});
										
										jQuery('#Grid_".$this->pw_grid_id."').mixitup('remix');";
										
										if($this->pw_grid_type=='pl-mixitup-grid' && ($this->pw_grid_order_by=='yes'))
										{
											$output.="jQuery('#Grid_".$this->pw_grid_id."').mixitup('multimix',{
																filter: 'all',
																sortSelector:'.sort-".$order_by."-".$this->pw_grid_id."',
																sort: 'data-".$order_by."-".$this->pw_grid_id."',
																order: '".strtolower($query_order)."',
																});";
										}else
										{
											$output.="jQuery('#Grid_".$this->pw_grid_id."').mixitup();";
										}
									}else if($this->pw_grid_type=='pl-masonry-grid')
									{
										$output.="
											jQuery('.pl-grid-loading-masonry').remove();
											var container = jQuery('.pl-masonry-grid');
											container.masonry('destroy');
											jQuery('#Grid_".$this->pw_grid_id."').html(response).fadeIn(1500);
											container.masonry();";
									}else if($this->pw_grid_type=='pl-standard-grid')
									{
										$output.="jQuery('#Grid_".$this->pw_grid_id."').html(response);";
									}
									
									$output.="
								}
							});
						});
						
					});	
				</script>";
			}else if($this->pw_grid_page_navigation=='show_more_btn' && $all_page_number>1)
			{
				$output.="
				<script type='text/javascript'>
					jQuery(document).ready(function() {
						jQuery( '.pw_pl_load_more_".$this->pw_grid_id."' ).click(function(event) {
							event.preventDefault(event);
							jQuery('#pw_pl_action_type_".$this->pw_grid_id."').val('show_more_btn');
							var div_position=jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').position().top;
							jQuery('#pw_paged_".$this->pw_grid_id."').val(Number(jQuery('#pw_paged_".$this->pw_grid_id."').val())+1);
							
							jQuery('".$loading."').appendTo('#Grid_".$this->pw_grid_id."');
							var params=jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').serialize();
							jQuery.ajax ({
								type: 'POST',
								url: '".admin_url( 'admin-ajax.php' )."',
								data:  params+'&action=pw_pl_grid_list_swap',
								success: function(response) {
									
									jQuery('.pl-grid-loading').remove();
									jQuery('.pl-grid-loading-masonry').remove();";
									
									if($this->pw_grid_type=='pl-mixitup-grid' && ($this->pw_grid_filter_by=='yes' || $this->pw_grid_order_by=='yes' || $this->pw_grid_switch_icon=='no'))
									{
										$output.="
										jQuery(response).appendTo('#Grid_".$this->pw_grid_id."');
										jQuery('#Filters_".$this->pw_grid_id." .pl-anim250 li').removeClass('active');
										jQuery('#Filters_".$this->pw_grid_id." .pl-anim250').each(function(i, obj) {
											jQuery(this).children().eq(0).addClass('active');
										});
										
										
										jQuery('#Grid_".$this->pw_grid_id."').mixitup('remix');";
										
										if($this->pw_grid_type=='pl-mixitup-grid' && ($this->pw_grid_order_by=='yes'))
										{
											$output.="jQuery('#Grid_".$this->pw_grid_id."').mixitup('multimix',{
																filter: 'all',
																sortSelector:'.sort-".$order_by."-".$this->pw_grid_id."',
																sort: 'data-".$order_by."-".$this->pw_grid_id."',
																order: '".strtolower($query_order)."',
																});";
										}else
										{
											$output.="jQuery('#Grid_".$this->pw_grid_id."').mixitup();";
										}
										
									}else if($this->pw_grid_type=='pl-masonry-grid')
									{
										$output.="
											jQuery('.pl-grid-loading-masonry').remove();
											var container = jQuery('.pl-masonry-grid');
											
											jQuery(response).hide().appendTo('#Grid_".$this->pw_grid_id."').fadeIn(1500);
											setTimeout(function(){
												container.masonry('destroy');
												container.masonry();
												jQuery('html, body').animate({
													scrollTop: div_position-200
												}, 1000);
											},1000);
											
											";
									}else if($this->pw_grid_type=='pl-standard-grid')
									{
										$output.="jQuery(response).appendTo('#Grid_".$this->pw_grid_id."');";
									}
									
									$output.="
								}
							});
							
							if(jQuery('#pw_paged_".$this->pw_grid_id."').val()==jQuery('#pw_total_paged_".$this->pw_grid_id."').val())
							{
								jQuery(this).remove();
							}
						});	
						
					});	
				</script>";
			}else if($this->pw_grid_page_navigation=='infinite_scroll' && $all_page_number>1)
			{
				$output.="
				<script type='text/javascript'>
					jQuery(document).ready(function() {
						
						function isOnScreen(thiss){
    
							var win = jQuery(window);
							
							var viewport = {
								top : win.scrollTop(),
								left : win.scrollLeft()
							};
							viewport.right = viewport.left + win.width();
							viewport.bottom = viewport.top + win.height();
							
							var bounds = thiss.offset();
							bounds.right = bounds.left + thiss.outerWidth();
							bounds.bottom = bounds.top + thiss.outerHeight();
							
							return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
							
						};
						
						var div_position=jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').position().top;
						
						var scrollDifference = jQuery(window).height() + jQuery(window).scrollTop();

						var docViewTop = jQuery(window).scrollTop();
						var docViewBottom = docViewTop + jQuery(window).height();
					
						var elemTop = jQuery('#Grid_".$this->pw_grid_id."').offset().top;
						var elemBottom = elemTop + jQuery('#Grid".$this->pw_grid_id."').height();
						
						setTimeout(function(){
							if(isOnScreen(jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."')) && !jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').hasClass('visit'))
							{
								jQuery('#pw_pl_action_type_".$this->pw_grid_id."').val('infinite_scroll');
								
								jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').addClass('visit');
								jQuery('#pw_paged_".$this->pw_grid_id."').val(Number(jQuery('#pw_paged_".$this->pw_grid_id."').val())+1);
								
								jQuery('".$loading."').appendTo('#Grid_".$this->pw_grid_id."');
								var params=jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').serialize();
								jQuery.ajax ({
									type: 'POST',
									url: '".admin_url( 'admin-ajax.php' )."',
									data:  params+'&action=pw_pl_grid_list_swap',
									success: function(response) {
										jQuery('.pl-grid-loading').remove();
										jQuery('.pl-grid-loading-masonry').remove();";
										
										if($this->pw_grid_type=='pl-mixitup-grid' && ($this->pw_grid_filter_by=='yes' || $this->pw_grid_order_by=='yes' || $this->pw_grid_switch_icon=='no'))
										{
											$output.="
											jQuery(response).appendTo('#Grid_".$this->pw_grid_id."');
											jQuery('#Filters_".$this->pw_grid_id." .pl-anim250 li').removeClass('active');
											jQuery('#Filters_".$this->pw_grid_id." .pl-anim250').each(function(i, obj) {
												jQuery(this).children().eq(0).addClass('active');
											});
											
											jQuery('#Grid_".$this->pw_grid_id."').mixitup('remix');";
											if($this->pw_grid_type=='pl-mixitup-grid' && ($this->pw_grid_order_by=='yes'))
											{
												$output.="jQuery('#Grid_".$this->pw_grid_id."').mixitup('multimix',{
																	filter: 'all',
																	sortSelector:'.sort-".$order_by."-".$this->pw_grid_id."',
																	sort: 'data-".$order_by."-".$this->pw_grid_id."',
																	order: '".strtolower($query_order)."',
																	});";
											}else
											{
												$output.="jQuery('#Grid_".$this->pw_grid_id."').mixitup();";
											}
										}else if($this->pw_grid_type=='pl-masonry-grid')
										{
											$output.="
												jQuery('.pl-grid-loading-masonry').remove();
												var container = jQuery('.pl-masonry-grid');
												
												jQuery(response).hide().appendTo('#Grid_".$this->pw_grid_id."').fadeIn(1500);
												setTimeout(function(){
													container.masonry('destroy');
													container.masonry();
													jQuery('html, body').animate({
														scrollTop: div_position-200
													}, 1000);
												},1000);
												
												";
										}else if($this->pw_grid_type=='pl-standard-grid')
										{
											$output.="jQuery(response).appendTo('#Grid_".$this->pw_grid_id."');";
										}
	
										$output.="
										
										if(jQuery('#pw_paged_".$this->pw_grid_id."').val()<jQuery('#pw_total_paged_".$this->pw_grid_id."').val())
										{
											jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').removeClass('visit');
											div_position=jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').position().top
										}
									}
								});
							
							}
						},2000);
						
					
						jQuery(document).scroll(function(event) {
							var div_position=jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').position().top;
							var scrollDifference = jQuery(window).height() + jQuery(window).scrollTop();

							/*if(jQuery(window).scrollTop()>=div_position && !jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').hasClass('visit'))*/
							/*if(scrollDifference>=div_position && !jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').hasClass('visit'))*/
							if(isOnScreen(jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."')) && !jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').hasClass('visit'))
							{
								
								jQuery('#pw_pl_action_type_".$this->pw_grid_id."').val('infinite_scroll');
								
								jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').addClass('visit');
								jQuery('#pw_paged_".$this->pw_grid_id."').val(Number(jQuery('#pw_paged_".$this->pw_grid_id."').val())+1);
								
								jQuery('".$loading."').appendTo('#Grid_".$this->pw_grid_id."');
								var params=jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').serialize();
								jQuery.ajax ({
									type: 'POST',
									url: '".admin_url( 'admin-ajax.php' )."',
									data:  params+'&action=pw_pl_grid_list_swap',
									success: function(response) {
										jQuery('.pl-grid-loading').remove();
										jQuery('.pl-grid-loading-masonry').remove();";
										
										if($this->pw_grid_type=='pl-mixitup-grid' && ($this->pw_grid_filter_by=='yes' || $this->pw_grid_order_by=='yes' || $this->pw_grid_switch_icon=='no'))
										{
											$output.="
											jQuery(response).appendTo('#Grid_".$this->pw_grid_id."');
											jQuery('#Filters_".$this->pw_grid_id." .pl-anim250 li').removeClass('active');
											jQuery('#Filters_".$this->pw_grid_id." .pl-anim250').each(function(i, obj) {
												jQuery(this).children().eq(0).addClass('active');
											});
											
											jQuery('#Grid_".$this->pw_grid_id."').mixitup('remix');";
											if($this->pw_grid_type=='pl-mixitup-grid' && ($this->pw_grid_order_by=='yes'))
											{
												$output.="jQuery('#Grid_".$this->pw_grid_id."').mixitup('multimix',{
																	filter: 'all',
																	sortSelector:'.sort-".$order_by."-".$this->pw_grid_id."',
																	sort: 'data-".$order_by."-".$this->pw_grid_id."',
																	order: '".strtolower($query_order)."',
																	});";
											}else
											{
												$output.="jQuery('#Grid_".$this->pw_grid_id."').mixitup();";
											}
										}else if($this->pw_grid_type=='pl-masonry-grid')
										{
											$output.="
												jQuery('.pl-grid-loading-masonry').remove();
												var container = jQuery('.pl-masonry-grid');
											
												jQuery(response).hide().appendTo('#Grid_".$this->pw_grid_id."').fadeIn(1500);
												setTimeout(function(){
													container.masonry('destroy');
													container.masonry();
													jQuery('html, body').animate({
														scrollTop: div_position-200
													}, 1000);
												},1000);
												
												";
										}else if($this->pw_grid_type=='pl-standard-grid')
										{
											$output.="jQuery(response).appendTo('#Grid_".$this->pw_grid_id."');";
										}

										$output.="
										
										if(jQuery('#pw_paged_".$this->pw_grid_id."').val()<jQuery('#pw_total_paged_".$this->pw_grid_id."').val())
										{
											jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').removeClass('visit');
											div_position=jQuery('#pw_pl_form_load_more_".$this->pw_grid_id."').position().top
										}
									}
								});
							
							}
						});
					});	
				</script>";
			}

		}
		
		function pl_grid_custom_color() {
			
			wp_enqueue_style('pw-pl-custom-style', PW_PS_PL_URL_GRID . '/css/custom.css', array() , null); 
			
			$box_border_top = $this->pw_border_top_size.'px '. $this->pw_border_top_type . ' ' . $this->pw_border_top_color;
			$box_border_right = $this->pw_border_right_size.'px '. $this->pw_border_right_type . ' ' . $this->pw_border_right_color;
			$box_border_bottom = $this->pw_border_bottom_size.'px '. $this->pw_border_bottom_type . ' ' . $this->pw_border_bottom_color;
			$box_border_left = $this->pw_border_left_size.'px '. $this->pw_border_left_type . ' ' . $this->pw_border_left_color;
			
			$box_back_color = $this->pw_back_color;
			$link_color = $this->pw_link_color;
			$link_hover_color = $this->pw_link_hover_color;
			$meta_color = $this->pw_meta_color;
			$excerpt_color = $this->pw_excerpt_color;
			
			$custom_css = '
				.pl_grid_id_'.$this->pw_grid_id.' .pl-col .pl-detailcnt , .pl_grid_id_'.$this->pw_grid_id.' .pl-col .pl-itemcnt { 
					
					border-right: '. $box_border_right .';
					
					border-left: '. $box_border_left .';
					
					background : '.$box_back_color.';
					
				}
					.pl_grid_id_'.$this->pw_grid_id.' .pl-col > div:first-child{ border-top: '. $box_border_top .'; }
					.pl_grid_id_'.$this->pw_grid_id.' .pl-col > div:last-child{ border-bottom: '. $box_border_bottom .'; }
				
				
				
				
				
				.pl_grid_id_'.$this->pw_grid_id.' .pl-col .pl-detailcnt .pl-title a , .pl_grid_id_'.$this->pw_grid_id.' .pl-col .pl-detailcnt .pl-permalink-t2 ,.pl_grid_id_'.$this->pw_grid_id.' .pl-mask h4 a   {
					color : '.$link_color.';
				} 
					.pl_grid_id_'.$this->pw_grid_id.' .pl-col .pl-detailcnt .pl-title a:hover ,  .pl_grid_id_'.$this->pw_grid_id.' .pl-col .pl-detailcnt .pl-permalink-t2:hover , .pl_grid_id_'.$this->pw_grid_id.' .pl-col .pl-permalink:hover , .pl_grid_id_'.$this->pw_grid_id.' .pl-col .pl-postcomment a:hover  ,.pl_grid_id_'.$this->pw_grid_id.' .pl-mask h4 a:hover , .loadmore_id_'.$this->pw_grid_id.' a.load-more-link:hover {
						color : '.$link_hover_color.'!important;
					} 
						
				.pl_grid_id_'.$this->pw_grid_id.' .pl-col .pl-title .pl-date , .pl_grid_id_'.$this->pw_grid_id.' .pl-col .pl-permalink {
					background : '.$link_hover_color.';
				} 
				.pl_grid_id_'.$this->pw_grid_id.' .pl-col .pl-postmeta , .pl_grid_id_'.$this->pw_grid_id.' .pl-col .pl-postmeta a ,  .pl_grid_id_'.$this->pw_grid_id.' .pl-col .pl-postcomment a{
					color : '.$meta_color.';
				}
				.pl_grid_id_'.$this->pw_grid_id.' .pl-col .pl-postmeta a:hover , .loadmore_id_'.$this->pw_grid_id.' a.load-more-link   { 
					background:'.$link_hover_color.'; 
					color:#fff;
				}
				.pl_grid_id_'.$this->pw_grid_id.' .pl-col .pl-permalink { 
					border:1px solid '.$link_hover_color.' ;
				}
				.loadmore_id_'.$this->pw_grid_id.' a.load-more-link { 
					border-color:'.$link_hover_color.' ;
				}
				 
				.pl_grid_id_'.$this->pw_grid_id.' .pl-col .pl-text , .pl_grid_id_'.$this->pw_grid_id.' .pl-col .pl-text span , .pl_grid_id_'.$this->pw_grid_id.' .pl-mask p , .pl_grid_id_'.$this->pw_grid_id.' .pl-mask p span{
					color : '.$excerpt_color.';
				}
				
				
				
				.pl_pging_id_'.$this->pw_grid_id.'.pl-paging-style1 a  , .pl_pging_id_'.$this->pw_grid_id.'.pl-paging-style1 span  , .pl_pging_id_'.$this->pw_grid_id.'.pl-paging-style2 span {
						color : '.$link_hover_color.';
					} 
					.pl_pging_id_'.$this->pw_grid_id.'.pl-paging-style1 span , .pl_pging_id_'.$this->pw_grid_id.'.pl-paging-style1 .pl-currentpage , .pl_pging_id_'.$this->pw_grid_id.'.pl-paging-style2 span , .pl_pging_id_'.$this->pw_grid_id.'.pl-paging-style2 .pl-currentpage{ border-color:'.$link_hover_color.' }
					
						.pl_pging_id_'.$this->pw_grid_id.'.pl-paging-style1 .pl-currentpage , .pl_pging_id_'.$this->pw_grid_id.'.pl-paging-style1 .pl-pagination-link:hover , .pl_pging_id_'.$this->pw_grid_id.'.pl-paging-style2 .pl-currentpage , .pl_pging_id_'.$this->pw_grid_id.'.pl-paging-style2 .pl-pagination-link:hover{ background:'.$link_hover_color.';color:#fff;}
						
				';
			
			wp_add_inline_style( 'pw-pl-custom-style', $custom_css );
			
		}
		
		function pl_list_custom_color() {
			
			wp_enqueue_style('pw-pl-custom-style', PW_PS_PL_URL_GRID . '/css/custom.css', array() , null); 
			
			$box_border_top = $this->pw_border_top_size.'px '. $this->pw_border_top_type . ' ' . $this->pw_border_top_color;
			$box_border_right = $this->pw_border_right_size.'px '. $this->pw_border_right_type . ' ' . $this->pw_border_right_color;
			$box_border_bottom = $this->pw_border_bottom_size.'px '. $this->pw_border_bottom_type . ' ' . $this->pw_border_bottom_color;
			$box_border_left = $this->pw_border_left_size.'px '. $this->pw_border_left_type . ' ' . $this->pw_border_left_color;
			
			$box_back_color = $this->pw_back_color;
			$link_color = $this->pw_link_color;
			$link_hover_color = $this->pw_link_hover_color;
			$meta_color = $this->pw_meta_color;
			$excerpt_color = $this->pw_excerpt_color;
			
			$custom_css = '
				.pl_list_id_'.$this->pw_list_id.'  { 
					border-top: '. $box_border_top .';
					border-right: '. $box_border_right .';
					border-bottom: '. $box_border_bottom .';
					border-left: '. $box_border_left .';
					
					background : '.$box_back_color.';
					
				}
				
				.pl_list_id_'.$this->pw_list_id.' .pl-detailcnt .pl-title a , .pl_list_id_'.$this->pw_list_id.' .pl-detailcnt .pl-permalink-t2 {
					color : '.$link_color.';
				} 
					.pl_list_id_'.$this->pw_list_id.' .pl-detailcnt .pl-title a:hover ,  .pl_list_id_'.$this->pw_list_id.' .pl-detailcnt .pl-permalink-t2:hover , .pl_list_id_'.$this->pw_list_id.'  .pl-permalink:hover , .pl_list_id_'.$this->pw_list_id.'  .pl-postcomment a:hover  {
						color : '.$link_hover_color.'!important;
					} 
				.pl_list_id_'.$this->pw_list_id.'  .pl-title .pl-date , .pl_list_id_'.$this->pw_list_id.'  .pl-permalink  {
					background : '.$link_hover_color.';
				} 
				.pl_list_id_'.$this->pw_list_id.'  .pl-postmeta , .pl_list_id_'.$this->pw_list_id.'  .pl-postmeta a ,  .pl_list_id_'.$this->pw_list_id.'  .pl-postcomment a{
					color : '.$meta_color.';
				}
				.pl_list_id_'.$this->pw_list_id.'  .pl-postmeta a:hover   { 
					background:'.$link_hover_color.'; 
					color:#fff;
				}
				.pl_list_id_'.$this->pw_list_id.'  .pl-permalink{ 
					border:1px solid '.$link_hover_color.' ;
				}
				 
				.pl_list_id_'.$this->pw_list_id.' .pl-text{
					color : '.$excerpt_color.';
				}
				';
			
			wp_add_inline_style( 'pw-pl-custom-style', $custom_css );
			
		}
		
		function pagination($pages = '', $range = 4,$class='pl-pagination-link-1')
		{  
			 $showitems = ($range * 2)+1;  
		
			 global $paged;
			 $output='';
			 if(empty($paged)) $paged = 1;
		
			 if($pages == '')
			 {
				 global $wp_query;
				 $pages = $wp_query->max_num_pages;
				 if(!$pages)
				 {
					 $pages = 1;
				 }
			 }   
		
			 if(1 != $pages)
			 {
				 $output.= "<div class=\"pl-paginationcnt ".$this->pw_grid_page_number_style." pl_pging_id_".$this->pw_grid_id." \"><span class='pl-allpage' id='pw_pl_allpage_".$this->pw_grid_id."'>Page ".$paged." of ".$pages."</span>";
				 if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
				 if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
		
				 for ($i=1; $i <= $pages; $i++)
				 {
					 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
					 {
						 //$output.= ($paged == $i)? "<span class=\"pl-currentpage\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive pl-pagination-link \" id='".$i."'>".$i."</a>";
						  $output.= ($paged == $i)? "<span class=\"pl-currentpage pl-pagination-link ".$class."\" id='".$i."'>".$i."</span>":"<span class=\"inactive pl-pagination-link ".$class." \" id='".$i."'>".$i."</span>";
					 }
				 }
		
				 if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
				 if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
				 $output.= "</div>\n";
			 }
			 return $output;
		}
		
				
	}	
}

?>
