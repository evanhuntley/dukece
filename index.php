<?php get_header(); ?>
	<div class="wrap">
		<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
			<?php if(function_exists('bcn_display'))
			{
				bcn_display();
			}?>
		</div>
		<?php get_template_part( 'loop', 'index' ); ?>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
