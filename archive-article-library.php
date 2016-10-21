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
		<div class="article-filters">
			<a href="<?php echo add_query_arg(array('sortby' => 'title'), '/article-library/'); ?>">A-Z</a>
			<a href="/article-library/">Date</a>
		</div>
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
		<p class="article-intro">Duke CE’s article library brings you the latest thinking from our thought leaders in <em>Dialogue</em>.  Access the whole library below, or explore specific topics of <a href="/article-categories/leadership">Leadership</a>, <a href="/article-categories/innovation">Innovation</a>, <a href="/article-categories/strategy">Strategy</a>, <a href="/article-categories/finance">Finance</a> and <a href="/article-categories/leadership">Marketing</a>.</p>
		<div class="article-list">
			<?php

				$sortby = get_query_var('sortby');
				// Rewind Query and Get Items
				rewind_posts();
				while ( have_posts() ) : the_post();

				$month = types_render_field("article-display-date", array("raw"=>false, "format"=>"F"));
				$year = types_render_field("article-display-date", array("raw"=>false, "format"=>"Y"));
				$date = $month . ' ' . $year;
			?>
			<?php if ( $past_date != $date && $sortby != 'title') : ?>
				<h2><?php echo $date; ?></h2>
			<?php endif; ?>

				<article class="library-item">
					<a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail('article'); ?></a>
					<h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php if ( $sortby == 'title') : ?>
						<span class="date"><?php echo $date; ?></span>
					<?php endif; ?>
					<div class="content">
						<?php the_excerpt(); ?>
					</div>
				</article>

				<?php $past_date = $date; ?>
			<?php endwhile; ?>
		</div>
		<div class="pagination">
			<?php echo paginate_links(); ?>
		</div>
	</div>

	<?php get_sidebar(); ?>
</div>

<?php get_footer('no-sidebar'); ?>
