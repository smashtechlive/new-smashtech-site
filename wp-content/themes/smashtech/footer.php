			<?
				$footer_bg = (get_field('footer_background')) ? get_field('footer_background') : get_template_directory_uri(). '/img/footer_img.jpg';
			?>
			<div class="footer-top" style="background: url('<?= $footer_bg ?>') no-repeat top center;">
				<div class="container">
					<div class="row ">
						<div class="col text-center align-self-center">
							<p>WANT TO BE PART OF <br>SOMETHING GREAT?</p>
							<p class="align-self-center"><a href="/" class="btn btn-yellow">View open positions ></a></p>
						</div>
					</div>
				</div>
			</div>

			<!-- footer -->
			<footer class="footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<img src="<?php echo get_template_directory_uri(); ?>/img/smash-footer-logo.png" class="img-fluid" style="margin-right: 20px;">
							2015-2018 Smashtech. All rights reserved.
						</div><!-- .col -->
					
						<div class="col-sm-6">
							<div class="pull-left">
								<span style="color: #fff;">Featured In</span>
								<img src="<?php echo get_template_directory_uri(); ?>/img/featured.png" class="img-fluid" style="margin-left: 10px;">
							</div>
							<div class="social pull-left">
								<a href="https://facebook.com" target="_blank">
									<img src="<?php echo get_template_directory_uri(); ?>/img/Ig.png" class="img-fluid" style="margin-left: 10px; width: 30px;">
								</a>
								<a heff="https://instagram.com" taget="_blank">
									<img src="<?php echo get_template_directory_uri(); ?>/img/Fb.png" class="img-fluid" style="margin-left: 10px; width: 30px;">
								</a>
							</div>
						</div><!-- .col -->
					</div>
				</div><!-- /.container -->
			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

	</body>
</html>
