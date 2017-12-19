<?php
/*
        Template Name: Homepage
*/
	get_header();

	// ******** Variables ********
	$title 					= get_the_title();
	$description 			= get_field('description');
	$link 					= get_field('link');
	$thumbnail_src 			= get_the_post_thumbnail_url();
	$thumbnail_clean_url 	= str_replace('.jpg', '', $thumbnail_src);
	$srcset 				= $thumbnail_clean_url . '-320x150.jpg 320w, ' . $thumbnail_clean_url . '-440x150.jpg 440w, ' . $thumbnail_clean_url . '-600x150.jpg 600w';
?>
<body>
	<div class="studyCase section">
		<div class="section-wrap">
			<h1 class="section-title">Study Case - <?php echo $title; ?></h1>
			<div class="studyCase-content">
	            <?php echo wp_get_attachment_image( get_post_thumbnail_id(), "project_lg", "", array( "class"=>"studyCase-img", "srcset"=>$srcset , "sizes"=>$sizes ) );?>
				<p class="studyCase-description"><?php echo $description; ?></p>
			</div>
			<a class="studyCase-link btn btn-primary" href="<?php echo $link; ?>" title="Access the project" target="_blanc">Go to the project</a>
			<a class="section-prev" href="/#portfolio" title="Go back to my portfolio">Portfolio</a>
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