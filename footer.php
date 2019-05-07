
<?php 
	if ( !is_page('subscribe') && !is_page('digital') ) {
		get_sidebar();
	}
?>

<footer role="contentinfo">
	<div class="wrap">
		<div class="social">
			<ul>
				<li>
					<a href="https://www.linkedin.com/companies/20660">
						<svg class="icon">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/svg/sprite.svg#linkedin"></use>
						</svg>           
					</a>
				</li>
				<li>
					<a href="http://www.facebook.com/pages/Duke-Corporate-Education/135647923775">
						<svg class="icon">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/svg/sprite.svg#facebook"></use>
						</svg>           
					</a>
				</li>
				<li>
					<a href="https://twitter.com/DukeCE">
						<svg class="icon">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/svg/sprite.svg#twitter"></use>
						</svg>           
					</a>
				</li>
				<li>
					<a href="https://instagram.com/dukecorporateeducation/">
						<svg class="icon">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/svg/sprite.svg#instagram"></use>
						</svg>           
					</a>
				</li>
				<li>
					<a href="https://www.youtube.com/user/DukeCorpEd">
						<svg class="icon">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/svg/sprite.svg#youtube"></use>
						</svg>           
					</a>
				</li>
				<li>
					<a href="<?php echo get_site_url(); ?>/contact">
						<svg class="icon">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/svg/sprite.svg#mail"></use>
						</svg>           
					</a>
				</li>
			</ul>
		</div>
		<nav role="navigation">
			<?php
				$args = array(
					'menu' => 'Footer',
					'container' => false,
					'items_wrap' => '<ul class="footer-menu">%3$s</ul>',
				);
				wp_nav_menu($args);
			?>
		</nav>
		<div class="footer-logo">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/l_duke-ce-long.svg" />
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

<script src="<?php echo bloginfo('template_directory'); ?>/assets/js/scripts.min.js"></script>

</body>
</html>
