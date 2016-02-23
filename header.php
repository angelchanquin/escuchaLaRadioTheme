<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width">
		<title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<header>
		</header>
		<nav class="navbar container navbar-default navbar-fixed-top" role="navigation">
		  <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		      <span class="sr-only">Toggle navigation</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="index.html"><img class="brandLogo" src="wp-content\themes\aprendiendoWordPress/img/brand-white.svg"></a>
		  </div>
		
		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse navbar-ex1-collapse">
		    <?php 
					$args = array(
							'theme_location' => 'primary'
					);
				 ?>
				<?php wp_nav_menu( $args ); ?>
		  </div><!-- /.navbar-collapse -->
		</nav>