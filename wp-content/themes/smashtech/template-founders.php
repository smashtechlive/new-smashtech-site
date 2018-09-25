<?php /* Template Name: Founders */ get_header(); ?>
<?php get_header(); ?>
<main class="founders">
	<div class="container-fluid">
		
				<!-- section -->

				<? if (have_posts()): while (have_posts()) : the_post(); 
					$hero = get_field('hero');	
					if ($hero): ?>
						<div class="row">
							<div class="col no-pad">
								<div class="hero" style="background: url('<?= $hero[image][url] ?>');">
									<h1><?= $hero[title_label] ?></h1>
									<p><?= $hero[paragraph_content] ?></p>
									<i class="fa fa-chevron-down"></i>
								</div>

							</div><!-- .col -->
						</div><!-- .row -->
					<? endif; ?>

				<div class="row">
					<div class="col text-center content-area " data-aos="fade-down">
						<? the_content(); ?>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<h2 class="text-center">THE SMASHTECH STORY</h2>
					</div>
				</div>

				<ol class="timeline">
				<? 
					if ( have_rows('timeline') ):
			    	while ( have_rows('timeline') ) : the_row(); 
			    		$year = get_sub_field('year');
			    		$image = get_sub_field('image');
			    		$content = get_sub_field('content');
			  ?>
			    	<li data-aos="fade-right">
			    		<p class="timeline-title"><?= $year ?></p>
			    		<div class="timeline-img">
			    			<img src="<?= $image[url] ?>" class="img-fluid">
			    		</div>
			    		<p class="timeline-content"><?= $content ?></p>
			    	</li>

	   		<?	endwhile;
		    	endif; ?>
				</ol>
				<? if( have_rows('row') ): ?>
			  		<div class="page-builder">
			  	<?  while ( have_rows('row') ) : the_row(); ?>
			    		
				    		<div class="row">	
						    	<? if (have_rows('block')) :
						    		while (have_rows('block')) : the_row(); 
						    			if (get_sub_field('media') == 'Image') {
						    				$image = get_sub_field('image');
						    				$col = '<img src="'.$image[url].'" class="img-fluid">';
						    				$dflex = '';
						    			} else {
						    				$headline = get_sub_field('headline');
						    				$body_copy =get_sub_field('body_copy');
						    				$dflex = 'd-flex';
						    				$col = 
						    					'<div class="header-section align-self-center text-center">'.
							    					'<h2 class="header-border">'.$headline.'</h2>'.
							    					'<p>'.$body_copy.'</p>'.
							    				'</div>';
						    			}
						    	?>
						    		<div class="col <?= $dflex ?> no-pad">
						    			<?= $col ?>
						    		</div>
						    	<?	endwhile;
						    	endif; ?>
				        </div><!-- .row -->
				      
			    <? endwhile; ?>
			    	</div><!-- .page-builder -->
					<? else :

			    // no rows found
			    

			endif; ?>	

				<?php endwhile; ?>

				<?php else: ?>

					<!-- article -->
					<article>

						<h2><?php _e( 'Sorry, nothing to display.', 'wpbootstrapsass' ); ?></h2>

					</article>
					<!-- /article -->

				<?php endif; ?>


			
	</div><!-- /.container -->
</main>
<?php get_footer(); ?>

