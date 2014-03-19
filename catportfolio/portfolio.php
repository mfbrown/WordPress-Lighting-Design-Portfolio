<?php get_header(); 

	/*

		Template Name: Portfolio Page

	*/

?>

	
	<div class="row">
		<div class="responsive-title">
			<h1 class="subpage-indent"><?php echo $post->post_title; ?></h1>
		</div>
	<?php // a variation on the WP loop that looks for a custom post type instead. 

		$args = array(		//array accepted by WP_Query function
			'post_type' => 'portfolio' //custom post type - CHANGE TO CUSTOM POST TYPE OF CURRENT PROJECT
		);

		$the_query = new WP_Query( $args ); //WP_Query accepts an array called $args

	?>

	<?php if ( have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>

		
		
	        <div class="small-12 medium-6 columns portfolio-grid">
	          <a href="<?php the_permalink(); ?>">
	          	<div class="show-thumbnail">
		          	<img src="<?php the_field('thumbnail_for_portfolio'); ?>">
		            <div class="show-caption">
		              <p><?php the_field('show_title'); ?></p>
	            	</div>
	          </div></a>
	        </div>
	    

	<?php endwhile; else: ?>

		<p>There are no posts or pages here.</p>
	
	<?php endif; ?>

		</div>

<?php get_footer(); ?>