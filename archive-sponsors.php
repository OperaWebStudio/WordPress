<?php get_header(); ?>
	
	<main class="main" role="main">
		<section class="white icons">
			<div class="wrap">
				<div class="row">
				 <header>Thanks to our sponsors</header>

				 <?php 		
				 $args = array('post_type' => 'sponsors', 
				 							'meta_key' => 'sponsor',
				 							'orderby' => 'meta_value_num',
				 							'order' => 'ASC',
				 							'post_per_page' => -1 );
				 $loop = new WP_Query( $args );
				 
				 if( $loop->have_posts() ):
				 	
				 	while( $loop->have_posts() ): $loop->the_post(); ?>

					<div class="one-fifth wow fadeIn">
						<a href="http://www.virga.hr/" target="_blank"><?php the_post_thumbnail(); ?></a>
					</div>

					<?php endwhile;
						
					endif;	
					wp_reset_postdata(); ?>

				</div>
			</div>
		</section>
	</main>

<?php get_footer(); ?>
