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

<!-- Scripts -->
<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/libs/jquery-1.11.3.min.js"><\/script>')</script>

	<?php wp_footer(); ?>	

    <script src="<?php echo bloginfo('template_directory'); ?>/assets/scripts/scripts.min.js"></script>

<!-- Scripts -->

<?php if ( is_singular() ) wp_print_scripts( 'comment-reply' ); ?>
</body>
</html>
