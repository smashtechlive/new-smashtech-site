<?php /* Template Name: Founders */ get_header(); ?>

<main class="founders">
	
		
				<!-- section -->

				<? if (have_posts()): while (have_posts()) : the_post(); ?>
				<div class="container-fluid">
					<?include get_template_directory() . '/inc/hero_template_part.php'; ?>
				</div>
				<div class="container">
					<div class="row">
						<div class="col text-center content-area " data-aos="fade-down">
							<? the_content(); ?>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<h2 class="text-center">THE SMASHTECH STORY</h2>
						</div>
					</div>

					<ol class="timeline">
					<? 
						if ( have_rows('timeline') ):
				    	while ( have_rows('timeline') ) : the_row(); 
				    		$year = get_sub_field('year');
				    		$image = get_sub_field('image');
				    		$content = get_sub_field('content');
				  ?>
				    	<li data-aos="fade-right">
				    		<p class="timeline-title"><?= $year ?></p>
				    		<div class="timeline-img">
				    			<img src="<?= $image[url] ?>" class="img-fluid">
				    		</div>
				    		<p class="timeline-content"><?= $content ?></p>
				    	</li>

		   		<?	endwhile;
			    	endif; ?>
					</ol>
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

