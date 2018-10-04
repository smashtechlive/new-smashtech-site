<? 
  $hero = get_field('hero');	
	if ($hero): 
		if (is_mobile()) {
			$hero[image][url] = ($hero[mobile_image][url]) ? $hero[mobile_image][url] : $hero[image][url];

		}
	?>
		<div class="row">
			<div class="col no-pad">
				<div class="d-flex hero" style="background: url('<?= $hero[image][url] ?>') top center no-repeat;">
					<div class="align-self-center justify-content-center">
						<h1><?= $hero[title_label] ?></h1>
						<p><?= $hero[paragraph_content] ?></p>
						<i class="fa fa-chevron-down"></i>
					</div>
					
				</div>

			</div><!-- .col -->
		</div><!-- .row -->
	<? endif; ?>