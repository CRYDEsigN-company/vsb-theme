<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package vsb
 */

get_header();
?>

<div class="row">
	<div class="col-lg-8">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<?php
				if ( have_posts() ) :
				?>
					<header class="page-header">
						<h1 class="page-title">Результаты поиска: <?php printf( '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header>
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'search' );
				endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</main>
		</div>
	</div>
</div>
<div class="col-lg-4">
	<div class="card">
		<div class="card-body">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
