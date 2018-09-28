<?php get_header(); ?>
<main>
	<div class="container">
		<div class="row">
			<div class="col">
				<!-- section -->
					<section>
						<h1 class="page-header mt-5"><?php _e( 'Archives', 'wpbootstrapsass' ); ?></h1>
						<div class="row">
							<?php get_template_part('loop'); ?>

							<?php get_template_part('pagination'); ?>
						</div>
					</section>
				<!-- /section -->
			</div><!-- /.col-md-8 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</main>
<?php get_footer(); ?>
