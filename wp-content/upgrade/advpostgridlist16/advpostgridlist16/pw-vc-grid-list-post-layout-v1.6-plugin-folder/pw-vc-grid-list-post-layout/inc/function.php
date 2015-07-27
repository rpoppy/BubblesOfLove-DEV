<?php 
if (!function_exists('pw_get_post_meta')) {
	function pw_get_post_meta($post_id , $post_taxonomies){
		$tax_counter= 0;
		$output = '';
		foreach ($post_taxonomies as $taxonomy) {        
			$terms = get_the_terms( $post_id, $taxonomy );
			if ( (!empty( $terms )) && ($tax_counter<=1) ) {
				if ($tax_counter==0){
					$output .='<div class="pl-postmeta">
								<i class="fa fa-tags"></i>';
				}
				foreach ( $terms as $term ){
					$output .= '<a href="' .get_term_link($term->slug, $taxonomy) .'">'.$term->name.'</a> ';
					$tax_counter++;
				}
			}
		}
		if ($tax_counter!= 0 ) $output.='</div>';
		
		return $output;
	}
}
?>