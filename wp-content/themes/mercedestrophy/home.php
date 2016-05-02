<?php
/**
 * @package WordPress
 * @subpackage Mercedes Trophy
 * @since Mercedes Trophy 1.0
 */
 get_header(); ?>

	<div id="wrapper" class="container">
		<div class="mt-seccion">
			<div class="row text-center">
				<div class="col-xs-14 col-md-10 col-md-offset-2">
					<h2>Mercedes Trophy</h2>
					<p>___________</p>
					


					<p>Por más de 13 años hemos contado con un evento en el que uno de los principales objetivos es: consentir y crear lealtad a nuestros clientes, sólo como Mercedes-Benz puede hacerlo; el MercedesTrophy.</p>
	 
					<p>Un evento de talla internacional en el que nuestros clientes tienen la experiencia de viajar a Puerto Vallarta, para participar en la Final Nacional y de esta manera competir con los mejores golfistas de nuestro país, y poder ganar el pase para volar a Stuttgart, Alemania, y competir con jugadores de talla internacional de más de ¡33 países participantes!</p>
				</div>
			</div>
		</div>

		<div class="mt-clubes">
			<div class="row text-center">
				<div class="col-xs-14 col-md-10 col-md-offset-2">
					<blockquote>
						El año 2014, fue todo un logro, ya que ¡los tres representantes mexicanos lograron obtener el tercer lugar a nivel mundial! <span class="anotation">(de 33 países participantes).</span>
					</blockquote>

					<a href="/clubes-2016" class="btn btn-md btn-default btn-mt">
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
			$galeriasPost = array( 'post_type' => 'mt_galerias', );
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
					<!-- Liga estática -->
					<a href="/galerias" class="btn btn-md btn-default btn-mt">
						Ver más
					</a>
				</div>
			</div>
		</div>

	</div>
	


<?php get_footer(); ?>
