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
	$phone 			= get_field('phone', 'option');
	$mail 			= get_field('mail', 'option');
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
			<a href="/resume.pdf" class="experience-resume btn btn-secondary" title="Download my resume" target="_blanc">Download my resume (fr)</a>
		</div>
	</section>
	<section class="section contact" id="contact">
		<h2 class="section-title">Get in touch</h2>
		<div class="section-wrap contact-content">
			<p class="contact-intro">Send me an email if you want to start a new project, a new collaboration or send a dad's joke to contribute to my 10 laugh a day therapy.</p>
			<form class="contact-form" action="contact.php" method="POST" id="contact-form">
				<div class="contact-form-feedback">
					<?php if(!empty($_SESSION['errors'])): ?>
						<ul class="contact-form-feedback-list contact-form-feedback-error">
							<?php if(isset($_SESSION['errors']['name'])): ?>
								<li class="contact-form-feedback-elt"><?php echo $_SESSION['errors']['name']; ?></li>
							<?php endif; ?>
							<?php if(isset($_SESSION['errors']['email'])): ?>
								<li class="contact-form-feedback-elt"><?php echo $_SESSION['errors']['email']; ?></li>
							<?php endif; ?><?php if(isset($_SESSION['errors']['url'])): ?>
								<li class="contact-form-feedback-elt"><?php echo $_SESSION['errors']['url']; ?></li>
							<?php endif; ?><?php if(isset($_SESSION['errors']['message'])): ?>
								<li class="contact-form-feedback-elt"><?php echo $_SESSION['errors']['message']; ?></li>
							<?php endif; ?>
						</ul>
					<?php endif; ?>
					<?php if(isset($_SESSION['success'])): ?>
						<p class="contact-form-feedback-success"><?php echo $_SESSION['success']; ?></p>
					<?php endif; ?>
				</div>
				<fieldset class="contact-form-fieldset">
					<label class="contact-form-label" for="inputname">Name</label>
					<input class="contact-form-input<?php echo isset($_SESSION['errors']['name']) ? " contact-form-input-error" : "" ?>" type="text" name="name" value="<?php echo isset($_SESSION['data']['name']) ? $_SESSION['data']['name'] : "" ?>" id="inputname" placeholder="Your name here">
				</fieldset>
				<fieldset class="contact-form-fieldset">
					<label class="contact-form-label" for="inputmail">Email</label>
					<input class="contact-form-input<?php echo isset($_SESSION['errors']['email']) ? " contact-form-input-error" : "" ?>" type="email" name="email" value="<?php echo isset($_SESSION['data']['email']) ? $_SESSION['data']['email'] : "" ?>" id="inputmail" placeholder="Your email here">
				</fieldset class="contact-form-fieldset">
				<fieldset class="contact-form-fieldset">
					<label class="contact-form-label" for="inputurl">URL</label>
					<input class="contact-form-input<?php echo isset($_SESSION['errors']['url']) ? " contact-form-input-error" : "" ?>" type="url" name="url" value="<?php echo isset($_SESSION['data']['url']) ? $_SESSION['data']['url'] : "" ?>" id="inputurl" placeholder="http://">
				</fieldset class="contact-form-fieldset">
				<fieldset class="contact-form-fieldset">
					<label class="contact-form-label" for="inputmessage">Message</label>
					<textarea class="contact-form-textarea<?php echo isset($_SESSION['errors']['message']) ? " contact-form-textarea-error" : "" ?>" name="message" id="inputmessage" rows="8" cols="10" placeholder="Your message here"><?php echo isset($_SESSION['data']['message']) ? $_SESSION['data']['message'] : "" ?></textarea>
				</fieldset>
				<button class="contact-form-submit btn btn-primary" type="submit" name="submit">Send</button>
			</form>
		</div>
	</section>
<?php
	get_footer();
	unset( $_SESSION['errors'] );
    unset( $_SESSION['success'] );
    unset( $_SESSION['data'] );
?>