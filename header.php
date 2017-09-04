<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vsb
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<base href="<?php echo get_template_directory_uri(); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header>
	<div class="site-header ">
		
		<nav class="navbar navbar-expand-lg navbar-light justify-content-between sticky-top">
			<div class="container">
			  	<div class="site-branding">
					<div class="title-block">
						<?php
						the_custom_logo();
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php
						endif; ?>
					</div>
					<span class="title-line"></span>
				</div><!-- .site-branding -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'	 => 'nav navbar-nav',
							'container' 	 => false,
							'walker'         => new	WP_Bootstrap_Navwalker()
						) );
					?>
				</div>
			</div>
		</nav>
	</div>
</div>
</header><!-- #masthead -->
<div id="content" class="site-content container">
