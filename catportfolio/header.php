<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>
			<?php 
					wp_title( '|', true, 'right' ); 
			?>
		</title>
		<?php wp_head(); ?>
	</head>
	<body>
            <nav class="top-bar" data-topbar>
                <ul class="title-area">
                    <li class="name">
                        <h1><a href="<?php echo home_url(); ?>">
                        	<?php 
                        		$header_title .= get_bloginfo( 'name', 'display');
                        		$header_title .= " ";
                        		$header_title .= get_bloginfo( 'description', 'display');
                        		echo $header_title;
                        	?></a></h1>
                    </li>          
                    <li class="toggle-topbar"><a href="#"></a></li>
                </ul>
                <section class="top-bar-section">
                    <?php foundation_top_bar_l(); ?>
 
                    <?php foundation_top_bar_r(); ?>
                </section>
            </nav>
	<div class="container">
    	<main>

<?php 

	// $args = array(
	// 	'menu' => 'nav-dropdown-menu'
	// 	);


	// wp_nav_menu( $args );
?>