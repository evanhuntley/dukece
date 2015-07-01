<?php ?>
<!DOCTYPE html>
<html>
<head>
<title><?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
		bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
	?>
</title>
<meta name="description" content="<?php if ( is_single() ) {
	single_post_title('', true);
	} else {
	bloginfo('name'); echo " - "; bloginfo('description');
	}
?>" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=1024">
<meta http-equiv="ClearType" content="true" />

<!-- The little things -->
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php echo bloginfo('template_directory'); ?>/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo bloginfo('template_directory'); ?>/apple-touch-icon-precomposed.png"/>
<!-- The little things -->

<!--[if lt IE 9]>
    <script src="<?php bloginfo( 'template_directory' ); ?>/assets/scripts/html5shiv.js"></script>
<![endif]-->

<!-- Stylesheets -->
	<link href='//fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/assets/css/style.css" />
<!-- Stylesheets -->

<?php wp_head(); ?>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-5274267-1', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body <?php body_class(); ?> id="top">
    <header role="banner">
		<div class="header-top <?php if ( !is_front_page() ) { echo 'wrap'; } ?>">
        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo">
			<?php if ( !is_front_page() ) : ?>
				<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/l_duke-ce-extended.png" alt="<?php bloginfo( 'name' ); ?>" />
			<?php else : ?>
				<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/l_duke-ce.png" alt="<?php bloginfo( 'name' ); ?>" />
			<?php endif; ?>
			</a>
			<?php get_search_form(); ?>
			<ul class="utility-nav">
				<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
				<li><a href="<?php echo get_site_url(); ?>/index.php/contact">Contact</a></li>
				<li><a href="<?php echo get_site_url(); ?>/index.php/news-and-media">News and Media</a></li>
			</ul>
		</div>
        <nav role="navigation">
			<?php if ( !is_front_page() ) : ?>
			<div class="wrap">
			<?php endif; ?>
            <?php
                $args = array(
					'menu' => 'Main Navigation',
                    'container' => 'false',
                    'items_wrap' => '<ul class="main-menu">%3$s</ul>',
                );
                wp_nav_menu($args);
            ?>
			<?php if ( !is_front_page() ) : ?>
			</div>
			<?php endif; ?>
        </nav>

		<?php if ( is_front_page() ) : ?>
			<div class="flexslider">
				<ul class="slides">
					<li>
						<div style="background-image: url('<?php echo bloginfo('template_directory'); ?>/assets/img/bg_climbers.jpg');" ></div>
					</li>
					<li>
						<div style="background-image: url('<?php echo bloginfo('template_directory'); ?>/assets/img/bg_pencil.jpg');"></div>
					</li>
					<li>
						<div style="background-image: url('<?php echo bloginfo('template_directory'); ?>/assets/img/bg_americas-cup-2.jpg');"></div>
					</li>
				</ul>
			</div>
			<div class="headline">
				Leadership for What's Next
			</div>
		<?php endif; ?>
    </header>
