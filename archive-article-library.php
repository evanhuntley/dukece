<?php get_header(); ?>

<?php
	if ( have_posts() )
		the_post();
?>

<?php
// Custom Order
$posts = query_posts($query_string . '&orderby=meta_value&meta_key=wpcf-article-display-date&order=desc&posts_per_page=12');
?>

<div class="wrap">

	<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
		<?php if(function_exists('bcn_display'))
		{
			bcn_display();
		}?>
	</div>

	<div role="main" class="primary-content type-archive article-archive">
		<h1><?= __('Article Library') ?></h1>
		<div class="search-box">
			<form role="search" method="get" class="search-form" action="<?php echo get_permalink(2214); ?>">
				<label>
					<span class="sr-only">Search for:</span>
					<input type="search" class="search-field" placeholder="Search …" value="" name="swpquery" title="Search for:">
				</label>
				<input type="submit" class="search-submit" value="Search">
			</form>
		</div>
		<p class="article-intro">Access original and practical business insight from Duke CE thought leaders in Dialogue, with focus on <a href="/article-categories/leadership">Leadership</a>, <a href="/article-categories/innovation">Innovation</a>, <a href="/article-categories/strategy">Strategy</a>, <a href="/article-categories/finance">Finance</a> and <a href="/article-categories/leadership">Marketing</a>.</p>
		<div class="article-list">
			<?php
				// Rewind Query and Get Items
				rewind_posts();
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
		<div class="pagination">
			<?php echo paginate_links(); ?>
		</div>
	</div>

	<?php get_sidebar(); ?>
</div>

<?php get_footer('no-sidebar'); ?>
