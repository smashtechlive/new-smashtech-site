<? if( have_rows('row') ): ?>
	<div class="page-builder">
  	<?  while ( have_rows('row') ) : the_row(); 
  		$container = get_sub_field('container');
  		$background_color = get_sub_field('background_color');
  		$row_title = get_sub_field('title');
  	?>
	  	<section style="background: <?= $background_color ?>;">
		  	<div class="<?= $container ?>">
		  		<? if ($row_title) { ?>
		  			<div class="row">
		  				<div class="col">
		  					<h2 class="text-center row-title"><?= $row_title ?></h2>
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
		    				$column_width = ($column_width) ? 'col-'.$column_width : 'col';
			    			if (get_sub_field('media') == 'Image') {
			    				$col = '<img src="'.$image[url].'" class="img-fluid">';
			    				$dflex = '';
			    			} else if (get_sub_field('media') == 'Content Widget') {
			    				$col = 
			    					'<div class="content-widget text-center">'.
				    					'<img src="'.$image[url].'" class="mx-auto d-block">'.
				    					'<h2>'.$headline.'</h2>'.
				    					'<p>'.$body_copy.'</p>'.
				    				'</div>';
			    			} else {
			    				$dflex = 'd-flex';
			    				$col = 
			    					'<div class="header-section align-self-center text-center">'.
				    					'<h2 class="header-border">'.$headline.'</h2>'.
				    					'<p>'.$body_copy.'</p>'.
				    				'</div>';
			    			}
			    	?>
			    		<div class="<?= $column_width ?> <?= $dflex ?> no-pad">
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