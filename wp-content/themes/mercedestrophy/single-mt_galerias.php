<?php
/**
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
						<h2><?php the_title(); ?></h2>
						<p>___________</p>
						<p class="anotation"><?php echo esc_html( get_post_meta( get_the_ID(), 'wp_mercedestrophy_fecha', true ) ); ?></p>
						<p><?php the_content(); ?></p>
					</div>
				</div>
			</div>
			<div class="mt-galeria">
				<div class="row text-center">
					<div class="col-xs-14 col-md-12 col-md-offset-1">
						<div class="mt-fotos-wrapper">

							<?php echo do_shortcode(get_post_meta( get_the_ID(), 'wp_mercedestrophy_galeria', true ));?>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; endif; ?>
		<div class="mt-galeria">
			<div class="row">
				<div class="col-xs-14 col-md-12 col-md-offset-1 text-center">
					<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Galerías' ) ) ); ?>" class="btn btn-md btn-default btn-mt">
						Regresar
					</a>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>


