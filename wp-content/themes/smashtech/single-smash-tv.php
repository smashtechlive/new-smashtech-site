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
			<section>
				<div class="container mb-5">
					<div class="row">
						<div class="col">
							<p><small>UP NEXT</small></p>
						</div>
					</div><!-- .row -->

					<div class="row">
						<div class="col">
							<div class="swiper-container swiper-smash">
							  <div class="swiper-wrapper">
									<?
											// The Query
										$the_query = new WP_Query( array( 'posts_per_page' => -1, 'post_type' => 'smash-tv' ));
										// The Loop
										if ( $the_query->have_posts() ) {						
											while ( $the_query->have_posts() ) {
												$the_query->the_post();
												//pr($the_query->post);
												echo '<div class="swiper-slide">
												 				<a href="'.$the_query->post->guid.'">
													 				<div class="play-container">
													 					<img src="'.get_template_directory_uri().'/img/play_button.png" class="play-button">
													 					<img src="'.wp_get_attachment_url( get_post_thumbnail_id($the_query->post->ID) ).'" class="img-fluid">
													 				</div>
													 				<h5 class="mt-3 loop-title">' . $the_query->post->post_title . '</h5>
													 				<p>watch video >> </p>
													 			</a>
															</div>';
											}
											wp_reset_postdata();
										} 
									?>
								</div><!-- .swiper-wrapper -->
								<div class="swiper-button-next swiper-button-black"></div>
  							<div class="swiper-button-prev swiper-button-black"></div>
								<div class="swiper-pagination"></div>
							</div><!-- .swiper-smash -->
						</div><!-- .col -->
					</div><!-- .row -->
				</div><!-- .container -->		
			</section>
				
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
