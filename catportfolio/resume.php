<?php get_header(); 

	/*

		Template Name: Resume Page

	*/


?>
	
		<div class="row resume-page subpage-indent">
			<div class="responsive-title">
				<h1><?php echo $post->post_title; ?></h1>
			</div>
		</div>

		<?php // a variation on the WP loop that looks for a custom post type instead. 

		$args = array(		//array accepted by WP_Query function
			'post_type' => 'resume' //custom post type - CHANGE TO CUSTOM POST TYPE OF CURRENT PROJECT
		);

		$the_query = new WP_Query( $args ); //WP_Query accepts an array called $args

	?>
			<div class="row subpage-indent">
				<div class="responsive-subtitle">
					<h3>Lighting Designer</h3>
				</div>
				<hr>
			</div>
			<?php if ( have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>

								<?php if (get_field('role') == "Lighting Designer") { ?>
									<div class="row subpage-indent resume-rows">
										<p class="small-4 medium-3 columns"><?php the_field('show_name'); ?></p>
										<p class="small-4 medium-4 columns"><?php the_field('theatre'); ?></p>
										<p class="small-4 medium-4 columns"><?php the_field('director'); ?></p>
										<p class="small-4 medium-1 columns show-for-medium-up"><?php the_field('year'); ?></p>
									</div>		
								<?php } ?>

			<?php endwhile; endif; ?>

			<div class="row subpage-indent">
				<div class="responsive-subtitle">
					<h3>Assistant Lighting Designer</h3>
				</div>
				<hr>
			</div>
			<?php if ( have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>

								<?php if (get_field('role') == "Assistant Lighting Designer") { ?>
								
									<div class="row subpage-indent">
										<p><?php the_field('show_name'); ?></p>
									</div>
								<?php } ?>

			<?php endwhile; endif; ?>






<?php get_footer(); ?>