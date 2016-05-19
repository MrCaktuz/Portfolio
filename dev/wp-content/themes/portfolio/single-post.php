<?php
/*
        Template Name: Single Article
*/
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" title="no title" charset="utf-8">
    <link rel="icon" href="./assets/img/portfolio.ico" />

    <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
        <title><?php the_title(); ?> - Mathieu Claessens</title>
    <?php endwhile; endif; ?>

</head>
<body>
    <header class="projectHeader">
        <nav class="mainNav mainNav--realisations">
            <a class="mainNav__elt" href="<?php echo home_url('/'); ?>">Accueil</a>
            <a class="mainNav__elt" href="realisations">Réalisations</a>
            <a class="mainNav__elt" href="contact">Contact</a>
        </nav>
        <img class="projectHeader__img" src="<?php the_post_thumbnail_url( 'coverBanner' ); ?>" alt="" />
        <div class="projectHeader__tags">
            <h1 class="projectHeader__title"><?php the_title(); ?></h1>
            <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
                <span class="projectHeader__tag"><?php the_tags( "", "", "" ); ?></span>
            <?php endwhile; endif; ?>
        </div>
    </header>
    <main class="wrap">

        <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

            <section class="project project--context clear">
                <h2 class="project__title">Contexte</h2>
                <div class="project__textBlocs">
                    <?php the_field( 'contexte' ); ?>
                </div>
            </section>

            <div class="project__illustrations">
                <img class="project__illustration" src="<?php the_field( 'firstIllu' ); ?>" alt="Screenshot du vieux site" width="1000" height="250"/>
                <span class="project__illustration--legend"><?php the_field( 'firstIlluCaption' ); ?></span>
            </div>

            <section class="project project--approche clear">
                <h2 class="project__title">Mon approche</h2>
                <div class="project__textBlocs">
                    <?php the_field( 'approche' ); ?>
                </div>
            </section>

            <div class="project__illustrations">
                <img class="project__illustration" src="<?php the_field( 'secondIllu' ); ?>" alt="Screenshot du vieux site" width="1000" height="250"/>
                <span class="project__illustration--legend"><?php the_field( 'secondIlluCaption' ); ?></span>
            </div>

            <section class="project project--recul clear">
                <h2 class="project__title">Un peu de recul</h2>
                <div class="project__textBlocs">
                    <?php the_field( 'recul' ) ?>
                </div>
            </section>

            <section class="project__botton">
                <h2><a class="project__botton--label" rel="external" href="<?php the_field( 'link' ) ?>">Voir le projet</a></h2>
            </section>

        <?php endwhile; endif; ?>

<?php get_footer();
