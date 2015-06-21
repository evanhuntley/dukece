<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="wrap">

        <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
            <?php if(function_exists('bcn_display'))
            {
                bcn_display();
            }?>
        </div>

        <article role="main" class="primary-content type-page" id="post-<?php the_ID(); ?>">
            <?php if ( is_front_page() ) { ?>
                <h1><?php the_title(); ?></h1>
            <?php } else { ?>
                <h1><?php the_title(); ?></h1>
            <?php } ?>

            <div class="feature-img">
            <?php
                if ( has_post_thumbnail() ) {
                	the_post_thumbnail( 'content-feature' );
                }
            ?>
            </div>

            <?php the_content(); ?>

            <?php edit_post_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>

            <?php endwhile; ?>
        </article>

        <?php get_sidebar(); ?>
    </div>

<?php get_footer( 'no-sidebar' ); // will include footer-no-sidebar.php; ?>
