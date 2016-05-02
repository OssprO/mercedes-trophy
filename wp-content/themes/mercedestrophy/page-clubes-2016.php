<?php
/**
* Template Name: Clubes 2016
* @package WordPress
* @subpackage Mercedes Trophy
* @since Mercedes Trophy 1.0
*/

 get_header(); ?>

	<div class="container">
		<div class="mt-seccion">
			<div class="row text-center">
				<div class="col-xs-14 col-md-10 col-md-offset-2">
					<h2><?php the_title(); ?></h2>
					<p>___________</p>
				</div>
			</div>
		</div>
	</div>

	<?php 
		$clubesPost = array( 
			'post_type' => 'mt_clubes', 
			'meta_key' => 'wp_mercedestrophy_fecha',
			'orderby' => 'meta_value',
			'order' => 'ASC');
		$clubesLoop = new WP_Query( $clubesPost ); 
	?>
		<!-- Cycle through all posts -->
	<?php while ( $clubesLoop->have_posts() ) : $clubesLoop->the_post();?>
		<?php if ($clubesLoop->current_post % 2 == 0): ?>
        	<div class="container">
				<div class="mt-calendario">
					<div class="row row-eq-height">
						<div class="col-md-1 col-md-offset-1 mt-calendario-item">
							
						</div>
						<div class="col-xs-10 col-md-6 mt-calendario-item mt-calendario-item-info">
							<p><strong><span class="anotation">
								<?php echo esc_html( get_post_meta( get_the_ID(), 'wp_mercedestrophy_fecha', true ) ); ?>
								 - Hoyo 
								<?php echo esc_html( get_post_meta( get_the_ID(), 'wp_mercedestrophy_hoyo', true ) ); ?>
							</span></strong></p>
							<h1 class="inverse"><?php the_title(); ?></h1>
							<p>___________</p>
							<div class="mt-calendario-item-info-detalle">
								<p>
									<strong>
									<?php echo esc_html( get_post_meta( get_the_ID(), 'wp_mercedestrophy_direccion', true ) ); ?>
									<br>
									<?php $arrayTelefonos = get_post_meta( get_the_ID(), 'wp_mercedestrophy_telefono', true ); ?>
									
									<?php 
										if ( !empty( $arrayTelefonos ) ) {
											if (count($arrayTelefonos) === 1) {
											    echo 'Teléfono: ';
											    echo esc_html( $arrayTelefonos[0] ); 
											} else {
												echo 'Teléfonos: ';
												foreach ($arrayTelefonos as &$telefono) {
												    echo $telefono;
												}
											}
										}
										
									?>
									</strong>
								</p>
								
								<p>
									<strong>Encargado</strong>: <?php echo esc_html( get_post_meta( get_the_ID(), 'wp_mercedestrophy_encargado', true ) ); ?> <br>
									<strong>Escopetazo</strong>: <?php echo esc_html( get_post_meta( get_the_ID(), 'wp_mercedestrophy_escopetazo', true ) ); ?> <br>
									<strong>HiO</strong>: 
									<?php 
										$arrayDistribuidores = wp_get_post_terms( get_the_ID(), 'mt_clubes_distribuidores', '' );

										if ( !empty( $arrayDistribuidores ) ) {
											if (count($arrayDistribuidores) === 1) {
												echo $arrayDistribuidores[0]->name;
											} 
										}
									?>
								</p>
							</div>
						</div>
						<div class="col-xs-2 col-md-4 mt-calendario-item mt-calendario-item-foto">
							<!--<img class="img-responsive" src="" alt="">-->
							<?php the_post_thumbnail( array( 340, 500 ) ); ?>
						</div>
						<div class="col-md-1 mt-calendario-item">
							
						</div>
					</div>
				</div>
			</div>
	    <?php else: ?>
	        <div class="container-fluid inverse">
				<div class="container">
					<div class="mt-calendario-inverse">
						<div class="row row-eq-height">
							<div class="col-md-1 col-md-offset-1 mt-calendario-item">
								
							</div>
							
							<div class="col-xs-2 col-md-4 mt-calendario-item mt-calendario-item-foto">
								<?php the_post_thumbnail( array( 340, 500 ) ); ?>
							</div>
							<div class="col-xs-10 col-md-6 mt-calendario-item mt-calendario-item-info text-right">
								<p><strong><span class="anotation">
									<?php echo esc_html( get_post_meta( get_the_ID(), 'wp_mercedestrophy_fecha', true ) ); ?>
									 - Hoyo 
									<?php echo esc_html( get_post_meta( get_the_ID(), 'wp_mercedestrophy_hoyo', true ) ); ?>
								</span></strong></p>
								<h1><?php the_title(); ?></h1>
								<p>___________</p>
								<div class="mt-calendario-item-info-detalle">
									<p>
										<strong>
										<?php echo esc_html( get_post_meta( get_the_ID(), 'wp_mercedestrophy_direccion', true ) ); ?>
										<br>
										<?php $arrayTelefonos = get_post_meta( get_the_ID(), 'wp_mercedestrophy_telefono', true ); ?>
										
										<?php 
											if ( !empty( $arrayTelefonos ) ) {
												if (count($arrayTelefonos) === 1) {
												    echo 'Teléfono: ';
												    echo esc_html( $arrayTelefonos[0] ); 
												} else {
													echo 'Teléfonos: ';
													foreach ($arrayTelefonos as &$telefono) {
													    echo $telefono;
													}
												}
											}
											
										?>
										</strong>
									</p>
									
									<p>
										<strong>Encargado</strong>: <?php echo esc_html( get_post_meta( get_the_ID(), 'wp_mercedestrophy_encargado', true ) ); ?> <br>
										<strong>Escopetazo</strong>: <?php echo esc_html( get_post_meta( get_the_ID(), 'wp_mercedestrophy_escopetazo', true ) ); ?> <br>
										<strong>HiO</strong>: 
										<?php 
											$arrayDistribuidores = wp_get_post_terms( get_the_ID(), 'mt_clubes_distribuidores', '' );

											if ( !empty( $arrayDistribuidores ) ) {
												if (count($arrayDistribuidores) === 1) {
													echo $arrayDistribuidores[0]->name;
												} 
											}
										?>
									</p>
								</div>
							</div>
							<div class="col-md-1 mt-calendario-item">
								
							</div>
						</div>
					</div>
				</div>
			</div>
	    <?php endif ?>
	<?php endwhile;  ?>

	<div class="container">
		<div class="mt-calendario">
			<div class="row row-eq-height">
				<div class="col-md-1 col-md-offset-1 mt-calendario-item">
					
				</div>
				<div class="col-xs-10 col-md-6 mt-calendario-item mt-calendario-item-info">
					
				</div>
				<div class="col-xs-2 col-md-4 mt-calendario-item mt-calendario-item-foto">
					
				</div>
				<div class="col-md-1 mt-calendario-item">
					
				</div>
			</div>
		</div>
	</div>

	<!--
	<div class="container">
		<div class="mt-calendario">
			<div class="row row-eq-height">
				<div class="col-md-1 col-md-offset-1 mt-calendario-item">
					
				</div>
				<div class="col-xs-10 col-md-6 mt-calendario-item mt-calendario-item-info">
					<p><strong><span class="anotation">Viernes 6 de Mayo - Hoyo 6</span></strong></p>
					<h1 class="inverse">Club de Golf Bellavista</h1>
					<p>___________</p>
					<div class="mt-calendario-item-info-detalle">
						<p>
							<strong>
							Av. Valle verde # 52, fracc. Calacoaya, Atizapán de Zaragoza, Estado de México. C.P. 54053<br>
							Tel. 53-66-80-50
							</strong>
						</p>
						
						<p>
							<strong>Encargado</strong>: Norma Cabrera <br>
							<strong>Escopetazo</strong>: 8:00 am <br>
							<strong>HiO</strong>: Autocast
						</p>
					</div>
				</div>
				<div class="col-xs-2 col-md-4 mt-calendario-item mt-calendario-item-foto">
					<img class="img-responsive" src="" alt="">
				</div>
				<div class="col-md-1 mt-calendario-item">
					
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid inverse">
		<div class="container">
			<div class="mt-calendario-inverse">
				<div class="row row-eq-height">
					<div class="col-md-1 col-md-offset-1 mt-calendario-item">
						
					</div>
					
					<div class="col-xs-2 col-md-4 mt-calendario-item mt-calendario-item-foto">
						<img class="img-responsive" src="" alt="">
					</div>
					<div class="col-xs-10 col-md-6 mt-calendario-item mt-calendario-item-info text-right">
						<p><strong><span class="anotation">Viernes 6 de Mayo - Hoyo 6</span></strong></p>
						<h1>Club de Golf Bellavista</h1>
						<p>___________</p>
						<div class="mt-calendario-item-info-detalle">
							<p>
								<strong>
								Av. Valle verde # 52, fracc. Calacoaya, Atizapán de Zaragoza, Estado de México. C.P. 54053<br>
								Tel. 53-66-80-50
								</strong>
							</p>
							
							<p>
								<strong>Encargado</strong>: Norma Cabrera <br>
								<strong>Escopetazo</strong>: 8:00 am <br>
								<strong>HiO</strong>: Autocast
							</p>
						</div>
					</div>
					<div class="col-md-1 mt-calendario-item">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="mt-calendario">
			<div class="row row-eq-height">
				<div class="col-md-1 col-md-offset-1 mt-calendario-item">
					
				</div>
				<div class="col-xs-10 col-md-6 mt-calendario-item mt-calendario-item-info">
					<p><strong><span class="anotation">Viernes 6 de Mayo - Hoyo 6</span></strong></p>
					<h1 class="inverse">Club de Golf Bellavista</h1>
					<p>___________</p>
					<div class="mt-calendario-item-info-detalle">
						<p>
							<strong>
							Av. Valle verde # 52, fracc. Calacoaya, Atizapán de Zaragoza, Estado de México. C.P. 54053<br>
							Tel. 53-66-80-50
							</strong>
						</p>
						
						<p>
							<strong>Encargado</strong>: Norma Cabrera <br>
							<strong>Escopetazo</strong>: 8:00 am <br>
							<strong>HiO</strong>: Autocast
						</p>
					</div>
				</div>
				<div class="col-xs-2 col-md-4 mt-calendario-item mt-calendario-item-foto">
					<img class="img-responsive" src="" alt="">
				</div>
				<div class="col-md-1 mt-calendario-item">
					
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid inverse">
		<div class="container">
			<div class="mt-calendario-inverse">
				<div class="row row-eq-height">
					<div class="col-md-1 col-md-offset-1 mt-calendario-item">
						
					</div>
					
					<div class="col-xs-2 col-md-4 mt-calendario-item mt-calendario-item-foto">
						<img class="img-responsive" src="" alt="">
					</div>
					<div class="col-xs-10 col-md-6 mt-calendario-item mt-calendario-item-info text-right">
						<p><strong><span class="anotation">Viernes 6 de Mayo - Hoyo 6</span></strong></p>
						<h1>Club de Golf Bellavista</h1>
						<p>___________</p>
						<div class="mt-calendario-item-info-detalle">
							<p>
								<strong>
								Av. Valle verde # 52, fracc. Calacoaya, Atizapán de Zaragoza, Estado de México. C.P. 54053<br>
								Tel. 53-66-80-50
								</strong>
							</p>
							
							<p>
								<strong>Encargado</strong>: Norma Cabrera <br>
								<strong>Escopetazo</strong>: 8:00 am <br>
								<strong>HiO</strong>: Autocast
							</p>
						</div>
					</div>
					<div class="col-md-1 mt-calendario-item">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="mt-calendario">
			<div class="row row-eq-height">
				<div class="col-md-1 col-md-offset-1 mt-calendario-item">
					
				</div>
				<div class="col-xs-10 col-md-6 mt-calendario-item mt-calendario-item-info">
					<p><strong><span class="anotation">Viernes 6 de Mayo - Hoyo 6</span></strong></p>
					<h1 class="inverse">Club de Golf Bellavista</h1>
					<p>___________</p>
					<div class="mt-calendario-item-info-detalle">
						<p>
							<strong>
							Av. Valle verde # 52, fracc. Calacoaya, Atizapán de Zaragoza, Estado de México. C.P. 54053<br>
							Tel. 53-66-80-50
							</strong>
						</p>
						
						<p>
							<strong>Encargado</strong>: Norma Cabrera <br>
							<strong>Escopetazo</strong>: 8:00 am <br>
							<strong>HiO</strong>: Autocast
						</p>
					</div>
				</div>
				<div class="col-xs-2 col-md-4 mt-calendario-item mt-calendario-item-foto">
					<img class="img-responsive" src="" alt="">
				</div>
				<div class="col-md-1 mt-calendario-item">
					
				</div>
			</div>
		</div>
	</div>
	-->

<?php get_footer(); ?>