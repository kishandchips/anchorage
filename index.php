<?php get_header(); ?>

	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
			<i class="icon-arrow"></i>
			<i class="icon-arrow-down"></i>
			<i class="icon-circle-left"></i>
		<?php endwhile; ?>
	<?php else: ?>

	<?php endif; ?>

<?php get_footer(); ?>