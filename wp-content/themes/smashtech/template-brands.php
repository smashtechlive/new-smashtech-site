<?php /* Template Name: Brands */ get_header(); ?>

<main>
	
		
				<!-- section -->

			<?php if (have_posts()): while (have_posts()) : the_post(); $hero = get_field('hero'); ?>
				<div class="container-fluid">
					<? include get_template_directory() . '/inc/hero_template_part.php'; ?>
				</div>
				<div class="container">
					<div class="row" data-aos="fade-down">
						<div class="col">
							<? the_content() ?>
						</div><!-- .col -->
					</div>

					<div class="row locks">
						<div class="col-sm-4" data-aos="fade-right">
							<div class="lock grey d-flex justify-content-center">
								<div class="align-self-end">
									<i class="fa fa-lock"></i>
									<span>1</span>
								</div>
							</div><!-- .lock -->
							<h3>CONFIDENTIAL BRAND</h3>
							<p>Coming Soon</p>
						</div><!-- .col -->
						<div class="col-sm-4" data-aos="fade-down" data-aos-delay="200">
							<div class="lock yellow d-flex justify-content-center">
								<div class="align-self-end ">
									<i class="fa fa-lock"></i>
									<span>2</span>
								</div>
							</div><!-- .lock -->
							<h3>CONFIDENTIAL BRAND</h3>
							<p>Coming Soon</p>
						</div><!-- .col -->
						<div class="col-sm-4" data-aos="fade-left" data-aos-delay="400">
							<div class="lock black d-flex justify-content-center">
								<div class="align-self-end ">
									<i class="fa fa-lock"></i>
									<span>3</span>
								</div>
							</div><!-- .lock -->
							<h3>CONFIDENTIAL BRAND</h3>
							<p>Coming Soon</p>
						</div><!-- .col -->
					</div><!-- .row -->

					<div class="row">
						<div class="col">
							<img src="<?php echo get_template_directory_uri(); ?>/img/brands_left.jpg" class="img-fluid">
						</div><!-- .col -->
						<div class="col">
							<img src="<?php echo get_template_directory_uri(); ?>/img/brands_right.jpg" class="img-fluid">
						</div><!-- .col -->
					</div><!-- .row -->
				</div><!-- ..container -->

				<?php endwhile; ?>

				<?php else: ?>

					<!-- article -->
					<article>

						<h2><?php _e( 'Sorry, nothing to display.', 'wpbootstrapsass' ); ?></h2>

					</article>
					<!-- /article -->

				<?php endif; ?>


			
</main>
<?php get_footer(); ?>

