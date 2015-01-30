	</main><!-- #main -->

	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="right col-1-2">
					<h4><h4><?php _e("Get in touch", 'anchorage'); ?></h4></h4>
					<div class="form">
						<?php echo do_shortcode('[gravityform id=1 title=false description=true ajax=true ]' ); ?>	
					</div>
				</div>
				<nav class="col-1-2">
					<h4><?php _e("Useful Links", 'anchorage'); ?></h4>
					<?php 
						$args = array('theme_location' => 'footer_main', 'menu' => '', 'container' => '');
						wp_nav_menu( $args );
					?>
				</nav>			
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

<?php wp_footer(); ?>
</body>
</html>