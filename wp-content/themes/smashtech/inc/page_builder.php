<? if( have_rows('row') ): ?>
	<div class="page-builder">
  	<?  while ( have_rows('row') ) : the_row(); 
  		$container = get_sub_field('container');
  		$background_color = get_sub_field('background_color');
  		if( $background_color) {
  			$background_color = 'background: '.$background_color.';';
  		}
  		
  		$row_title = get_sub_field('title');
  		$margin = get_sub_field('margin');
  		$margin = 'mt-'.$margin;
  		$margin_bottom = get_sub_field('margin-bottom');
  		$margin_bottom = 'mb-'.$margin;
  		$section_copy = get_sub_field('section_copy');
  	?>
	  	<section style="<?= $background_color ?>" class="<?= $margin.' '.$margin_bottom ?>">
		  	<div class="<?= $container ?>">
		  		<? if ($row_title) { ?>
		  			<div class="row">
		  				<div class="col">
		  					<div class="row-title text-center">
			  					<h2><?= $row_title ?></h2>
			  					<p><?= $section_copy ?></p>
			  				</div>
		  				</div>
		  			</div>
		  		<? } ?>	    	
		  		<div class="row">	
			    	<? if (have_rows('block')) :
			    		while (have_rows('block')) : the_row(); 
			    			$headline = get_sub_field('headline');
		    				$body_copy =get_sub_field('body_copy');
		    				$image = get_sub_field('image');
		    				$column_width = get_sub_field('column_width');
		    				$column_width = ($column_width) ? 'col-sm-'.$column_width : 'col no-pad';
			    			if (get_sub_field('media') == 'Image') {
			    				$col = '<img src="'.$image[url].'" class="img-fluid img-full" data-aos="fade-left">';
			    				$dflex = 'mobile-1';
			    			} else if (get_sub_field('media') == 'Content Widget') {
			    				$col = 
			    					'<div class="content-widget text-center mb-5">'.
				    					'<img src="'.$image[url].'" class="mx-auto d-block img-fluid mb-3">'.
				    					'<h3>'.$headline.'</h3>'.
				    					'<p>'.$body_copy.'</p>'.
				    				'</div>';
			    			} else {
			    				$dflex = 'd-flex';
			    				$col = 
			    					'<div class="header-section justify-content-center align-self-center" data-aos="fade-right">'.
				    					'<h2 class="header-border">'.$headline.'</h2>'.
				    					'<p>'.$body_copy.'</p>'.
				    				'</div>';
			    			}
			    	?>
			    		<div class="<?= $column_width ?> <?= $dflex ?>">
			    			<?= $col ?>
			    		</div>
			    	<?	endwhile;
			    	endif; ?>
		      </div><!-- .row -->
			  </div><!-- $container -->
			</section><!-- background -->
    <? endwhile; ?>
  	</div><!-- .page-builder -->
	<? else :
    // no rows found
	endif; 
?>	