<?php
/*
Template Name: Archives
*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" title="no title" charset="utf-8">
    <link rel="icon" href="./assets/img/portfolio.ico" />
    <title>Mes réalisations - Mathieu Claessens</title>
</head>
<body>
    <header class="header">
        <nav class="mainNav">
            <a class="mainNav__elt" href="<?php echo home_url('/'); ?>">Accueil</a>
            <a class="mainNav__elt" href="realisations">Réalisations</a>
            <a class="mainNav__elt" href="contact">Contact</a>
        </nav>
        <h1 class="header__title">Réalisations</h1>
    </header>
    <main class="wrap">

        <section class="projects clear">
            <h2 class="projects__title hidden">Réalisations</h2>

            <?php
                $posts = new WP_QUERY( [ 'category_name' => 'Réalisations' ] );
                if ( $posts -> have_posts() ): while ( $posts -> have_posts() ): $posts -> the_post();
            ?>

                <a class="projects__project" href="<?php the_permalink(); ?>">
                    <h2 class="projects__title"><?php the_title(); ?></h2>

                    <img class="projects__img" src="<?php the_post_thumbnail_url(); ?>" alt="" />

                    <div class="projects__hoverBloc projects__hoverBloc--over"></div>
                    <div class="projects__hoverBloc projects__hoverBloc--upper projects__hoverBloc--rotated"></div>
                    <div class="projects__hoverBloc projects__hoverBloc--lower projects__hoverBloc--rotated"></div>
                </a>

            <?php endwhile; endif; ?>

        </section>

<?php get_footer();
