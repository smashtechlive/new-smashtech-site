<?php /* Template Name: Brands */ get_header(); ?>
<?php get_header(); ?>
<main>
	<div class="container-fluid">
		
				<!-- section -->

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<div class="row">
					<div class="col-xs-12">
						<div class="hero" style="background: url('<?php echo get_template_directory_uri(); ?>/img/DSC01462.jpg');">
							<h1>OUR BRANDS</h1>
							<p>We believe that self-love, body positivity, and confidence is the foundation to a healthy and active lifestyle and hope that our dedication to providing premium, all-natural products will help you get there. At SkinnyFit, we believe that healthy is beautiful, just like you.</p>
							<i class="fa fa-chevron-down"></i>
						</div>

					</div><!-- .col -->
				</div><!-- .row -->

				<div class="row locks">
					<div class="col-sm-4">
						<div class="lock grey d-flex justify-content-center">
							<div class="align-self-end">
								<i class="fa fa-lock"></i>
								<span>1</span>
							</div>
						</div><!-- .lock -->
						<p><strong>CONFIDENTIAL</strong></p>
						<p>coming soon</p>
					</div><!-- .col -->
					<div class="col-sm-4">
						<div class="lock yellow d-flex justify-content-center">
							<div class="align-self-end ">
								<i class="fa fa-lock"></i>
								<span>2</span>
							</div>
						</div><!-- .lock -->
						<p><strong>CONFIDENTIAL</strong></p>
						<p>coming soon</p>
					</div><!-- .col -->
					<div class="col-sm-4">
						<div class="lock black d-flex justify-content-center">
							<div class="align-self-end ">
								<i class="fa fa-lock"></i>
								<span>3</span>
							</div>
						</div><!-- .lock -->
						<p><strong>CONFIDENTIAL</strong></p>
						<p>coming soon</p>
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

