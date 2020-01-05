<?php
/*
Plugin Name: Shortcode List
Plugin URI: http://surpriseazwebservices.com/wordpress-plugins/shortcode-lister-wordpress-plugin/
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=BTGBPYSDDUGVN
Description: A plugin for the editor, to insert shortcodes available for use, with all their attributes.
Version: 2.6
Author: Scott DeLuzio
Author URI: https://scottdeluzio.com
License: GPL2
*/

/*  Copyright 2013-2017  Scott DeLuzio  (email : scott (at) surpriseazwebservices.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
/* Prevent direct access to the plugin */
if ( !defined( 'ABSPATH' ) ) {
    die( "Sorry, you are not allowed to access this page directly." );
}


function shortcode_list_menu( $editor_id ) {
	global $shortcode_tags;
	
	foreach ( array_keys( $shortcode_tags ) as $include ){
		$shortcodes_list .= '<option value="' . $include . '">' . $include . '</option>';
	}
	echo '&nbsp;<select id="shortcode-list"><option class="noclick">'. __('Shortcodes') . '</option>';
	echo $shortcodes_list;
	echo '</select>';
	
	wp_enqueue_script( 'shortcode-select', plugins_url( 'js/shortcode-lister.js', __FILE__ ), '2.6', true );
}
add_action( 'media_buttons', 'shortcode_list_menu', 15 );

/**
 * Ajax handler for getting a shortcodes's attributes.
 *
 */
function shortcode_list_get_shortcode_attributes() {
	global $shortcode_tags;

//	if ( current_user_can( 'edit_post' ) ) {
		if ( empty( $_REQUEST['shortcode_tag'] ) ) {
			wp_send_json_error( __( 'Missing shortcode tag.' ) );
		}

		$tag = wp_unslash( $_REQUEST['shortcode_tag'] );
		if ( shortcode_exists( $tag ) ) {
			if ( ! defined( 'SHORTCODE_LIST_SHORTCIRCUIT' ) ) {
				define( 'SHORTCODE_LIST_SHORTCIRCUIT', true );
				add_filter( "shortcode_atts_{$tag}", 'shortcode_list_atts_filter', 9, 4 );
				call_user_func( $shortcode_tags[ $tag ], array(), '', $tag );
			}
		}
//	}
	wp_send_json_error();
}
add_action( 'wp_ajax_get-shortcode-attributes', 'shortcode_list_get_shortcode_attributes' );

function shortcode_list_atts_filter( $out, $pairs, $atts, $shortcode ) {
	if ( defined( 'SHORTCODE_LIST_SHORTCIRCUIT' ) && SHORTCODE_LIST_SHORTCIRCUIT ) {
		wp_send_json_success( rtrim( trim( str_replace( 
		array( '>', 'array (', ')', ",\n  '", "\n  '", "' = '", "' = " ), 
		array( '', '', '', ' ', ' ', "='", '=' ),
		var_export( $pairs, true ) ) ), ',' ) );
	}
}
