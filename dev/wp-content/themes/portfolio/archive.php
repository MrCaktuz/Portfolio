<?php
/*
Template Name: Archives
*/
get_header();
?>

<body>
    <header class="header">
        <div class="header__titles">
            <h1 class="header__title"><?php the_title(); ?></h1>
        </div>
        <nav class="mainNav wow bounceInLeft">
            <h2 class="hidden">Navigation principale</h2>
            <?php foreach ( pf_get_menu_items( 'main-nav' ) as $navItem ): ?>
                <a href="<?php echo $navItem -> url; ?>" class="mainNav__elt<?php echo $navItem -> isCurrent ? ' mainNav__elt--active' : ''; ?>"><?php echo $navItem -> label ?></a>
            <?php endforeach; ?>
        </nav>
    </header>
    <main class="wrap">

        <section class="projects clear">
            <h2 class="projects__title hidden">Réalisations</h2>
            <?php
                $posts = new WP_QUERY( [ 'category_name' => 'Réalisations' ] );
                if ( $posts -> have_posts() ): while ( $posts -> have_posts() ): $posts -> the_post();
            ?>
                <article class="projects__project wow">
                    <a href="<?php the_permalink(); ?>">
                        <h3 class="projects__title"><?php the_title(); ?></h3>
                        <img class="projects__img" src="<?php the_post_thumbnail_url(); ?>" alt="" />
                        <div class="projects__hoverBloc projects__hoverBloc--over"> </div>
                        <div class="projects__hoverBloc projects__hoverBloc--upper projects__hoverBloc--rotated"></div>
                        <div class="projects__hoverBloc projects__hoverBloc--lower projects__hoverBloc--rotated"></div>
                    </a>
                </article>
            <?php endwhile; endif; ?>
        </section>

<?php get_footer();
