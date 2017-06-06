<?php get_header(); ?>

<?php
	if ( have_posts() )
		the_post();
?>

<?php
// Custom Order
$posts = query_posts($query_string . '&orderby=meta_value&meta_key=wpcf-article-display-date&order=desc&posts_per_page=12');
?>
	
	<div class="featured-img" style="background-image: url('/wp-content/uploads/2017/05/jake-books-1300x616.jpg?1583b');"></div>       
	
	<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
		<div class="wrap">
			<?php if(function_exists('bcn_display'))
			{
				bcn_display();
			}?>
		</div>
	</div>	
	
	<div role="main" class="primary-content type-archive article-archive">
		<div class="wrap">
			<div class="article-filters">
				<a href="<?php echo add_query_arg(array('sortby' => 'title'), '/insights/'); ?>">A-Z</a>
				<a href="/insights/">Date</a>
			</div>
			<h1><?= __('Our Insights') ?></h1>
			<div class="search-box">
				<form role="search" method="get" class="search-form" action="<?php echo get_permalink(2214); ?>">
					<label>
						<span class="sr-only">Search for:</span>
						<input type="search" class="search-field" placeholder="Search …" value="" name="swpquery" title="Search for:">
					</label>
					<input type="submit" class="search-submit" value="Go">
				</form>
			</div>
			<p class="article-intro">Duke CE’s article library brings you the latest thinking from our thought leaders in <em>Dialogue</em>, the only truly global journal for managers and leaders.  Access the whole library below, or explore specific topics of <a href="/article-categories/leadership">Leadership</a>, <a href="/article-categories/innovation">Innovation</a>, <a href="/article-categories/strategy">Strategy</a>, <a href="/article-categories/finance">Finance</a> and <a href="/article-categories/leadership">Marketing</a>.</p>
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
				<?php if ( !isset($past_date)) : ?>
					<h2><?php echo $date; ?></h2>
					<div class="article-group">
				<?php elseif ( $past_date != $date && $sortby != 'title') : ?>
					</div>
					<h2><?php echo $date; ?></h2>
					<div class="article-group">
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
				</div> <?php //end the article group div, no matter what ?>
			</div>
			<div class="pagination">
				<?php echo paginate_links(); ?>
			</div>
		</div>
	</div>

<?php get_footer('no-sidebar'); ?>
