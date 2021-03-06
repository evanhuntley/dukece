<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<section class="hero">
    <div class="wrap">
        <div class="value-prop">
            <h1><?= types_render_field("hero-title", array("raw" => true)); ?></h1>
            <p><?= types_render_field("hero-text", array("raw" => true)); ?></p>
            <a href="<?= types_render_field("hero-button-url", array("raw" => true)); ?>" class="btn btn-action"><?= types_render_field("hero-button-label", array("raw" => true)); ?></a>
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
                        <div style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'hero'); ?>');" ></div>
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
            $video_title = types_render_field("home-video-title", array("raw" => true));
            $video_desc = types_render_field("home-video-description", array("raw" => true));
            $video_img = types_render_field("home-video-image", array("size" => 'highlight'));
            $video_url = types_render_field("home-video-url", array("raw" => true));
            
            $more_videos = types_render_field("home-videos-url", array("raw" => true));
        ?>
        
        <div class="offerings">
            <h2>Leadership Offerings</h2>
            <?php 
            $args = array(
                'post_type'      => 'home-features',
                'posts_per_page' => 3,
                'order'          => 'DESC',
                'orderby'        => 'menu_order',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'feature-type',
                        'field'    => 'slug',
                        'terms'    => 'home-offering',
                    ),
                )
            );

            $offerings = new WP_Query( $args );

            while ( $offerings->have_posts() ) : $offerings->the_post(); 
            ?>
            <article class="offerings-item">
                <a href="<?= types_render_field('insights-url', array('raw' => true)); ?>">
                    <?php the_post_thumbnail('offering'); ?>
                </a>
                <h1><a href="<?= types_render_field('insights-url', array('raw' => true)); ?>"><?php the_title(); ?></a></h1>
                <div class="abstract">
                    <?= types_render_field("insights-short-text"); ?>
                </div>
            </article>
            <?php endwhile; wp_reset_query(); ?>
            <a class="offerings-more" href="/our-work">More Offerings</a><a class="offerings-more" href="/our-experience">Read More Client Stories</a>
        </div>
        
        <div class="insights">
            <div class="header">
                <h2>Leadership Insights</h2>
                <a class="btn btn-alt" href="<?php echo get_site_url(); ?>/index.php/subscribe">Subscribe</a>
            </div>
            <div class="insights-content">
                <?php 
                $args = array(
                    'post_type'      => 'home-features',
                    'posts_per_page' => 5,
                    'order'          => 'DESC',
                    'orderby'        => 'menu_order',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'feature-type',
                            'field'    => 'slug',
                            'terms'    => 'home-insight',
                        ),
                    )
                );
                
                $insights = new WP_Query( $args );
                
                while ( $insights->have_posts() ) : $insights->the_post(); 
                ?>
                <article class="insights-item">
                    <a href="<?= types_render_field('insights-url', array('raw' => true)); ?>">
                        <?php the_post_thumbnail('big-thumb'); ?>
                    </a>
                    <h1><a href="<?= types_render_field('insights-url', array('raw' => true)); ?>"><?php the_title(); ?></a></h1>
                    <div class="abstract">
                        <?= types_render_field("insights-short-text"); ?>
                    </div>
                </article>
            <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
    
    <div class="video">
        <div class="video-img">
            <a data-lity href="<?php echo $video_url; ?>">
                <?= $video_img; ?>  
                <svg class="icon">
                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/svg/sprite.svg#play"></use>
                </svg>     
            </a>
        </div>
        <h2><?= $video_title; ?></h2>
        <p><?= $video_desc; ?></p>
        <a class="btn btn-action" href="<?= $more_videos; ?>">Learn More About Who We Are</a>
    </div>
    
</div>
</section>

<section class="global">
    <div class="wrap">
        <h1>Global Insight and Impact</h1>
        <div class="figures">
            <div class="number">80 +<span>Countries Delivered</span></div>
            <div class="number">1500 +<span>Global Educators</span></div>
            <div class="number">8000 +<span>Programs Completed</span></div>
            <div class="number">250,000 +<span>Leaders Engaged</span></div>
        </div>
        <p>Ranked among the top 3 in custom executive education globally for 18 consecutive years by the <em>Financial Times</em></p>
        <img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/g_map.png" alt="Duke CE Global Impact Map" />
        <div class="locations">
            <div class="region">North America</div>
            <div class="office">
                <h3>San Diego, CA</h3>
                <address>
                    8910 University Center Lane<br>
                    Suite 1100<br>
                    San Diego CA 92122 USA<br>
                </address>
                <a target="_blank" class="btn" href="https://www.google.com/maps/place/5650+El+Camino+Real+%23250,+Carlsbad,+CA+92008/">Directions</a>
                <h3>Durham, NC</h3>
                <address>310 Blackwell Street<br>
                    Durham, NC 27701 USA<br>
                </address>
                <a target="_blank" class="btn" href="https://www.google.com/maps/place/310+Blackwell+St,+Durham,+NC+27701/">Directions</a>
            </div>
            <div class="region">Europe</div>
            <div class="office">
                <h3>London UK</h3>
                <address>
                    2nd Floor<br>
                    10 Fetter Lane<br>
                    London EC4A 1BR , UK<br>
                </address>
                <a target="_blank" class="btn" href="https://www.google.com/maps/place/165+Fleet+St,+London+EC4A+2AE,+UK/">Directions</a>
            </div>
            <div class="region">Asia</div>
            <div class="office">
                <h3>Ahmedabad, India</h3>
                <address>
                    607, Shivalik High Street<br />
                    B/H Keshav Bagh, 132 Feet ring road<br />
                    Vastrapur<br />
                    Ahmedabad 380 015
                </address>
                <a target="_blank" class="btn" href="https://www.google.com/maps/place/132+Feet+Ring+Rd,+Ahmedabad,+Gujarat,+India/">Directions</a>
                <h3>Singapore</h3>
                <address>
                    72 Anson Road<br />
                    Unit #05-01 Anson House<br />
                    Singapore 079911
                </address>
                <a target="_blank" class="btn" href="https://www.google.com/maps/place/72+Anson+Rd,+Singapore+079911/">Directions</a>
            </div>
            <div class="region">Africa</div>
            <div class="office">
                <h3>Johannesburg, South Africa</h3>
                <address>
                    The Campus<br />
                    Ground Floor Eden Gardens Building<br />
                    57 Sloane Street<br />
                    Bryanston<br />
                    Gauteng 2191
                </address>
                <a target="_blank" class="btn" href="https://www.google.com/maps/place/Gabba+Building,+The+Campus/@-26.0410491,28.0238458,21z/data=!4m13!1m7!3m6!1s0x1e9573f74ebcbfbd:0xc1f755b6ea59697d!2sThe+Gabba+Building,+57+Sloane+St,+Bryanston,+Sandton,+2191,+South+Africa!3b1!8m2!3d-26.041175!4d28.024047!3m4!1s0x0:0xc02d1061b54186a8!8m2!3d-26.0408755!4d28.0240437">Directions</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
