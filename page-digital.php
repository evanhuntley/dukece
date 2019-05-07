<?php
/*
    Template Name: Digital
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php if ( has_post_thumbnail() ) { 
            $url = get_the_post_thumbnail_url($post->ID, 'full-banner');
        } ?>
        <div class="featured-img"></div>       

        <section>
            <div class="wrap">
                <h1>Featured Courses</h1>
                <?php 
                    $args = array(
                        'post_type'      => 'courses',
                        'posts_per_page' => -1
                    );
                    $courses = new WP_Query( $args );
                
                    if ( $courses->have_posts() ) : ?>
                        <?php while ( $courses->have_posts() ) : $courses->the_post(); ?>
                            <article class="course">
        						<a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail('article'); ?></a>
        						<h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
        						<div class="content">
        							<?php the_excerpt(); ?>
        						</div>
        					</article>
                        <?php endwhile; wp_reset_query(); ?>
                <?php endif; ?>          
            </div>
        </section>
        
        <section>
            <div class="wrap">
                <h1>Why Duke Corporate Education</h1>
            </div>
        </section>
        
        <section>
            <div class="wrap">
                <h1>Webinars</h1>
                <?php 
                    $args = array(
                        'post_type'      => 'webinars',
                        'posts_per_page' => -1
                    );
                    $webinars = new WP_Query( $args );
                
                    if ( $webinars->have_posts() ) : ?>
                        <?php while ( $webinars->have_posts() ) : $webinars->the_post(); ?>
                            <article class="course">
        						<a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail('article'); ?></a>
        						<h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
        						<div class="content">
        							<?php the_excerpt(); ?>
        						</div>
        					</article>
                        <?php endwhile; wp_reset_query(); ?>
                <?php endif; ?>    
            </div>
        </section>
        
        <section>
            <div class="wrap">
                <h1>Insights</h1>
                <?php 
                    $args = array(
                        'post_type'      => 'insights',
                        'posts_per_page' => 5
                    );
                    $insights = new WP_Query( $args );
                
                    if ( $insights->have_posts() ) : ?>
                        <?php while ( $insights->have_posts() ) : $insights->the_post(); ?>
                            <article class="library-item">
        						<a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail('article'); ?></a>
        						<h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
        						<div class="content">
        							<?php the_excerpt(); ?>
        						</div>
        					</article>
                        <?php endwhile; wp_reset_query(); ?>
                <?php endif; ?>                
            </div>
        </section>
        
        <section>
            <div class="wrap">
            </div>
        </section>
        
<?php endwhile; ?>
<?php get_footer( 'no-sidebar' ); // will include footer-no-sidebar.php; ?>
