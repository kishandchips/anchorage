<?php get_header(); ?>

	<div id="home">

		<header id="hero" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>)">
			<div class="valign">
				<h2 class="hero-text">
					<?php _e(the_field('hero_headline'), 'anchorage'); ?>
					<span><?php _e(the_field('hero_tagline'), 'anchorage'); ?></span>
				</h2>
			</div>
		</header><!-- #hero -->

		<div class="booking-bar">
			<div class="container">
				
			</div>
		</div><!-- .booking-bar -->

		<div class="home-items">
			<div class="container">
				<div class="row">
					
					<?php if(have_rows('home_items')): while(have_rows('home_items')): the_row(); ?>
						<?php $link = get_sub_field('link'); ?>
						<?php $post = $link; ?>
						<?php setup_postdata($post); ?>
						<?php $bg_image = get_sub_field('image'); ?>
						<?php $overlay_image = get_sub_field('overlay_image'); ?>
						
						<div class="col-1-3">
							<a href="<?php the_permalink(); ?>">
								<div class="inner" style="background-color: <?php the_sub_field('overlay_colour'); ?>">
									<figure style="background-image:url(<?php echo $bg_image['sizes']['home-square']; ?>);"></figure>

									<div class="overlay">
										<div class="valign">
											<img src="<?php echo $overlay_image['url']; ?>" alt="">
										</div>
										<span><?php the_sub_field('text'); ?></span>
									</div>
								</div>
							</a>
						</div>
						<?php wp_reset_postdata(); ?>
					<?php endwhile; endif; ?>

				</div>
			</div>
		</div><!-- .home-links -->

	</div><!-- #home -->

<?php get_footer(); ?>