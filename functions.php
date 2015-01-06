<?php

// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'your-theme', TEMPLATEPATH . '/languages' );
 
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
 require_once($locale_file);
 
// Get the page number
function get_page_number() {
    if ( get_query_var('paged') ) {
        print ' | ' . __( 'Page ' , 'your-theme') . get_query_var('paged');
    }
} // end get_page_number

add_theme_support( 'nav-menus' );

register_nav_menu('main', 'Main Navigation Menu');


/** Tell WordPress to run yourtheme_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'yourtheme_setup' );

if ( ! function_exists('yourtheme_setup') ):
/**
* @uses add_custom_image_header() To add support for a custom header.
* @uses register_default_headers() To register the default custom header images provided with the theme.
*
* @since 3.0.0
*/
function yourtheme_setup() {

// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );

// Your changeable header business starts here
define( 'HEADER_TEXTCOLOR', '' );
// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
define( 'HEADER_IMAGE', '%s/keet-images/headers/MichiganClouds-by-DanielJMcKeown-May2010.jpg' );

// The height and width of your custom header. You can hook into the theme's own filters to change these values.
// Add a filter to yourtheme_header_image_width and yourtheme_header_image_height to change these values.
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'yourtheme_header_image_width', 940 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'yourtheme_header_image_height', 198 ) );

// We'll be using post thumbnails for custom header images on posts and pages.
// We want them to be 940 pixels wide by 198 pixels tall (larger images will be auto-cropped to fit).
set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

// Don't support text inside the header image.
define( 'NO_HEADER_TEXT', true );

// Add a way for the custom header to be styled in the admin panel that controls
// custom headers. See yourtheme_admin_header_style(), below.
add_custom_image_header( '', 'yourtheme_admin_header_style' );

// … and thus ends the changeable header business.

// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
register_default_headers( array (
'berries' => array (
'url' => '%s/keet-images/headers/VanNess-SF-CA-byDanielJMcKeown-2008.jpg',
'thumbnail_url' => '%s/keet-images/thumbnails/thumbnail--VanNess-SF-CA-byDanielJMcKeown-2008.jpg',
'description' => __( 'VanNess', 'yourtheme' )
),
'cherryblossom' => array (
'url' => '%s/keet-images/headers/cropped-Sparty-and-Belle-on-the-curtain-rod-by-DanielJMcKeown-2010.jpg',
'thumbnail_url' => '%s/keet-images/thumbnails/thumbnail--cropped-Sparty-and-Belle-on-the-curtain-rod-by-DanielJMcKeown-2010.jpg',
'description' => __( 'Parakeets', 'yourtheme' )
),
'concave' => array (
'url' => '%s/keet-images/headers/flame-by-Jessica-McKeown--May2010.jpg',
'thumbnail_url' => '%s/keet-images/thumbnails/thumbnail--flame-by-Jessica-McKeown--May2010.jpg',
'description' => __( 'Flame', 'yourtheme' )
),
'fern' => array (
'url' => '%s/keet-images/headers/MichiganClouds-by-DanielJMcKeown-May2010.jpg',
'thumbnail_url' => '%s/keet-images/thumbnails/thumbnail--MichiganClouds-by-DanielJMcKeown-May2010.jpg',
'description' => __( 'MichiganClouds', 'yourtheme' )
),
'forestfloor' => array (
'url' => '%s/keet-images/headers/InfieldGrass-2010-byDanielJMcKeown.jpg',
'thumbnail_url' => '%s/keet-images/thumbnails/thumbnail--InfieldGrass-2010-byDanielJMcKeown.jpg',
'description' => __( 'InfieldGrass', 'yourtheme' )
),
'inkwell' => array (
'url' => '%s/keet-images/headers/Hana-rock--2009-by-DanielJMcKeown.jpg',
'thumbnail_url' => '%s/keet-images/thumbnails/thumbnail--Hana-rock--2009-by-DanielJMcKeown.jpg',
'description' => __( 'HanaRock', 'yourtheme' )
),
'path' => array (
'url' => '%s/keet-images/headers/SantaBarbara--2007-by-DanielJMcKeown.jpg',
'thumbnail_url' => '%s/keet-images/thumbnails/thumbnail--SantaBarbara--2007-by-DanielJMcKeown.jpg',
'description' => __( 'SantaBarbara', 'yourtheme' )
),
'sunset' => array (
'url' => '%s/keet-images/headers/Chicago-skyline-2008-by-DanielJMcKeown.jpg',
'thumbnail_url' => '%s/keet-images/thumbnails/thumbnail--Chicago-skyline-2008-by-DanielJMcKeown.jpg',
'description' => __( 'ChicagoSkyline', 'yourtheme' )
)
) );
}
endif;

if ( ! function_exists( 'yourtheme_admin_header_style' ) ) :
/**
* Styles the header image displayed on the Appearance > Header admin panel.
*
* Referenced via add_custom_image_header() in yourtheme_setup().
*
* @since 3.0.0
*/
function yourtheme_admin_header_style() {
?>
<style type="text/css">
#headimg {
height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}
#headimg h1, #headimg #desc {
display: none;
}
</style>
<?php
}
endif;






// Register widgetized areas
function theme_widgets_init() {
 // Area 1
 register_sidebar( array (
 'name' => 'Right Widget Area',
 'id' => 'right_widget_area',
 'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
 'after_widget' => "</li>",
 'before_title' => '<h3 class="widget-title">',
 'after_title' => '</h3>',
  ) );
 

 // Area 2
 register_sidebar( array (
 'name' => 'Left Widget Area',
 'id' => 'left_widget_area',
 'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
 'after_widget' => "</li>",
 'before_title' => '<h3 class="widget-title">',
 'after_title' => '</h3>',
  ) );

} // end theme_widgets_init
 
add_action( 'init', 'theme_widgets_init' );


// Check for static widgets in widget-ready areas
function is_sidebar_active( $index ){
  global $wp_registered_sidebars;
 
  $widgetcolums = wp_get_sidebars_widgets();
   
  if ($widgetcolums[$index]) return true;
 
 return false;
} // end is_sidebar_active



// Custom callback to list comments in the your-theme style
function custom_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
 $GLOBALS['comment_depth'] = $depth;
  ?>
   <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
    <div class="comment-author vcard"><?php commenter_link() ?></div>
    <div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'your-theme'),
       get_comment_date(),
       get_comment_time(),
       '#comment-' . get_comment_ID() );
       edit_comment_link(__('Edit', 'your-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
  <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'your-theme') ?>
          <div class="comment-content">
        <?php comment_text() ?>
    </div>
  <?php // echo the comment reply link
   if($args['type'] == 'all' || get_comment_type() == 'comment') :
    comment_reply_link(array_merge($args, array(
     'reply_text' => __('Reply','your-theme'),
     'login_text' => __('Log in to reply.','your-theme'),
     'depth' => $depth,
     'before' => '<div class="comment-reply-link">',
     'after' => '</div>'
    )));
   endif;
  ?>
<?php } // end custom_comments


// Custom callback to list pings
function custom_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
        ?>
      <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
       <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'your-theme'),
         get_comment_author_link(),
         get_comment_date(),
         get_comment_time() );
         edit_comment_link(__('Edit', 'your-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'your-theme') ?>
            <div class="comment-content">
       <?php comment_text() ?>
   </div>
<?php } // end custom_pings


// Produces an avatar image with the hCard-compliant photo class
function commenter_link() {
 $commenter = get_comment_author_link();
 if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
  $commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
 } else {
  $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
 }
 $avatar_email = get_comment_author_email();
 $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
 echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
} // end commenter_link


?>
