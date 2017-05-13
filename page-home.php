<?php
/*
    Template Name: Home Page
*/
?>

<?php get_header(); ?>

<section class="hero">
    <div class="wrap">
        <div class="value-prop">
            <h1>Leadership for What's Next</h1>
            <p>Duke Corporate Education is the premier leadership development institution in the world. We work with our clients to co-create solutions in the context of business challenges to prepare leaders for what’s next...</p>
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
            <?php endwhile; wp_reset_query(); ?>
        </ul>
        <?php endif; ?>
    </div>
    <div class="overlay"></div>
</section>

<section class="main-content">
    <div class="wrap">
        
        <?php 
            $story_title = types_render_field("home-story-title", array("raw" => true));
            $story_img = types_render_field("home-story-image", array('size' => 'highlight'));
            $story_abstract = types_render_field("home-story-abstract", array("raw" => true));
            $story_url = types_render_field("home-story-url", array("raw" => true));
            
            $more_stories = types_render_field("home-stories-url", array("raw" => true));
            
            $video_title = types_render_field("home-video-title", array("raw" => true));
            $video_desc = types_render_field("home-video-description", array("raw" => true));
            $video_img = types_render_field("home-video-image", array("size" => 'highlight'));
            $video_url = types_render_field("home-video-url", array("raw" => true));
            
            $more_videos = types_render_field("home-videos-url", array("raw" => true));
        ?>
        
        <div class="stories">
            <h2>Experiences Around the World</h2>
            <article>
                <a href="<?= $story_url; ?>">
                    <?= $story_img; ?>
                </a>
                <h1><a href="<?= $story_url; ?>"><?= $story_title; ?></a></h1>
                <p><?= $story_abstract; ?></p>
            </article>
            <a class="more" href="<?= $more_stories; ?>">More Client Stories</a>
        </div>
        
        <div class="insights">
            <div class="header">
                <h2>Duke CE Leadership Insights</h2>
                <a class="btn btn-action" href="<?php echo get_site_url(); ?>/index.php/subscribe">Subscribe</a>
            </div>
            <div class="insights-content">
                <?php 
                    $args = array(
                        'post_type'      => 'insights',
                        'posts_per_page' => 5,
                        'order'          => 'DESC',
                        'orderby'        => 'menu_order'
                     );

                     $insights = new WP_Query( $args );
                     
                     while ( $insights->have_posts() ) : $insights->the_post(); 
                ?>
                    <article class="insights-item">
                        <?php the_post_thumbnail('big-thumb'); ?>
                        <h1><?php the_title(); ?></h1>
                        <div class="abstract">
                            <?= types_render_field("insights-abstract", array("raw" => true)); ?>
                        </div>
                    </article>
                <?php endwhile; wp_reset_query(); ?>
            </div>
        </div>
        
        <div class="video">
            <h2><?= $video_title; ?></h2>
            <a data-lity href="<?php echo $video_url; ?>"><?= $video_img; ?></a>
            <p><?= $video_desc; ?></p>
            <a class="more" href="<?= $more_videos; ?>">More Videos</a>
        </div>
        
    </div>
</section>

<section class="global">
    <div class="wrap">
        <h1>Global Insight and Impact</h1>
        <p>Ranked among the top 3 in custom executive education globally for 16 consecutive years by Financial Times</p>
    </div>
</section>

<?php get_footer(); // will include footer-no-sidebar.php; ?>
