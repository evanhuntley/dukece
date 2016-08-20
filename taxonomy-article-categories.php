<?php get_header(); ?>

<?php
	if ( have_posts() )
		the_post();
?>

<div class="wrap">

	<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
		<?php if(function_exists('bcn_display'))
		{
			bcn_display();
		}?>
	</div>

	<div role="main" class="primary-content type-archive">
		<h1><?php echo __('Article Library') . ': ' . $wp_query->queried_object->name; ?></h1>
		<?php rewind_posts();
		if ( have_posts() ) : ?>
		<div class="article-list">
			<?php
				// Rewind Query and Get Items
				while ( have_posts() ) : the_post(); ?>

					<article class="library-item">
						<a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail('article'); ?></a>
						<h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="content">
							<?php the_excerpt(); ?>
						</div>
					</article>

			<?php endwhile; ?>
		</div>
		<?php else : ?>
			<p>Sorry, there are no articles available in this category.</p>
		<?php endif; ?>
		<div class="pagination">
			<?php echo paginate_links(); ?>
		</div>
	</div>

	<?php get_sidebar(); ?>
</div>

<?php get_footer('no-sidebar'); ?>
