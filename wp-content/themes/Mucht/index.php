<?php
/*
        Template Name: Homepage
*/
	get_header();

	// ******** Variables ********
	$title 			= get_bloginfo('name');
	$slogan 		= get_bloginfo('description');
	$fname 			= get_field('fname', 'option');
	$lname 			= get_field('lname', 'option');
	$description 	= get_field('description', 'option');
	$github 		= get_field('link_github', 'option');
	$instagram 		= get_field('link_insta', 'option');
	$linkedin 		= get_field('link_linkedin', 'option');
?>
<body>
	<h1 class="sr-only"><?php echo $title; ?> - <?php echo $slogan; ?></h1>
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
			<a href="#about" class="navigation-link">About me</a>
			<a href="#portfolio" class="navigation-link">Portfolio</a>
			<a href="#experience" class="navigation-link">Experience</a>
			<a href="#contact" class="navigation-link">Contact</a>
		</div>
	</nav>
	<section class="section about" id="about">
		<div class="section-wrap about-content">
			<div class="about-logo-wrap">
				<div class="about-logo-border">
					<a class="about-logo-available" href="#contact" title="Get in touch with me">Available for work</a>
					<svg class="about-logo-content" version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="150px" height="108px" viewBox="0 0 500 360.56" enable-background="new 0 0 500 360.56" xml:space="preserve">
						<path fill="#FAFAFA" d="M354.869,88.996c11.027-10.148,23.902-16.286,37.818-16.286c21.918,0,41.189,9.143,61.309,31.086 L499,59.134C472.585,23.482,434.799,1,392.687,1c-28.842,0-58.962,9.437-78.201,28.657L172.121,172.273L1,1v358.56h72.261V173.259 l98.028,98.27L354.869,88.996z"/>
						<path fill="#F58020" d="M382.765,286.848c-39.38,0-71.263-46.951-72.104-105.273l-62.373,61.9 c20.861,67.17,72.976,115.086,134.476,115.086c47.125,0,88.853-28.106,115.235-71.403l-45.004-44.539 C430.53,269.512,409.144,286.848,382.765,286.848z"/>
					</svg>
					<div class="about-logo-socials">
						<a class="about-logo-socials-link about-logo-socials-link-git" href="<?php echo $github; ?>" title="Goto my Github profil" target="_blanc">Github</a>
						<a class="about-logo-socials-link about-logo-socials-link-insta" href="<?php echo $instagram; ?>" title="Go to my Instagram profil" target="_blanc">Instagram</a>
						<a class="about-logo-socials-link about-logo-socials-link-in" href="<?php echo $linkedin; ?>" title="Go to my Linkedin profil" target="_blanc">Linkedin</a>
					</div>
				</div>
			</div>
			<div class="about-text">
				<h2 class="about-title"><span class="about-title-name"><span class="about-title-fname"><?php echo $fname; ?></span> <span class="about-title-lname"><?php echo $lname; ?></span></span> <span class="about-title-function"><?php echo $slogan; ?></span></h2>
				<div class="about-intro"><?php echo $description; ?></div>
			</div>
		</div>
		<a class="section-next" href="#portfolio" title="Go to my portfolio">What's next ?</a>
	</section>
	<section id="portfolio" class="section portfolio">
		<h2 class="section-title">Portfolio</h2>
		<div class="section-wrap portfolio-content">
			<?php
				$i = 0;
                $posts = new WP_QUERY( [ 'post_type' => 'projet' ] );
                if ( $posts -> have_posts() ): while ( $posts -> have_posts() ): $posts -> the_post();
                	$thumbnail_src 			= get_the_post_thumbnail_url();
                	$thumbnail_clean_url 	= str_replace('.jpg', '', $thumbnail_src);
                	$srcset 				= $thumbnail_clean_url . '-320x150.jpg 320w, ' . $thumbnail_clean_url . '-440x150.jpg 440w, ' . $thumbnail_clean_url . '-600x150.jpg 600w';
            ?>
                <?php if( $i%2 == 0 ): ?>
					<article class="portfolio-project" data-bottom-top="transform: translateX(-10%); opacity: 0;" data--250-bottom-top="transform: translateX(0%); opacity: 1;">
						<a href="<?php the_permalink(); ?>" class="portfolio-project-link" title="Go to the projet's page">
							<h3 class="portfolio-project-title"><?php the_title(); ?><span class="portfolio-project-role"><?php the_field('category'); ?></span></h3>
	                        <?php echo wp_get_attachment_image( get_post_thumbnail_id(), "project_lg", "", array( "class"=>"portfolio-project-img", "srcset"=>$srcset , "sizes"=>$sizes ) );?>
						</a>
					</article>
				<?php else: ?>
            		<article class="portfolio-project" data-bottom-top="transform: translateX(10%); opacity: 0;" data--250-bottom-top="transform: translateX(0%); opacity: 1;">
						<a href="<?php the_permalink(); ?>" class="portfolio-project-link" title="Go to the projet's page">
							<h3 class="portfolio-project-title"><?php the_title(); ?><span class="portfolio-project-role"><?php the_field('category'); ?></span></h3>
	                        <?php echo wp_get_attachment_image( get_post_thumbnail_id(), "project_lg", "", array( "class"=>"portfolio-project-img", "srcset"=>$srcset , "sizes"=>$sizes ) );?>
						</a>
					</article>
                <?php endif; ?>
            <?php $i++; endwhile; endif; ?>
		</div>
	</section>
	<section class="section experience" id="experience">
		<h2 class="section-title">Experience</h2>
		<div class="section-wrap experience-content">
			<?php
				$i = 0;
                $posts = new WP_QUERY( [ 'post_type' => 'experience' ] );
                if ( $posts -> have_posts() ): while ( $posts -> have_posts() ): $posts -> the_post();
                	$start	= ucfirst(get_field('start'));
                	$end	= ucfirst(get_field('end'));
                	$activity	= get_field('activity');
                	$description	= get_field('description');
            ?>
                <?php if( $i%2 == 0 ): ?>
					<article class="experience-elt" data-bottom-top="transform: translateX(10%); opacity: 0;" data--250-bottom-top="transform: translateX(0%); opacity: 1;">
						<p class="experience-date"><?php echo $start; ?> - <?php echo $end; ?></p>
						<h3 class="experience-title"><?php the_title(); ?></h3>
						<p class="experience-job"><?php echo $activity; ?></p>
						<p class="experience-description"><?php echo $description; ?></p>
					</article>
				<?php else: ?>
            		<article class="experience-elt" data-bottom-top="transform: translateX(-10%); opacity: 0;" data--250-bottom-top="transform: translateX(0%); opacity: 1;">
						<p class="experience-date"><?php echo $start; ?> - <?php echo $end; ?></p>
						<h3 class="experience-title"><?php the_title(); ?></h3>
						<p class="experience-job"><?php echo $activity; ?></p>
						<p class="experience-description"><?php echo $description; ?></p>
					</article>
                <?php endif; ?>
            <?php $i++; endwhile; endif; ?>
			<a href="http://portfolio.dev/wp-content/uploads/2017/12/resume.pdf" class="experience-resume btn btn-secondary" title="Download my resume" target="_blanc">Download my resume (fr)</a>
		</div>
	</section>
	<section class="section contact" id="contact">
		<h2 class="section-title">Get in touch</h2>
		<div class="section-wrap contact-content">
			<p class="contact-intro">Send me an email if you want to start a new project, a new collaboration or send a dad's joke to contribute to my 10 laugh a day therapy.</p>
			<?php echo FrmFormsController::show_form(2, $key = '', $title=true, $description=true); ?>
		</div>
	</section>

<?php
	get_footer();
?>