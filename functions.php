<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vsb
 */

require_once get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

if ( ! function_exists( 'vsb_theme_setup' ) ) :

	function vsb_theme_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'post-formats', array( 'aside', 'status', 'quote' ) );

		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'index_rel_link' );
		remove_action( 'wp_head', 'wp_shortlink_wp_head' );
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
		remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		remove_action( 'wp_head', 'rel_canonical' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_action( 'wp_head', 'wp_resource_hints', 2 );
		remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
		remove_action( 'wp_head','feed_links_extra', 3 );
		remove_action( 'wp_head','feed_links', 2 );

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'vsb-theme' ),
		) );
	}
endif;

add_action( 'after_setup_theme', 'vsb_theme_setup' );

function vsb_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'vsb-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'vsb-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vsb_theme_widgets_init' );

function vsb_theme_scripts() {
	wp_enqueue_style( 'vsb-theme-style', get_stylesheet_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans' );
	wp_enqueue_script( 'vsb-theme-script', get_template_directory_uri() . '/js/main.js' );
}

add_action( 'wp_enqueue_scripts', 'vsb_theme_scripts' );

function my_deregister_scripts() {
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

function sa_get_bootstrap_paginate_links() {
	ob_start();
	?>
		<div class="pages clearfix">
			<?php
				global $wp_query;
				$current = max( 1, absint( get_query_var( 'paged' ) ) );
				$pagination = paginate_links( array(
					'base' => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
					'format' => '?paged=%#%',
					'current' => $current,
					'total' => $wp_query->max_num_pages,
					'type' => 'array',
					'prev_text' => '&laquo;',
					'next_text' => '&raquo;',
				) );
			?>
			<?php if ( ! empty( $pagination ) ) : ?>
			<ul class="pagination">
				<?php foreach ( $pagination as $key => $page_link ) : ?>
					<li class="page-item <?php if ( strpos( $page_link, 'current' ) !== false ) : echo 'active'; endif; ?> ">
						<?php echo $page_link; ?>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</div>
	<?php
	$links = ob_get_clean();
	return apply_filters( 'sa_bootstap_paginate_links', $links );
}
function sa_bootstrap_paginate_links() {
	echo sa_get_bootstrap_paginate_links();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
	Container::make( 'theme_options', __( 'Theme Options', 'crb' ) )
		->add_fields( array(
			Field::make( 'text', 'crb_text', 'Text Field' ),
		) );
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	require_once( 'vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'carbon_fields_register_fields', 'crb_attach_post_meta' );
function crb_attach_post_meta() {
	Container::make( 'post_meta', __( 'Post Options', 'crb' ) )
		->show_on_post_format( 'quote' )
		->where( 'post_type', '=', 'post' )
		->add_fields( array(
			Field::make( 'text', 'crb_author', 'Автор' ),
		) );
}
?>
