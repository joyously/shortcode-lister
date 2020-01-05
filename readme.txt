=== Shortcode List ===
Contributors: scott.deluzio
Tags: shortcode, list
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=BTGBPYSDDUGVN
Requires at least: 2.7.0
Tested up to: 5.2.0
Stable tag: 2.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A plugin for the editor, to insert shortcodes available for use, with all their attributes.

== Description ==
Shortcode List is a plugin designed to display a drop down menu of all the shortcodes available to use in your posts and pages. This menu will allow you to select a shortcode and have it automatically inserted into the editor for you.

If you have downloaded several plugins that produce their own custom shortcodes, it may become cumbersome to remember all of the shortcodes you have available to use. In a way this defeats the purpose of having an easy to use shortcode, if it is too difficult to remember them all.

This plugin solves that problem, by producing a clean, easily accessible menu of all the custom/third party added, and WordPress default shortcodes that you are able to use inside your posts and pages.

== Installation ==
1. Download archive and unzip in wp-content/plugins or install via Plugins - Add New.
2. Activate the plugin through the Plugins menu in WordPress.
3. View your list of available shortcodes in the Page or Post editor screen.

== Frequently Asked Questions ==
= Does this plugin list default shortcodes that come with WordPress? =
Yes. According to the WordPress Codex, the following are built-in shortcodes that will be shown in the Shortcode Lister: [audio] [caption] [embed] [gallery] [video]

= Can your plugin display the shortcode attributes? =
Shortcode attributes are created inside of the function that creates the shortcode, and are not available globally. For that reason we are unable to display the attributes.

= What about shortcodes from other plugins? =
Most shortcodes created by plugins you have downloaded will be included in Shortcode Lister found on your Post or Page edit screen. If you have a plugin that produces shortcodes and it is not listed in the Shortcode Lister menu, please let create a [support ticket](https://wordpress.org/support/plugin/shortcode-lister/).

= Why would I need this plugin? =
If you like wasting time by under using shortcodes that have been provided to you by the great plugins you have downloaded, then you probably do not need this plugin.

If you are like thousands of other people who want to use WordPress to its full potential, shortcodes are a great way to save time. This plugin will save you even more time if your list of shortcodes gets too big for you to remember all of them.

= How do I insert the shortcode into my post? =
Simply click where you want the shortcode to be inserted in your post editor, then select the shortcode from the menu. Your shortcode will be inserted automatically for you!


== Screenshots ==
1. Shortcode Lister drop down menu. screenshot-1.png
2. Shortcode Lister settings allows you to exclude some shortcodes from your drop down menu. screenshot-2.png

== Changelog ==
= 2.6 =
* Try to do it all in the plugin.

= 2.5 =
* Pared down the code to a minimum.

= 2.0.2 =
* Bug fix language text domain.

= 2.0.1 =
* Bug fix on plugin file includes.

= 2.0.0 =
* Rewritten plugin to allow for easier use.
* NEW: Drop down menu above all editor boxes with a list of shortcodes. Selecting a shortcode from the menu inserts it into your post where your cursor is.
* NEW: Settings page allows you to exclude some shortcodes from the drop down menu. Useful if you only use a shortcode once and do not need it on a regular basis.
* NEW: Displays the shortcode menu on all post types (previously only showed a list on default post and page post types).
* NEW: Included translatable strings and POT file. Submit translations to https://scottdeluzio.com/contact/
