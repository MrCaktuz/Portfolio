<?php
/*
Template Name: Sitemap
*/
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" title="no title" charset="utf-8">
    <link rel="icon" href="./assets/img/portfolio.ico" />
    <title>Plan du site - Mathieu Claessens</title>
</head>
<body>
    <header class="header">
        <nav class="mainNav">
            <a class="mainNav__elt" href="<?php echo home_url('/'); ?>">Accueil</a>
            <a class="mainNav__elt" href="realisations">Réalisations</a>
            <a class="mainNav__elt" href="contact">Contact</a>
        </nav>
        <h1 class="header__title">Plan du site</h1>
    </header>
    <main class="wrap">

        <section class="plan">

            <ol class="plan__list">
                <li class="plan__listItem">
                    <a class="plan__elt" href="<?php echo home_url('/'); ?>">Accueil</a>
                </li>
                <li class="plan__listItem">
                    <a class="plan__elt" href="realisations">Réalisations</a>
                    <ol class="plan__list plan__list--sub">

                        <?php
                            $posts = new WP_QUERY( [ 'category_name' => 'Réalisations' ] );
                            if ( $posts -> have_posts() ): while ( $posts -> have_posts() ): $posts -> the_post();
                        ?>

                            <li class="plan__listItem">
                                <a class="plan__elt plan__elt--sub" href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </li>

                        <?php endwhile; endif; ?>

                    </ol>
                </li>
                <li class="plan__listItem">
                    <a class="plan__elt" href="contact">Contact</a>
                </li>
            </ol>

        </section>

<?php get_footer();
