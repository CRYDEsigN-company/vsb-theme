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
		if ( have_posts() ) :
		?>
			<div class="card">
				<div class="card-body">
				<?php
					the_archive_title( '<div class="post-title"><h2>', '</h2></div>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
				</div>
			</div>
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_format() );
			endwhile;
			the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
		</main>
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
