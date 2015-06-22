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

<!-- Stylesheets -->
<link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/assets/css/style.css" />
<!-- Stylesheets -->

	<?php wp_deregister_script('jquery');wp_head(); ?>
</head>

<body <?php body_class(); ?> id="top">
    <header role="banner">
		<div class="header-top <?php if ( !is_front_page() ) { echo 'wrap'; } ?>">
        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo"><?php bloginfo( 'name' ); ?></a>
			<?php get_search_form(); ?>
			<ul class="utility-nav">
				<li><a href="/">Home</a></li>
				<li><a href="/contact">Contact</a></li>
				<li><a href="/news-and-media">News and Media</a></li>
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
				</ul>
			</div>
			<div class="headline">
				Leadership for What's Next
			</div>
		<?php endif; ?>
    </header>
