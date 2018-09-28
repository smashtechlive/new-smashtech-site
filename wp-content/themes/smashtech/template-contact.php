<?php /* Template Name: Contact */ get_header(); ?>

<main class="contact">
	
	<? if (have_posts()): while (have_posts()) : the_post();  ?>
	  	<div class="container">
	  		<div class="row">
	  			<div class="col text-center">
	  				<h1 class="header-border "><? the_title(); ?></h1>
	  			</div><!-- .col -->
	  		</div><!-- .row -->

	  		<div class="row">
	  			<div class="col">
	  				<p class="text-center">Have questions? We are here to help!</p>
	  			</div><!-- .col -->
	  		</div><!-- .row -->

	  		<div class="row">
	  			<div class="col">
	  				<div class="contact-box clearfix">
	  					<div class="pull-left">
	  						<img src="<?php echo get_template_directory_uri(); ?>/img/phone.png" class="img-fluid">
	  					</div>
	  					<div class="pull-left">

		  					<h5 class="mb-0 mt-3">PHONE</h5>
		  					<p><small>1 (888) 657-1779</small></p>
		  				</div>
	  				</div>
	  			</div><!-- .col -->
	  		</div><!-- .row -->

	  		<div class="row">
	  			<div class="col">
	  				<div class="contact-box clearfix">
	  					<div class="pull-left">
	  						<img src="<?php echo get_template_directory_uri(); ?>/img/location.png" class="img-fluid">
	  					</div>
	  					<div class="pull-left">
		  					<h5 class="mb-0 mt-3">ADDRESS</h5>
		  					<p><small>530 B Street #1500 San Diego, CA 92101</small></p>
	  					</div>
	  				</div>
	  			</div><!-- .col -->
	  		</div><!-- .row -->

	  		<div class="row">
	  			<div class="col">
	  				<div class="contact-box">
	  					<div class="clearfix">
		  					<div class="pull-left">
		  						<img src="<?php echo get_template_directory_uri(); ?>/img/email.png" class="img-fluid">
		  					</div>
		  					<div class="pull-left">
			  					<h5 class="mb-0 mt-3">EMAIL</h5>
			  					<p><small>Typically reply time: within a day or two</small></p>
			  				</div>
			  			</div>
	  					<div class="form">
	  						<form>
								  <div class="form-group">
								    <label for="exampleInputEmail1">Your email address</label>
								    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
								  </div>
								  <div class="form-group">
								    <label for="exampleInputPassword1">Message</label>
								    <textarea rows="3" class="form-control" id="exampleInputPassword1" placeholder=""></textarea>
								  </div>
								  <div class="form-group">
								    <label for="exampleInputEmail1">Your name</label>
								    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
								  </div>
								  <button type="submit" class="btn btn-yellow">Submit</button>
								</form>
	  					</div><!-- .form -->
	  				</div>
	  			</div><!-- .col -->
	  		</div><!-- .row -->
	  	</div><!-- .container -->

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

