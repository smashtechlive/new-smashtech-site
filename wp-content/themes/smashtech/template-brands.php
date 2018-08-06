<?php /* Template Name: Brands */ get_header(); ?>
<?php get_header(); ?>
<main>
	<div class="container-fluid">
		
				<!-- section -->

			<?php if (have_posts()): while (have_posts()) : the_post(); $hero = get_field('hero');	
					if ($hero): ?>
						<div class="row">
							<div class="col">
								<div class="hero" style="background: url('<?= $hero[image][url] ?>');">
									<h1><?= $hero[title_label] ?></h1>
									<p><?= $hero[paragraph_content] ?></p>
									<i class="fa fa-chevron-down"></i>
								</div>

							</div><!-- .col -->
						</div><!-- .row -->
					<? endif; ?>

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

