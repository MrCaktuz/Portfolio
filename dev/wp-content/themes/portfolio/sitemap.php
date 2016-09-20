<?php
/*
Template Name: Sitemap
*/
get_header();
?>
<body>
    <header class="header">
        <div class="header__titles">
            <h1 class="header__title"><?php the_title(); ?></h1>
        </div>
        <nav class="mainNav">
            <h2 class="hidden">Navigation principale</h2>
            <?php foreach ( pf_get_menu_items( 'main-nav' ) as $navItem ): ?>
                <a href="<?php echo $navItem -> url; ?>" class="mainNav__elt<?php echo $navItem -> isCurrent ? ' mainNav__elt--active' : ''; ?>"><?php echo $navItem -> label ?></a>
            <?php endforeach; ?>
        </nav>
    </header>
    <main class="wrap">

        <section class="plan">

            <h2 class="hidden">Plan</h2>

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
