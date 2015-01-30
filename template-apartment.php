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

		<div class="intro section yellow">
			<div class="container">
				<div class="left-wrapper">
					<h2 class="section-heading"><?php the_field('intro_headline'); ?></h2>
					<div class="intro-text">
						<?php the_field('intro_text'); ?>
					</div>				
				</div>				
			</div>
		</div><!-- .intro section -->

		<div class="information section off-white">

			<div class="container">
				<div class="left-wrapper">
					<div class="section-row">
						<h2 class="section-heading"><?php _e('General Information', 'anchorage'); ?></h2>
						
						<?php if(have_rows('list')): ?>
						<div class="section-content">

							<?php while(have_rows('list')): the_row(); ?>
							<h4 class="section-subheading"><?php the_sub_field('heading'); ?></h4>

								<?php if(have_rows('list_item')): ?>
									<ul class="box-list">
										<?php while(have_rows('list_item')): the_row(); ?>
										<li>
											<div class="inner">
												<!-- <img src="<?php echo $image['url']; ?>" alt=""> -->
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
				</div><!-- .left-wrapper -->
			</div><!-- container -->
			
		</div><!-- .information-section -->

		<div class="review section">
			
		</div><!-- .review section -->

		<div class="host section">
			
		</div><!-- .host section -->

		<div class="map">
			
		</div><!-- .map -->

	</div><!-- #apartment -->

<?php get_footer(); ?>