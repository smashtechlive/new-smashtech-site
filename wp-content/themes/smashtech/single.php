<?php get_header(); ?>
<main class="blog">
	<div class="container-fluid">
		<div class="row">
			<div class="col no-pad text-center blog-header">
				Original Smash
			</div>
		</div>
	</div><!-- .container-fluid -->
	<div class="container">
		<div class="row">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<div class="col col-sm-9">
					<div class="row">
						<div class="col post-title">
							<p class="post-date"><small><?= the_date('F j, Y') ?></small></p>
							<h1><?= the_title() ?></h1>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<p><?= $post->excerpt ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<p><?= the_content() ?></p>
						</div>
					</div>
				</div>
				


			


			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h1><?php _e( 'Sorry, nothing to display.', 'wpbootstrapsass' ); ?></h1>

				</article>
				<!-- /article -->

			<?php endif; ?>

			<div class="col col-sm-3">
				<?php get_sidebar(); ?>
				lkjdaklfjd 
				fdsalk;jfkds;a
				fsaklf;jdsaf
				dakjfl;dasfljkdsaf
				dsajfk;sadjfkdsa
			</div>
			
		</div><!-- .row -->
	</div><!-- .container -->
</main>
<?php get_footer(); ?>
