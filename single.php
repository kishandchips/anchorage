<?php get_header(); ?>

	<div id="single">

		<header class="hero" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>)">
		</header><!-- .hero -->

		<?php if(have_posts()): ?>
			<?php while(have_posts()): the_post(); ?>

				<article id="article" class="container">
					<header class="article-header">
						<h1>
							<?php the_title(); ?>
						</h1>
					</header><!-- .article-header -->
					<section class="article-content">
						<?php the_content(); ?>
					</section>
				</article>

				<?php
					$categories = get_the_category($post->ID);
					if ($categories) {
						$category_ids = array();

						foreach($categories as $category){
							$category_ids[] = $category->term_id;	
						} 

					$args=array(
					'category__in' => $category_ids,
					// 'post__not_in' => array($post->ID),
					'posts_per_page' => 2, // Number of related posts that will be displayed.
					);

					$related = new wp_query( $args );
				?>
							
				<?php if($related->have_posts()):  ?>
			
						<section id="related">
							<?php while($related->have_posts()): $related->the_post(); ?>
								<?php $category = get_the_category(); ?>
								<?php $image= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) ); ?>

								<article>
									<div class="related-image" style="background-image:url(<?php echo $image[0]; ?>)">
									</div>

									<div class="article-inner">
										<div class="related-category">
											<?php echo $category[0]->name; ?>
										</div>
										<h4 class="related-title">
											<?php the_title(); ?>
										</h4>
										<div class="related-excerpt">
											<?php the_excerpt(); ?>
										</div>	
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="button secondary"> Read More</a>								
									</div>
								</article>

							<?php endwhile; ?>

						</section><!-- #related -->

				<?php endif; ?>

			<?php } ?>
			<?php wp_reset_query();  ?>

			<?php endwhile; ?>
		<?php endif; ?>

	</div><!-- #community -->

<?php get_footer(); ?>