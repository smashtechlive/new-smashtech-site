<?php /* Template Name: Blog */ get_header(); ?>
<?php get_header(); ?>
<main class="blog blog-home">
	<div class="container-fluid">
		<div class="row">
			<div class="col no-pad text-center blog-header">
				Original Smash
			</div>
		</div>
	</div><!-- .container-fluid -->
	<? if (have_posts()): while (have_posts()) : the_post(); ?>
		<?
			$featured_blog = get_field('featured_blog');
			$trending_blogs = get_field('trending_blogs');
			$smash_pick = get_field('smash_pick');

			//pr($trending_blogs);
		?>
		<div class="grey-bg">
			<div class="container ">
				<div class="row">
					<div class="col col-sm-6">
						<a href="<?= $featured_blog->guid ?>">
							<img src="<?= wp_get_attachment_url( get_post_thumbnail_id($featured_blog->ID) ) ?>" class="img-fluid">
						</a>
					</div><!-- .col -->
					<div class="col col-sm-6">
						<h2><?= $featured_blog->post_title ?></h2>
						<p><?= $featured_blog->post_excerpt ?></p>
						<p><a href="<?= $featured_blog->guid ?>" class="btn btn-yellow">read more ></a></p>
					</div><!-- .col -->
				</div><!-- .row -->
			</div>
		</div><!-- .gre-bg -->

		<div class="latest-blogs blog-section">
			<div class="container">
				<div class="row">
					<div class="col"><p><small>Latest</small></p></div><!-- .col -->
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
								echo '<div class="col">
								 				<a href="'.$the_query->post->guid.'">
									 				<img src="'.wp_get_attachment_url( get_post_thumbnail_id($the_query->post->ID) ).'" class="img-fluid">
									 				<p class="loop-title">' . $the_query->post->post_title . '</p>
									 			</a>
											</div>';
							}
							wp_reset_postdata();
						} 
					?>
				</div><!-- .row -->
			</div><!-- .container-->
		</div><!-- .blog-section -->

		<div class="trending blog-section">
			<div class="container ">
				<div class="row">
					<div class="col"><p><small>Trending This</small></p></div><!-- .col -->
				</div><!-- .row -->
				<div class="row">
					<? foreach ($trending_blogs as $trending_blog) { ?>
						<div class="col col-sm-6">
							<p class="date"><?= $trending_blog->post_date ?></p>
							<img src="<?= wp_get_attachment_url( get_post_thumbnail_id($trending_blog->ID) ) ?>" class="img-fluid">
							<p class="loop-title"><?= $trending_blog->post_title ?></p>
						</div><!-- .col -->
					<? } ?>
					
					
				</div><!-- .row -->
			</div>
		</div><!-- .trending -->

		<div class="smash-picks blog-section">
			<div class="container ">
				<div class="row">
					<div class="col"><p><small>Smash Pick</small></p></div><!-- .col -->
				</div><!-- .row -->
				<div class="row">
					<div class="col col-sm-6">
						<img src="<?= wp_get_attachment_url( get_post_thumbnail_id($smash_pick->ID) ) ?>" class="img-fluid">
					</div><!-- .col -->
					<div class="col col-sm-6">
						<h2><?= $smash_pick->post_title ?></h2>
						<p><?= $smash_pick->post_excerpt ?></p>
						<p><a href="<?= $smash_pick->guid ?>" class="btn btn-yellow">read more ></a></p>
					</div><!-- .col -->
				</div><!-- .row -->
			</div>
		</div><!-- .smash-picks -->


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

