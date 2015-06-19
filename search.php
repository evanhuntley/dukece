<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
    <div class="wrap">
        <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
			<?php if(function_exists('bcn_display'))
			{
				bcn_display();
			}?>
		</div>
        <?php get_template_part( 'loop', 'search' ); ?>
		<?php else : ?>
            <h1 class="entry-title"><?php _e( 'Nothing Found' ); ?></h1>
            <article class="entry-content">
                <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.' ); ?></p>
                <?php /*?><?php get_search_form(); ?><?php */?>
            </article><!-- .entry-content -->
        <?php endif; ?>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); // will include footer-no-sidebar.php; ?>
