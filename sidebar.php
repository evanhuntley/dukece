<?php if( is_active_sidebar('sidebar-1') ) { ?>
<aside role="complementary" class="secondary-content">

    <?php
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

    <div class="feature-img">
    <?php
        if ( has_post_thumbnail() ) {
        	the_post_thumbnail( 'sidebar-feature' );
        }
    ?>
    </div>
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside>
<?php } ?>
