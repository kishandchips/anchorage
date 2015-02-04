<?php get_header(); ?>
<?php
	$page_id = get_queried_object_id();
?>
	<div id="community">

		<header class="hero" style="background-image: url(<?php the_field('hero_background', $page_id) ?>)">
			<div class="valign">
				<img src="<?php the_field('hero_image', $page_id) ?>">
				<p><?php the_field('hero_text',$page_id); ?></p>
			</div>
		</header><!-- .hero -->

		<?php if(have_posts()): ?>
			<div class="article-list">

			<?php while(have_posts()): the_post(); ?>
				
				<article>
					
					<div class="content-wrap">

							<div class="article-content">
									<div class="article-category">
										<?php
										$category = get_the_category(); 
										echo $category[0]->cat_name;
										?>
									</div>
									
									<h2 class="article-title">
										<?php the_title(); ?>
									</h2>

									<div class="article-excerpt">
										<?php the_excerpt(); ?>
									</div>
									<a href="<?php the_permalink(); ?>" class="button secondary">Read More</a>
							</div>

					</div><!-- .container -->
					<div class="article-image"  style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>)">
					</div>

				</article>

			<?php endwhile; ?>

			</div><!-- .article-list -->
		<?php endif; ?>

	</div><!-- #community -->

<?php get_footer(); ?>