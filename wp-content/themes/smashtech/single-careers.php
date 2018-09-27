
<?php get_header(); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); 
		$application_link = get_field('application_link');
	?>
		<div class="careers-single">
			<div class="container-fluid">
					<div class="row">
						<div class="col no-pad">
							<div class="d-flex hero small" style="background: url(../../wp-content/themes/smashtech/img/careers_header.jpg) no-repeat top center;">
								<div class="align-self-center justify-content-center">
									<h1>MORE THAN A CAREER A LIFESTYLE</h1>
								</div>
							</div>
						</div><!-- .col -->
					</div><!-- .row -->
				</div><!-- .container -->

			<div class="container">
					<div class="row post-header">
						<div class="col">
							<div class="bottom-border">
								<div class="row">
									<div class="col-sm-6">
										<h2><?= the_title() ?></h2>
										<p>Marketing - San Diego, California</p>
									</div>

									<div class="col-sm-6">
										<p class="apply-now">
											<a href="<?= $application_link ?>" class="btn btn-yellow" target="_blank">
												Apply >
											</a>
										</p>
									</div>
								</div><!-- .row -->
							</div><!-- .bottom-border -->
						</div><!-- .col -->
					</div><!-- .row -->

				<div class="row">
					<div class="col">
						<?= the_content() ?>
						<p><strong>Are we a fit? Click on the link below to apply!</strong></p>
						<p><a href="<?= $application_link ?>" class="btn btn-yellow" target="_blank">apply ></a></p>
					</div>
				</div><!-- .row -->

				<div class="row">
					<div class="col">
						SHARE
					</div>
				</div><!-- .row -->
			

			</div><!-- .container -->
		</div><!-- .careers-single -->
		<?php endwhile; ?>

		<?php else: ?>

					<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'smashtech' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>


<?php get_footer(); ?>
