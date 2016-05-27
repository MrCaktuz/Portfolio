<?php
/*
        Template Name: Homepage
*/
get_header();
?>
<body>
    <body>
        <header class="header">
            <nav class="mainNav wow bounceInLeft">
                <h2 class="hidden">Navigation principale</h2>
                <?php foreach ( pf_get_menu_items( 'main-nav' ) as $navItem ): ?>
                    <a href="<?php echo $navItem -> url; ?>" class="mainNav__elt<?php echo $navItem -> isCurrent ? ' mainNav__elt--active' : ''; ?>"><?php echo $navItem -> label ?></a>
                <?php endforeach; ?>
            </nav>
            <div class="header__titles">
                <h1 class="header__title"><?php bloginfo( 'name' ); ?></h1>
                <span class="header__subTitle"><?php bloginfo( 'description' ); ?></span>
            </div>
        </header>
    <main class="wrap">

        <section class="presentation clear">
            <?php
                $posts = new WP_QUERY( [ 'category_name' => 'Présentation' ] );
                if ( $posts -> have_posts() ): while ( $posts -> have_posts() ): $posts -> the_post();
            ?>
                <h2 class="presentation__title hidden"><?php the_title(); ?></h2>
                <div class="presentation__wrap clear">
                    <img class="presentation__photo wow bounceInLeft" src="<?php the_post_thumbnail_url(); ?>" alt="" width="271" hieght="300"/>
                    <div class="presentation__textBlocs wow bounceInRight">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </section>

        <section class="projects clear">
            <h2 class="projects__title hidden">Dernières réalisations</h2>
            <?php
                $posts = new WP_QUERY( [ 'posts_per_page' => 4, 'category_name' => 'Réalisations' ] );
                if ( $posts -> have_posts() ): while ( $posts -> have_posts() ): $posts -> the_post();
            ?>
                <a class="projects__project wow" href="<?php the_permalink(); ?>">
                    <h3 class="projects__title"><?php the_title(); ?></h3>
                    <img class="projects__img" src="<?php the_post_thumbnail_url(); ?>" alt="" />
                    <div class="projects__hoverBloc projects__hoverBloc--over"> </div>
                    <div class="projects__hoverBloc projects__hoverBloc--upper projects__hoverBloc--rotated"></div>
                    <div class="projects__hoverBloc projects__hoverBloc--lower projects__hoverBloc--rotated"></div>
                </a>
            <?php endwhile; endif; ?>

        </section>

        <div class="project__button  wow bounceInUp">
            <a class="project__button--label project__botton--dark wow bounceInUp" href="realisations">Voir toutes mes réalisations</a>
        </div>


<?php get_footer();
