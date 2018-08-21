<?php /* Template Name: Careers */ get_header(); ?>
<?php get_header(); ?>
<main class="careers">
	
		
				<!-- section -->

			<?php if (have_posts()): while (have_posts()) : the_post(); $hero = get_field('hero');	
					if ($hero): ?>
						<div class="container-fluid">
							<div class="row">
								<div class="col no-pad">
									<div class="hero" style="background: url('<?= $hero[image][url] ?>') no-repeat top center; background-size: cover;">
										<h1><?= $hero[title_label] ?></h1>
										<p><?= $hero[paragraph_content] ?></p>
										<i class="fa fa-chevron-down"></i>
									</div>

								</div><!-- .col -->
							</div><!-- .row -->
						</div>
					<? endif; ?>

					<? include get_template_directory() . '/inc/page_builder.php'; ?>



				<div class="list-open-careers">
					<div class="container">
						<div class="row">
							<div class="col">
								<h2>FIND YOUR OPPORTUNITY</h2>
							</div><!-- .col -->
						</div>

					</div><!-- .cotnainer -->
				</div><!-- .grey -->


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

