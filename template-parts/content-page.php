<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vsb
 */

?>
<div class="card">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="card-body">

<div class="post-title">
	<h2>
		<?php the_title(); ?>
	</h2>
</div>

<div class="card-body">

	<div class="post-excerpt"><?php the_content(); ?></div>

</div>

</article><!-- #post-<?php the_ID(); ?> -->
</div>
