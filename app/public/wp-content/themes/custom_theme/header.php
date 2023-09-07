<!DOCTYPE html>
<html lang="en"> 
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ball Theme">
    <meta name="author" content="https://youtube.com/@BallEcomThatthana">    
    <link rel="shortcut icon" href="/wp-content/themes/custom_theme/assets/images/logo.png"> 
    
	<!-- Theme CSS -->
    <?php
    wp_head();
    ?>

</head> 

<body>
    
    <header class="header text-center">	    
	    <a class="site-title pt-lg-4 mb-0" href="index.html">
			<?php echo get_bloginfo('name'); ?>
		</a>
        
	    <nav class="navbar navbar-expand-lg navbar-dark" >
           
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div id="navigation" class="collapse navbar-collapse flex-column" >
				<?php
					if(function_exists('the_custom_logo')){

						$custom_logo_id = get_theme_mod('custom_logo');
						$logo = wp_get_attachment_image_src($custom_logo_id);
					}
				?>
				<img class="mb-3 mx-auto logo" src="<?php echo $logo[0] ?>" alt="logo" >			
				
				<?php
					wp_nav_menu(
						array(
							'menu' => 'primary',
							'container' => '',
							'theme_location' => 'primary',
							'items_wrap' => '<ul id="" class="navbar-nav flex-column text-sm-center text-md-left">%3$s</ul>'
						)
					);
				?>
				<hr>
		
				<?php
					dynamic_sidebar('sidebar-1'); //sidebar-id from id
				?>

			</div>
		</nav>
    </header>
    <div class="main-wrapper">
	    <header class="page-title theme-bg-light text-center gradient py-5">
			<h1 class="heading">
			<?php 
				if (is_archive()) {
					echo '<h1>' . get_the_archive_title() . '</h1>';
				} else if (is_single()) {
					echo '<h1>' . single_post_title('', false) . '</h1>';
				} else if (is_404()) {
					echo '<h3 class="page-title">Not Found</h3>';
				} else if (is_page()) {
					echo '<h1>' . get_the_title() . '</h1>';
				} else if (is_home()) {
					// Display a custom title for the index or blog page
					echo '<h1>Blog</h1>';
				} else if (is_search()) {
					echo '<h1>Search Results</h1>';
				}
			?>
			</h1>
		</header>
    