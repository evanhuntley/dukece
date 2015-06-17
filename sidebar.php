<aside role="complementary" class="secondary-content">
<?php if ( get_post_type() == 'page' ) {

    $menu = get_post_meta( get_the_ID(), 'meta-box-dropdown', true );
    if ( $menu && ($menu != '-- None --') ) {
        echo '<nav class="subnav">';
        if ( $menu == '-- Inherit --') {
            $parent_id = wp_get_post_parent_id( $post_ID );
            $new_menu = get_post_meta( $parent_id, 'meta-box-dropdown', true );
            wp_nav_menu( array('menu' => $new_menu, 'container' => ''));
        } else {
            wp_nav_menu( array('menu' => $menu, 'container' => ''));
        }
        echo '</nav>';
    }
?>

<div class="cta widget">
    <h3>Get More Information</h3>
    <a class="btn" href="#">Download Duke CE Brochure</a>
    <a class="btn btn-action" href="#">Get in Touch</a>
</div>


<?php } else { ?>
    <?php dynamic_sidebar('sidebar-1'); ?>
<?php } ?>
</aside>
