<?php

$errors = [];
$name = $_POST['name'];
$email = $_POST['email'];
$url = $_POST['url'];
$message = $_POST['message'];

if (!isset($name) || $name == '') {
    $errors['name'] = "Don't forget to write your name.";
}
if (!isset($email) || $email == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Please write a valid email.";
}
if (!isset($url) || $url == '') {
} else if (!filter_var( $url, FILTER_VALIDATE_URL )){
    $errors['url'] = "Please write a valid URL.";
}
if (!isset($message) || $message == '') {
    $errors['message'] = "Don't forget to say somethiing.";
}

session_start();

if ( !empty($errors) ) {
    $_SESSION['errors'] = $errors;
    $_SESSION['data'] = $_POST;
    header( 'Location: /#contact' );
} else {
    $_SESSION['success'] = 'Thanks for your message. You will hear from me soon';
    $headers = 'FROM: ' . $name . '<' . $email . '>';
    mail( 'mucht@mathieuclaessens.be', 'Pro - ' . $name, $message, $headers );
    header( 'Location: /#contact' );
}
