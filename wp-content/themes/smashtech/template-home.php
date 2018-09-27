<?php /* Template Name: Home */ get_header(); ?>

<main class="home">
	
	<? if (have_posts()): while (have_posts()) : the_post();  ?>
		<? if( have_rows('hero_slides') ): ?>
	  	<div class="container-fluid">
		  	<div class="row">
		    		<div class="col no-pad">
		    			<div class="hero  swiper-container swiper-hero">
						    <div class="swiper-wrapper">
								  	<?  while ( have_rows('hero_slides') ) : the_row(); 
								  				$bg = get_sub_field('background_image');
								  				$title = get_sub_field('title');
								  				$copy = get_sub_field('copy');
								  				$cta = get_sub_field('cta');
								  	?> 							
						    			<div  class="swiper-slide d-flex" style="background: url('<?= $bg[url] ?>') no-repeat top center;">
			    							<div class="align-self-center justify-content-center">
				    							<h1><?= $title ?></h1>
				    							<p> <?= $copy ?></p>
				    							<p><a href="<?= $cta ?>" class="btn btn-yellow">Learn more ></a></p>
				    						</div>
			    						</div>
										<? endwhile; ?>
								</div><!-- .swiper-wrapper -->
								<div class="swiper-pagination"></div>
							</div><!-- .swiper-container -->
		    		</div><!-- .col -->
		    	</div><!-- .row -->
		    </div><!-- .container-fluid -->
				<? else : endif; ?>
				<? 
					$sub_hero_image = get_field('sub_hero_image');
				?>
				<div class="mt-5">
					<div class="container mb-5">
						<div class="row">
							<div class="col text-center">
								<h2 class=""><?= get_field('sub_hero_text') ?></h2>
								<img src="<?= $sub_hero_image[url] ?>" class="img-fluid">
							</div><!-- .col -->
						</div><!-- .row -->
						
					</div><!-- .container -->
				</div>
				<div class="container mt-3 mb-5">
					<div class="row">
						<div class="col text-center">
							<i class="fa fa-chevron-down"></i>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 content-area mobile-1">
							<div >
								<? the_content() ?>
								<p><a href="/about" class="btn btn-yellow">About us</a></p>
							</div>
						</div><!-- .col -->
						<div class="col" >
							<div >
								<img src="<?php echo get_template_directory_uri(); ?>/img/IDEA.png" class="img-fluid">
							</div>
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
								<div  class="hero d-flex" style="background: url('<?= $branding_bg[url] ?>') no-repeat top center;">
									<div  class="align-self-center justify-content-center">
										<h1><?= $branding_title ?></h1>
										<p><?= $brand_copy ?></p>
									</div>
								</div>
							</div><!-- .col -->
							
						</div><!-- .row -->
					</div><!-- .container -->

					<div class="container founders mb-5 mt-5">
						<div class="row">
							<div class="col text-center">
								<?= get_field('copy_section_two') ?>
							</div><!-- .col -->
						</div><!-- .row -->

						<div class="row">
							<div class="col text-center">
								<!--<h2 class="">MEET THE TEAM</h2>-->
								<i class="fa fa-chevron-down"></i>
							</div><!-- .col -->
						</div><!-- .row -->

						<div class="row mt-5">
							<div class="col text-center no-pad">
								<h2 class="orange-border text-center">FOUNDERS</h2>
								<? if (get_field('founders_image')) { $founders_imgage = get_field('founders_image'); ?>
									<img src="<?= $founders_imgage[url] ?>" class="img-fluid" >
								<? } else { ?>
									<img src="<?php echo get_template_directory_uri(); ?>/img/founders.png" class="img-fluid" >
								<? } ?>
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
					    			<h2 class="text-center orange-border" ><?= $title ?></h2>
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
						    						<div  class="swiper-slide text-center">
						    							<img src="<?= $image[url] ?>" class="img-fluid drop-shadow">
						    							<p class="mb-0 mt-1"><strong><?= $name ?></strong></p>
						    							<p class="mb-5"><?= $job_title ?></p>
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

						

				<div class="newest-blogs mt-5">
					<div class="container">
						<div class="row">
							<div class="col text-center">
								<h2 class="mb-5 orange-border">SEE WHAT'S GOING ON</h2>
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
											 				<h5 class="loop-title mt-3">' . $the_query->post->post_title . '</h5>
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
									<a href="/blog" class="btn btn-yellow btn-lg">View all stories ></a>
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

