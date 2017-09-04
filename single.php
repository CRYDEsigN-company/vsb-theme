<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vsb
 */

get_header(); ?>

<div class="row">
	<div class="col-lg-8">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
			<?php
			while ( have_posts() ) :
				the_post();
				$template_part = get_post_format();
				if ( is_single() ) {
					$template_part = 'single';
				}
				get_template_part( 'template-parts/content', $template_part );
			?>
			<div class="card">
			<div class="card-body">
			<?php
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
			</div></div>
		<?php
		endwhile; // End of the loop.
		?>

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
<?php get_footer(); ?>
