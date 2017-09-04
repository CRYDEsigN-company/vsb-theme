<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vsb
 */

get_header(); ?>

<div class="row"><div class="col-lg-8">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>
			<div class="card">
				<div class="card-body">
				<?php
					the_archive_title( '<h2 class="post-title">', '</h2>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
				</div>
			</div>


			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<div class="col-lg-4">
	<div class="card">
		<div class="card-body">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer();
