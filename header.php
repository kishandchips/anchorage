<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title('-','true','right'); ?><?php bloginfo('name'); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <?php wp_head(); ?>
    </head>
	<body <?php body_class(); ?>>

	<div id="ludacris">
	
		<header id="header">

			<div class="container">
				<div class="logo">
					<a href="<?php bloginfo('home'); ?>" title="<?php the_title(); ?>"></a>	
				</div>
				
				<button id="menu-toggle">
					<i class="icon-menu"></i>
				</button>

				<nav>
					<?php 
						$args = array('theme_location' => 'header_main', 'menu' => '', 'container' => '');
						wp_nav_menu( $args );
					?>
				</nav>			
			</div>

		</header><!-- #header -->

		<main id="main" role="main">