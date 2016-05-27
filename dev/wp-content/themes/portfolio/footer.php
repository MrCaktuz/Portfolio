
    </main>
    <footer class="footer">
        <?php
            $posts = new WP_QUERY( [ 'category_name' => 'Présentation' ] );
            if ( $posts -> have_posts() ): while ( $posts -> have_posts() ): $posts -> the_post();
        ?>
            <div class="footer__contact">
                <h2 class="footer__title">Me contacter</h2>
                <a class="footer__elt footer__elt--links footer__elt--mail" href="mailto:<?php echo the_field( 'mail' ); ?>"><?php echo the_field( 'mail' ); ?></a>
                <p class="footer__elt footer__elt--phone"><?php echo the_field( 'phoneNumber' ); ?></p>
            </div>

            <div class="footer__social">
                <H2 class="footer__title">Me suivre</H2>
                <a  class="footer__elt footer__elt--links footer__elt--linkedin" href="<?php echo the_field( 'linkedin' ); ?>" rel="external">Linkedin</a>
                <a class="footer__elt footer__elt--links footer__elt--behance" href="<?php echo the_field( 'behance' ); ?>" rel="external">Behance</a>
                <a class="footer__elt footer__elt--links footer__elt--github" href="<?php echo the_field( 'github' ); ?>" rel="external">GitHub</a>
            </div>
        <?php endwhile; endif; ?>

        <div class="footer__nav">
            <a class="footer__elt--links footer__nav--elt" href="#">Accueil</a>
            <a class="footer__elt--links footer__nav--elt" href="realisations">Réalisations</a>
            <a class="footer__elt--links footer__nav--elt" href="contact">Contact</a>
            <a class="footer__elt--links footer__nav--elt" href="#">Haut de la page</a>
            <a class="footer__elt--links footer__nav--elt" href="sitemap">Plan du site</a>
        </div>

        <small class="footer__copy">&copy; Mucht 2016</small>

    </footer>
    <script src="<?php echo get_template_directory_uri() . '/js/wow.js'; ?>"></script>
    <script>new WOW().init();</script>
</body>
</html>
