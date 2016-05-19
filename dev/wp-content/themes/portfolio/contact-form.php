<?php
/*
Template Name: Contact Form
*/
?>


<?php
//If the form is submitted
if(isset($_POST['submitted'])) {

	//Check to see if the honeypot captcha field was filled in
	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {

		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = 'Indiquez votre nom.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}

		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = 'Indiquez une adresse e-mail valide.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'Adresse e-mail invalide.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		//Check to make sure comments were entered
		if(trim($_POST['comments']) === '') {
			$commentError = 'Entrez votre message.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}

		//If there is no error, send the email
		if(!isset($hasError)) {

			$emailTo = 'mathieu_claessens@hotmail.com';
			$subject = 'Formulaire de contact de '.$name;
			$sendCopy = trim($_POST['sendCopy']);
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'De : mon site <'.$emailTo.'>' . "\r\n" . 'R&eacute;pondre &agrave; : ' . $email;

			mail($emailTo, $subject, $body, $headers);

			if($sendCopy == true) {
				$subject = 'Formulaire de contact';
				$headers = 'De : <noreply@somedomain.com>';
				mail($email, $subject, $body, $headers);
			}

			$emailSent = true;

		}
	}
} ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" title="no title" charset="utf-8">
    <link rel="icon" href="./assets/img/portfolio.ico" />
    <title>Contact - Mathieu Claessens</title>
</head>
<body>
    <header class="header">
        <nav class="mainNav">
            <a class="mainNav__elt" href="<?php echo home_url('/'); ?>">Accueil</a>
            <a class="mainNav__elt" href="realisations">Réalisations</a>
            <a class="mainNav__elt" href="#">Contact</a>
        </nav>
        <h1 class="header__title">Contact</h1>
    </header>
    <main class="wrap">

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/contact-form.js"></script>



<?php if(isset($emailSent) && $emailSent == true) { ?>

	<div class="thanks">
		<h1>Merci, <?=$name;?></h1>
		<p>Votre e-mail a &eacute;t&eacute; envoy&eacute; avec succ&egrave;s. Vous recevrez une r&eacute;ponse sous peu.</p>
	</div>

<?php } else { ?>

	<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>
		<h2 class="hidden"><?php the_title(); ?></h2>
		<?php the_content(); ?>

		<?php if(isset($hasError) || isset($captchaError)) { ?>
			<p class="error">Une erreur est survenue lors de l'envoi du formulaire.</p>
		<?php } ?>

        <div class="contact">
            <form class="form" action="<?php the_permalink(); ?>" id="contactForm" method="post">

    			<ol class="forms">
    				<li class="form__line">
                        <label class="form__label form__label--name" for="contactName">Nom</label>
    					<input class="form__input form__input--name" type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField" />
    					<?php if($nameError != '') { ?>
    						<span class="error"><?=$nameError;?></span>
    					<?php } ?>
    				</li>
    				<li class="form__line">
                        <label class="form__label form__label--mail" for="email">E-mail</label>
    					<input class="form__input form__input--mail" type="email" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email" />
    					<?php if($emailError != '') { ?>
    						<span class="error"><?=$emailError;?></span>
    					<?php } ?>
    				</li>
    				<li  class="form__line textarea">
                        <label class="form__label form__label--msg" for="commentsText">Message</label>
    					<textarea class="form__textarea" name="comments" id="commentsText" rows="20" cols="30" class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
    					<?php if($commentError != '') { ?>
    						<span class="error"><?=$commentError;?></span>
    					<?php } ?>
    				</li>
    				<li class="form__line buttons">
                        <input type="hidden" name="submitted" id="submitted" value="true" /><button class="form__submit" type="submit">Envoyer</button>
                    </li>
    			</ol>
    		</form>
        </div>


		<?php endwhile; ?>
	<?php endif; ?>
<?php } ?>

<?php get_footer(); ?>
