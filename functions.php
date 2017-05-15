<?php

function load_jquery() {

    // only use this method is we're not in wp-admin
    if ( ! is_admin() ) {

        // deregister the original version of jQuery
        wp_deregister_script('jquery');

        // register it again, this time with no file path
        wp_register_script('jquery', '', FALSE, '1.11.3');

        // add it back into the queue
        wp_enqueue_script('jquery');

    }

}

add_action('template_redirect', 'load_jquery');

add_theme_support( 'menus' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
        'id'            => 'sidebar-1',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
));

add_post_type_support('page', 'excerpt');

function post_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">

			<p class="comment-meta">
				<?php printf( __( '%s' ), sprintf( '%s', get_comment_author_link() ) ); ?>

                <a class="comment-date" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                    <?php printf( __( '%1$s' ), get_comment_date() ); ?>
                </a>

                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
                <?php endif; ?>
            </p>
		</div>

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div>

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>

	<li class="post pingback">
		<p><?php _e( 'Pingback:' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)' ), ' ' ); ?></p>
	<?php

		break;
	endswitch;
}

// Custom functions

// Tidy up the <head> a little. Full reference of things you can show/remove is here: http://rjpargeter.com/2009/09/removing-wordpress-wp_head-elements/
remove_action('wp_head', 'wp_generator');// Removes the WordPress version as a layer of simple security

add_theme_support('post-thumbnails');

// REMOVE EXTRANEOUS CLASSES FROM WORDPRESS MENUS - siteart.co.uk/remove-extraneous-classes-from-wordpress-menus
function custom_wp_nav_menu($var) {
        return is_array($var) ? array_intersect($var, array(
                // List of useful classes to keep
                'current_page_item',
                'current_page_parent',
                'current_page_ancestor',
				'menu-item-has-children'
                )
        ) : '';
}
add_filter('nav_menu_css_class', 'custom_wp_nav_menu');
add_filter('nav_menu_item_id', 'custom_wp_nav_menu');
add_filter('page_css_class', 'custom_wp_nav_menu');

// REPLACE "current_page_" WITH CLASS "active"
function current_to_active($text){
        $replace = array(
                // List of classes to replace with "active"
                'current_page_item' => 'active',
                'current_page_parent' => 'active',
                'current_page_ancestor' => 'active',
        );
        $text = str_replace(array_keys($replace), $replace, $text);
                return $text;
        }
add_filter ('wp_nav_menu','current_to_active');


add_action( 'after_setup_theme', 'duke_theme_setup' );
function duke_theme_setup() {
  add_image_size( 'full-banner', 1440, 788, true ); // (cropped)    
  add_image_size( 'hero', 1300, 616, true ); // (cropped)    
  add_image_size( 'big-thumb', 400, 400, true ); // (cropped)    
  add_image_size( 'highlight', 650, 357, true ); // (cropped)    
  add_image_size( 'article', 400, 250, true ); // (cropped)
}

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

add_filter("gform_init_scripts_footer", "init_scripts");
function init_scripts() {
    return true;
}

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '[...] <a class="moretag" href="'. get_permalink($post->ID) . '">Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 18;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


/**
 * Toolset Types and ACF Pro output a legacy version of select2 on
 * SearchWP's settings screen which in turn breaks it. This fixes that.
 */
function my_handle_unwanted_legacy_select2() {
	if ( ! did_action( 'searchwp_settings_init' ) ) {
		return;
	}
	wp_dequeue_style( 'select2' );
	wp_deregister_style( 'select2' );
	wp_dequeue_script( 'select2');
	wp_deregister_script('select2');
}
add_action( 'init', 'my_handle_unwanted_legacy_select2', 999 );


// Custom Query Vars
function custom_query_vars_filter($vars) {
  $vars[] = 'sortby';
  return $vars;
}
add_filter( 'query_vars', 'custom_query_vars_filter' );


add_action('pre_get_posts','eh_alter_query');
function eh_alter_query($query){

      if( $query->is_archive() ){
        $sortby = get_query_var('sortby');

        if ( $sortby ) {
            $query->set('order', 'ASC');
            $query->set('orderby', $sortby);
        }
      }
}

/**  
 *
 * Background Image from Post Image
 * @since  1.0.0
 * Credits: TwentyFifteen WordPress theme adjacent pagination
 *
 */
function dukece_responsive_mobile_first_background_images() {

    global $post;

    if ( ! has_post_thumbnail( $post->ID ) ) return; //exit if there is no featured image

    $theme_handle = 'custom-style';     //the theme handle used for the main style.css file
    $property     = '.featured-img'; //the property
    $css          = '';

    //small image
    $small_img   = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'highlight' );
    $small_style = '
            ' . $property . ' { background-image: url(' . esc_url( $small_img[0] ) . '); }
            ';
    $css .= $small_style;

    //large image
    $large_img   = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full-banner' );
    $large_style = '
            ' . $property . ' {  background-image: url(' . esc_url( $large_img[0] ) . '); }
            ';
    $css .= '@media (min-width: 1000px) { '. $large_style . ' }';

    //minify            
    $css = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css );

    //add it
    echo '<style>' . $css . '</style>';

}
add_action( 'wp_head', 'dukece_responsive_mobile_first_background_images', 99 );

?>
