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
						<div class="match-block-1-2">
							<div class="inner">
								<h4><?php the_sub_field('title'); ?></h4>
								<?php the_sub_field('description'); ?>								
							</div>
						</div>
						<div class="match-block-1-2">
							<img src="<?php the_sub_field('image'); ?>" alt="">
						</div>
					</li>

				<?php endwhile; ?>
				</ul>				
			</div><!-- #locations -->
		<?php endif; ?>

		<?php endif; ?>

	<?php endwhile; endif; ?>

</div><!-- #margate-map -->

<?php get_footer(); ?>