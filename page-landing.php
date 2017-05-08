<?php
/*
    Template Name: Landing Page
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php if ( has_post_thumbnail() ) { 
            $url = get_the_post_thumbnail_url($post->ID, 'full-banner');
        } ?>
        <div class="featured-img" style="background-image: url('<?= $url; ?>');"></div>        

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
                <?php
                
                $args = array(
                    'post_type'      => 'page',
                    'posts_per_page' => -1,
                    'post_parent'    => $post->ID,
                    'order'          => 'ASC',
                    'orderby'        => 'menu_order'
                 );

                $children = new WP_Query( $args );

                if ( $children->have_posts() ) : ?>

                    <?php while ( $children->have_posts() ) : $children->the_post(); ?>

                        <div class="highlight">
                            <?php if ( has_post_thumbnail() ) { 
                                $url = get_the_post_thumbnail_url($post->ID, 'highlight');
                            } ?>
                            <img src="<?= $url; ?>" alt="<?php the_title(); ?>" />
                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                            <div class="description">
                                <?php echo types_render_field("short-description", array("raw" => true)); ?>
                            </div>
                        </div>

                    <?php endwhile; ?>

                <?php endif; wp_reset_query(); ?>     
            </div>
        </section>    
<?php endwhile; ?>
<?php get_footer( 'no-sidebar' ); // will include footer-no-sidebar.php; ?>
