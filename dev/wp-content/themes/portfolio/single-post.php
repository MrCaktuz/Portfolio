<?php
/*
        Template Name: Single Article
*/
get_header();
?>
<body>
    <header class="header" style="background-image: url( <?php the_post_thumbnail_url(); ?> );">
        <div class="header__titles">
            <h1 class="header__title"><span class="hidden">Page dédiée au projet : </span><?php the_title(); ?></h1>
            <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
                <?php the_field( 'tags' ); ?>
            <?php endwhile; endif; ?>
        </div>
        <nav class="mainNav">
            <h2 class="hidden">Navigation principale du site</h2>
            <?php foreach ( pf_get_menu_items( 'main-nav' ) as $navItem ): ?>
                <a href="<?php echo $navItem -> url; ?>" class="mainNav__elt<?php echo $navItem -> isCurrent ? ' mainNav__elt--active' : ''; ?>"><?php echo $navItem -> label ?></a>
            <?php endforeach; ?>
        </nav>
    </header>
    <main class="wrap">

        <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

            <article class="project project--context clear">
                <h2 class="project__title">Contexte</h2>
                <div class="project__textBlocs">
                    <?php the_field( 'contexte' ); ?>
                </div>
            </article>

            <section class="project__illustrations">
                <h2 class="project__title hidden">Illustration : <?php the_field( 'firstIlluCaption' ); ?></h2>
                <img class="project__illustration" src="<?php the_field( 'firstIllu' ); ?>" alt="Screenshot du vieux site" width="1000" height="250"/>
                <span class="project__illustration--legend"><?php the_field( 'firstIlluCaption' ); ?></span>
            </section>

            <article class="project project--approche clear">
                <h2 class="project__title">Mon approche</h2>
                <div class="project__textBlocs">
                    <?php the_field( 'approche' ); ?>
                </div>
            </article>

            <section class="project__illustrations">
                <h2 class="project__title hidden">Illustration : <?php the_field( 'secondIlluCaption' ); ?></h2>
                <img class="project__illustration" src="<?php the_field( 'secondIllu' ); ?>" alt="Screenshot du vieux site" width="1000" height="250"/>
                <span class="project__illustration--legend"><?php the_field( 'secondIlluCaption' ); ?></span>
            </section>

            <article class="project project--recul clear">
                <h2 class="project__title">Un peu de recul</h2>
                <div class="project__textBlocs">
                    <?php the_field( 'recul' ) ?>
                </div>
            </article>

            <div class="project__button">
                <a class="project__button--label" rel="external" href="<?php the_field( 'link' ) ?>">Voir le projet</a>
            </div>

        <?php endwhile; endif; ?>

<?php get_footer();
