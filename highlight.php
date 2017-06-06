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
