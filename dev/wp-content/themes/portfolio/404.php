<?php
get_header();
?>
<body>
    <header class="header">
        <div class="header__titles">
            <h1 class="header__title">Erreur 404 - Page Not Found</h1>
            <span class="header__subTitle">La page à laquelle vous voulez accéder n'existe pas ou est en cours de creation.</span>
        </div>
        <nav class="mainNav">
            <h2 class="hidden">Navigation principale du site</h2>
            <?php foreach ( pf_get_menu_items( 'main-nav' ) as $navItem ): ?>
                <a href="<?php echo $navItem -> url; ?>" class="mainNav__elt<?php echo $navItem -> isCurrent ? ' mainNav__elt--active' : ''; ?>"><?php echo $navItem -> label ?></a>
            <?php endforeach; ?>
        </nav>
    </header>
    <main class="wrap">
<?php
get_footer();
?>
