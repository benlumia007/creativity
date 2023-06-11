# Creativity
Creativity is a next-generation theme designed to work with ClassicPress, offering an ideal experience for showcasing your site's content.

This theme is a parent theme. What this means is that to customize it, you should create a child theme. All you need to know is that it's a solid and flexible starting point for any blog or portfolio.

## Features
Creativity is built from the Backdrop framework, so it provides a great starting point with many useful features.

* Custom `Portfolio` that integrates with the [Backdrop Custom Portfolio](https://github.com/benlumia007/backdrop-custom-portfolio) plugin.
* Custom layouts that allows you to quickly change the layout of your site.
* Uses the built-in ClassicPress menu system. No need to hack your navigation into place.
* Integration with the ClassicPress theme customizer to allow you to customize the look of your site.
* Ability to create custom templates for any post type.

## Child themes
Since Creativity is a parent theme, you'll want to create a child theme if you plan on making any customizations. Don't know how to make a child theme? Just follow the steps below.

* Create a theme folder in your `wp-content/themes` directory called `creativity-child`.
* Create a `style.css` file within your theme folder.
* At the top of your `style.css` file, add the below information.

<pre>
/*!
 * Theme Name: Creativity Child
 * Theme URI: https://link-to-your-site.com
 * Description: Describe what your theme should be like.
 * Version: 0.1
 * Author: Your Name
 * Author URI: https://link-to-your-site.com
 * Tags: Add, Whatever, Tags, You, Want
 * Template: creativity-child
 */
</pre>

From this point, you simply need to start adding your own styles. The parent theme styles will automatically be loaded for you.
