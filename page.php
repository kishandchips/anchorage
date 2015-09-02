<?php get_header(); ?>

	<div id="page">

		<div class="container">
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>

					<div class="row">
						
<!-- 						<div id="page-menu" class="col-1-3">
							<header>
								<h1><?php the_title(); ?></h1>
							</header>
							<?php 
								$args = array('theme_location' => 'pages_menu', 'menu' => '', 'container' => '');
								wp_nav_menu( $args );
							?>	
						</div> -->

						<div id="page-content" class="col-2-3">
							<header>
								<h1><?php the_title(); ?></h1>
							</header>
							<div class="inner">
								<?php the_content(); ?>
							</div>
						</div><!-- #page-content -->

					</div><!-- .row -->

				<?php endwhile; ?>
			<?php endif; ?>
		</div><!-- .container -->

	</div><!-- #page -->

<?php get_footer(); ?>