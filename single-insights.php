<?php get_header(); ?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
		<div class="featured-img" style="background-image: url('/wp-content/uploads/2017/05/jake-books-1300x616.jpg?4a58a');"></div>       
		
		<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
			<div class="wrap">
				<?php if(function_exists('bcn_display'))
				{
					bcn_display();
				}?>
			</div>
		</div>
		
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
			
			<div class="content">
				<?php the_content(); ?>
			</div>

			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>

            <?php endwhile; // end of the loop. ?>
			</div>
        </article>

<?php get_footer(); ?>
