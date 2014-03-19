<!DOCTYPE html>
<html>
		<head>
			<meta charset="utf-8" />
   			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<title>
				<?php 
					wp_title( '|', true, 'right' );
					bloginfo( 'name' );
				?>
			</title>
			<?php wp_head(); ?>
		</head>
		<body>
		<div class="container">
	      	<nav class="top-bar" data-topbar>
		        <ul class="title-area">
		          <li class="name">
		            <h1><a href="<?php bloginfo('siteurl'); ?>">Catherine Girardi Lighting Design</a></h1>
		          </li>
		          <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
		        </ul>

		        <section class="top-bar-section">
		          <!-- Right Nav Section -->
		          <ul class="right">
		            <li class="has-dropdown">
		              <a href="#">Portfolio</a>
		                <ul class="dropdown">
		                  <li><a href="#">Ain't Misbehavin'</a></li>
		                  <li><a href="#">Suessical</a></li>
		                </ul>
		            </li>
		            <li class="has-form">
		              <a href="#" class='button'>Resume</a>
		            </li>
		            <li class="has-form">
		              <a href="#" class='button'>Contact</a>
		            </li>
		            <li class="has-form">
		              <a href="#" class='button'>Interesting Links</a>
		            </li>
		          </ul>

		        </section>
	    	</nav>
	    	<main>

<?php 

	// $args = array(
	// 	'menu' => 'nav-dropdown-menu'
	// 	);


	// wp_nav_menu( $args );
?>