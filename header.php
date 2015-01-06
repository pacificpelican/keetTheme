<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php

	//	file name:
	//	header.php


//	Theme Name: Keet
//	Theme URI: http://blogs.sf3am.com/keet/
//	Description: A flexible and sharp theme framework for Wordpress.
//	Author: Daniel J. McKeown
//	Author URI: http://pacificpelican.us/
//	Version: 0.1.1
//	Tags: frameworks, widgets, header menu, minimal, Google Web Fonts, Wordpress 3+

//	Keet theme: copyright May 2010 Daniel J. McKeown.
//	This work is released under GNU General Public License (GNU GPL), version 2 or later:
//	http://www.gnu.org/licenses/old-licenses/gpl-2.0.html


	//  licensing info:
    	//	This program is free software: you can redistribute it and/or modify
    	//	it under the terms of the GNU General Public License as published by
    	//	the Free Software Foundation, either version 2 of the License, or
    	//	(at your option and if possible) any later version.

    	//	This program is distributed in the hope that it will be useful,
    	//	but WITHOUT ANY WARRANTY; without even the implied warranty of
    	//	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    	//	GNU General Public License for more details.

    	//	You should have received a copy of the GNU General Public License
    	//	(version 2) along with this program.  If not, see <http://www.gnu.org/licenses/>

?>

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
    <title><?php
        if ( is_single() ) { single_post_title(); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
    ?></title>

 <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

 <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />

 <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

 <?php wp_head(); ?>

 <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'keettheme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
 <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link href='http://fonts.googleapis.com/css?family=Crimson+Text' rel='stylesheet' type='text/css'>


<link rel="icon" type="image/vnd.microsoft.icon" href="<?php bloginfo('template_url'); ?>/keet-images/Belle-the-parakeet--May2010-byDanielJMcKeown--icon.ico" />



</head>

<body>


    <div style="position:absolute;left:130px;top:27px;width:340px;border-style:none;z-index:70;id:blogname;"><span><h1><a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a></h1></span></div>
<?php if ( is_home() || is_front_page() ) { ?>
        <div style="position:absolute;left:840px;top:65px;width:250px;border-style:none;z-index:40;id:theblogdescription;"><font style="color:gray;font-family: 'Crimson Text', sans-serif, Arial;"><i><?php bloginfo( 'description' ) ?></i></font></div>
<?php } else { ?>
        <div style="position:absolute;left:840px;top:65px;width:250px;border-style:none;z-index:40;id:blogdescription;"><font style="color:gray;font-family: 'Crimson Text', sans-serif, Arial;"><i><?php bloginfo( 'description' ) ?></i></font></div>
<?php } ?>



 <div style="position:absolute;left:128px;top:105px;width:850px;height:200px;border-style:none;z-index:27;id:3header;">

<?php
// Check if this is a post or page, if it has a thumbnail, and if it's a big one
if ( is_singular() &&
has_post_thumbnail( $post->ID ) &&
( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail') ) &&
$image[1] >= HEADER_IMAGE_WIDTH ) :
// We have a new header image!
echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
else : ?>
<a href="<?php bloginfo( 'url' ) ?>/" title="visit the home page" rel="home"><img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" /></a>
<?php endif; ?>

</div>

	<div style="position:absolute;left:40px;top:295px;width:850px;height:40px;border-style:none;z-index:35;id:menu3;">

		<ul id="menu3">
	<div id="mydiv0">
			<?php wp_nav_menu( 'sort_column=menu_order&container_class=page-nav0' ); ?>
	</div>
		</ul>
	</div>
