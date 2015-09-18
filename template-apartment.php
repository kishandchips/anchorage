<?php 
/*
	Template Name: Apartment
*/
?>
<?php get_header(); ?>

	<div id="apartment">
		<?php $images = get_field('images'); ?>
		<?php if($images): ?>
			<header id="sliderke" class="owl-carousel" data-loop="true" data-nav="true" data-autoplay="true">

				<?php foreach ($images as $image): ?>
					<?php 
						$img_src = $image['url'];
						$image_size = array('width' => 1680, 'height' => 850);
						$image = bfi_thumb($img_src, $image_size);
					 ?>
				<div class="slide">
					<a href="<?php echo $img_src; ?>" class="fancybox-thumb" rel="fancybox-thumb">
						<img src="<?php echo $image; ?>" alt=""> 
						<span class="icon"></span>
					</a>
				</div>
				<?php endforeach; ?>

			</header><!-- #hero -->
		<?php endif; ?>

		<div class="intro section yellow">
		
			<div class="container">
				<div class="left-wrapper">

					<h2 class="section-heading"><?php the_field('intro_headline'); ?></h2>
					<div class="intro-text">
						<?php the_field('intro_text'); ?>
					</div>				
				</div><!-- .left-wrapper -->
				<div class="right-wrapper">
					<div class="request">
						<span><?php the_field('request_price'); ?></span>
						<a href="#request-a-book" class="btn fancybox"><?php _e('Request a booking'); ?></a>
					</div>
				</div>
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

					<div class="section-row host section">
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
<!-- 				<div class="sticky-wrapper">
					<div id="sticky-request" class="request">
						<span><?php the_field('request_price'); ?></span>
						<a href="#request-a-book" class="btn fancybox"><?php _e('Request a booking'); ?></a>
					</div>				
				</div>
 -->			</div><!-- container -->
			
		</div><!-- .information-section -->


		<div id="margate-map">

			<?php 
				$args = array (
					'page_id' => '10'
				);

				$query = new WP_Query( $args );
			 ?>

			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<?php 
					$location = get_field('google_map');
					if( ! empty($location) ):
				?>
				<div id="map-wrapper">
					<div class="map-title">
						<h3><?php _e('Margate'); ?></h3>
						<p>The Anchorage is only a few minutes walk away from the sea and amenities.</p>
						<a class="button-outline" href="<?php the_permalink(10); ?>">See our A-Z</a>
					</div>
					<div id="map" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</div><!-- #map-wrapper -->

				<?php if( have_rows('google_markers') ): ?>
					<div id="locations">
						<ul id="markers">
						<?php while ( have_rows('google_markers') ) : the_row(); ?>
							<?php $location = get_sub_field('location'); ?>

							<li class="marker match-block-container" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>" data-icon="<?php the_sub_field('marker_image'); ?>">
								<div class="content-wrap match-block-1-2">
									<div class="inner">
										<h4><?php the_sub_field('title'); ?></h4>
										<?php the_sub_field('description'); ?>								
									</div>
									<div class="popup">
										<div class="pupup-inner">
											<?php the_sub_field('popup_content'); ?>								
										</div>
									</div>
								</div>
								<div class="image match-block-1-2">
									<img src="<?php the_sub_field('image'); ?>" alt="">
								</div>
							</li>

						<?php endwhile; ?>
						</ul>				
					</div><!-- #locations -->
				<?php endif; ?>

				<?php endif; ?>

			<?php endwhile; ?>

		</div><!-- #margate-map -->

	</div><!-- #apartment -->

<?php get_footer(); ?>