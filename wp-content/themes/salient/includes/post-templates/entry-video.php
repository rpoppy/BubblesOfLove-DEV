<?php 
$options = get_option('salient');
global $post;

$masonry_size_pm = get_post_meta($post->ID, '_post_item_masonry_sizing', true); 
$masonry_item_sizing = (!empty($masonry_size_pm)) ? $masonry_size_pm : 'regular'; 
$using_masonry = null;
$masonry_type = (!empty($options['blog_masonry_type'])) ? $options['blog_masonry_type'] : 'classic'; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class($masonry_item_sizing.' video'); ?>>
	
	<div class="post-content">
		
		<?php if( !is_single() ) { ?>
				
			<div class="post-meta">
				
				<?php 
				$blog_type = $options['blog_type']; 
				global $layout;
				$use_excerpt = (!empty($options['blog_auto_excerpt']) && $options['blog_auto_excerpt'] == '1') ? 'true' : 'false'; 
				?>
				
				<div class="date">
					<?php 
					if(
					$blog_type == 'masonry-blog-sidebar' && substr( $layout, 0, 3 ) != 'std' || 
					$blog_type == 'masonry-blog-fullwidth' && substr( $layout, 0, 3 ) != 'std' || 
					$blog_type == 'masonry-blog-full-screen-width' && substr( $layout, 0, 3 ) != 'std' || 
					$layout == 'masonry-blog-sidebar' || $layout == 'masonry-blog-fullwidth' || $layout == 'masonry-blog-full-screen-width') {
						$using_masonry = true;
						echo get_the_date();
					}
					else { ?>
					
						<span class="month"><?php the_time('M'); ?></span>
						<span class="day"><?php the_time('d'); ?></span>
						<?php $options = get_option('salient'); 
						if(!empty($options['display_full_date']) && $options['display_full_date'] == 1) {
							echo '<span class="year">'. get_the_time('Y') .'</span>';
						}
					} ?>
				</div><!--/date-->
				
				<?php if($using_masonry == true && $masonry_type == 'meta_overlaid') { } else { ?> 
					<div class="nectar-love-wrap">
						<?php if( function_exists('nectar_love') ) nectar_love(); ?>
					</div><!--/nectar-love-wrap-->	
				<?php } ?>
							
			</div><!--/post-meta-->
			
		<?php } ?>
		
		<div class="content-inner">
				
			<?php  

				if($using_masonry == true && $masonry_type == 'meta_overlaid') {
					 if ( has_post_thumbnail() ) {
						 $img_size = ($blog_type == 'masonry-blog-sidebar' && substr( $layout, 0, 3 ) != 'std' || $blog_type == 'masonry-blog-fullwidth' && substr( $layout, 0, 3 ) != 'std' || $blog_type == 'masonry-blog-full-screen-width' && substr( $layout, 0, 3 ) != 'std' || $layout == 'masonry-blog-sidebar' || $layout == 'masonry-blog-fullwidth' || $layout == 'masonry-blog-full-screen-width') ? 'large' : 'full';
						 $img_size  = (!empty($masonry_item_sizing)) ? $masonry_item_sizing : 'portfolio-thumb';
						 if( !is_single() ) {  echo'<a href="' . get_permalink() . '"><span class="post-featured-img">'.get_the_post_thumbnail($post->ID, $img_size, array('title' => '')) .'</span></a>'; }
					}  else {

						//no image added
						$img_size = (!empty($masonry_item_sizing)) ? $masonry_item_sizing : 'portfolio-thumb';
						switch($img_size) {
							case 'large_featured':
								$no_image_size = 'no-blog-item-large-featured.jpg';
								break;
							case 'wide_tall':
								$no_image_size = 'no-portfolio-item-tiny.jpg';
								break;
							default:
								$no_image_size = 'no-portfolio-item-tiny.jpg';
								break;
						}
						 echo '<a href="' . get_permalink() . '"><span class="post-featured-img"><img src="'.get_template_directory_uri().'/img/'.$no_image_size.'" alt="no image added yet." /></span></a>';
				
					}
				} else {

					  $video_embed = get_post_meta($post->ID, '_nectar_video_embed', true);
					  $video_m4v = get_post_meta($post->ID, '_nectar_video_m4v', true);
					  $video_ogv = get_post_meta($post->ID, '_nectar_video_ogv', true); 
					  $video_poster = get_post_meta($post->ID, '_nectar_video_poster', true); 
					  
					  if( !empty($video_embed) || !empty($video_m4v) ){

			             $wp_version = floatval(get_bloginfo('version'));
									
						//video embed
						if( !empty( $video_embed ) ) {
							
				             echo '<div class="video">' . do_shortcode($video_embed) . '</div>';
							
				        } 
				        //self hosted video pre 3-6
				        else if( !empty($video_m4v) && $wp_version < "3.6") {
				        	
				        	 echo '<div class="video">'; 
				            	 nectar_video($post->ID); 
							 echo '</div>'; 
							 
				        } 
				        //self hosted video post 3-6
				        else if($wp_version >= "3.6"){
			
				        	if(!empty($video_m4v) || !empty($video_ogv)) {
				        		
								$video_output = '[video ';
								
								if(!empty($video_m4v)) { $video_output .= 'mp4="'. $video_m4v .'" '; }
								if(!empty($video_ogv)) { $video_output .= 'ogv="'. $video_ogv .'"'; }
								
								$video_output .= ' poster="'.$video_poster.'"]';
								
				        		echo '<div class="video">' . do_shortcode($video_output) . '</div>';	
				        	}
				        }
						
					 }
				}
	             
	        ?>
	        
	        <?php if( !is_single() ) { ?> 
	        	<div class="article-content-wrap">
					<div class="post-header">
						<h2 class="title"><?php if( !is_single() ) { ?> <a href="<?php the_permalink(); ?>"><?php } ?><?php the_title(); ?><?php if( !is_single() ) {?> </a> <?php } ?></h2>	
						<span class="meta-author"><span><?php echo __('By', NECTAR_THEME_NAME); ?></span> <?php the_author_posts_link(); ?> <span class="meta-category">| <?php the_category(', '); ?></span> <span class="meta-comment-count">| <a href="<?php comments_link(); ?>">
						<?php comments_number( __('No Comments', NECTAR_THEME_NAME), __('One Comment ', NECTAR_THEME_NAME), __('% Comments', NECTAR_THEME_NAME) ); ?></a></span>
					</div><!--/post-header-->
			<?php 
			
				//if no excerpt is set
				global $post;
				if(empty( $post->post_excerpt ) && $use_excerpt != 'true') {
					the_content('<span class="continue-reading">'. __("Read More", NECTAR_THEME_NAME) . '</span>');
				}
				
				//excerpt
				else {
					echo '<div class="excerpt">';
						the_excerpt();
					echo '</div>';
					echo '<a class="more-link" href="' . get_permalink() . '"><span class="continue-reading">'. __("Read More", NECTAR_THEME_NAME) .'</span></a>';
				}
				
				?>

				</div><!--article-content-wrap-->
				
			<?php } ?>
			
		   
			<?php 
			if(is_single()){
				//on the single post page display the content
				the_content('<span class="continue-reading">'. __("Read More", NECTAR_THEME_NAME) . '</span>');
			} ?>
			
			<?php $options = get_option('salient');
				if( $options['display_tags'] == true ){
					 
					if( is_single() && has_tag() ) {
					
						echo '<div class="post-tags"><h4>Tags: </h4>'; 
						the_tags('','','');
						echo '<div class="clear"></div></div> ';
						
					}
				}
			?>
			
		</div><!--/content-inner-->
		
	</div><!--/post-content-->
		
</article><!--/article-->