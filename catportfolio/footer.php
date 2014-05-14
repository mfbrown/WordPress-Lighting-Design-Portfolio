	    </main>

	    <footer>
	      <div class="row">
	      	<div class="small-12 columns footer-center">
	      		<?php // WP NAV Block
				$args = array(
					'theme_location' => 'Footer-Menu',
					'menu' => 'Footer-Menu',
					'container' => 'false',
					'container_class' => 'menu-wrap',
					'menu_class' => 'footer-menu',
					'menu_id' => ''
					);
				wp_nav_menu( $args ); ?>
	      	</div>


	        <div class="small-12 medium-4 columns left-footer">
		        <p>Contact Catherine:<br>
		        <a href="mailto:catherine_girardi@yahoo.com">catherine_girardi@yahoo.com</a></p>
	        </div>
	        <div class="medium-4 columns footer-center show-for-medium-up">
	      		<p>Catherine Girardi Lighting Design<br>
	      		&copy; <?php echo date('Y') ?>.</p>
	      	</div>
	        <div class="small-12 medium-4 columns right-footer">
	          	<p>Site designed and built by: <a href="http://www.mfbrowndesign.com">Michael Brown</a><br>
	            Powered by Wordpress</p>
	        </div>
	        <div class="small-12 columns footer-center show-for-small-only">
	      		<p>Catherine Girardi Lighting Design<br>
	      		&copy; <?php echo date('Y') ?>.</p>
	      	</div>
	      </div>
	    </footer>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>