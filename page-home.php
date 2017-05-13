<?php
/*
    Template Name: Home Page
*/

    $block_1_title = types_render_field('block-1-title', array('raw' => true));
    $block_1_url = types_render_field('block-1-url', array('raw' => true));
    $block_1_image = types_render_field('block-1-image', array('raw' => true));

    $block_2_title = types_render_field('block-2-title', array('raw' => true));
    $block_2_url = types_render_field('block-2-url', array('raw' => true));
    $block_2_image = types_render_field('block-2-image', array('raw' => true));

    $block_3_title = types_render_field('block-3-title', array('raw' => true));
    $block_3_url = types_render_field('block-3-url', array('raw' => true));
    $block_3_image = types_render_field('block-3-image', array('raw' => true));

    $dialogue_content = types_render_field('dialogue-content', array('raw' => false));
?>

<?php get_header(); ?>

<section class="hero">
    <div class="wrap">
        <div class="value-prop">
            <h1>Leadership for What's Next</h1>
            <p>Duke CE is the premier leadership development institution in the world. We work with our clients to co-create solutions in the context of business challenges to prepare leaders for what’s next...</p>
            <a href="/our-work" class="btn btn-action">Learn More About Our Work</a>
        </div>
    </div>
    <div class="flexslider" aria-role="presentation">
        <?php 
            $args = array(
                'post_type'      => 'hero-slides',
                'posts_per_page' => -1,
                'order'          => 'DESC',
                'orderby'        => 'menu_order'
             );

             $slides = new WP_Query( $args );
             
             if ( $slides->have_posts() ) : 
        ?>
        <ul class="slides">
            <?php while ( $slides->have_posts() ) : $slides->the_post(); ?>
            <li>
                <div style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'hero'); ?>" ></div>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
    </div>
    <div class="overlay"></div>
</section>

<section class="main-content">
    <div class="wrap">
        <div class="features">
            <ul class="stories">
                <li>
                    <a class="title" href="<?php echo $block_1_url; ?>"><?php echo $block_1_title; ?></a>
                    <a class="title-image" href="<?php echo $block_1_url; ?>"><img src="<?php echo $block_1_image; ?>" /></a>
                </li>
                <li>
                    <a class="title" href="<?php echo $block_2_url; ?>"><?php echo $block_2_title; ?></a>
                    <a class="title-image" href="<?php echo $block_2_url; ?>"><img src="<?php echo $block_2_image; ?>" /></a>
                </li>
                <li>
                    <a class="title" href="<?php echo $block_3_url; ?>"><?php echo $block_3_title; ?></a>
                    <a class="title-image" href="<?php echo $block_3_url; ?>"><img src="<?php echo $block_3_image; ?>" /></a>
                </li>
            </ul>
            <div class="dialogue">
                <div class="header">
                    <h2>Duke CE Leadership Insights</h2>
                    <a class="btn" href="<?php echo get_site_url(); ?>/index.php/subscribe">Subscribe</a>
                </div>
                <div class="dialogue-content">
                    <?php echo $dialogue_content; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); // will include footer-no-sidebar.php; ?>
