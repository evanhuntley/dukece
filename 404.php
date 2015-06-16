<?php get_header(); ?>

    <div class="wrap">

        <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
            <?php if(function_exists('bcn_display'))
            {
                bcn_display();
            }?>
        </div>

        <article role="main" class="primary-content type-page" id="post-<?php the_ID(); ?>">
            <h1>Oops! Something went wrong...</h1>
            <p>We weren't able to locate the page you're looking for.  Try navigating to our home page for more info.</p>
        </article>
        <?php get_sidebar(); ?>
    </div>

<?php get_footer( 'no-sidebar' ); // will include footer-no-sidebar.php; ?>
