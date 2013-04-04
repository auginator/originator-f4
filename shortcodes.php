<?php
/*
	Zurb Row/Columns shortcode by Agustin M. Sevilla III
*/ 
function foundation4_row( $atts, $content = null ) {
	
	$output = '<div class="row">';
	$output .= do_shortcode($content);
	$output .= '</div>';
	
	return $output;
}
add_shortcode('row', 'foundation4_row');

function foundation4_columns( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'large' => 'large-6', /* large-1 through large-12 are valid */
	'small' => '', /* small-1 through small-12 are valid */
	), $atts ) );
	
	$output = '<div class="'.$small.' '. $large. ' columns">';
	$output .= $content;
	$output .= '</div>';
	
	return $output;
}
add_shortcode('column', 'foundation4_columns');


/*
	Zurb Orbit shortcode by Agustin M. Sevilla III
*/ 
function foundation4_orbit( $atts, $content = null ) {
	
	$output = '<ul data-orbit>';
	$output .= do_shortcode($content);
	$output .= '</ul>';
	
	return $output;
}
add_shortcode('orbit', 'foundation4_orbit');

function foundation4_orbit_slide( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'caption' => '', 
	'slide_name' => '', 
	), $atts ) );
	$output = '<li';
	if ($slide_name != '') $output .=  ' data-orbit-slide="' . $slide_name . '"';	
	$output .= '>';
	$output .= '		' . $content;
	if ($caption != '') $output .=  '<div class="orbit-caption">' . $caption . '</div>';
	$output .= '</li>';

	// 	<img src="../img/demos/demo1.jpg" />
	// 	<div class="orbit-caption">...</div>
	// </li>
	return $output;
}
add_shortcode('orbit_slide', 'foundation4_orbit_slide');

// Shortcodes from the http://320press.com/wpfoundation

// Gallery shortcode

// remove the standard shortcode
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'gallery_shortcode_tbs');

function gallery_shortcode_tbs($attr) {
	global $post, $wp_locale;

	$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID ); 
	$attachments = get_posts($args);
	if ($attachments) {
		$output = '<ul class="block-grid small-4 large-3">';
		foreach ( $attachments as $attachment ) {
			$output .= '<li>';
			$att_title = apply_filters( 'the_title' , $attachment->post_title );
			$output .= wp_get_attachment_link( $attachment->ID , 'thumbnail', true );
			$output .= '</li>';
		}
		$output .= '</ul>';
	}

	return $output;
}

// Buttons
function buttons( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => 'radius', /* radius, round */
	'size' => 'medium', /* small, medium, large */
	'color' => 'blue',
	'nice' => 'false',
	'url'  => '',
	'text' => '', 
	), $atts ) );
	
	$output = '<a href="' . $url . '" class="button '. $type . ' ' . $size . ' ' . $color;
	if( $nice == 'true' ){ $output .= ' nice';}
	$output .= '">';
	$output .= $text;
	$output .= '</a>';
	
	return $output;
}

add_shortcode('button', 'buttons'); 

// Alerts
function alerts( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => '	', /* warning, success, error */
	'close' => 'false', /* display close link */
	'text' => '', 
	), $atts ) );
	
	$output = '<div class="fade in alert-box '. $type . '">';
	
	$output .= $text;
	if($close == 'true') {
		$output .= '<a class="close" href="#">×</a></div>';
	}
	
	return $output;
}

add_shortcode('alert', 'alerts');

// Panels
function panels( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => '	', /* warning, success, error */
	'close' => 'false', /* display close link */
	'text' => '', 
	), $atts ) );
	
	$output = '<div class="panel">';
	$output .= $text;
	$output .= '</div>';
	
	return $output;
}

add_shortcode('panel', 'panels');
?>