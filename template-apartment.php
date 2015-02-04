<?php 
/*
	Template Name: Apartment
*/
?>
<?php get_header(); ?>

	<div id="apartment">
		<?php $images = get_field('images'); ?>
		<?php if($images): ?>
			<header id="slider">

				<?php foreach ($images as $image): ?>
				<div class="slide">
					<figure style="background-image:url(<?php echo $image['sizes']['slider']; ?>)">
						<img src="<?php echo $image['sizes']['slider']; ?>" alt=""> 
					</figure>
				</div>
				<?php endforeach; ?>

			</header><!-- #hero -->
		<?php endif; ?>

		<div id="booking-bar">
			<div class="floater-wrap">
				<div class="booking-form">
					
				</div>
			</div>
			
			<div class="container">
				<div class="booking-form">
					
				</div>
			</div>
		</div><!-- #booking-bar -->

		<div class="intro section yellow">

			<div class="container">
				<div class="left-wrapper">

					<h2 class="section-heading"><?php the_field('intro_headline'); ?></h2>
					<div class="intro-text">
						<?php the_field('intro_text'); ?>
					</div>				
				</div><!-- .left-wrapper -->
			</div><!-- .container -->

		</div><!-- .intro section -->

		<div class="information section off-white">

			<div class="container">
				<div class="left-wrapper">

					<div class="section-row">
						<h2 class="section-heading"><?php _e('General Information', 'anchorage'); ?></h2>
						
						<?php if(have_rows('list')): ?>
						<div class="section-content">

							<?php while(have_rows('list')): the_row(); ?>
							<h3 class="section-subheading"><?php the_sub_field('heading'); ?></h3>

								<?php if(have_rows('list_item')): ?>
									<ul class="box-list">
										<?php while(have_rows('list_item')): the_row(); ?>
										<li>
											<div class="inner">
												<img src="<?php the_sub_field('image'); ?>" alt="">
											</div>
											
											<p><?php the_sub_field('text'); ?></p>
										</li>
										<?php endwhile; ?>
									</ul>
								<?php endif; ?>

							<?php endwhile; ?>
							
						</div>	
						<?php endif; ?>

					</div><!-- .section-row -->

					<div class="section-row">
						<h2 class="section-heading"><?php _e('Description', 'anchorage'); ?></h2>
						
						<div class="section-content hide-more">
							<?php the_field('description_text'); ?>
						</div>

						<div class="text-right">
							<button class="show-more">
								Read More
							</button>							
						</div>

						<div class="rules section-content">
							<h3 class="section-subheading"><?php _e('House Rules', 'anchorage'); ?></h3>
							<?php the_field('house_rules'); ?>
						</div>

					</div><!-- .section-row -->

				</div><!-- .left-wrapper -->
			</div><!-- container -->
			
		</div><!-- .information-section -->

		<?php $reviews = new WP_Query( array('post_type' => 'reviews') ); ?>
		<?php if($reviews->have_posts()): ?>

			<div class="review section yellow">
				
				<div class="container">
					<div class="left-wrapper">

						<div class="section-row">
							<h2 class="section-heading"><?php _e('Reviews', 'anchorage'); ?></h2>
							
							<div class="section-content review-list">
							<?php while($reviews->have_posts()) : $reviews->the_post(); ?>
								<article>
									<div class="article-image">
										<?php the_post_thumbnail(); ?>
									</div>
									<div class="article-content">
										<span class="review-name">
											<?php the_title(); ?>
										</span>
										<div class="review-text">
											<?php the_content(); ?>
										</div>
										<p class="review-date">
											<?php the_time('F Y'); ?>
										</p>										
									</div>
								</article>
							<?php endwhile; ?>
							</div>
						</div><!-- .section-row -->

					</div><!-- .left-wrapper -->
				</div><!-- .container -->

			</div><!-- .review section -->

		<?php endif; ?>
		<?php wp_reset_query(); ?>

		<div class="host section off-white">

				<div class="container">
					<div class="left-wrapper">

						<div class="section-row">
							<h2 class="section-heading"><?php _e('About the Hosts', 'anchorage'); ?></h2>

								<div class="row">
									<div class="col-2-5">
										<img src="<?php the_field('hosts_image'); ?>"> 
									</div>
									<div class="col-3-5">
										<?php the_field('hosts_text'); ?>
									</div>									
								</div>

						</div><!-- .section-row -->

					</div><!-- .left-wrapper -->
				</div><!-- .container -->

		</div><!-- .host section -->

		<div class="map">
			
		</div><!-- .map -->

	</div><!-- #apartment -->

<?php get_footer(); ?>