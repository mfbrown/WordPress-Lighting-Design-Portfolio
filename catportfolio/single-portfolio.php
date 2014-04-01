<!-- THIS PAGE IS CREATED FROM WORK.PHP 
	 IT MUST BE NAMED AS single-custompostype.php-->

<?php get_header(); ?> 


	<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

		<div class="row subpage-indent">
			<div class="responsive-subtitle">
				<h2><?php the_title(); ?></h2>
				<h4><?php the_field('show_theatre'); ?></h4>
			</div>
			<div class="small-12 medium-6 columns show-details">
				
				<p>Director: <?php the_field('show_director'); ?></p>
			</div>
			<div class="small-12 medium-6 columns">
				<p>""</p>
			</div>
			<hr>
		</div>
		<?php the_field( 'show_pictures' ); ?>
		

	<?php endwhile; else: ?>

		<p>There are no posts or pages here.</p>
	
	<?php endif; ?>

<?php get_footer(); ?>