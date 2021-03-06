=== WP Bodymovin ===
Contributors: ioDSGN, ksere
Tags: animation, lottie, animated svg, After Effects
Stable tag: 2.1.0
Tested up to: 5.2.1
Requires at least: 4.9
Requires PHP: 5.3
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Use a Bodymovin (Lottie) exported AfterEffects animation in any WordPress page using a shortcode.

== Description ==

WP Bodymovin lets you use animations created in AfterEffects and exported as JSON files using the [Lottie (Bodymovin)](https://github.com/airbnb/lottie-web) plugin.

Uploaded animations are called using a shortcode and can be previewed in the backend. Animations can be set to auto start/stop when entering/exiting the viewport to reduce CPU usage, and can also be lazy-loaded.

== Usage ==

Check out this helpful video contributed by [James Larkin](https://wordpress.org/support/users/jameslarkin/)

https://www.youtube.com/watch?v=YDHqfO4CwP8&

== Frequently Asked Questions ==

= My animation doesn't work =
If your animation doesn't work when loaded in the backend, make sure that it runs properly when previewed locally by using the html file generated by the Bodymovin AE extension (You can generate that by checking "Demo - Exports an html for local preview"). If it does work locally and it still doesn't work in your WP backend, make sure there aren't any javascript errors caused by 3rd party assets.

== Changelog ==

= 2.1.0 =
* Updated Lottie library to 5.5.3

= 2.0.1 =
* Minor fix: Changed assets version number

= 2.0.0 =
* Added support for image assets
* Added Renderer setting for animation
* Added Height setting for animation
* Added jQuery as a dependency
* Updated Lottie library to 5.2.1

= 1.0.3 =
* Fixed MIME Type checking on uploaded file

= 1.0.2 =
* Fixed JS error checking
* Fixed Autoplay not triggered in some cases
* Added support for VC styles

= 1.0.1 =
* Added autoplay option
* Fixed some non-unique function names
* Removed unnecessary code
