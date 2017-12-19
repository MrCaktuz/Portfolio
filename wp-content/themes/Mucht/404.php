<?php
/*
        Template Name: Homepage
*/
	get_header();

	// ******** Variables ********
	
?>
<body>
	<div class="notFound section">
		<div class="section-wrap">
			<h1 class="section-title">Page not found</h1>
			<div class="notFound-content">
				<p class="notFound-description">Something went wrong... The page you are trying to access doesn't exist or it was deleted. Please go back to the homepage with the link below.</p>
			</div>
			<a class="notFound-link btn btn-primary" href="<?php echo $link; ?>" title="Return to homepage">Homepage</a>
		</div>
	</div>
	<nav class="navigation">
		<h2 class="sr-only">Navigation</h2>
		<a class="navigation-button" href="#" title="Open the menu">
			Menu
			<span class="navigation-button-bar"></span>
			<span class="navigation-button-bar"></span>
			<span class="navigation-button-bar"></span>
			<span class="navigation-button-bar"></span>
		</a>
		<div class="navigation-links">
			<a href="/#about" class="navigation-link">About me</a>
			<a href="/#portfolio" class="navigation-link">Portfolio</a>
			<a href="/#experience" class="navigation-link">Experience</a>
			<a href="/#contact" class="navigation-link">Contact</a>
		</div>
	</nav>
</body>
<?php
	get_footer();
?>