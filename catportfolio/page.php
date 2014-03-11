<?php get_header(); ?>

	<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

		
		<div class="row">
	    	<div class="small-12 columns resume" id="page-title">
	    		<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div>
		</div>

	<?php endwhile; else: ?>

		<p>There are no posts or pages here.</p>
	
	<?php endif; ?>

<?php get_footer(); ?>