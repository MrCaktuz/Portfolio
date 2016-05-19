<?php
/*
        Template Name: Homepage
*/
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" title="no title" charset="utf-8">
    <link rel="icon" href="./assets/img/portfolio.ico" />
    <title>Mathieu Claessens</title>
</head>
<body>
    <header class="indexHeader">
        <nav class="mainNav">
            <a class="mainNav__elt" href="<?php echo home_url('/'); ?>">Accueil</a>
            <a class="mainNav__elt" href="realisations">Réalisations</a>
            <a class="mainNav__elt" href="contact">Contact</a>
        </nav>
        <h1 class="indexHeader__title">Mathieu Claessens</h1>
    </header>
    <main class="wrap">

        <section class="presentation clear">

            <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
                <h2 class="presentation_title hidden"><?php the_title(); ?></h2>

                <?php the_content(); ?>

            <?php endwhile; endif; ?>

        </section>

        <section class="projects clear">
            <h2 class="projects__title hidden">Dernières réalisations</h2>

            <?php
                $posts = new WP_QUERY( [ 'posts_per_page' => 2, 'category_name' => 'Réalisations' ] );
                if ( $posts -> have_posts() ): while ( $posts -> have_posts() ): $posts -> the_post();
            ?>

            <a class="projects__project" href="<?php the_permalink(); ?>">
                <h3 class="projects__title"><?php the_title(); ?></h3>

                <img class="projects__img" src="<?php the_post_thumbnail_url( 'coverGalery' ); ?>" alt="" />

                <div class="projects__hoverBloc projects__hoverBloc--over"> </div>
                <div class="projects__hoverBloc projects__hoverBloc--upper projects__hoverBloc--rotated"></div>
                <div class="projects__hoverBloc projects__hoverBloc--lower projects__hoverBloc--rotated"></div>
            </a>

        <?php endwhile; endif; ?>

            <div class="project__botton">
                <a class="project__botton--label" href="realisations">Voir toutes mes réalisations</a>
            </div>

        </section>



<?php get_footer();
