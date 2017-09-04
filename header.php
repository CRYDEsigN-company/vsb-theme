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
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
	<div class="site-header ">
		<nav class="navbar navbar-expand-lg navbar-light justify-content-between sticky-top">
			<div class="container">
				<div class="site-branding">
					<div class="title-block">
						<?php the_custom_logo(); ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) {
							echo '<p class="site-description">' . esc_html( $description ) . '</p>';
						}
						?>
					</div>
					<span class="title-line"></span>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'nav navbar-nav',
							'container'      => false,
							'walker'         => new WP_Bootstrap_Navwalker(),
						));
					?>
				</div>
			</div>
		</nav>
	</div>
</div>
</header><!-- #masthead -->
<div id="content" class="site-content container">
