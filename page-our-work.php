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
                
                <?php
                    $duke_terms = get_terms('work-type');
                    
                    $sort_items = array();
                    
                    // Loop through terms and build our array
                    foreach ( $duke_terms as $term ) {
                     // Custom field
                     $term_display_position = get_term_meta($term->term_id, 'wpcf-term-display-order');
                     $sort_val = $term_display_position[0];
                     // Set the array indices based on that custom value
                     $sort_items[$sort_val] = $term;
                    }
                    
                    // Sort the items based on the display order value
                    ksort( $sort_items, SORT_NUMERIC );
                    
                    // Loop through the items and output the blocks
                    foreach($sort_items as $sort_val => $duke_term) :
                        wp_reset_query();
                        $args = array(
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'work-type',
                                    'field' => 'slug',
                                    'terms' => $duke_term->slug,
                                ),
                            ),
                         );

                         $items = new WP_Query($args);
                         if ($items->have_posts()) :              
                ?>
                         
                         <section class="highlights">
                             <div class="wrap">
                                 <h2 class="section-header"><?= $duke_term->name ?></h2>
                                 
                                 <?php 
                                    while($items->have_posts()) : $items->the_post();
                                        get_template_part('highlight'); 
                                    endwhile;
                                ?>
                                
                            </div>
                        </section>
                        <?php endif; ?>
                    <?php endforeach; ?>

        <section class="bottom-content">
            <div class="wrap">
                <?= types_render_field("bottom-content"); ?>
            </div>
        </section>
<?php endwhile; ?>
<?php get_footer( 'no-sidebar' ); // will include footer-no-sidebar.php; ?>
