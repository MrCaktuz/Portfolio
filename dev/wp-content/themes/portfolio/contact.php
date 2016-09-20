<?php
/*
Template Name: Contact
*/
get_header();
?>
<body>
    <header class="header">
        <div class="header__titles">
            <h1 class="header__title">Me contacter</h1>
        </div>
        <nav class="mainNav">
            <h2 class="hidden">Navigation principale</h2>
            <?php foreach ( pf_get_menu_items( 'main-nav' ) as $navItem ): ?>
                <a href="<?php echo $navItem -> url; ?>" class="mainNav__elt<?php echo $navItem -> isCurrent ? ' mainNav__elt--active' : ''; ?>"><?php echo $navItem -> label ?></a>
            <?php endforeach; ?>
        </nav>
    </header>
    <main class="wrap clear">

        <section class="businessCard">
            <?php
                $posts = new WP_QUERY( [ 'category_name' => 'Présentation' ] );
                if ( $posts -> have_posts() ): while ( $posts -> have_posts() ): $posts -> the_post();
            ?>
                <h2 class="businessCard__title hidden">Business Card</h2>
                <div class="businessCard__wrap clear">
                    <img class="businessCard__photo" src="<?php the_post_thumbnail_url(); ?>" alt="" width="300" height="300"/>
                    <div class="businessCard__textBox">
                        <p><a class="businessCard__elt businessCard__elt--links businessCard__elt--mail" href="mailto:<?php echo the_field( 'mail' ); ?>"><?php echo the_field( 'mail' ); ?></a></p>
                        <p class="businessCard__elt businessCard__elt--phone"><?php echo the_field( 'phoneNumber' ); ?></p>
                        <p><a class="businessCard__elt businessCard__elt--links businessCard__elt--linkedin" href="<?php echo the_field( 'linkedin' ); ?>" rel="external">Linkedin</a></p>
                        <p><a class="businessCard__elt businessCard__elt--links businessCard__elt--behance" href="<?php echo the_field( 'behance' ); ?>" rel="external">Behance</a></p>
                        <p><a class="businessCard__elt businessCard__elt--links businessCard__elt--github" href="<?php echo the_field( 'github' ); ?>" rel="external">GitHub</a></p>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </section>

        <section class="contact">
            <h2 class="contact__title hidden">Contact Form</h2>

            <?php
                $posts = new WP_QUERY( [ 'category_name' => 'Contact' ] );
                if ( $posts -> have_posts() ): while ( $posts -> have_posts() ): $posts -> the_post();
            ?>

            <?php the_content(); ?>

            <?php endwhile; endif; ?>

        </section>

<?php get_footer(); ?>
