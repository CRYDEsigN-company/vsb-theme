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

							<div class="row content">
								<p>Электронная почта:</p>
								<p>Общие вопросы: <strong><a href="mailto:mail@fun-wiki.xyz">mail@fun-wiki.xyz</a></strong></p>
								<p>Реклама: <strong><a href="mailto:reklama@fun-wiki.xyz">reklama@fun-wiki.xyz</a></strong></p>
								<p>Присоединиться к команде: <strong><a href="mailto:mail@fun-wiki.xyz">mail@fun-wiki.xyz</a></strong></p><br>
							</div>
							<script src="<?php bloginfo( 'template_url' ); ?>/js/libs/jquery.form.js"></script>

							<div class="row content">
								<p>Также вы можете воспользоваться контактной формой:</p><br>
								<form id="contact_form">
									<div class="row">
										<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 form-group">
											<label>Ваше имя</label>
											<input type="text" name="name" class="form-control" required placeholder="Введите ваше имя"/>
										</div>
										<div class="col-lg-offset-1 col-md-offset-1 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
											<label>e-mail</label>
											<input type="email" name="email" class="form-control" required placeholder="Введите ваш e-mail" />
										</div>
									</div>
									<div class="form-group">
										<label>Тема сообщения</label>
										<input type="text" name="subject" class="form-control" placeholder="Введите тему сообщения" />
									</div>
									<div class="form-group">
										<label>Сообщение</label>
										<textarea name="message" class="form-control" required placeholder="Введите текст сообщения"></textarea>
									</div>
									<div class="form-group">
										<input class="form-btn_send center-block" type="submit" value="Отправить" onclick="send();" />
									</div>
								</form>
							</div>
							<div class="feedback_error_block">
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
