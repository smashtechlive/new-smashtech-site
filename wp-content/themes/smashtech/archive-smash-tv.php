<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<div class="tv-single blog">
			<div class="container-fluid">
				<div class="row">
					<div class="col no-pad text-center blog-header">
						SMASH TV
					</div>
				</div>
			</div><!-- .container-fluid -->
			<div class="container">
				<div class="row">
					<div class="col">
						<p><small>SMASH PICK</small></p>
					</div>
				</div><!-- .row -->
				<div class="row">
					<div class="col">
						<div class="embed-responsive embed-responsive-16by9">
						  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
				<div class="row">
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
				<div class="container">
					<div class="row">
						<div class="col">
							<p><small>UP NEXT</small></p>
						</div>
					</div><!-- .row -->

					<div class="row">
						<?
								// The Query
								$the_query = new WP_Query( array( 'posts_per_page' => 4, 'post_type' => 'smash-tv' ));
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
