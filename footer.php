<?php if ( !is_front_page() ) : ?>
	<div class="sub-footer">
		<div class="wrap">
		<ul class="links">
			<li><a href="<?php echo get_site_url(); ?>/index.php/privacy">Privacy</a></li>
			<li><a href="<?php echo get_site_url(); ?>/index.php/terms-of-use">Terms of Use</a></li>
			<li><a href="<?php echo get_site_url(); ?>/index.php/feedback">Feedback</a></li>
		</ul>
		<p>Duke Corporate Education provides learning and development services around the globe to help large organizations address real-world business challenges.</p>
		</div>
	</div>
<?php endif; ?>
<footer role="contentinfo">
	<div class="wrap">
		<div class="footer-logo">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/l_duke-white.png" />
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

<!-- Scripts -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo bloginfo('template_directory'); ?>/assets/scripts/jquery-2.0.3.min.js"%3E%3C/script%3E'))</script>

    <script src="<?php echo bloginfo('template_directory'); ?>/assets/scripts/scripts.min.js"></script>

<!-- Scripts -->

<?php if ( is_singular() ) wp_print_scripts( 'comment-reply' ); ?>
</body>
</html>
