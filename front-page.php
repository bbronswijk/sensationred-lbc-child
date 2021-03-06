	<?php
	/*
	Template Name: lbc front page
	*/
	?>
	<?php get_header(); ?>
	<div class="main_home container">	
		<div class="wrapper">	
			
			<div class="homepage_column">
				<iframe width="440" height="245" src="//www.youtube.com/embed/gpvZcJSPUEU?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
			
				<!-- If there is an active sidebar show it --> 	
				<div class="shortcut_menu homepage_block">
					<div class="title">
						<h1>Berichten</h1>	
					</div>
					<?php 
					query_posts('showposts=3');	if ( have_posts() ) {
						while ( have_posts() ) {
							the_post(); 
							?> 
							<a href="<?php the_permalink() ?>"><h2><?php the_title(); ?></h2></a>
							<?php
							the_excerpt();
							?>
							<p><a class="lbc_read_more" href="<?php the_permalink() ?>">lees meer</a></p>
							<?php
						}
					}
					?>
				</div>
			</div>
			
			<div class="homepage_column">
				<div id="linkedIn" class="shortcut_menu homepage_block">
					<a href="http://businessclub.laga.nl/linkedin/"><img src="http://businessclub.laga.nl/wp-content/uploads/2016/04/linkedin2.png" alt="linkedIn"></a>
				</div>
				<div class="shortcut_menu homepage_block">
					<div class="title">
						<h1>Evenementen</h1>	
					</div>
					<?php wp_reset_query();						
						$args = array(
							'post_type' => 'evenementen',
							'posts_per_page' => 100
						);
						$query = new WP_Query( $args );
						
						if ( $query->have_posts() ){ 
							while ( $query->have_posts() ) { $query->the_post();
								//global $more;
								//$more = 0;	
								?>
								<h2><?php the_title(); ?></h2>
								<?php								
							} // end while
						} // end if
					?>
				</div>
			</div>
		</div> <!-- wrapper -->
	</div><!-- container --> 
	


	
	<?php get_footer(); ?>