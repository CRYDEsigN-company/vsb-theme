<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vsb
 */

get_header(); ?>

<div class="row">
	<div class="col-lg-8">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">

				<div class="card">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="card-body">
							<div class="post-title">
								<h2>
									<?php the_title(); ?>
								</h2>
							</div>

							<?php
							while ( have_posts() ) :
								the_post();
							?>
								<div class="row card-body">
									<div class="post-excerpt"><?php the_content(); ?></div>
								</div>
							<?php
							endwhile;
							?>

							<div class="row card-body">
								<form id="contact_form" class="row">
									<label class="form-group card-body text-center">Также вы можете воспользоваться контактной формой:	</label>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
										<label>Ваше имя</label>
										<input type="text" name="name" class="form-control" required placeholder="Введите ваше имя"/>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
										<label>e-mail</label>
										<input type="email" name="email" class="form-control" required placeholder="Введите ваш e-mail" />
									</div>
									<div class="form-group col-12">
										<label>Тема сообщения</label>
										<input type="text" name="subject" class="form-control" placeholder="Введите тему сообщения" />
									</div>
									<div class="form-group col-12">
										<label>Сообщение</label>
										<textarea name="message" class="form-control" required placeholder="Введите текст сообщения" rows="5"></textarea>
									</div>
									<div class="form-group  mx-auto">
										<button type="submit" class="btn btn-secondary btn-danger">Отправить</button>
									</div>
								</form>
							</div>
							<div class="feedback_error_block mx-auto text-center">
								<div id="feedback_error"></div>
							</div>

							<script>
							$(document).ready(function() { 
								$('#contact_form').ajaxForm({ 
									target: '#feedback_error', 
									url: '<?php echo get_bloginfo( 'template_url' ); ?>/inc/feedback-mail.php',
									beforeSend: function() {
										$('#feedback_error').html("<img src='<?php echo get_bloginfo( 'template_url' ); ?>/images/spinner.gif' border='0'/>")
									},   
									success: function() { 
										$( '#feedback_error' ).css( "display", "inline" );
										$( '#feedback_error' ).css( "text-align", "center" );
										$( '#feedback_error' ).fadeIn( 'slow' );
										//$('#contact_form').css("display", "none");
										$(' #contact_form' ).fadeOut( 'slow' );
									}
								}); 
							});
							</script>
						</div>
					</article>
				</div>
			</main>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card">
			<div class="card-body"><?php get_sidebar(); ?></div>
		</div>
	</div>
</div>
<?php
get_footer();
