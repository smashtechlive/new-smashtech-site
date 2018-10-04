<?php /* Template Name: About */ get_header(); ?>

<main class="about">
	<!-- section -->
	<? if (have_posts()): while (have_posts()) : the_post(); ?>
	<div class="container-fluid">
		<? include get_template_directory() . '/inc/hero_template_part.php'; ?>
	</div>
	<div class="container">
		<div class="row mt-5" data-aos="fade-down">
			<div class="col text-24">
				<? the_content() ?>
			</div><!-- .col -->
		</div>
	</div>

	<? include get_template_directory() . '/inc/page_builder.php'; ?>

	
	
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

