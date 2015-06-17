<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
    <div class="wrap">
        <?php get_template_part( 'loop', 'search' ); ?>
		<?php else : ?>
            <h1 class="entry-title"><?php _e( 'Nothing Found' ); ?></h1>
            <article class="entry-content">
                <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.' ); ?></p>
                <?php /*?><?php get_search_form(); ?><?php */?>
            </article><!-- .entry-content -->
        <?php endif; ?>
    </div>
<?php get_footer('no-sidebar'); // will include footer-no-sidebar.php; ?>
