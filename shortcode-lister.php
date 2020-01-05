<?php
/*
Plugin Name: Shortcode Lister
Plugin URI: http://surpriseazwebservices.com/wordpress-plugins/shortcode-lister-wordpress-plugin/
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=BTGBPYSDDUGVN
Description: A plugin for the editor, to insert shortcodes available for use, with all their attributes.
Version: 2.5
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


add_action( 'media_buttons', 'shortcode_lister_menu', 15 );
function shortcode_lister_menu( $editor_id ) {
	global $shortcode_tags;
	
	foreach ( array_keys( $shortcode_tags ) as $include ){
		$shortcodes_list .= '<option value="' . $include . '">' . $include . '</option>';
	}
	echo '&nbsp;<select id="shortcode-list"><option class="noclick">'. __('Shortcodes') . '</option>';
	echo $shortcodes_list;
	echo '</select>';
	
	wp_enqueue_script( 'shortcode-select', plugins_url( 'js/shortcode-lister.js', __FILE__ ), '2.5', true );
}
