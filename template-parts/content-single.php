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
		<div class="card-body row">
			<div class="post-fulldate col-lg-2 col-md-12">
				<div class="post-date"><?php the_time( 'j' ); ?></div>
				<div class="post-month"><?php the_time( 'F' ); ?></div>
			</div>
			<div class="post-info col-lg-10 col-md-12">
				<div class="post-title"><h2><?php the_title(); ?></h2></div>
				<div class="post-author">Автор: <?php the_author(); ?></div>
				<div class="post-tags"><?php the_tags( '<span class="taged">#', '</span> <span class="taged">#', '</span>' ); ?></div>
				<div class="post-excerpt"><?php the_content(); ?></div>
				<div class="social-button">
					<div>Поделиться в соц.сетях: </div>
					<?php social_likes( $post_id ); ?>
				</div>
		</div>
	</article>
</div>
