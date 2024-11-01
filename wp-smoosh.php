<?php
/*
Plugin Name: sm00sh Processor
Plugin URI: http://smsh.me/action/api
Description: A plugin that converts all URLs in a post or comment into shorten URLs using the <a href="http://smsh.me">sm00sh service</a>. Notice that activating it does not sm00sh old posts and comments and deactivating it does not un-sm00sh already sm00sh'ed posts and comments.
Version: 1.0.3.3 
Author: Lopo Lencastre de Almeida <dev@ipublicis.com>
Author URI: http://ipublicis.com/
Donate link: http://smsh.me/7kit
License: GNU GPL v3 or later

    Copyright (C) 2009 iPublicis!COM

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

    Copyright 2006 Peter Harkins (ph@malaprop.org)
    Copyright 2008-2009 Joost de Valk (joost@yoast.com)
*/

/**
include sm00sh library
*/
require_once('lib/smoosh.lib.php');

/**
clear blog self URL-base from content
*/
add_filter('the_content','smsh_clear_it', 15);
add_filter('the_excerpt','smsh_clear_it', 15);

/**
set the filters for processing post contents
*/
add_filter('the_content','smsh_it', 20);
add_filter('the_excerpt','smsh_it', 20);

/**
Readd blog self URL-base from content due to Lightbox-alike plugins requiring a full path
*/
add_filter('the_content','smsh_add_it', 25);
add_filter('the_excerpt','smsh_add_it', 25);

/**
set the filters for processing comment contents
*/
add_filter('comment_text','smsh_it', 20);

/**
smsh_it
this function search the post content for http links and then convert them to sm00sh'ed ones.

@param string $content the original content of the post
@return string $content the modified content of the post
*/
function smsh_it($content)
{
	$smoosher = new smsh();
	$content = $smoosher->smsh_parse($content);
	return $content;
}

/**
smsh_clear_it
this function search the post content for 'wpurl' http links and then clear them.

@param string $content the original content of the post
@return string $content the modified content of the post
*/
function smsh_clear_it($content)
{
	$blog_url = get_bloginfo ( 'wpurl' ); ;
	$content = str_ireplace($blog_url, "[sm00shWPURL]", $content);
	return $content;
}

/**
smsh_add_it
this function search the post content for [sm00shWPURL] tag and replace it by 'wpurl' need by some plugins.

@param string $content the original content of the post
@return string $content the modified content of the post
*/
function smsh_add_it($content)
{
	$blog_url = get_bloginfo ( 'wpurl' ); ;
	$content = str_ireplace("[sm00shWPURL]", $blog_url, $content);
	return $content;
}

?>
