
    </main>
    <footer class="footer">
    <section>
        <h2 class="hidden">Footer</h2>
        <?php
            $posts = new WP_QUERY( [ 'category_name' => 'Présentation' ] );
            if ( $posts -> have_posts() ): while ( $posts -> have_posts() ): $posts -> the_post();
        ?>
            <section class="footer__contact">
                <h3 class="footer__title">Me contacter</h3>
                <a class="footer__elt footer__elt--links footer__elt--mail" href="mailto:<?php echo the_field( 'mail' ); ?>"><?php echo the_field( 'mail' ); ?></a>
                <p class="footer__elt footer__elt--phone"><?php echo the_field( 'phoneNumber' ); ?></p>
            </section>

            <section class="footer__social">
                <h3 class="footer__title">Me suivre</h3>
                <a  class="footer__elt footer__elt--links footer__elt--linkedin" href="<?php echo the_field( 'linkedin' ); ?>" rel="external">Linkedin</a>
                <a class="footer__elt footer__elt--links footer__elt--behance" href="<?php echo the_field( 'behance' ); ?>" rel="external">Behance</a>
                <a class="footer__elt footer__elt--links footer__elt--github" href="<?php echo the_field( 'github' ); ?>" rel="external">GitHub</a>
            </section>
        <?php endwhile; endif; ?>

        <section class="footer__nav">
            <h3 class="hidden">Navigation secondaire du site</h3>
            <a class="footer__elt--links footer__nav--elt" href="#">Accueil</a>
            <a class="footer__elt--links footer__nav--elt" href="realisations">Réalisations</a>
            <a class="footer__elt--links footer__nav--elt" href="contact">Contact</a>
            <a class="footer__elt--links footer__nav--elt" href="sitemap">Plan du site</a>
        </section>

        <small class="footer__copy">&copy; Mucht 2016</small>

    </section>
    </footer>
</body>
</html>
