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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="ClearType" content="true" />
<meta http-equiv="X-UA-Compatible" content="edge" />

<!-- The little things -->
	<link rel="dns-prefetch" href="//www.dukece.com">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php echo bloginfo('template_directory'); ?>/favicon.ico?v=2">
	<link rel="apple-touch-icon" href="<?php echo bloginfo('template_directory'); ?>/apple-touch-icon-precomposed.png"/>
<!-- The little things -->

<!-- Stylesheets -->
	<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/assets/css/style.css" />
<!-- Stylesheets -->

<!--[if lt IE 9]>
    <script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/vendor/html5shiv.js"></script>
	<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/vendor/respond.min.js"></script>
<![endif]-->

<?php wp_head(); ?>


<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1788791708098992'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1788791708098992&ev=PageView&noscript=1"
/></noscript>

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

<body <?php body_class(); ?>>
    <header role="banner">
		<div class="wrap">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo">
				<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/l_duke-ce.svg" alt="<?php bloginfo( 'name' ); ?>" />
			</a>
			<button class="nav-toggle"><span></span></button>
			<div class="menu">
				<nav role="navigation">
					<?php
						$args = array(
							'menu' => 'Main',
							'container' => false,
							'items_wrap' => '<ul class="main-menu">%3$s</ul>',
						);
						wp_nav_menu($args);
					?>
				</nav>
				<div class="search">
					<button class="search-toggle">
						<svg class="icon">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/svg/sprite.svg#search"></use>
						</svg>           
					</button>
					<?php get_search_form(); ?>
				</div>
				<a href="/contact-duke-corporate-education/" class="btn btn-action contact">Contact</a>
			</div>
		</div>
	</header>
