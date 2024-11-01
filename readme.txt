=== sm00sh URL shrink ===
Contributors: ipublicis
Donate link: http://smsh.me/7kit
Tags: comments, spam, badbehavior, links, plugin, seo, shortcode, posts, pages, keyword, Post, page, download, csv, ui, javascript, AJAX, email, cloak, replacement, cloaking, statistic, stat, statistics, stats, administration, admin, slugs, slug, automation, masking, replacements, mask, shrink, domain, shrinking, widget, budurl, widgets, tinyurl, tiny, tracking, track, clicks, click, shorten, short, shortlink, hop, dashboard, hoplink, shorturl, rewrite, tweet, twitter, plugin, forward, redirect, marketing, pretty, sidebar, affiliates, affiliate, urls, url, link, links
Requires at least: 2.7.0
Tested up to: 3.9.1
Stable tag: 1.0.3.3

A plugin that converts all URLs in a post or comment into shorten URLs using the [sm00sh service](http://smsh.me). 
Notice that activating it does not automatically sm00sh old posts and comments and deactivating it does not un-sm00sh already sm00sh'ed posts and comments.

== Description ==

sm00sh URL shrink plugin is for quick, easy, full-featured URL shortening for content and comments. 

It has a free public API and plugins for [Wordpress](http://wordpress.org), [Drupal](http://drupal.org), 
[Laconi.ca](http://laconi.ca), Mozilla Labs [Ubiquity](http://wiki.mozilla.org/Labs/Ubiquity), Mozilla [Firefox](http://www.spreadfirefox.com/) and other free software. Mash long URLs to make short ones real easy and secured by [BadBehavior](http://www.bad-behavior.ioerror.us/) and [SURLB](http://en.wikipedia.org/wiki/SURBL) alike lists.

More info:

* More info on [sm00sh](http://smsh.me/action/about), with info on how to add sites to it, and how to integrate it in other ways.
* Check out the other [Wordpress plugins](http://wordpress.org/extend/plugins/profile/ipublicis) by the same author.

== Installation ==

How to install the Wordpress sm00sh plugin and get it working.

1. Upload `/sm00sh/` folder and its files to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

If you use Wordpress Mu and want to add this plugin to all blogs just install it in the mu-plugins directory instead.

== Frequently Asked Questions ==

= Have questions? =

Go to [sm00sh Identi.ca group](http://identi.ca/group/sm00sh) or go to the [Wordpress' forum](http://wordpress.org/tags/sm00sh?forum_id=10#postform).

== Screenshots ==

1. sm00sh homepage at http://smsh.me

== Changelog ==

= 1.0.3.3 =

* Re-checked some strange bugs.

= 1.0.3.2 =

* Added Donation link :)

= 1.0.3.1 =

* Solving incompatibility bug with some plugins, like Lightbox-alike ones, that required 'wpurl' in links.
* Changed some info in readme.txt accordingly.
* New release.

= 1.0.3 =

* Huge bug that sm00shed blog self referenced post content files turning images unavailable.
* Added filter that will remove 'wpurl' URL references in post content before sm00shimg post content.
* Changed some info in readme.txt accordingly.
* New release.

= 1.0.2 =

* Some very small code cleaning.
* Questions redirected to sm00sh's Identi.ca group and Wordpress' forum.
* Changed some info in readme.txt accordingly.
* New release.

= 1.0.1 =

* Last stupid bug squashed. 
* New release.

= 1.0.1-rc3 = 

* Minor changes.

= 1.0.1-rc2 =

* Removed sm00sh functions to external file for easier upgrade and debug.
* Uploaded sm00sh external library file to trunk.
* Retro changed version 1.0 and re-released it.

= 1.0.1-rc1 =

* Added more filter actions and solved a few issues.
* Solved a stupid sintax error that was avoiding sm00sh'ed URLs to be returned, although they were created.

= 1.0 =

* First version released.

