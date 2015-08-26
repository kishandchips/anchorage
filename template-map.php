<?php 
/*
	Template Name: Map
*/
?>
<?php get_header(); ?>

<div id="margate-map">

	<?php if(have_posts()): while(have_posts()): the_post(); ?>
		<?php 
			$location = get_field('google_map');
			if( ! empty($location) ):
		?>
		<div id="map-wrapper">
			<img src="<?php echo get_template_directory_uri(); ?>/images/anchorage-02.svg" alt="" class="map-title">
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

		<?php if( have_rows('new_content_row') ): ?>
			<div id="az-content">
			    <?php while ( have_rows('new_content_row') ) : the_row(); ?>
			        <?php if( get_row_layout() == 'row' ): ?>

							<?php if( have_rows('slide') ): ?>
								<div class="owl-carousel" data-loop="false">

								<?php while( have_rows('slide') ): the_row(); 
										$image_id = get_sub_field('image');
									?>

									<li class="slide">
										<div class="content">
											<span class="category"><?php _e(the_sub_field('category'), 'anchorage'); ?></span>
											<h2 class="hero-text"><?php _e(the_sub_field('title'), 'anchorage'); ?></h2>
											<span class="distance"><?php _e(the_sub_field('distance'), 'anchorage'); ?></span>
											<p><?php _e(the_sub_field('description'), 'anchorage'); ?></p>											
										</div>
										<div class="image">
											<?php 
												$image_src = wp_get_attachment_image_src( $image_id, 'full' ); 
											 ?>
											<a class="fancybox-thumb" rel="fancybox-thumb" href="<?php echo $image_src[0]; ?>" title="">
										  		<?php echo wp_get_attachment_image($image_id, 'community-grid'); ?>									
										  		<span class="icon"></span>
										  	</a>
										</div>
									</li>

								<?php endwhile; ?>

								</div>
							<?php endif; ?>		        	


			        <?php endif; ?>
			    <?php endwhile; ?>
		    </div>
		<?php endif; ?>


	<?php endwhile; endif; ?>

</div><!-- #margate-map -->

<?php get_footer(); ?>