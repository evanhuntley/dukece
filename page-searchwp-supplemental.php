<?php
/* Template Name: SearchWP Supplemental Search Results */

global $post;
// retrieve our search query if applicable
$query = isset( $_REQUEST['swpquery'] ) ? sanitize_text_field( $_REQUEST['swpquery'] ) : '';
// retrieve our pagination if applicable
$swppg = isset( $_REQUEST['swppg'] ) ? absint( $_REQUEST['swppg'] ) : 1;
if ( class_exists( 'SWP_Query' ) ) {
	$engine = 'article_library_search'; // taken from the SearchWP settings screen
	$swp_query = new SWP_Query(
		// see all args at https://searchwp.com/docs/swp_query/
		array(
			's'      => $query,
			'engine' => $engine,
			'page'   => $swppg,
		)
	);
	// set up pagination
	$pagination = paginate_links( array(
		'format'  => '?swppg=%#%',
		'current' => $swppg,
		'total'   => $swp_query->max_num_pages,
	) );
}
get_header(); ?>
<div class="wrap">

    <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
    </div>
    <div role="main" class="primary-content type-archive searchwp-results">
		<header class="page-header">
			<h1 class="page-title">
				<?php if ( ! empty( $query ) ) : ?>
					<?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), $query ); ?>
				<?php else : ?>
					Article Library Search
				<?php endif; ?>
			</h1>

			<!-- begin search form -->
			<div class="search-box">
				<form role="search" method="get" class="search-form" action="<?php echo esc_html( get_permalink() ); ?>">
					<label>
						<span class="sr-only">Search for:</span>
						<input type="search" class="search-field" placeholder="Search …" value="" name="swpquery" title="Search for:">
						<input type="submit" class="search-submit" value="Search">
					</label>
				</form>
			</div>
			<!-- end search form -->

		</header><!-- .page-header -->

		<?php if ( ! empty( $query ) && isset( $swp_query ) && ! empty( $swp_query->posts ) ) : ?>
            <div class="article-list">
		        <?php foreach ( $swp_query->posts as $post ) {
				setup_postdata( $post );
				// output the result
				?>
                    <article class="library-item">
                        <a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail('article'); ?></a>
                        <h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="content">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
				<?php
			} ?>
            </div>

			<?php wp_reset_postdata();
			// pagination
			if ( $swp_query->max_num_pages > 1 ) { ?>
				<div class="navigation pagination" role="navigation">
					<h2 class="screen-reader-text">Posts navigation</h2>
					<div class="nav-links">
						<?php echo wp_kses_post( $pagination ); ?>
					</div>
				</div>
			<?php } ?>
        <?php else : ?>
			<p>Your search did not return any results.</p>
		<?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer();
