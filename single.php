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
				<div class="entry-meta">
	            	<p><time datetime="<?php the_time('l, F jS, Y') ?>" pubdate><?php the_time('l, F jS, Y') ?></time> | <?php echo get_the_author(); ?></p>
	            </div>
            </header>

			<?php the_post_thumbnail('content-feature');?>

			<?php the_content(); ?>

			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>

			<?php comments_template( '', true ); ?>

            <?php endwhile; // end of the loop. ?>
        </article>
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>
