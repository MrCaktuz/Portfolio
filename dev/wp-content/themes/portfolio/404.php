<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" title="no title" charset="utf-8">
    <link rel="icon" href="./assets/img/portfolio.ico" />
    <title>Réalisation - Mathieu Claessens</title>
</head>
<body>
    <header class="header">
        <nav class="mainNav">
            <a class="mainNav__elt" href="<?php echo home_url('/'); ?>">Accueil</a>
            <a class="mainNav__elt" href="realisations">Réalisations</a>
            <a class="mainNav__elt" href="contact">Contact</a>
        </nav>
        <h1 class="header__title">404 Page Not Found</h1>
    </header>
    <main class="wrap">
        <section class="presentation clear">

            <h2 class="presentation_title hidden">404 content</h2>

            <div class="presentation__textBloc">La page à laquelle vous voulez accéder n'existe pas ou est en cours de creation.</div>

        </section>
<?php
get_footer();
?>
