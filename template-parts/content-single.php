<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vsb
 */

?>
<div class="card">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="card-body">
<div class="row">
	<div class="post-fulldate col-2">
		<div class="post-date"><?php the_time( 'j' ); ?></div>
		<div class="post-month"><?php the_time( 'F' ); ?></div>
	</div>
	<div class="post-info col-10">
		<div class="post-title">
			<h2>
				<?php the_title(); ?>
			</h2>
		</div>
		<div class="post-author">Автор: <?php the_author(); ?></div>
		<div class="post-tags"><?php the_tags( '<span class="tag">#', '</span> <span class="tag">#', '</span>' ); ?></div>
	</div>
	</div>
</div>
<div class="card-body">

	<div class="post-excerpt"><?php the_content(); ?></div>

</div>
</article><!-- #post-<?php the_ID(); ?> -->
</div>
