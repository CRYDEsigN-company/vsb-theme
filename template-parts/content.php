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
<?php 

$default_attr = array(
	'src'   => $src,
	'class' => "card-img-top",
	'alt'   => trim(strip_tags( $attachment->post_excerpt )),
	'title' => trim(strip_tags( $attachment->post_title )),
);

$thumbnail = get_the_post_thumbnail( null, full, $default_attr );
echo $thumbnail;
?>

<div class="card-body row">
	<div class="post-fulldate col-lg-2 col-md-12">
		<div class="post-date"><?php the_time('j'); ?></div>
		<div class="post-month"><?php the_time('F'); ?></div>
	</div>
	<div class="post-info col-lg-10 col-md-12">
		<div class="post-title">
			<h2><?php the_title() ?></h2>
		</div>
		<div class="post-author">Автор: <?php the_author(); ?></div>
		<div class="post-tags"><?php the_tags( '<span class="taged">#', '</span> <span class="taged">#', '</span>'); ?></div>
		<div class="post-excerpt"><?php the_excerpt(); ?></div>
		<a class="btn btn-secondary btn-danger float-right" href="<?php the_permalink(); ?>" role="button">Читать...</a>
	</div>
</div>
</article><!-- #post-<?php the_ID(); ?> -->
</div>