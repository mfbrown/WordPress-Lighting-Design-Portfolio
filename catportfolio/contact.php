<?php get_header(); 

	/*

		Template Name: Contact Page

	*/

?>

	<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

			<div class="row subpage-indent">
				<div class="responsive-title">
		    		<h1><?php the_title(); ?></h1>
		    	</div>	
			</div>

			<div class="row">
				<div class="small-12 medium-6 columns">
					<?php the_field("contact_info"); ?>
				</div>
				<div class="small-12 medium-6 columns">
					<?php the_field("contact_form"); ?>
				</div>
			</div>

	<?php endwhile; else: ?>

		<p>There are no posts or pages here.</p>
	
	<?php endif; ?>

<?php get_footer(); ?>