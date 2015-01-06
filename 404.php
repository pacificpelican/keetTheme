<?php

	//	file name:
	//	404.php


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
<?php get_header(); ?>

<div style="position:absolute;left:1px;top:350px;width:140px;border-style:none;z-index:20;id:sidebar-left;">
<?php get_sidebar(left); ?>
</div>

<div style="position:absolute;left:148px;top:354px;height:400px;width:650px;border-style:none;z-index:130;id:container;">
<br /><br />
<h1>404 NOT FOUND</h1>
<font color="charcoal">visit the</font> <a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><strong>home page</strong></a>
<br /><br />
<br /><br />
<br /><br />
<br /><br /><br /><br /><br /><br /><br /><br />

<?php get_footer(); ?>

</div>
