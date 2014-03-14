<?php get_header(); ?>

	<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

		<div id="frontpage-info">
	      <div class="page-title responsive-title">
	        <h1><?php bloginfo('name'); ?></h1>
	      </div>
	      <div class="page-subtitle responsive-subtitle">
	        <h4><?php bloginfo('description'); ?></h4>
	      </div>
	    </div>
	      <div class="homepage-nav">
	      	<?php // WP NAV Block
				$args = array(
					'menu' => 'front-page-menu',
					'echo' => false
					);
				echo strip_tags(wp_nav_menu( $args ), '<a>');
			?>
	      </div>
	    <div class="about-me">
	    	<?php the_content(); ?>
	    </div>
        

	<?php endwhile; else: ?>

		<p>There are no posts or pages here.</p>
	
	<?php endif; ?>

<?php include('footer2.php'); ?>
