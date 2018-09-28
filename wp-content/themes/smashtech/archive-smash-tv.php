<?php get_header(); ?>
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
						  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/cReHuA_9iU8" allowfullscreen></iframe>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col">
						<h2>Be persistent, don't give up | Smashtech 001</h2>
					</div>
				</div><!-- .row -->
				<div class="row ">
					<div class="col">
						<p>Welcome to Smash TV. A series that features and highlights the journey of San Diego’s most prominent and fastest growing company. This is a journey of two men who had a dream, forged a path through a field of doubts, and created an environment that now flourishes with 80+ employees. Let us introduce you to the people and ideas that defy the odds and define the difference.</p>
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
													 				<img src="'.wp_get_attachment_url( get_post_thumbnail_id($the_query->post->ID) ).'" class="img-fluid">
													 				<h5 class="mt-3 loop-title">' . $the_query->post->post_title . '</h5>
													 				<p>watch video >> </p>
													 			</a>
															</div>';
											}
											wp_reset_postdata();
										} 
									?>
								</div><!-- .swiper-wrapper -->
								<div class="swiper-pagination"></div>
							</div><!-- .swiper-smash -->
						</div><!-- .col -->
					</div><!-- .row -->
				</div><!-- .container -->		
			</section>

				
		</div><!-- .careers-single -->
		
<?php get_footer(); ?>
