<?php
   /*
   Plugin Name: Shortcode Lister
   Plugin URI: http://surpriseazwebservices.com/wordpress-plugins/shortcode-lister-wordpress-plugin/
   Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=BTGBPYSDDUGVN
   Description: A plugin to display a list of all the shortcodes available for use on the post and page edit screens.
   Version: 1.0.3
   Author: Scott DeLuzio
   Author URI: https://surpriseazwebservices.com
   License: GPL2
   */
   
	/*  Copyright 2013  Scott DeLuzio  (email : scott (at) surpriseazwebservices.com)

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
	
/* Get a list of all available shortcode tags */
function get_all_shortcodes() { 
	global $shortcode_tags;	
	/* Set $show_donation to "false" if you do not want to see the donate button next to your shortcode list */
	$show_donation = "true";
	?>
	<div style="overflow:hidden; width:100%">
		<div style="float:left;">
	<?php
	    foreach($shortcode_tags as $code => $function)
	        {
				echo "[$code]<br />";
	        }
	?>
		</div>
		<?php if ($show_donation != "false") { ?>
		<div style="float:right;">
			<p>If this plugin has helped you out at all, please consider making a donation to encourage future updates.<br />Your generosity is appreciated!</p>
			<a href="#" onclick="window.open('https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=BTGBPYSDDUGVN');">
				<img style="float:right;" alt="" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" width="147" height="47">
			</a>
			<p>To report any issues with <strong>this plugin</strong>, please use the <a href='http://wordpress.org/support/plugin/shortcode-lister'>plugin support page on WordPress.org</a>.</p>
			<p>For all other WordPress support, please check out the following <a href="https://surpriseazwebservices.com/services/wordpress-site-install/">site set-up</a>, <a href="https://surpriseazwebservices.com/services/wordpress-maintenance-support/">24x7 support</a>, and other <a href="https://surpriseazwebservices.com/services/">WordPress services</a>.</p>
			<p><a href="https://twitter.com/SurpriseWebSvc" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @SurpriseWebSvc</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
		</div>
		<?php } ?>
	</div>
	<?php
}

/* Add Shortcode Lister meta box to Post and Page edit screens */
function show_shortcode_box() {

    $screens = array( 'post', 'page' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'shortcode_lister_id',
            __( 'Shortcode Lister', 'shortcode_list' ),
            'shortcode_lister_inner_box',
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'show_shortcode_box' );

/* List out available shortcodes in meta box */
function shortcode_lister_inner_box( $post ) {

  echo get_all_shortcodes();

}