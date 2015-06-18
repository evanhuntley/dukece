<?php get_header(); ?>

	<div class="wrap">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
			<?php if(function_exists('bcn_display'))
			{
				bcn_display();
			}?>
		</div>
        <article role="main" class="primary-content type-post" id="post-<?php the_ID(); ?>">
            <header>
                <h1><?php the_title(); ?></h1>
            </header>

			<?php the_post_thumbnail('full');?>

			<?php the_content(); ?>

			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>

            <div class="entry-meta">
            	<p>Posted <strong><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></strong> on <time datetime="<?php the_time('l, F jS, Y') ?>" pubdate><?php the_time('l, F jS, Y') ?></time> &middot; <a href="<?php the_permalink(); ?>">Permalink</a></p>
            </div>

			<?php comments_template( '', true ); ?>

            <?php endwhile; // end of the loop. ?>
        </article>
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>
