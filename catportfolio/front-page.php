<?php get_header(); ?>

	<p>This is the front-page.php</p>

	<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

		<div id="frontpage-info">
          <div id="page-title">
            <h1><?php bloginfo('name'); ?></h1>
          </div>
          <div id="page-subtitle">
            <h4><?php bloginfo('description'); ?></h4>
          </div>
        </div>

	<?php endwhile; else: ?>

		<p>There are no posts or pages here.</p>
	
	<?php endif; ?>

<?php get_footer(); ?>