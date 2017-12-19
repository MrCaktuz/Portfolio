<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]-->
<!--[if lt IE 7 ]><html class="no-js ie6" lang="fr"><![endif]-->
<!--[if IE 7 ]><html class="no-js ie7" lang="fr"><![endif]-->
<!--[if IE 8 ]><html class="no-js ie8" lang="fr"><![endif]-->
<!--[if lte IE 8]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Styles -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/build/css/styles.css" type="text/css">
  	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/build/img/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/build/img/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/build/img/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/build/img/favicons/manifest.json">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/build/img/favicons/safari-pinned-tab.svg" color="#323232">
	<meta name="theme-color" content="#ffffff">
	<!-- Image for preview -->
	<meta property="og:image" content="http://www.mathieuclaessens.be/build/img/preview.jpg" />
	<!-- Practical info -->
	<meta name="description" content="Personal website of Mathieu Claessens web developper and designer">
	<meta author="Mucht">
	<?php session_start(); ?>
    <?php if( is_front_page() ): ?>
    	<title><?php bloginfo('title'); ?></title>
    <?php elseif ( is_404() ) : ?>
    	<title>Page not found - <?php bloginfo('title'); ?></title>
    <?php else : ?>
    	<title>Study case - <?php the_title(); ?> - <?php bloginfo('title'); ?></title>
    <?php endif; ?>
</head>
