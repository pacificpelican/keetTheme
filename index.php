<?php

	//	file name:
	//	index.php


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

<div style="position:absolute;left:814px;top:350px;width:225px;border-style:none;z-index:15;id:sidebar-right;">
<?php get_sidebar(right); ?>

</div>

<div style="position:absolute;left:148px;top:354px;height:400px;width:650px;border-style:none;z-index:130;id:container;">


<?php /* The Loop — with comments! */ ?>
<p>
<?php while ( have_posts() ) : the_post() ?>

<?php /* Create a div with a unique ID thanks to the_ID() and semantic classes with post_class() */ ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php /* an h2 title */ ?>
     <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'keettheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

<?php /* Microformatted, translatable post meta */ ?>
     <div class="entry-meta"><font style="color:gray;font-family: 'Crimson Text', sans-serif, Arial;">
      <span class="meta-prep meta-prep-author"><?php _e('By ', 'keettheme'); ?></span>
      <span class="author vcard"><?php the_author(); ?></span>
      <span class="meta-sep"> | </span>
      <span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'keettheme'); ?></span>
      <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
      <?php edit_post_link( __( 'Edit', 'keettheme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?></font>
     </div><!– .entry-meta –>

<?php /* The entry content */ ?>
     <div class="entry-content">
<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'keettheme' )  ); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'keettheme' ) . '&after=</div>') ?>
     </div><!– .entry-content –>

<?php /* Microformatted category and tag links along with a comments link */ ?>
     <div class="entry-utility"><font style="color:gray;font-family: 'Crimson Text', sans-serif, Arial;">
      <span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'keettheme' ); ?></span><?php echo get_the_category_list(', '); ?></span>
      <span class="meta-sep"> | </span>
      <?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'keettheme' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
      <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'keettheme' ), __( '1 Comment', 'keettheme' ), __( '% Comments', 'keettheme' ) ) ?></span>
      <?php edit_post_link( __( 'Edit', 'keettheme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
    </font> </div><!– #entry-utility –>
    </div><!– #post-<?php the_ID(); ?> –>

<?php /* Close up the post div and then end the loop with endwhile */ ?>

<br /><br />
<?php comments_template('', true); ?>

<?php get_attachment_link(); ?>

<?php endwhile; ?>
</p>


<?php /* Bottom post navigation */ ?>
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
    <div id="nav-below" class="navigation">
     <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'keettheme' )) ?></div>
     <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'keettheme' )) ?></div>
    </div><!– #nav-below –>
<?php } ?>



<?php get_footer(); ?>
