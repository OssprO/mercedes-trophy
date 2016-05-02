<?php
/**
* Template Name: Galerías
* @package WordPress
* @subpackage Mercedes Trophy
* @since Mercedes Trophy 1.0
*/

 get_header(); ?>

	<div id="wrapper" class="container">
		<div class="mt-seccion">
			<div class="row text-center">
				<div class="col-xs-14 col-md-10 col-md-offset-2">
					<h2><?php the_title(); ?></h2>
					<p>___________</p>
				</div>
			</div>
		</div>

		<?php 
			$galeriasPost = array( 
				'post_type' => 'mt_galerias', 
				'meta_key' => 'wp_mercedestrophy_fecha',
				'orderby' => 'meta_value',
				'order' => 'ASC');
			$galeriasLoop = new WP_Query( $galeriasPost ); 
		?>

		<div class="mt-galeria">
			<div class="row">
				<div class="col-xs-14 col-md-12 col-md-offset-1 mt-fotos-wrapper grid js-masonry" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 300 }'>
				
					<?php while ( $galeriasLoop->have_posts() ) : $galeriasLoop->the_post();?>
						<div class="mt-galeria-wrapper text-left grid-item">
							<div class="mt-galeria-single">
								<div class="mt-galeria-data">
									<div class="col-xs-9">
										<a href="<?php the_permalink();?>">
											<h4>
												<?php the_title(); ?>
											</h4>
										</a>
										<small class="anotation">
											<?php echo esc_html( get_post_meta( get_the_ID(), 'wp_mercedestrophy_fecha', true ) ); ?>
										</small>
									</div>
									<div class="col-xs-5">
										<p class="mt-share-buttons">
											<?php
												echo do_shortcode('[Sassy_Social_Share]');
											?>
										</p>
									</div>
								</div>
								<a href="<?php the_permalink();?>">
									<?php the_post_thumbnail( array( 340, 500 ), array('class' => 'img-responsive') ); ?>
								</a>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>

	</div>

<?php get_footer(); ?>