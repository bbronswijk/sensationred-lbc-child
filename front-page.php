	<?php
	/*
	Template Name: lbc front page
	*/
	?>
	<?php get_header(); ?>
	<div class="main_home container">	
		<div class="wrapper">	
			<div class="homepage_block" style="float:left; width:435px;">
				<iframe width="435" height="245" src="//www.youtube.com/embed/gpvZcJSPUEU?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
			
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
					<div class="bg_sc_menu">background</div>
				</div>
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
				<div class="bg_sc_menu">background</div>
			</div>
	
		</div> <!-- wrapper -->
	</div><!-- container --> 
	


	
	<?php get_footer(); ?>