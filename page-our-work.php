<?php
/*
    Template Name: Our Work
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php if ( has_post_thumbnail() ) { 
            $url = get_the_post_thumbnail_url($post->ID, 'full-banner');
        } ?>
        <div class="featured-img"></div>       
        
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
                <?php if ( is_front_page() ) { ?>
                    <h1><?php the_title(); ?></h1>
                <?php } else { ?>
                    <h1><?php the_title(); ?></h1>
                <?php } ?>

                <?php the_content(); ?>
                
            </div>
        </article>
        
        <section class="highlights">
            <div class="wrap">
                <h2 class="section-header">Leadership Development in Your Context</h2>
                <?php
                
                $used = [];
                
                $args = array(
                    'post_type'      => 'page',
                    'posts_per_page' => 3,
                    'post_parent'    => $post->ID,
                    'order'          => 'ASC',
                    'orderby'        => 'menu_order'
                 );

                $children = new WP_Query( $args );

                if ( $children->have_posts() ) : ?>

                    <?php while ( $children->have_posts() ) : $children->the_post(); ?>

                        <?php 
                            get_template_part('highlight'); 
                            array_push($used, $post->ID);
                        ?>

                    <?php endwhile; ?>

                <?php endif; wp_reset_query(); ?>     
            </div>
        </section>
        
        <section class="highlights">
            <div class="wrap">
                <h2 class="section-header">Focused Offerings</h2>
                <?php
                
                $args = array(
                    'post_type'      => 'page',
                    'posts_per_page' => 6,
                    'post__not_in'  => $used,
                    'post_parent'    => $post->ID,
                    'order'          => 'ASC',
                    'orderby'        => 'menu_order'
                 );

                $children = new WP_Query( $args );

                if ( $children->have_posts() ) : ?>

                    <?php while ( $children->have_posts() ) : $children->the_post(); ?>

                        <?php 
                            get_template_part('highlight'); 
                            array_push($used, $post->ID);
                        ?>

                    <?php endwhile; ?>

                <?php endif; wp_reset_query(); ?>     
            </div>
        </section>
        
        <section class="highlights">
            <div class="wrap">
                <h2 class="section-header">Advisory Services</h2>
                <?php
                
                $args = array(
                    'post_type'      => 'page',
                    'posts_per_page' => -1,
                    'post__not_in'  => $used,
                    'post_parent'    => $post->ID,
                    'order'          => 'ASC',
                    'orderby'        => 'menu_order'
                 );

                $children = new WP_Query( $args );

                if ( $children->have_posts() ) : ?>

                    <?php while ( $children->have_posts() ) : $children->the_post(); ?>

                        <?php 
                            get_template_part('highlight'); 
                        ?>

                    <?php endwhile; ?>

                <?php endif; wp_reset_query(); ?>     
            </div>
        </section>

        <section class="bottom-content">
            <div class="wrap">
                <?= types_render_field("bottom-content"); ?>
            </div>
        </section>
<?php endwhile; ?>
<?php get_footer( 'no-sidebar' ); // will include footer-no-sidebar.php; ?>
