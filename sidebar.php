<aside role="complementary" class="secondary-content">
    <?php if ( get_post_type() == 'page') {
        $post_ID = $post->ID;
        $menu = get_post_meta( get_the_ID(), 'meta-box-dropdown', true );
        if ( $menu && ($menu != '-- None --') && !is_search() ) {
            echo '<nav class="subnav">';
            if ( $menu == '-- Inherit --') {
                $parent_id = wp_get_post_parent_id( $post_ID );
                $new_menu = get_post_meta( $parent_id, 'meta-box-dropdown', true );

                while ( $new_menu == '-- Inherit --') {
                    $parent_id = wp_get_post_parent_id( $parent_id );
                    $new_menu = get_post_meta( $parent_id, 'meta-box-dropdown', true );
                }

                if ( $new_menu != '-- None --') {
                    wp_nav_menu( array('menu' => $new_menu, 'container' => ''));
                }

            } else {
                wp_nav_menu( array('menu' => $menu, 'container' => ''));
            }
            echo '</nav>';
        }
    ?>

<?php } elseif ( get_post_type() == 'people') {
    echo '<nav class="subnav">';
    wp_nav_menu( array('menu' => 'About Section', 'container' => ''));
    echo '</nav>';
} else { ?>
    <?php dynamic_sidebar('sidebar-1'); ?>
<?php } ?>
    <div class="cta widget">
        <h3>Get More Information</h3>
        <?php
            $sidebar_brochure = ot_get_option("sidebar_brochure");
        ?>
        <a class="btn" href="<?php echo $sidebar_brochure; ?>">Download Duke CE Brochure</a>
        <a class="btn btn-action" href="<?php echo get_site_url(); ?>/index.php/contact">Get in Touch</a>
    </div>
    <div class="dialogue widget">
        <?php
            $dialogue_image = ot_get_option("sidebar_image");
            $dialogue_link = ot_get_option("dialogue_link");
        ?>
        <a href="<?php echo $dialogue_link; ?>"><img src="<?php echo $dialogue_image; ?>" /></a>
        <a href="<?php echo $dialogue_link; ?>">Access <em>Dialogue</em></a>
    </div>
</aside>
