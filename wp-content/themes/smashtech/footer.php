			<?
				$footer_bg = (get_field('footer_background')) ? get_field('footer_background') : get_template_directory_uri(). '/img/footer_img.jpg';
			?>
			<div class="footer-top" style="background: url('<?= $footer_bg ?>') no-repeat top center;">
				<div class="container">
					<div class="row ">
						<div class="col text-center align-self-center">
							<h1>WANT TO BE PART OF <br>SOMETHING GREAT?</h1>
							<p class="align-self-center"><a href="/career" class="btn btn-yellow">View open positions ></a></p>
						</div>
					</div>
				</div>
			</div>

			<!-- footer -->
			<footer class="footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12 text-center">
							<span>
								<? if (get_field('logo', 'option')) { 
									$logo = get_field('logo', 'option');
								?>
									<img src="<?= $logo[url] ?>" class="img-fluid" style="margin-right: 20px;">
								<? } else { ?>
									<img src="<?php echo get_template_directory_uri(); ?>/img/smash-footer-logo.png" class="img-fluid" style="margin-right: 20px;">
								<? } ?>
							</span>
							<? if (get_field('copyright', 'option')) { ?>
								<span><?= get_field('copyright', 'option') ?></span>
							<? } else { ?>
								<span>2015-<?= date("Y") ?> Smashtech. All rights reserved.</span>
							<? } ?>
							
							<? if (get_field('featured', 'option')) { 
								$featured = get_field('featured', 'option');
							?>
								<span><img src="<?= $featured[url] ?>" class="img-fluid"></span>
							<? } else { ?>
								<span>
									<span style="color: #fff;">Featured In</span>
									<img src="<?php echo get_template_directory_uri(); ?>/img/featured.png" class="img-fluid" style="margin-left: 10px;">
								</span>
							<? } ?>
							<span>
								<? 
									if (have_rows('social', 'option')) :
				    				while (have_rows('social', 'option')) : the_row(); 
				    					$link = get_sub_field('link');
				    					$icon = get_sub_field('icon');
				    		?>
				    			<a href="<?= $link ?>" target="_blank">
										<img src="<?= $icon[url] ?>" class="img-fluid" style="margin-left: 10px;">
									</a>
								<? endwhile; endif; ?>
							</span>

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
