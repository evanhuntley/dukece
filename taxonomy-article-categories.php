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
	<div role="main" class="primary-content type-archive article-archive taxonomy-archive">
		<?php $slug = '/article-categories/' . $wp_query->queried_object->slug . '/'; ?>
		<div class="article-filters">
			<a href="<?php echo add_query_arg(array('sortby' => 'title'), $slug ); ?>">A-Z</a>
			<a href="<?php echo $slug; ?>">Date</a>
		</div>
		<h1><?php echo __('Article Library') . ': ' . $wp_query->queried_object->name; ?></h1>
		<div class="search-box">
			<form role="search" method="get" class="search-form" action="<?php echo get_permalink(2214); ?>">
				<label>
					<span class="sr-only">Search for:</span>
					<input type="search" class="search-field" placeholder="Search …" value="" name="swpquery" title="Search for:">
				</label>
				<input type="submit" class="search-submit" value="Search">
			</form>
		</div>
		<?php rewind_posts();
		if ( have_posts() ) : ?>
		<div class="article-list">
			<?php
				$sortby = get_query_var('sortby');
				// Rewind Query and Get Items
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
