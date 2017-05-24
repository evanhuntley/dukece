<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="featured-img" style="background-image: url('/wp-content/uploads/2017/05/IMG_6978_ret-1440x788.jpg');"></div>        

        <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
            <div class="wrap">
                <?php if(function_exists('bcn_display'))
                {
                    bcn_display();
                }?>
            </div>
        </div>

        <article role="main" class="primary-content type-page" id="post-<?php the_ID(); ?>">
            <div class="wrap">
                <h1><?php the_title(); ?></h1>

            <?php the_content(); ?>

            <?php endwhile; ?>
            </div>
        </article>

<?php get_footer(); ?>
