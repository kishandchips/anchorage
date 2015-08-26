<?php get_header(); ?>
<?php
	$page_id = 12;
?>
	<div id="community">

		<div id="slider" class="owl-carousel" data-nav="false">
				<li class="slide">

				  	<img src="<?php the_field('hero_background', $page_id); ?>" alt="">
					<div class="valign">
						<img src="<?php the_field('hero_image', $page_id) ?>">
						<p><?php the_field('hero_text',$page_id); ?></p>
					</div>	

				</li>
		</div>
		<div id="blog-categories">
			<?php 
			    $args = array(
				'show_option_all'    => '',
				'orderby'            => 'name',
				'order'              => 'ASC',
				'style'              => 'list',
				'show_count'         => 0,
				'hide_empty'         => 1,
				'use_desc_for_title' => 1,
				'child_of'           => 0,
				'feed'               => '',
				'feed_type'          => '',
				'feed_image'         => '',
				'exclude'            => '',
				'exclude_tree'       => '',
				'include'            => '',
				'hierarchical'       => 1,
				'title_li'           => __( 'Choose a Category' ),
				'show_option_none'   => __( '' ),
				'number'             => null,
				'echo'               => 1,
				'depth'              => 0,
				'current_category'   => 0,
				'pad_counts'         => 0,
				'taxonomy'           => 'category',
				'walker'             => null
			    );
			    wp_list_categories( $args ); 
			?>
		</div>
		<?php if(have_posts()): ?>
			<div class="article-list">

			<?php while(have_posts()): the_post(); ?>
				
				<article class="match-block-container">
					
					<div class="content-wrap match-block-1-2">

						<div class="inner">
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

					</div><!-- .content-wrap -->

					<div class="article-image match-block-1-2"  style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>)">
					</div>

				</article>

			<?php endwhile; ?>

			</div><!-- .article-list -->
		<?php endif; ?>

	</div><!-- #community -->

<?php get_footer(); ?>