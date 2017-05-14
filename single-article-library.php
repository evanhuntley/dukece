<?php get_header(); ?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
		<div class="featured-img" style="background-image: url('/wp-content/uploads/2017/05/jake-books-1300x616.jpg?1583b');"></div>       
		
        <article role="main" class="primary-content type-post" id="post-<?php the_ID(); ?>">
			<div class="wrap">
            <header>
				<?php
					$month = types_render_field("article-display-date", array("raw"=>false, "format"=>"F"));
					$year = types_render_field("article-display-date", array("raw"=>false, "format"=>"Y"));
				?>
                <h1><?php the_title(); ?></h1>
				<div class="entry-meta">
	            	<?php echo $month . ' ' . $year . ' - '; ?>
					<?php echo types_render_field('article-author'); ?>
	            </div>
            </header>

			<?php the_post_thumbnail('content-feature');?>

			<?php the_content(); ?>

			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>

            <?php endwhile; // end of the loop. ?>
			</div>
        </article>

<?php get_footer(); ?>
