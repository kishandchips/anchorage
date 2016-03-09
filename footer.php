	</main><!-- #main -->

	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-1-2">
					<h4><h4><?php _e("Get in touch", 'anchorage'); ?></h4></h4>
					<div class="form">
						<?php echo do_shortcode('[gravityform id=1 title=false description=true ajax=true ]' ); ?>	
					</div>
				</div>
				<nav class="col-1-2">
<!-- 					<h4><?php _e("Useful Links", 'anchorage'); ?></h4>
					<?php 
						$args = array('theme_location' => 'footer_main', 'menu' => '', 'container' => '');
						wp_nav_menu( $args );
					?>
 -->				</nav>			
			</div>
		</div>
		<div class="credits">
			<div class="container">
				<span>&copy; <?php echo date("Y"); ?> The Anchorage</span>
				<span>Website by <a href="http://www.kishandchips.co.uk" title="Website by KishandChips" target="_blank">Kish &amp; Chips</a></span>				
			</div>
		</div>
	</footer><!-- #footer -->

</div><!-- #ludacris -->

<div id="request-a-book" class="hide">
	<ul class="request-a-book">
		<li class="airbnb">
			<span>Book with Airbnb</span>
			<a href="<?php the_field('airbnb_listing_url', 'options'); ?>" class="btn" target="_blank">Request a booking</a>
		</li>
		<li class="owners">
			<span>Book with Owners Direct</span>
			<a href="<?php the_field('owners_direct_listing_url', 'options'); ?>" class="btn" target="_blank">Request a booking</a>
		</li>			
	</ul>
</div>	

<?php wp_footer(); ?>
</body>
</html>