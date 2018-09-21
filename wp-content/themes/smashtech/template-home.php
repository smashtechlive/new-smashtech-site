<?php /* Template Name: Home */ get_header(); ?>
<?php get_header(); ?>
<main class="home">
	
	<? if (have_posts()): while (have_posts()) : the_post();  ?>
		<? if( have_rows('hero_slides') ): ?>
	  	<div class="container-fluid">
		  	<div class="row">
		    		<div class="col no-pad">
		    			<div class="hero swiper-container swiper-hero">
						    <div class="swiper-wrapper">
								  	<?  while ( have_rows('hero_slides') ) : the_row(); 
								  				$bg = get_sub_field('background_image');
								  				$title = get_sub_field('title');
								  				$copy = get_sub_field('copy');
								  	?> 							
						    			<div class="swiper-slide" style="background: url('<?= $bg[url] ?>') no-repeat;">
			    							<h1><?= $title ?></h1>
			    							<p><?= $copy ?></p>
			    							<p><a href="/" class="btn btn-yellow">Learn more ></a></p>
			    						</div>
										<? endwhile; ?>
								</div><!-- .swiper-wrapper -->
								<div class="swiper-pagination"></div>
							</div><!-- .swiper-container -->
		    		</div><!-- .col -->
		    	</div><!-- .row -->
		    </div><!-- .container-fluid -->
				<? else : endif; ?>
				<section class="mt-3">
					<div class="container ">
						<div class="row">
							<div class="col-sm-4">
								<p class="blockquote">SEE WHY WE ARE <span class="yellow">THE BEST COMPANY</span> TO WORK FOR</p>
							</div><!-- .col -->
							<div class="col">
								<img src="<?php echo get_template_directory_uri(); ?>/img/hp_group.png" class="img-fluid">
							</div><!-- .col -->
						</div><!-- .row -->
						
					</div><!-- .container -->
				</section>
				<div class="container mt-3 mb-5">
					<div class="row">
						<div class="col text-center">
							<i class="fa fa-chevron-down"></i>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 content-area">
							<? the_content() ?>
							<p><a href="/" class="btn btn-yellow">About us</a></p>
						</div><!-- .col -->
						<div class="col">
							<img src="<?php echo get_template_directory_uri(); ?>/img/IDEA.png" class="img-fluid">
						</div><!-- .col -->
					</div><!-- .row -->
				</div><!-- .container -->

					<div class="container-fluid">
						<div class="row">
							<div class="col no-pad">
								<?
									$branding_bg = get_field('background_image_branding');
									$branding_title = get_field('brand_title');
									$brand_copy = get_field('brand_copy');
								?>
								<div class="hero" style="background: url('<?= $branding_bg[url] ?>');">
									<h1><?= $branding_title ?></h1>
									<p><?= $brand_copy ?></p>
								</div>
							</div><!-- .col -->
							
						</div><!-- .row -->
					</div><!-- .container -->

					<div class="container founders mb-5">
						<div class="row">
							<div class="col text-center">
								<h2 class="">MEET THE TEAM</h2>
								<i class="fa fa-chevron-down"></i>
							</div><!-- .col -->
						</div><!-- .row -->

						<div class="row mt-5">
							<div class="col text-center">
								<h3 class="orange-border text-center">FOUNDERS</h3>
								<img src="<?php echo get_template_directory_uri(); ?>/img/founders.png" class="img-fluid">
								<h5 class="text-center mb-0">OMAR & ANWAR</h5>
								<p class="text-center"><small>CEO and Co-Founders</small></p>
							</div><!-- .col -->
						</div><!-- .row -->
					</div><!-- .container -->
					
						<? if( have_rows('section') ): $counter = 2;?>
					  	<?  while ( have_rows('section') ) : the_row(); 
					  				$title = get_sub_field('title');
					  				$bg_color = ($counter % 2 == 0) ? 'grey-bg' : '';
					  				$counter++;
					  	?>
					  	<div class="container-fluid <?= $bg_color ?> jobs-section">
					    	<div class="row">
					    		<div class="col text-center">
					    			<h2 class="text-center orange-border"><?= $title ?></h2>
					    		</div>
					    	</div>
					    	<? if (have_rows('slide')) : ?>
					    		<div class="row">
					    			<div class="col">
							    		<div class="swiper-container swiper-jobs">
										    <div class="swiper-wrapper">
							    				<?	while (have_rows('slide')) : the_row(); 
							    						$image = get_sub_field('image');
							    						$job_title = get_sub_field('job_title');
							    						$name = get_sub_field('name');
							    				?>
						    						<div class="swiper-slide text-center">
						    							<img src="<?= $image[url] ?>" class="img-fluid">
						    							<p><?= $name ?></p>
						    							<p><strong><?= $job_title ?></strong></p>
						    						</div>
						    					<?	endwhile; ?>

							    			</div><!-- swiper-wrapper -->
							    			<div class="swiper-pagination"></div>
							    		</div><!-- .swiper-container -->
							    	</div><!-- .col -->
								  </div><!-- .row -->
							 	<? endif; ?>
							 	</div><!-- .container-fluid -->
							<? endwhile; ?>
								
							<? else : endif; ?>

						

				<div class="newest-blogs">
					<div class="container">
						<div class="row">
							<div class="col text-center">
								<h2>SEE WHAT'S GOING ON</h2>
							</div><!-- .col -->
						</div><!-- .row -->
						<div class="row">
							<?
								// The Query
								$the_query = new WP_Query( array( 'posts_per_page' => 4 ));
								// The Loop
								if ( $the_query->have_posts() ) {						
									while ( $the_query->have_posts() ) {
										$the_query->the_post();
										//pr($the_query->post);
										echo '<div class="col-md-3">
										 				<a href="'.$the_query->post->guid.'">
											 				<img src="'.wp_get_attachment_url( get_post_thumbnail_id($the_query->post->ID) ).'" class="img-fluid">
											 				<p class="loop-title">' . $the_query->post->post_title . '</p>
											 				<p>Read More >> </p>
											 			</a>
													</div>';
									}
									wp_reset_postdata();
								} 
							?>
						</div>
						<div class="row">
							<div class="col">
								<p class="text-center">
									<a href="/" class="btn btn-yellow btn-lg">View all stories ></a>
								</p>
							</div>
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- .newest-blogs -->


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

