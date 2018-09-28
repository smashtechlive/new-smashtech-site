<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<div class="col-sm-3">
		<article>
			<a href="<?= $post->guid?>">
				<img src="<?= wp_get_attachment_url( get_post_thumbnail_id($post->ID) )?>" class="img-fluid">
				<h5 class="loop-title mt-3">' . $post->post_title . '</h5>
				<p>Read More >> </p>
			</a>
		</article>
	</div>
<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'wpbootstrapsass' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
