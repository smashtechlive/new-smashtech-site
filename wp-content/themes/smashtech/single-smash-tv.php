<?php get_header(); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<? $youtube = get_field('youtube_id'); ?>
		<div class="tv-single blog">
			<div class="container-fluid">
				<div class="row">
					<div class="col no-pad text-center blog-header">
						SMASH TV
					</div>
				</div>
			</div><!-- .container-fluid -->
			<div class="container mt-5">
				<div class="row">
					<div class="col">
						<p><small>SMASH PICK</small></p>
					</div>
				</div><!-- .row -->
				<div class="row">
					<div class="col">
						<div class="embed-responsive embed-responsive-16by9">
						  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $youtube ?>" allowfullscreen></iframe>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col">
						<h2><? the_title(); ?></h2>
					</div>
				</div><!-- .row -->
				<div class="row">
					<div class="col">
						<? the_content(); ?>
					</div>
				</div><!-- .row -->
			</div><!-- .conatiner -->
			
			<? include get_template_directory() . '/inc/smash_tv_carousel.php'; ?>
				
		</div><!-- .tv-single -->
		<?php endwhile; ?>

		<?php else: ?>

					<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'smashtech' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>


<?php get_footer(); ?>
