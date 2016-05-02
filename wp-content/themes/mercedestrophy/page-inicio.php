<?php
/**
* Template Name: Inicio
* @package WordPress
* @subpackage Mercedes Trophy
* @since Mercedes Trophy 1.0
*/
 get_header(); ?>

 	<div id="wrapper" class="container">
 		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="mt-seccion">
				<div class="row text-center">
					<div class="col-xs-14 col-md-10 col-md-offset-2">
						<h2><?php echo get_bloginfo( 'name' ); ?></h2>
						<p>___________</p>
						<p><?php the_content(); ?></p>
					</div>
				</div>
			</div>
			
			<div class="mt-clubes">
				<div class="row text-center">
					<div class="col-xs-14 col-md-10 col-md-offset-2">
						<blockquote>
							<?php 
								$home_page_post_id = get_page_by_title( 'Clubes 2016' );
								$home_page_post = get_post( $home_page_post_id, ARRAY_A );
								$content_home = $home_page_post['post_content'];
								echo $content_home; 
							?>
						</blockquote>

						<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Clubes 2016' ) ) ); ?>" class="btn btn-md btn-default btn-mt">
							Más información
						</a>
					</div>
				</div>
			</div>

			<div class="mt-seccion">
				<div class="row text-center">
					<div class="col-xs-14 col-md-10 col-md-offset-2">
						<h2>Galería</h2>
						<p>___________</p>
					</div>
				</div>
			</div>

			<?php 
				$galeriasPost = array( 
					'post_type' => 'mt_galerias', 
					'posts_per_page' => '8',
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
					<div class="col-xs-14 col-md-12 col-md-offset-1 text-center">
						<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Galerías' ) ) ); ?>" class="btn btn-md btn-default btn-mt">
							Ver más
						</a>
					</div>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</div>

<?php get_footer(); ?>