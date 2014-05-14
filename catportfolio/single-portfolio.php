<!-- THIS PAGE IS CREATED FROM WORK.PHP 
	 IT MUST BE NAMED AS single-custompostype.php-->

<?php get_header(); ?> 


	<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

		<div class="row subpage-indent">
			<div class="portfolio-title">
				<h1><?php the_title(); ?></h1>
				<h3><?php the_field('show_theatre'); ?></h3>
				<p><?php the_field('show_date'); ?></p>
			</div>
			<div class="small-6 columns show-details" id="left">
				<p>Director: <?php the_field('show_director'); ?></p>
				<?php if (get_field('scenic_designer')) { ?>
					<p>Set Designer: <?php the_field('scenic_designer'); ?></p>
				<?php } ?>

				<?php if (get_field('costume_designer')) { ?>
					<p>Costume Designer: <?php the_field('costume_designer'); ?></p>
				<?php } ?>
				
			</div>
			<div class="small-6 columns show-details">
				<?php if (get_field('sound_designer')) { ?>
					<p>Sound Designer: <?php the_field('sound_designer'); ?></p>
				<?php } ?>

				<?php if (get_field('projection_designer')) { ?>
					<p>Projection Designer: <?php the_field('projection_designer'); ?></p>
				<?php } ?>		
			</div>
		</div>
		<div class="row">
			<hr>
		</div>
		
		<div class="row"> 
			<?php the_field( 'show_pictures' ); ?>
		</div>

		<div class="row portfolio-bottom">
			<hr>
			<?php if (get_field('photographer')) { ?>
				<p>Photos by: <?php the_field('photographer'); ?></p>
			<?php } ?>
		</div>

		

	<?php endwhile; else: ?>

		<p>There are no posts or pages here.</p>
	
	<?php endif; ?>

<?php get_footer(); ?>