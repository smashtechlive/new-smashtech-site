<?php /* Template Name: About */ get_header(); ?>
<?php get_header(); ?>
<main class="about">
	<div class="container-fluid">
		
				<!-- section -->

				<? if (have_posts()): while (have_posts()) : the_post(); 
					$hero = get_field('hero');	
					if ($hero): ?>
						<div class="row">
							<div class="col no-pad">
								<div class="hero" style="background: url('<?= $hero[image][url] ?>');">
									<h1><?= $hero[title_label] ?></h1>
									<p><?= $hero[paragraph_content] ?></p>
									<i class="fa fa-chevron-down"></i>
								</div>

							</div><!-- .col -->
						</div><!-- .row -->
					<? endif; ?>
				

				<div class="row mission-values">
					<div class="col-sm-6">
						
						<div class="text-block d-flex">
							<div class="align-self-center">
								<h2>OUR MISSION</h2>
								<p>We do it all from research & development, manufacturing, design, branding, marketing, media, sales, and customer service, for every brand we create.</p>
							</div>
						</div>
						<img src="<?php echo get_template_directory_uri(); ?>/img/about_left.png" class="img-fluid">
					</div><!-- .col -->
					<div class="col-sm-6">
						<img src="<?php echo get_template_directory_uri(); ?>/img/about_right.png" class="img-fluid">
						<div class="text-block d-flex">
							<div class="align-self-center">
								<h2>OUR VALUES</h2>
								<p>We do it all from research & development, manufacturing, design, branding, marketing, media, sales, and customer service, for every brand we create.</p>
							</div>
						</div>

					</div><!-- .col -->
				</div><!-- .row -->
				<div class="secret-sauce grey-bg">
					<div class="row">
						<div class="col">
							<h2>OUR SECRET SAUCE</h2>
						</div><!-- .col -->
					</div>
					<div class="row">
						<div class="col-sm-4">
							<img src="<?php echo get_template_directory_uri(); ?>/img/DR_1.png" class="img-fluid mx-auto">
							<h3>DIRECT RESPONSE</h3>
							<p>We do it all from research & development, manufacturing, design, branding, marketing, media, sales, and customer service, for every brand we create.</p>
							
						</div><!-- .col -->
						<div class="col-sm-4">
							<img src="<?php echo get_template_directory_uri(); ?>/img/performance.png" class="img-fluid mx-auto">
							<h3>A CULTURE OF PERFORMANCE</h3>
							<p>We do it all from research & development, manufacturing, design, branding, marketing, media, sales, and customer service, for every brand we create.</p>
							
						</div><!-- .col -->
						<div class="col-sm-4">
							<img src="<?php echo get_template_directory_uri(); ?>/img/growth_1.png" class="img-fluid mx-auto">
							<h3>NEVERENDING GROWTH</h3>
							<p>We do it all from research & development, manufacturing, design, branding, marketing, media, sales, and customer service, for every brand we create.</p>
							
						</div><!-- .col -->
					</div><!-- .row -->
				</div><!-- .secret-sauce -->

				<div class="row">
					<div class="col">
						<img src="<?php echo get_template_directory_uri(); ?>/img/about_smashtech.png" class="img-fluid">
					</div><!-- .col -->
				</div><!-- .row -->

				<div class="row winning-culture">
					<div class="col">
						<h4>A WINNING CULTURE</h4>
						<img src="<?php echo get_template_directory_uri(); ?>/img/winning_culture.png" class="img-fluid mx-auto">
					</div><!-- .col -->
				</div><!-- .row -->

				<?php endwhile; ?>

				<?php else: ?>

					<!-- article -->
					<article>

						<h2><?php _e( 'Sorry, nothing to display.', 'wpbootstrapsass' ); ?></h2>

					</article>
					<!-- /article -->

				<?php endif; ?>


			
	</div><!-- /.container -->
</main>
<?php get_footer(); ?>

