=== Limit parameter for gallery shortcode ===
Tags: gallery, shortcode, limit, images
Contributors: nboehr
Requires at least: 4.0
Tested up to: 4.4.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a limit parameter to the [gallery] shortcode.

== Description ==

By default, the gallery shortcode does not allow to limit the number of images displayed. This makes sense when you for example include all images attached to a post like this:

`[gallery id="4"]`

When this plugin is activated, you may use:

`[gallery id="4" limit="3"]`

and it will only display three images.

You can also use an offset parameter:

`[gallery id="4" limit="3" offset="1"]`

Will display at most three images, starting at the second.

Note that this plugin is a little bit of a hack.

== Installation ==

1. Upload the `gallery-limit.php` file to the plugin directory.
1. Activate the plugin.
1. Done.

== Changelog ==

= 2.0 =
Added offset parameter.

= 1.0 =
First release.
