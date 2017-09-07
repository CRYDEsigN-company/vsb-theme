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

<div class="card-body row">
	<div class="post-fulldate col-1">
		<div class="quote"><i class="fa fa-quote-right" aria-hidden="true"></i></div>
	</div>
	<div class="post-info col-11">
		<?php the_content(); ?>
		<p class="quote-author"><?php echo carbon_get_the_post_meta( 'crb_author' ); ?></p>
	</div>
</div>
</article><!-- #post-<?php the_ID(); ?> -->
</div>
