<?php

$options = get_option('salient');
global $post;
$cta_link = ( !empty($options['cta-btn-link']) ) ? $options['cta-btn-link'] : '#';
$using_footer_widget_area = (!empty($options['enable-main-footer-area']) && $options['enable-main-footer-area'] == 1) ? 'true' : 'false';
$disable_footer_copyright = (!empty($options['disable-copyright-footer-area']) && $options['disable-copyright-footer-area'] == 1) ? 'true' : 'false';

$exclude_pages = (!empty($options['exclude_cta_pages'])) ? $options['exclude_cta_pages'] : array();
if(!empty($options['cta-text']) && current_page_url() != $cta_link && !in_array($post->ID, $exclude_pages)) {

$cta_btn_color = (!empty($options['cta-btn-color'])) ? $options['cta-btn-color'] : 'accent-color';
?>

<div id="call-to-action">
	<div class="container">
		<div class="triangle"></div>
		<span> <?php echo $options['cta-text']; ?> </span>
		<a class="nectar-button <?php if($cta_btn_color != 'see-through') echo 'regular-button '; ?> <?php echo $cta_btn_color;?>" data-color-override="false" href="<?php echo $cta_link ?>"><?php if(!empty($options['cta-btn'])) echo $options['cta-btn']; ?> </a>
	</div>
</div>

<?php } ?>

<div id="footer-outer" data-using-widget-area="<?php echo $using_footer_widget_area; ?>">

	<?php if( $using_footer_widget_area == 'true') { ?>

	<div id="footer-widgets">

		<div class="container">

			<div class="row">

				<?php

				$footerColumns = (!empty($options['footer_columns'])) ? $options['footer_columns'] : '4';

				if($footerColumns == '2'){
					$footerColumnClass = 'span_6';
				} else if($footerColumns == '3'){
					$footerColumnClass = 'span_4';
				} else {
					$footerColumnClass = 'span_3';
				}
				?>

				<div class="col <?php echo $footerColumnClass;?>">
				      <!-- Footer widget area 1 -->
		              <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area 1') ) : else : ?>
		              	  <div class="widget">
						  	 <h4 class="widgettitle">Widget Area 1</h4>
						 	 <p class="no-widget-added"><a href="<?php echo admin_url('widgets.php'); ?>">Click here to assign a widget to this area.</a></p>
				     	  </div>
				     <?php endif; ?>
				</div><!--/span_3-->

				<div class="col <?php echo $footerColumnClass;?>">
					 <!-- Footer widget area 2 -->
		             <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area 2') ) : else : ?>
		                  <div class="widget">
						 	 <h4 class="widgettitle">Widget Area 2</h4>
						 	 <p class="no-widget-added"><a href="<?php echo admin_url('widgets.php'); ?>">Click here to assign a widget to this area.</a></p>
				     	  </div>
				     <?php endif; ?>

				</div><!--/span_3-->

				<?php if($footerColumns == '3' || $footerColumns == '4') { ?>
					<div class="col <?php echo $footerColumnClass;?>">
						 <!-- Footer widget area 3 -->
			              <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area 3') ) : else : ?>
			              	  <div class="widget">
							  	<h4 class="widgettitle">Widget Area 3</h4>
							  	<p class="no-widget-added"><a href="<?php echo admin_url('widgets.php'); ?>">Click here to assign a widget to this area.</a></p>
							  </div>
					     <?php endif; ?>

					</div><!--/span_3-->
				<?php } ?>

				<?php if($footerColumns == '4') { ?>
					<div class="col <?php echo $footerColumnClass;?>">
						 <!-- Footer widget area 4 -->
			              <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area 4') ) : else : ?>
			              	<div class="widget">
							    <h4>Widget Area 4</h4>
							    <p class="no-widget-added"><a href="<?php echo admin_url('widgets.php'); ?>">Click here to assign a widget to this area.</a></p>
							 </div><!--/widget-->
					     <?php endif; ?>

					</div><!--/span_3-->
				<?php } ?>

			</div><!--/row-->

		</div><!--/container-->

	</div><!--/footer-widgets-->

	<?php } //endif for enable main footer area


	   if( $disable_footer_copyright == 'false') { ?>


		<div class="row" id="copyright">

			<div class="container">

				<div class="col span_12">

					<?php if(!empty($options['disable-auto-copyright']) && $options['disable-auto-copyright'] == 1) { ?>
						<p><?php if(!empty($options['footer-copyright-text'])) echo $options['footer-copyright-text']; ?> <a href="https://wordpress.org/">WP themes</a></p>
					<?php } else { ?>
						<p>&copy; <?php echo date('Y') . ' ' . get_bloginfo('name'); ?>. <?php if(!empty($options['footer-copyright-text'])) echo $options['footer-copyright-text']; ?> <a href="http://https://wordpress.org/">Wordpress</a></p>
					<?php } ?>

				</div><!--/span_5-->

			</div><!--/container-->

		</div><!--/row-->

		<?php } //endif for enable main footer copyright ?>

</div><!--/footer-outer-->


<?php
$sideWidgetArea = (!empty($options['header-slide-out-widget-area'])) ? $options['header-slide-out-widget-area'] : 'off';
$fullWidthHeader = (!empty($options['header-fullwidth']) && $options['header-fullwidth'] == '1') ? true : false;

if($sideWidgetArea == '1') { ?>
	<div id="slide-out-widget-area-bg"></div>
	<div id="slide-out-widget-area">
		<div class="inner">
		  <a class="slide_out_area_close" href="#"><span class="icon-salient-x icon-default-style"></span></a>
		  <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Slide Out Widget Area') ) : else : ?>
		      <div class="widget">
			 	 <h4 class="widgettitle">Side Widget Area</h4>
			 	 <p class="no-widget-added"><a href="<?php echo admin_url('widgets.php'); ?>">Click here to assign widgets to this area.</a></p>
		 	  </div>
		 <?php endif; ?>
		</div>
	</div>
<?php } ?>


</div> <!--/ajax-content-wrap-->


<?php if(!empty($options['boxed_layout']) && $options['boxed_layout'] == '1') { echo '</div>'; } ?>

<?php if(!empty($options['back-to-top']) && $options['back-to-top'] == 1) { ?>
	<a id="to-top"><i class="icon-angle-up"></i></a>
<?php } ?>

<?php if(!empty($options['google-analytics'])) echo $options['google-analytics']; ?>

<?php wp_footer(); ?>



</body>
</html>