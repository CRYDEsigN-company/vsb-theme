<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package vsb
 */

$email      = $_GET['email'];
$subject    = $_GET['subject'];
$form_mail  = 'cryden_da@mail.ru';
$message    = $_GET['message'];

mb_language();
if ( mail( $form_mail, $subject, $message, $email ) ) :
	echo 'Сообщение отправленно!';
else :
	echo 'Ошибка! Попробуйте позже.';
endif;
