<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (!class_exists('VC_PW_list')) {
	class VC_PW_list extends WPBakeryShortCode_VC_Posts_Grid {
		public  $pw_title,
				$pw_query,
				$pw_list_type,
				
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

				$pw_grid_page_navigation,
				$pw_grid_page_number_style,
				$pw_teasr_layout_img,
				$pw_image_thumb_size,
				$pw_excerpt_length,
				$pw_image_effect,
				$pw_icon_effect,
				$pw_date_format,
				$pw_box_id;
		function __construct($pw_title,
				$pw_query,
				$pw_list_type,
				
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

				$pw_grid_page_navigation,
				$pw_grid_page_number_style,
				$pw_teasr_layout_img,
				$pw_image_thumb_size,
				$pw_excerpt_length,
				$pw_image_effect,
				$pw_icon_effect,
				$pw_date_format) {
			
			$this->pw_title=$pw_title;
			$this->pw_query=$pw_query;
			$this->pw_link_target=$pw_link_target;
			$this->pw_list_type=$pw_list_type;
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

			$this->pw_grid_page_navigation=$pw_grid_page_navigation;
			$this->pw_grid_page_number_style=$pw_grid_page_number_style;
			$this->pw_teasr_layout_img=$pw_teasr_layout_img;
			$this->pw_image_thumb_size=$pw_image_thumb_size;
			$this->pw_excerpt_length=$pw_excerpt_length;
			$this->pw_image_effect=$pw_image_effect;
			$this->pw_icon_effect=$pw_icon_effect;
			$this->pw_date_format=$pw_date_format;
			
			$this->vars=get_defined_vars();
			
			$this->pw_front_end();
			
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
			$img_id=array();
			$output = '<div style="display:none"><img src="'.PW_PS_PL_URL_GRID.'/assets/images/loader.gif" /></div>';
			$img_counter = 0;
			$post_counter = 0;
			$this->pw_list_id = $rand_id = rand(6000,7000);
			$output .= '<h2 class="pl-itemtitle">'.$this->pw_title.'</h2>';
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			
			$output .= '<div id="Grid_'.$this->pw_list_id.'" >';
			
			while ( $my_query->have_posts() ) {
				$wp_comment_count = 0;
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
					
				
				if ($this->pw_list_type=='pl-list-t1'){ 
                $output .= 
				'<div class="pl-blogcnt pl-listlayout '. $this->pw_list_type .' pl_list_id_'.$this->pw_list_id.'">
					<div class="pl-col-md-6 pl-col-xs-12">
						<div class="pl-itemcnt">
							<div class="pl-thumbcnt '. $this->pw_image_effect .'">
                                '.$current_img_large.'
								<div class="pl-overally fadein-eff">
									<a href="'. $current_img_full[0] .'" class="pl-zoom-icon pl-not-alone '. $this->pw_icon_effect.' example-image" data-lightbox="image-set"></a>
									<a href="'. $post->link .'" class="pl-link-icon pl-not-alone '. $this->pw_icon_effect .'" target="'. $this->pw_link_target  .'" ></a>              
								</div>
							</div>
						</div>		
					</div>
					<div class="pl-col-md-6 pl-col-xs-12">
							<div class="pl-detailcnt">
								<h4 class="pl-title left-txt"><span class="pl-date">'. get_the_date($this->pw_date_format).'</span><a href="'. $post->link .'">'. get_the_title() .'</a></h4>';
								$output .= pw_get_post_meta($post->id , $post_taxonomies);
								$output .='<p class="pl-text left-txt">'. $VCExtendAddonClass_GRID->excerpt(get_the_excerpt(),$this->pw_excerpt_length).' </p>
								<div class="pl-postcomment"><a href="'. get_comments_link() .'"><i class="fa fa-comments"></i>'.get_comments_number( '0', '1', '% responses' ) .'</a></div>
								<a class="'.$this->pw_readmore_type.'" href="'. $post->link .'" target="'. $this->pw_link_target .'" >'.__('Read More',__PW_POST_LAYOUT_TEXTDOMAN__ ).'<i class="fa fa-angle-right"></i></a>
							</div>
					</div>
				</div>';
                }//end if 
                else if ($this->pw_list_type=='pl-list-t2'){//print_r($this->pw_teasr_layout_img); 
				 	$output .= '<div class="pl-blogcnt  pl-listlayout '. $this->pw_list_type .' pl_list_id_'.$this->pw_list_id.'">';
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
										$output .='</div>';
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
				 
                $output .= '</div>';
			 }//end else 
			}
			wp_reset_query();
			$output .= '</div>';
			
			/////////////CONTROL FIELDS FORM//////////////
			$all_page_number=$my_query->max_num_pages;
			$view_type='grid';
			
			$fields='';
			$arr=$this->vars;
			
			foreach($arr as $key => $value)
			{
				$fields.='<input type="hidden" name="'.$key.'" value="'.$value.'" id="'.$key.'_'.$this->pw_list_id.'"/>';
			}
			
			$output.='
					<form id="pw_pl_form_load_more_'.$this->pw_list_id.'">
					
						'.$fields.'
						<input type="hidden" name="_wpnonce " value="'.rand(0,100000).'"/>
						<input type="hidden" name="query" value="'.$this->pw_query.'"/>
						<input type="hidden" name="paged" value="'.$paged.'" id="pw_paged_'.$this->pw_list_id.'"/>
						<input type="hidden" name="view_type" value="'.$view_type.'" id="pw_view_type_'.$this->pw_list_id.'"/>
						<input type="hidden" name="total_paged" value="'.$all_page_number.'" id="pw_total_paged_'.$this->pw_list_id.'"/>
						<input type="hidden" name="pw_action_type" value="" id="pw_pl_action_type_'.$this->pw_list_id.'"/>
						<input type="hidden" name="pw_mixitup_grid_id" value="'.$this->pw_list_id.'" id="pw_list_id_'.$this->pw_list_id.'"/>
					</form>';
			
			if($this->pw_grid_page_navigation=='show_more_btn' && $all_page_number>1)
			{
				$output.='		
					<div class="clear"></div><div rel="3" class="pl-loadmorecnt loadmore_id_'.$this->pw_list_id.'">
						<a href="page/'.$paged.'/" class="pw_pl_load_more_'.$this->pw_list_id.' load-more-link">'.__('SHOW MORE','gt_wpml').'</a>
					</div>';
					
			}else if($this->pw_grid_page_navigation=='show_page_number' && $all_page_number>1)
			{
			
				$output.=$this->pagination($all_page_number,4,'pl-pagination-link-'.$this->pw_list_id);
			}
			///////////////////////////
			
			//////////////CUSTOM JS/////////////////////
			$loading='<div class="pl-grid-loading"><img src="'.PW_PS_PL_URL_GRID.'/assets/images/loader.gif" /></div>';
			
			if($this->pw_grid_page_navigation=='show_page_number' && $all_page_number>1)
			{
				$output.="
				<script type='text/javascript'>
					jQuery(document).ready(function() {
						
						jQuery( '.pl-pagination-link-".$this->pw_list_id."' ).click(function(event) {
							event.preventDefault(event);
							jQuery('html, body').animate({
								scrollTop: jQuery('#Grid_".$this->pw_list_id."').offset().top-100
							}, 2000);
							
							jQuery('#pw_pl_action_type_".$this->pw_list_id."').val('show_page_number');
							
							var num=jQuery( this ).attr('id');					
							jQuery('#pw_paged_".$this->pw_list_id."').val(jQuery( this ).attr('id'));
							jQuery('#pw_pl_allpage_".$this->pw_list_id."').html('Pages '+jQuery( this ).attr('id')+' of ".$all_page_number."');
							
							jQuery(this).siblings('.pl-currentpage').removeClass('pl-currentpage').addClass('inactive');
							jQuery(this).addClass('pl-currentpage');
							jQuery(this).removeClass('inactive');
							
							
							jQuery('#Grid_".$this->pw_list_id."').html('".$loading."');
							var params=jQuery('#pw_pl_form_load_more_".$this->pw_list_id."').serialize();
							jQuery.ajax ({
								type: 'POST',
								url: '".admin_url( 'admin-ajax.php' )."',
								data:  params+'&action=pw_pl_list_load_more',
								success: function(response) {
									jQuery('.pl-grid-loading').remove();
									jQuery('#Grid_".$this->pw_list_id."').html(response);
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
						jQuery( '.pw_pl_load_more_".$this->pw_list_id."' ).click(function(event) {
							event.preventDefault(event);
							jQuery('#pw_pl_action_type_".$this->pw_list_id."').val('show_more_btn');
							
							jQuery('#pw_paged_".$this->pw_list_id."').val(Number(jQuery('#pw_paged_".$this->pw_list_id."').val())+1);
							
							jQuery('".$loading."').appendTo('#Grid_".$this->pw_list_id."');
							var params=jQuery('#pw_pl_form_load_more_".$this->pw_list_id."').serialize();
							jQuery.ajax ({
								type: 'POST',
								url: '".admin_url( 'admin-ajax.php' )."',
								data:  params+'&action=pw_pl_list_load_more',
								success: function(response) {
									jQuery('.pl-grid-loading').remove();
									jQuery(response).appendTo('#Grid_".$this->pw_list_id."');
								}
							});
							
							if(jQuery('#pw_paged_".$this->pw_list_id."').val()==jQuery('#pw_total_paged_".$this->pw_list_id."').val())
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
						
						var div_position=jQuery('#pw_pl_form_load_more_".$this->pw_list_id."').position().top;
						jQuery(window).scroll(function(event) {
							if(jQuery(window).scrollTop().valueOf()+100>=div_position && !jQuery('#pw_pl_form_load_more_".$this->pw_list_id."').hasClass('visit'))
							{
								jQuery('#pw_pl_action_type_".$this->pw_list_id."').val('infinite_scroll');
								
								jQuery('#pw_pl_form_load_more_".$this->pw_list_id."').addClass('visit');
								jQuery('#pw_paged_".$this->pw_list_id."').val(Number(jQuery('#pw_paged_".$this->pw_list_id."').val())+1);
								
								jQuery('".$loading."').appendTo('#Grid_".$this->pw_list_id."');
								var params=jQuery('#pw_pl_form_load_more_".$this->pw_list_id."').serialize();
								jQuery.ajax ({
									type: 'POST',
									url: '".admin_url( 'admin-ajax.php' )."',
									data:  params+'&action=pw_pl_list_load_more',
									success: function(response) {
										jQuery('.pl-grid-loading').remove();
										jQuery(response).appendTo('#Grid_".$this->pw_list_id."');
										if(jQuery('#pw_paged_".$this->pw_list_id."').val()<jQuery('#pw_total_paged_".$this->pw_list_id."').val())
										{
											jQuery('#pw_pl_form_load_more_".$this->pw_list_id."').removeClass('visit');
											div_position=jQuery('#pw_pl_form_load_more_".$this->pw_list_id."').position().top
										}
									}
								});
							}
						});
					});	
				</script>";
			}
			///////////END CUSRTOM JS//////////////
			
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
				
				.pl_pging_id_'.$this->pw_list_id.'.pl-paging-style1 a  , .pl_pging_id_'.$this->pw_list_id.'.pl-paging-style1 span  , .pl_pging_id_'.$this->pw_list_id.'.pl-paging-style2 span {
						color : '.$link_hover_color.';
					} 
					.pl_pging_id_'.$this->pw_list_id.'.pl-paging-style1 span , .pl_pging_id_'.$this->pw_list_id.'.pl-paging-style1 .pl-currentpage , .pl_pging_id_'.$this->pw_list_id.'.pl-paging-style2 span , .pl_pging_id_'.$this->pw_list_id.'.pl-paging-style2 .pl-currentpage{ border-color:'.$link_hover_color.' }
					
						.pl_pging_id_'.$this->pw_list_id.'.pl-paging-style1 .pl-currentpage , .pl_pging_id_'.$this->pw_list_id.'.pl-paging-style1 .pl-pagination-link:hover , .pl_pging_id_'.$this->pw_list_id.'.pl-paging-style2 .pl-currentpage , .pl_pging_id_'.$this->pw_list_id.'.pl-paging-style2 .pl-pagination-link:hover{ background:'.$link_hover_color.';color:#fff;}
						
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
				 $output.= "<div class=\"pl-paginationcnt ".$this->pw_grid_page_number_style." pl_pging_id_".$this->pw_list_id." \"><span class='pl-allpage' id='pw_pl_allpage_".$this->pw_list_id."'>Page ".$paged." of ".$pages."</span>";
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
