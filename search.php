<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
    <div class="featured-img" style="background-image: url('/wp-content/uploads/2017/05/jake-books-1300x616.jpg?1583b');"></div>       
        <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
            <div class="wrap">
			<?php if(function_exists('bcn_display'))
			{
				bcn_display();
			}?>
            </div>
		</div>
        <article class="entry-content">
            <div class="wrap">        
        <?php get_template_part( 'loop', 'search' ); ?>
		<?php else : ?>
            <h1 class="entry-title"><?php _e( 'Nothing Found' ); ?></h1>
            <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.' ); ?></p>
            <?php /*?><?php get_search_form(); ?><?php */?>
        <?php endif; ?>
    </div>
</article><!-- .entry-content -->
<?php get_footer(); // will include footer-no-sidebar.php; ?>
