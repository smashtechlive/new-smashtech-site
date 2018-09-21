<!-- sidebar -->
<aside class="sidebar">
	<div class="mt-2">
		<p><small>LATEST</small></p>
		<ul>
			<?
				// The Query
				$the_query = new WP_Query( array( 'posts_per_page' => 4 ));
				// The Loop
				if ( $the_query->have_posts() ) {						
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						//$the_query->post->post_date = date()
						$date = new DateTime($the_query->post->post_date);

						//pr($the_query->post);
						echo '<li>
						 				<a href="'.$the_query->post->guid.'">
						 					
							 				<img src="'.wp_get_attachment_url( get_post_thumbnail_id($the_query->post->ID) ).'" class="img-fluid">
							 				<p class="post-date"><small>'.$date->format("F j, Y").'</small></p>
							 				<h5 class="loop-title">' . $the_query->post->post_title . '</h5>
							 				
							 			</a>
									</li>';
					}
					wp_reset_postdata();
				} 
			?>
		</ul>

	</div><!-- /.panel -->
</aside>
<!-- /sidebar -->
